<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Psr7\Request;
use PhALDan\Discourse\Client\RestAsync\HttpAdapterSpy;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

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
        $target = new ApiKeyAuth('username', 'secret-token');
        $request = new Request('GET', 'http://localhost/example');
        $query = '?'.ApiKeyAuth::QUERY_API_USERNAME.'=username&'.ApiKeyAuth::QUERY_API_KEY.'=secret-token';
        $this->assertAuth($target, $request, $query);
    }

    /**
     * @test
     */
    public function successSendWithQueries(): void
    {
        $target = new ApiKeyAuth('username', 'secret-token');
        $request = new Request('GET', 'http://localhost/example?order=date');
        $query = '&'.ApiKeyAuth::QUERY_API_USERNAME.'=username&'.ApiKeyAuth::QUERY_API_KEY.'=secret-token';
        $this->assertAuth($target, $request, $query);
    }

    private function assertAuth(ApiKeyAuth $target, RequestInterface $request, string $expectedQuery)
    {
        $http = new HttpAdapterSpy();
        $target->setHttp($http);
        $this->assertNull($target->send($request)->wait());
        $this->assertSame($request->getUri()->__toString().$expectedQuery, $http->request->getUri()->__toString());
    }
}
