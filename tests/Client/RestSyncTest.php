<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\BackupAsync;
use PhALDan\Discourse\Client\RestAsync\BadgeAsync;
use PhALDan\Discourse\Client\RestAsync\CategoryAsync;
use PhALDan\Discourse\Client\RestAsync\EmailAsync;
use PhALDan\Discourse\Client\RestAsync\FlagAsync;
use PhALDan\Discourse\Client\RestAsync\GroupAsync;
use PhALDan\Discourse\Client\RestAsync\InviteAsync;
use PhALDan\Discourse\Client\RestAsync\NotificationAsync;
use PhALDan\Discourse\Client\RestAsync\PluginAsync;
use PhALDan\Discourse\Client\RestAsync\PostAsync;
use PhALDan\Discourse\Client\RestAsync\PrivateMessageAsync;
use PhALDan\Discourse\Client\RestAsync\SiteSettingAsync;
use PhALDan\Discourse\Client\RestAsync\TagAsync;
use PhALDan\Discourse\Client\RestAsync\TagGroupAsync;
use PhALDan\Discourse\Client\RestAsync\TopicAsync;
use PhALDan\Discourse\Client\RestAsync\UserAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync
 * @covers \PhALDan\Discourse\Client\RestSyncAdmin
 * @covers \PhALDan\Discourse\Client\RestSyncPost
 * @covers \PhALDan\Discourse\Client\RestSyncUser
 */
class RestSyncTest extends TestCase
{
    /**
     * @var RestSync
     */
    private $target;

    /**
     * @var RestAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new RestAsyncSpy();
        $this->target = new RestSync($this->client);
    }

    /**
     * @test
     */
    public function successBackup(): void
    {
        $this->assertNotNull($this->target->backup());
        $this->assertTrue($this->client->backupCalled);
    }

    /**
     * @test
     */
    public function successBadge(): void
    {
        $this->assertNotNull($this->target->badge());
        $this->assertTrue($this->client->badgeCalled);
    }

    /**
     * @test
     */
    public function successCategory(): void
    {
        $this->assertNotNull($this->target->category());
        $this->assertTrue($this->client->categoryCalled);
    }

    /**
     * @test
     */
    public function successEmail(): void
    {
        $this->assertNotNull($this->target->email());
        $this->assertTrue($this->client->emailCalled);
    }

    /**
     * @test
     */
    public function successFlag(): void
    {
        $this->assertNotNull($this->target->flag());
        $this->assertTrue($this->client->flagCalled);
    }

    /**
     * @test
     */
    public function successGroup(): void
    {
        $this->assertNotNull($this->target->group());
        $this->assertTrue($this->client->groupCalled);
    }

    /**
     * @test
     */
    public function successInvite(): void
    {
        $this->assertNotNull($this->target->invite());
        $this->assertTrue($this->client->inviteCalled);
    }

    /**
     * @test
     */
    public function successNotification(): void
    {
        $this->assertNotNull($this->target->notification());
        $this->assertTrue($this->client->notificationCalled);
    }

    /**
     * @test
     */
    public function successPlugin(): void
    {
        $this->assertNotNull($this->target->plugin());
        $this->assertTrue($this->client->pluginCalled);
    }

    /**
     * @test
     */
    public function successPost(): void
    {
        $this->assertNotNull($this->target->post());
        $this->assertTrue($this->client->postCalled);
    }

    /**
     * @test
     */
    public function successPrivateMessage(): void
    {
        $this->assertNotNull($this->target->privateMessage());
        $this->assertTrue($this->client->privateMessageCalled);
    }

    /**
     * @test
     */
    public function successSiteSetting(): void
    {
        $this->assertNotNull($this->target->siteSetting());
        $this->assertTrue($this->client->siteSettingCalled);
    }

    /**
     * @test
     */
    public function successTag(): void
    {
        $this->assertNotNull($this->target->tag());
        $this->assertTrue($this->client->tagCalled);
    }

    /**
     * @test
     */
    public function successTagGroup(): void
    {
        $this->assertNotNull($this->target->tagGroup());
        $this->assertTrue($this->client->tagGroupCalled);
    }

    /**
     * @test
     */
    public function successTopic(): void
    {
        $this->assertNotNull($this->target->topic());
        $this->assertTrue($this->client->topicCalled);
    }

    /**
     * @test
     */
    public function successUser(): void
    {
        $this->assertNotNull($this->target->user());
        $this->assertTrue($this->client->userCalled);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class RestAsyncSpy extends RestAsyncFactoryDummy
{
    public $backupCalled;
    public $badgeCalled;
    public $categoryCalled;
    public $emailCalled;
    public $flagCalled;
    public $groupCalled;
    public $inviteCalled;
    public $notificationCalled;
    public $pluginCalled;
    public $postCalled;
    public $privateMessageCalled;
    public $siteSettingCalled;
    public $tagCalled;
    public $tagGroupCalled;
    public $topicCalled;
    public $userCalled;

    public function backup(): BackupAsync
    {
        $this->backupCalled = true;

        return parent::backup();
    }

    public function badge(): BadgeAsync
    {
        $this->badgeCalled = true;

        return parent::badge();
    }

    public function category(): CategoryAsync
    {
        $this->categoryCalled = true;

        return parent::category();
    }

    public function email(): EmailAsync
    {
        $this->emailCalled = true;

        return parent::email();
    }

    public function flag(): FlagAsync
    {
        $this->flagCalled = true;

        return parent::flag();
    }

    public function group(): GroupAsync
    {
        $this->groupCalled = true;

        return parent::group();
    }

    public function invite(): InviteAsync
    {
        $this->inviteCalled = true;

        return parent::invite();
    }

    public function notification(): NotificationAsync
    {
        $this->notificationCalled = true;

        return parent::notification();
    }

    public function plugin(): PluginAsync
    {
        $this->pluginCalled = true;

        return parent::plugin();
    }

    public function post(): PostAsync
    {
        $this->postCalled = true;

        return parent::post();
    }

    public function privateMessage(): PrivateMessageAsync
    {
        $this->privateMessageCalled = true;

        return parent::privateMessage();
    }

    public function siteSetting(): SiteSettingAsync
    {
        $this->siteSettingCalled = true;

        return parent::siteSetting();
    }

    public function tag(): TagAsync
    {
        $this->tagCalled = true;

        return parent::tag();
    }

    public function tagGroup(): TagGroupAsync
    {
        $this->tagGroupCalled = true;

        return parent::tagGroup();
    }

    public function topic(): TopicAsync
    {
        $this->topicCalled = true;

        return parent::topic();
    }

    public function user(): UserAsync
    {
        $this->userCalled = true;

        return parent::user();
    }
}
