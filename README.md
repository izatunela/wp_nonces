# Object oriented implementation of WordPress Nonces
## v1.0.0

## Installation

This package is installed via [Composer](http://getcomposer.org/). To install, simply add to your `composer.json` file:

```
$ composer require markoivanovic/wp-nonces
```
## Required PHP version
This package requires minimum PHP 7.x.x version

## Use
#### wp_create_nonce() implementation
Getting the nonce value for given action:

```php
<?php
use Marko\WordPressNonces\WordPressNonce;

$wp_nonce = new WordPressNonce('action');
echo $wp_nonce->get(); // 66fb9c05d0
?>
```

#### wp_nonce_url() implementation
Embedding the nonce "nonce_name" into the url "http://www.ismycomputeron.com/" for action "action":

```php
<?php
use Marko\WordPressNonces\WordPressNonce;
use Marko\WordPressNonces\WordPressNonceUrl;

$wp_nonce = new WordPressNonce('action');
$wp_nonce_url = new WordPressNonceUrl($wp_nonce,'http://www.ismycomputeron.com/','nonce_name');
echo $wp_nonce_url->get() // http://www.ismycomputeron.com/?nonce_name=66fb9c05d0
?>
```
#### wp_verify_nonce() implementation
When you receieve the nonce value for action "action" you can verify it like this:

```php
<?php
use Marko\WordPressNonces\WordPressNonce;

$wp_nonce = new WordPressNonce('action'); //66fb9c05d0
$wp_nonce->verify_nonce('66fb9c05d0');
?>
```

## Tests
This package comes with tests for PHPUnit 9.3.

## Support
If you are having general issues with this package, feel free to contact me at marko.ivanovic.dev@gmail.com.

I'd love to hear your thoughts and suggestions. Thanks!