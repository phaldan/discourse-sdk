<?php

namespace PhALDan\Discourse;

use PhALDan\Discourse\Client\AuthenticationSpy;
use PhALDan\Discourse\Client\RestAsync\HttpAdapterSpy;
use PhALDan\Discourse\Client\RestAsyncFactoryDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Discourse
 */
class DiscourseTest extends TestCase
{
    /**
     * @test
     */
    public function successRestAsync(): void
    {
        $target = new Discourse();
        $rest = new RestAsyncFactoryDummy();
        $target->setRest($rest);
        $this->assertSame($rest, $target->restAsync('https://localhost'));
    }

    /**
     * @test
     */
    public function successRestAsyncWithAuth(): void
    {
        $auth = new AuthenticationSpy();
        $target = new Discourse();
        $target->restAsync('https://localhost', $auth)->category()->list()->wait();
        $this->assertNotNull($auth->http);
        $this->assertNotNull($auth->request);
    }

    /**
     * @test
     */
    public function successRestAsyncWithHttp(): void
    {
        $http = new HttpAdapterSpy();
        $target = new Discourse();
        $target->restAsync('https://localhost', $http)->category()->list()->wait();
        $this->assertNotNull($http->request);
    }

    /**
     * @test
     */
    public function successRestAsyncWithAuthAndHttp(): void
    {
        $auth = new AuthenticationSpy();
        $http = new HttpAdapterSpy();
        $target = new Discourse();
        $target->restAsync('https://localhost', $auth, $http)->category()->list()->wait();
        $this->assertSame($http, $auth->http);
        $this->assertNotNull($auth->request);
        $this->assertNull($http->request);
    }

    /**
     * @test
     */
    public function successRest(): void
    {
        $target = new Discourse();
        $rest = new RestAsyncFactoryDummy();
        $target->setRest($rest);
        $this->assertNotNull($target->rest('https://localhost'));
    }
}
