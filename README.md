# Magento service provider for PHP Console

PHP Console allows you to handle PHP errors & exceptions, dump variables, execute PHP code remotely and many other things using [Google Chrome extension PHP Console](https://chrome.google.com/webstore/detail/php-console/nfhmhhlpfleoednkpnnnkolmclajemef) and [PhpConsole server library](https://github.com/barbushin/php-console).

## Installation

You need to install Google Chrome extension [PHP Console](https://chrome.google.com/webstore/detail/php-console/nfhmhhlpfleoednkpnnnkolmclajemef).

### Install directly with modman

``modman clone https://github.com/mkutyba/PhpConsole-Magento``

### Install through composer

Merge the following code with your ``composer.json``:

```json
{
    "require": {
        "kutybait/phpconsole-magento": "dev-master"
    },
    "extra": {
        "magento-root-dir": "htdocs/"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/mkutyba/PhpConsole-Magento.git"
        }
    ]
}
```

### Install manually

You can copy the files from this repository to the root folder of your Magento installation.

## Usage

Use this code to log messages:

```php
Mage::helper('phpconsole')->log('Message to log');
Mage::helper('phpconsole')->debug($collection);
```
