<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\BackupAsyncDummy;
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
class BackupAsyncSpy extends BackupAsyncDummy
{
    public $listCalled;
    public $createOptions;

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return parent::list();
    }

    public function create(array $options): PromiseInterface
    {
        $this->createOptions = $options;

        return parent::create($options);
    }
}
