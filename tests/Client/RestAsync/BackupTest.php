<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Backup
 */
class BackupTest extends HttpTestCase
{
    /**
     * @var Backup
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Backup(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list()->wait());
        $this->assertHttpGet(RouteConstants::BACKUP_LIST);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [Backup::ATTR_WITH_UPLOADS => true];
        $this->assertNull($this->target->create($attributes)->wait());
        $this->assertHttpPost(RouteConstants::BACKUP_CREATE, $attributes);
    }
}
