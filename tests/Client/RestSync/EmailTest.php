<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\EmailAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Email
 */
class EmailTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new EmailAsyncSpy();
        $target = new Email($client);
        $parameters = [EmailAsync::OPTION_OFFSET => 42];
        $this->assertNotNull($target->list(EmailAsyncSpy::ACTION_BOUNCED, $parameters));
        $this->assertSame(EmailAsync::ACTION_BOUNCED, $client->listAction);
        $this->assertSame($parameters, $client->listParameters);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class EmailAsyncSpy implements EmailAsync
{
    public $listAction;
    public $listParameters;

    public function list(string $action, array $parameters = []): PromiseInterface
    {
        $this->listAction = $action;
        $this->listParameters = $parameters;
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
