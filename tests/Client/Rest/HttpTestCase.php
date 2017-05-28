<?php

namespace PhALDan\Discourse\Client\Rest;

use PhALDan\Discourse\Client\HttpMethods;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @coversNothing
 */
class HttpTestCase extends TestCase
{
    const URL = 'http://localhost';

    /**
     * @var HttpSpy
     */
    protected $http;

    protected function setUp(): void
    {
        parent::setUp();

        $this->http = new HttpSpy();
    }

    protected function assertHttpDelete(string $url, array $json = null): void
    {
        $this->assertHttpBody(HttpMethods::METHOD_DELETE, $url, $json);
    }

    protected function assertHttpGet(string $url): void
    {
        $request = $this->http->request;
        $this->assertSame(HttpMethods::METHOD_GET, $request->getMethod());
        $this->assertSame(self::URL.$url, $request->getUri()->__toString());
    }

    protected function assertHttpPut(string $url, array $json = null): void
    {
        $this->assertHttpBody(HttpMethods::METHOD_PUT, $url, $json);
    }

    protected function assertHttpPost(string $url, array $json = null): void
    {
        $this->assertHttpBody(HttpMethods::METHOD_POST, $url, $json);
    }

    private function assertHttpBody(string $method, string $url, array $json = null): void
    {
        $request = $this->http->request;
        $this->assertSame($method, $request->getMethod());
        $this->assertSame(self::URL.$url, $request->getUri()->__toString());
        $this->assertSame(null === $json ? '' : json_encode($json), $request->getBody()->getContents());
    }
}
