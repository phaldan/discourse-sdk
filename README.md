# Discourse SDK

[Discourse](https://www.discourse.org/) is the 100% open source discussion platform built for the next decade of the Internet. Use it as a mailing list, discussion forum, long-form chat room, and more!

This SDK provides a synchronous and asynchronous REST client.

## REST client

REST client is a simple endpoint abstraction of the Discourse's REST API ([official documentation](http://docs.discourse.org/)).

### Usage

#### Get categories (anonymously)

Request categories without authentication. Use Promise callback to process request response.

**Synchronous version**

```php
$discourse = new \PhALDan\Discourse\Discourse();
$rest = $discourse->rest('https://meta.discourse.org');
$response = $rest->category()->list();
$categories = json_decode($response->getBody()->getContents());
foreach ($categories->category_list->categories as $category) {
    print $category->name.PHP_EOL;
}
```

**Asynchronous version**

```php
$discourse = new \PhALDan\Discourse\Discourse();
$rest = $discourse->restAsync('https://meta.discourse.org');
$rest->category()->list()->then(function(\Psr\Http\Message\ResponseInterface $response) {
    $categories = json_decode($response->getBody()->getContents());
    foreach ($categories->category_list->categories as $category) {
        print $category->name.PHP_EOL;
    }
}, function(\Exception $e) {
    print get_class($e).PHP_EOL;
    print $e->getMessage().PHP_EOL;
})->wait();
```

**Result**

```
bug
ux
hosting
support
uncategorized
blog
marketplace
plugin
dev
howto
feature
releases
installation
praise
```

#### API-Token

Request categories with invalid credentials.

**Synchronous version**

```php
try {
    $discourse = new \PhALDan\Discourse\Discourse();
    $auth = new \PhALDan\Discourse\Client\ApiKeyAuth('phaldan', 'uy284kxc8ou6c38u6...');
    $rest = $discourse->rest('https://meta.discourse.org', $auth);
    $rest->category()->list();
} catch (\Exception $e) {
    print get_class($e).PHP_EOL;
    print $e->getCode().PHP_EOL;
    print $e->getMessage().PHP_EOL;
}
```

**Asynchronous version**

```php
try {
    $discourse = new \PhALDan\Discourse\Discourse();
    $auth = new \PhALDan\Discourse\Client\ApiKeyAuth('phaldan', 'uy284kxc8ou6c38u6...');
    $rest = $discourse->restAsync('https://meta.discourse.org', $auth);
    $rest->category()->list()->wait();
} catch (\Exception $e) {
    print get_class($e).PHP_EOL;
    print $e->getCode().PHP_EOL;
    print $e->getMessage().PHP_EOL;
}
```

**Result**

```
/*
 GuzzleHttp\Exception\ClientException
 403
 Client error: `GET https://meta.discourse.org/categories.json?api_username=username&api_key=key` resulted in a `403 Forbidden` response:
 {"errors":["You are not permitted to view the requested resource."],"error_type":"invalid_access"}
 */
```
