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
        $this->assertNull($target->list(Emails::ACTION_SENT, [Emails::OPTION_OFFSET => 1337])->wait());
        $url = sprintf(RouteConstants::EMAILS_LIST, Emails::ACTION_SENT).'?'.Emails::OPTION_OFFSET.'=1337';
        $this->assertSame($url, $client->path);
    }
}
