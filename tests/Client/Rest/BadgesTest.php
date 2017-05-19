<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Badges
 */
class BadgesTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Badges($client);
        $this->assertNull($target->list()->wait());
        $this->assertSame(RouteConstants::BADGES_LIST, $client->path);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $client = new HttpPostSpy();
        $target = new Badges($client);
        $this->assertNull($target->create([])->wait());
        $this->assertSame(RouteConstants::BADGES_CREATE, $client->path);
        $this->assertSame([], $client->json);
    }

    /**
     * @test
     */
    public function successDelete(): void
    {
        $client = new class() extends HttpDummy {
            public $path;

            public function delete(string $path): PromiseInterface
            {
                $this->path = $path;

                return parent::delete($path);
            }
        };
        $target = new Badges($client);
        $this->assertNull($target->delete(1337)->wait());
        $this->assertSame(sprintf(RouteConstants::BADGES_DELETE, 1337), $client->path);
    }
}
