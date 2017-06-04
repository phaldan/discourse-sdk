<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\PluginAsyncDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Plugin
 */
class PluginTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new PluginAsyncSpy();
        $target = new Plugin($client);
        $this->assertNotNull($target->list());
        $this->assertTrue($client->listCalled);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PluginAsyncSpy extends PluginAsyncDummy
{
    public $listCalled;

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return parent::list();
    }
}
