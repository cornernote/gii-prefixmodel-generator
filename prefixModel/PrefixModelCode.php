<?php
Yii::import('system.gii.generators.model.ModelCode');
/**
 * PrefixModelCode
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/gii-prefixmodel-generator
 * @license BSD-3-Clause https://raw.github.com/cornernote/gii-prefixmodel-generator/master/LICENSE
 */
class PrefixModelCode extends ModelCode
{
    /**
     * @var
     */
    public $modelPrefix;

    /**
     * @var
     */
    public $tableName = '*';

    /**
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('modelPrefix', 'filter', 'filter' => 'trim'),
            array('modelPrefix', 'match', 'pattern' => '/^(\w+[\w\.]*|\*?|\w+\.\*)$/', 'message' => '{attribute} should only contain word characters, dots, and an optional ending asterisk.'),
            array('modelPrefix', 'match', 'pattern' => '/^[a-zA-Z_]\w*$/', 'message' => '{attribute} should only contain word characters.'),
            array('modelPrefix', 'sticky'),
        ));
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'modelPrefix' => 'Model Prefix',
        ));
    }

    /**
     * Validate the tableName
     * ModelCode does not want to create a class with an invalid name, however it does not
     * take into account the modelPrefix, so we have to prefix the keywords before checking
     * @param $attribute
     * @param $params
     */
    public function validateTableName($attribute, $params)
    {
        if ($this->modelPrefix) {
            $keywords = self::$keywords;
            self::$keywords = array();
            foreach ($keywords as $keyword)
                self::$keywords[] = $this->modelPrefix . $keyword;
            parent::validateTableName($attribute, $params);
            self::$keywords = $keywords;
        }
        else {
            parent::validateTableName($attribute, $params);
        }
    }

    /**
     * @param $tableName
     * @return string
     */
    protected function generateClassName($tableName)
    {
        return $this->modelPrefix . parent::generateClassName($tableName);
    }

    /**
     * Gets own templates, as well as those from generators.model
     * @return array
     */
    public function getTemplates()
    {
        $templates = parent::getTemplates();
        foreach (Yii::app()->getModule('gii')->generatorPaths as $path) {
            $path = Yii::getPathOfAlias($path . '.model.templates');
            if (is_dir($path))
                foreach (scandir($path) as $dir)
                    if ($dir[0] !== '.' && is_dir($path . '/' . $dir))
                        $templates[$dir] = strtr($path . '/' . $dir, array('/' => DIRECTORY_SEPARATOR, '\\' => DIRECTORY_SEPARATOR));
        }
        return $templates;
    }
}
