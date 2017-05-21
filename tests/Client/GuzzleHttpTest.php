<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\GuzzleHttp
 */
class GuzzleHttpTest extends TestCase
{
    /**
     * @var GuzzleHttp
     */
    private $target;

    private $client;

    protected function setUp(): void
    {
        $this->client = new class() extends GuzzleClientDummy {
            /**
             * @var RequestInterface
             */
            public $request;

            public function __construct()
            {
                $this->request = new Request('', '');
            }

            public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
            {
                $this->request = $request;

                return parent::sendAsync($request, $options);
            }
        };
        $this->target = new GuzzleHttp($this->client);
    }

    /**
     * @test
     */
    public function successCreateGuzzleClientIfNotInjected(): void
    {
        $target = new GuzzleHttp();
        $this->assertInstanceOf(Client::class, $target->getClient());
    }

    /**
     * @test
     */
    public function successCreateDeleteRequest(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->delete('/rest.json')->wait());
        $headers = [
          GuzzleHttp::HEADER_ACCEPT => [GuzzleHttp::MIME_TYPE_JSON],
        ];
        $this->assertRequest(Http::METHOD_DELETE, 'domain/rest.json', $headers);
    }

    /**
     * @test
     */
    public function successCreateDeleteRequestWithBody(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->delete('/rest.json', ['json' => 'delete'])->wait());
        $headers = [
          GuzzleHttp::HEADER_ACCEPT => [GuzzleHttp::MIME_TYPE_JSON],
          GuzzleHttp::HEADER_CONTENT_TYPE => [GuzzleHttp::MIME_TYPE_JSON],
        ];
        $this->assertRequest(Http::METHOD_DELETE, 'domain/rest.json', $headers, '{"json":"delete"}');
    }

    /**
     * @test
     */
    public function successCreateGetRequest(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->get('/rest.json')->wait());
        $headers = [
          GuzzleHttp::HEADER_ACCEPT => [GuzzleHttp::MIME_TYPE_JSON],
        ];
        $this->assertRequest(Http::METHOD_GET, 'domain/rest.json', $headers);
    }

    /**
     * @test
     */
    public function successCreateGetRequestWithQueryString(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->get('/rest.json', ['flag' => 'value'])->wait());
        $headers = [
          GuzzleHttp::HEADER_ACCEPT => [GuzzleHttp::MIME_TYPE_JSON],
        ];
        $this->assertRequest(Http::METHOD_GET, 'domain/rest.json?flag=value', $headers);
    }

    /**
     * @test
     */
    public function successCreatePostRequest(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->post('/rest.json', ['json' => 'post'])->wait());
        $headers = [
            GuzzleHttp::HEADER_ACCEPT => [GuzzleHttp::MIME_TYPE_JSON],
            GuzzleHttp::HEADER_CONTENT_TYPE => [GuzzleHttp::MIME_TYPE_JSON],
        ];
        $this->assertRequest(Http::METHOD_POST, 'domain/rest.json', $headers, '{"json":"post"}');
    }

    /**
     * @test
     */
    public function successCreatePutRequest(): void
    {
        $this->target->setInstance('domain');
        $this->assertNull($this->target->put('/rest.json', ['json' => 'put'])->wait());
        $headers = [
          GuzzleHttp::HEADER_ACCEPT => [GuzzleHttp::MIME_TYPE_JSON],
          GuzzleHttp::HEADER_CONTENT_TYPE => [GuzzleHttp::MIME_TYPE_JSON],
        ];
        $this->assertRequest(Http::METHOD_PUT, 'domain/rest.json', $headers, '{"json":"put"}');
    }

    protected function assertRequest(string $method, string $uri, array $headers = [], string $body = '')
    {
        $this->assertSame($method, $this->client->request->getMethod());
        $this->assertSame($uri, $this->client->request->getUri()->__toString());
        $this->assertSame($headers, $this->client->request->getHeaders());
        $this->assertSame($body, $this->client->request->getBody()->__toString());
    }
}
