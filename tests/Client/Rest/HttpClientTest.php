<?php

namespace PhALDan\Discourse\Client\Rest;

use PhALDan\Discourse\Client\HttpMethods;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\HttpClient
 */
class HttpClientTest extends TestCase
{
    /**
     * @test
     */
    public function successGetHttpClient(): void
    {
        $client = new HttpDummy();
        $target = new class($client) extends HttpClient {
            public function getHttpClient(): HttpMethods
            {
                return parent::client();
            }
        };

        $this->assertSame($client, $target->getHttpClient()->client());
    }
}
