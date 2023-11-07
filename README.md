# aliyun-pai-aiservice-php-sdk 
阿里云 PAI-AIService 服务的 php  SDK.

[多媒体分析文档](https://help.aliyun.com/zh/pai/user-guide/multimedia-analysis?spm=a2c4g.11186623.0.0.31a419d5APYtKi)

[AI写真文档](https://help.aliyun.com/zh/pai/user-guide/overview-of-ai-portraits?spm=a2c4g.11174283.0.0.34165e0fdiZgrH)

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/aliyun/aliyun-pai-aiservice-php-sdk.git"
    }
  ],
  "require": {
    "aliyun/aliyun-pai-aiservice-php-sdk": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/aliyun-pai-aiservice-php-sdk/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

AI 写真训练生成相关接口参考 test/Api/AigcImagesTest.php

AI 写真具体接口参考 test/Api/AigcImagesApiTest.php
