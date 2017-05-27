<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\Rest\HttpSpy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\HttpMethods
 */
class HttpMethodsTest extends TestCase
{
    /**
     * @var HttpMethods
     */
    private $target;

    /**
     * @var HttpSpy
     */
    private $http;

    protected function setUp()
    {
        $this->http = new HttpSpy();
        $this->target = new HttpMethods($this->http);
    }

    /**
     * @test
     */
    public function successClient(): void
    {
        $this->assertSame($this->http, $this->target->client());
    }

    /**
     * @test
     */
    public function successCreateDeleteRequest(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->delete('/rest.json')->wait());
        $headers = [
          HttpMethods::HEADER_ACCEPT => [HttpMethods::MIME_TYPE_JSON],
        ];
        $this->assertRequest(HttpMethods::METHOD_DELETE, 'domain/rest.json', $headers);
    }

    /**
     * @test
     */
    public function successCreateDeleteRequestWithBody(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->delete('/rest.json', ['json' => 'delete'])->wait());
        $headers = [
          HttpMethods::HEADER_ACCEPT => [HttpMethods::MIME_TYPE_JSON],
          HttpMethods::HEADER_CONTENT_TYPE => [HttpMethods::MIME_TYPE_JSON],
        ];
        $this->assertRequest(HttpMethods::METHOD_DELETE, 'domain/rest.json', $headers, '{"json":"delete"}');
    }

    /**
     * @test
     */
    public function successCreateGetRequest(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->get('/rest.json')->wait());
        $headers = [
          HttpMethods::HEADER_ACCEPT => [HttpMethods::MIME_TYPE_JSON],
        ];
        $this->assertRequest(HttpMethods::METHOD_GET, 'domain/rest.json', $headers);
    }

    /**
     * @test
     */
    public function successCreateGetRequestWithQueryString(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->get('/rest.json', ['flag' => 'value'])->wait());
        $headers = [
          HttpMethods::HEADER_ACCEPT => [HttpMethods::MIME_TYPE_JSON],
        ];
        $this->assertRequest(HttpMethods::METHOD_GET, 'domain/rest.json?flag=value', $headers);
    }

    /**
     * @test
     */
    public function successCreatePostRequest(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->post('/rest.json', ['json' => 'post'])->wait());
        $headers = [
          HttpMethods::HEADER_ACCEPT => [HttpMethods::MIME_TYPE_JSON],
          HttpMethods::HEADER_CONTENT_TYPE => [HttpMethods::MIME_TYPE_JSON],
        ];
        $this->assertRequest(HttpMethods::METHOD_POST, 'domain/rest.json', $headers, '{"json":"post"}');
    }

    /**
     * @test
     */
    public function successCreatePutRequest(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->put('/rest.json', ['json' => 'put'])->wait());
        $headers = [
          HttpMethods::HEADER_ACCEPT => [HttpMethods::MIME_TYPE_JSON],
          HttpMethods::HEADER_CONTENT_TYPE => [HttpMethods::MIME_TYPE_JSON],
        ];
        $this->assertRequest(HttpMethods::METHOD_PUT, 'domain/rest.json', $headers, '{"json":"put"}');
    }

    protected function assertRequest(string $method, string $uri, array $headers = [], string $body = '')
    {
        $this->assertSame($method, $this->http->request->getMethod());
        $this->assertSame($uri, $this->http->request->getUri()->__toString());
        $this->assertSame($headers, $this->http->request->getHeaders());
        $this->assertSame($body, $this->http->request->getBody()->__toString());
    }
}
