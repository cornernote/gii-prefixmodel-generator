# Gii PrefixModel Generator for Yii

Makes it easier to generate all models by allowing a model class prefix.


## Features

- Adds an option into the form for Class Prefix.
- Extends from Yii's core ModelGenerator.
- Defaults tablename to *, which will generate all models.


## Installation

Please download using ONE of the following methods:


### Composer Installation

```
curl http://getcomposer.org/installer | php
php composer.phar require cornernote/gii-prefix-generator
```


### Manual Installation

Download the [latest version](https://github.com/cornernote/gii-prefixmodel-generator/archive/master.zip) and move the `gii-prefixmodel-generator` folder into your `protected/extensions` folder.


## Configuration

Add the path to gii-prefixmodel-generator to the `generatorPaths` in your gii configuration:

```php
return array(
	'modules' => array(
		'gii' => array(
			'class'=>'system.gii.GiiModule',
			'generatorPaths' => array(
				'vendor.cornernote.gii-prefixmodel-generator',
				//'ext.gii-prefixmodel-generator', // if you downloaded into ext
			),
		),
	),
);
```

## Usage

Visit `index.php?r=gii`, then choose PrefixModel from the menu.


## License

- Author: Brett O'Donnell <cornernote@gmail.com>
- Source Code: https://github.com/cornernote/gii-prefixmodel-generator
- Copyright © 2013 Mr PHP <info@mrphp.com.au>
- License: BSD-3-Clause https://raw.github.com/cornernote/gii-prefixmodel-generator/master/LICENSE


## Links

- [Yii Extension](http://www.yiiframework.com/extension/gii-prefixmodel-generator)
- [Composer Package](https://packagist.org/packages/cornernote/gii-prefixmodel-generator)
- [MrPHP](http://mrphp.com.au)
