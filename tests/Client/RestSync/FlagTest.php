<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\FlagAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Flag
 */
class FlagTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new FlagAsyncSpy();
        $target = new Flag($client);

        $parameters = [FlagAsyncSpy::OPTION_OFFSET => 42];
        $this->assertNotNull($target->list(FlagAsyncSpy::TYPE_ACTIVE, $parameters));
        $this->assertSame(FlagAsyncSpy::TYPE_ACTIVE, $client->listType);
        $this->assertSame($parameters, $client->listParameters);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class FlagAsyncSpy implements FlagAsync
{
    public $listType;
    public $listParameters;

    public function list(string $type, array $parameters = []): PromiseInterface
    {
        $this->listType = $type;
        $this->listParameters = $parameters;
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
