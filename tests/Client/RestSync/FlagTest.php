<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\FlagAsyncDummy;
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
class FlagAsyncSpy extends FlagAsyncDummy
{
    public $listType;
    public $listParameters;

    public function list(string $type, array $parameters = []): PromiseInterface
    {
        $this->listType = $type;
        $this->listParameters = $parameters;

        return parent::list($type, $parameters);
    }
}
