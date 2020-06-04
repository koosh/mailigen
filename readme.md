# Wrapper for Mailigen PHP SDK

* Extremely simple wrapper to keep Mailigen SDK code out of your project source.
* Additional bonus: throws MailigenException when there is an error.

## Usage

Instead of ```new \MGAPI( ... )``` call ```new \Mailigen\ApiClient( ... )```

```php
$api = new \Mailigen\ApiClient('your-api-key');
try {
    $api->someMethod($args);
} catch (\Mailigen\MailigenException $e) {
    var_dump($e);
}
```