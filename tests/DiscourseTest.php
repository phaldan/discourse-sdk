<?php

namespace PhALDan\Discourse;

use PhALDan\Discourse\Client\AuthenticationSpy;
use PhALDan\Discourse\Client\Rest\Categories;
use PhALDan\Discourse\Client\Rest\CategoryAsync;
use PhALDan\Discourse\Client\Rest\HttpDummy;
use PhALDan\Discourse\Client\Rest\HttpSpy;
use PhALDan\Discourse\Client\RestAdminAsync;
use PhALDan\Discourse\Client\RestAsyncFactory;
use PhALDan\Discourse\Client\RestPostAsync;
use PhALDan\Discourse\Client\RestUserAsync;
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
    public function successRest(): void
    {
        $rest = new class() implements RestAsyncFactory {
            /**
             * @var string
             */
            private $url = '';

            /**
             * @var HttpDummy
             */
            private $http;

            use RestAdminAsync;
            use RestPostAsync;
            use RestUserAsync;

            public function __construct()
            {
                $this->http = new HttpDummy();
            }

            public function category(): CategoryAsync
            {
                return new Categories($this->url, $this->http);
            }
        };
        $target = new Discourse();
        $target->setRest($rest);
        $this->assertSame($rest, $target->rest('https://localhost'));
    }

    /**
     * @test
     */
    public function successRestWithAuth(): void
    {
        $auth = new AuthenticationSpy();
        $target = new Discourse();
        $target->rest('https://localhost', $auth)->category()->list()->wait();
        $this->assertNotNull($auth->http);
        $this->assertNotNull($auth->request);
    }

    /**
     * @test
     */
    public function successRestWithHttp(): void
    {
        $http = new HttpSpy();
        $target = new Discourse();
        $target->rest('https://localhost', $http)->category()->list()->wait();
        $this->assertNotNull($http->request);
    }

    /**
     * @test
     */
    public function successRestWithAuthAndHttp(): void
    {
        $auth = new AuthenticationSpy();
        $http = new HttpSpy();
        $target = new Discourse();
        $target->rest('https://localhost', $auth, $http)->category()->list()->wait();
        $this->assertSame($http, $auth->http);
        $this->assertNotNull($auth->request);
        $this->assertNull($http->request);
    }
}
