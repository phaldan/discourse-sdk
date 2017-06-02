<?php

namespace PhALDan\Discourse\Client\RestAsync;

use PhALDan\Discourse\Client\HttpMethods;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\HttpClient
 */
class HttpClientTest extends TestCase
{
    /**
     * @test
     */
    public function successGetHttpClient(): void
    {
        $client = new HttpAdapterDummy();
        $target = new class('http://localhost', $client) extends HttpClient {
            public function getHttpClient(): HttpMethods
            {
                return parent::client();
            }
        };

        $this->assertSame($client, $target->getHttpClient()->client());
    }
}
