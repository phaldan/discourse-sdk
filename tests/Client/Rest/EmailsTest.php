<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Emails
 */
class EmailsTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Emails($client);
        $this->assertNull($target->list(Emails::ACTION_SENT)->wait());
        $this->assertSame(sprintf(RouteConstants::EMAILS_LIST, Emails::ACTION_SENT), $client->path);
    }

    /**
     * @test
     */
    public function successListWithOffset(): void
    {
        $client = new HttpGetSpy();
        $target = new Emails($client);
        $parameters = [Emails::OPTION_OFFSET => 1337];
        $this->assertNull($target->list(Emails::ACTION_SENT, $parameters)->wait());
        $this->assertSame(sprintf(RouteConstants::EMAILS_LIST, Emails::ACTION_SENT), $client->path);
        $this->assertSame($parameters, $client->parameters);
    }
}
