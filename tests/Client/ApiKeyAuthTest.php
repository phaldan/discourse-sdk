<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Psr7\Request;
use PhALDan\Discourse\Client\Rest\HttpAdapterSpy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\ApiKeyAuth
 */
class ApiKeyAuthTest extends TestCase
{
    /**
     * @test
     */
    public function successSend(): void
    {
        $target = new ApiKeyAuth('secret-token');
        $http = new HttpAdapterSpy();
        $target->setHttp($http);
        $request = new Request('GET', 'http://localhost/example');
        $this->assertNull($target->send($request)->wait());
        $url = 'http://localhost/example?'.ApiKeyAuth::QUERY_API_TOKEN.'=secret-token';
        $this->assertSame($url, $http->request->getUri()->__toString());
    }

    /**
     * @test
     */
    public function successSendWithQueries(): void
    {
        $target = new ApiKeyAuth('secret-token');
        $http = new HttpAdapterSpy();
        $target->setHttp($http);
        $request = new Request('GET', 'http://localhost/example?order=date');
        $this->assertNull($target->send($request)->wait());
        $url = 'http://localhost/example?order=date&'.ApiKeyAuth::QUERY_API_TOKEN.'=secret-token';
        $this->assertSame($url, $http->request->getUri()->__toString());
    }
}
