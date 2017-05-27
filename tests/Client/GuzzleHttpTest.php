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
    public function successSend(): void
    {
        $client = new class() extends GuzzleClientDummy {
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
        $target = new GuzzleHttp($client);
        $request = new RequestDummy();
        $this->assertNull($target->send($request)->wait());
        $this->assertSame($request, $client->request);
    }
}
