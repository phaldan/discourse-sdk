<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\BackupAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Backup
 */
class BackupTest extends TestCase
{
    /**
     * @var Backup
     */
    private $target;

    /**
     * @var BackupAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new BackupAsyncSpy();
        $this->target = new Backup($this->client);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNotNull($this->target->list());
        $this->assertTrue($this->client->listCalled);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $parameters = [BackupAsyncSpy::ATTR_WITH_UPLOADS => 'upload'];
        $this->assertNotNull($this->target->create($parameters));
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class BackupAsyncSpy implements BackupAsync
{
    public $listCalled;
    public $createOptions;

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return $this->createPromise();
    }

    public function create(array $options): PromiseInterface
    {
        $this->createOptions = $options;

        return $this->createPromise();
    }

    private function createPromise()
    {
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
