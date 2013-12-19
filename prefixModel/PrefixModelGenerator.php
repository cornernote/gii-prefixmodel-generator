<?php
Yii::import('system.gii.generators.model.ModelGenerator');
Yii::setPathOfAlias('prefixModelGenerator', dirname(__FILE__));

/**
 * PrefixModelGenerator
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/gii-prefixmodel-generator
 * @license BSD-3-Clause https://raw.github.com/cornernote/gii-prefixmodel-generator/master/LICENSE
 */
class PrefixModelGenerator extends ModelGenerator
{
    /**
     * @var string
     */
    public $codeModel = 'prefixModelGenerator.PrefixModelCode';
}