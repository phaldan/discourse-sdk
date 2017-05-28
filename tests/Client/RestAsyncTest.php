<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\Rest\HttpDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync
 * @covers \PhALDan\Discourse\Client\RestAdminAsync
 * @covers \PhALDan\Discourse\Client\RestPostAsync
 * @covers \PhALDan\Discourse\Client\RestUserAsync
 */
class RestAsyncTest extends TestCase
{
    /**
     * @test
     */
    public function success(): void
    {
        $target = new RestAsync('http://localhost', new HttpDummy());
        $this->assertNotNull($target->backup());
        $this->assertNotNull($target->badge());
        $this->assertNotNull($target->category());
        $this->assertNotNull($target->email());
        $this->assertNotNull($target->flag());
        $this->assertNotNull($target->group());
        $this->assertNotNull($target->invite());
        $this->assertNotNull($target->notification());
        $this->assertNotNull($target->plugin());
        $this->assertNotNull($target->post());
        $this->assertNotNull($target->privateMessage());
        $this->assertNotNull($target->siteSetting());
        $this->assertNotNull($target->tag());
        $this->assertNotNull($target->tagGroup());
        $this->assertNotNull($target->topic());
        $this->assertNotNull($target->user());
    }
}
