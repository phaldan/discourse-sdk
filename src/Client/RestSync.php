<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestSync\Backup;
use PhALDan\Discourse\Client\RestSync\BackupSync;
use PhALDan\Discourse\Client\RestSync\Badge;
use PhALDan\Discourse\Client\RestSync\BadgeSync;
use PhALDan\Discourse\Client\RestSync\Category;
use PhALDan\Discourse\Client\RestSync\CategorySync;
use PhALDan\Discourse\Client\RestSync\Email;
use PhALDan\Discourse\Client\RestSync\EmailSync;
use PhALDan\Discourse\Client\RestSync\Flag;
use PhALDan\Discourse\Client\RestSync\FlagSync;
use PhALDan\Discourse\Client\RestSync\Group;
use PhALDan\Discourse\Client\RestSync\GroupSync;
use PhALDan\Discourse\Client\RestSync\Invite;
use PhALDan\Discourse\Client\RestSync\InviteSync;
use PhALDan\Discourse\Client\RestSync\Notification;
use PhALDan\Discourse\Client\RestSync\NotificationSync;
use PhALDan\Discourse\Client\RestSync\Plugin;
use PhALDan\Discourse\Client\RestSync\PluginSync;
use PhALDan\Discourse\Client\RestSync\Post;
use PhALDan\Discourse\Client\RestSync\PostSync;
use PhALDan\Discourse\Client\RestSync\PrivateMessage;
use PhALDan\Discourse\Client\RestSync\PrivateMessageSync;
use PhALDan\Discourse\Client\RestSync\SiteSetting;
use PhALDan\Discourse\Client\RestSync\SiteSettingSync;
use PhALDan\Discourse\Client\RestSync\Tag;
use PhALDan\Discourse\Client\RestSync\TagGroup;
use PhALDan\Discourse\Client\RestSync\TagGroupSync;
use PhALDan\Discourse\Client\RestSync\TagSync;
use PhALDan\Discourse\Client\RestSync\Topic;
use PhALDan\Discourse\Client\RestSync\TopicSync;
use PhALDan\Discourse\Client\RestSync\User;
use PhALDan\Discourse\Client\RestSync\UserSync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class RestSync implements RestSyncFactory
{
    use RestSyncAdmin;
    use RestSyncPost;
    use RestSyncUser;

    /**
     * @var RestAsyncFactory
     */
    private $client;

    public function __construct(RestAsyncFactory $client)
    {
        $this->client = $client;
    }

    public function category(): CategorySync
    {
        return new Category($this->client->category());
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestSyncAdmin
{
    /**
     * @var RestAsyncFactory
     */
    private $client;

    public function backup(): BackupSync
    {
        return new Backup($this->client->backup());
    }

    public function email(): EmailSync
    {
        return new Email($this->client->email());
    }

    public function plugin(): PluginSync
    {
        return new Plugin($this->client->plugin());
    }

    public function siteSetting(): SiteSettingSync
    {
        return new SiteSetting($this->client->siteSetting());
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestSyncPost
{
    /**
     * @var RestAsyncFactory
     */
    private $client;

    public function flag(): FlagSync
    {
        return new Flag($this->client->flag());
    }

    public function post(): PostSync
    {
        return new Post($this->client->post());
    }

    public function privateMessage(): PrivateMessageSync
    {
        return new PrivateMessage($this->client->privateMessage());
    }

    public function tag(): TagSync
    {
        return new Tag($this->client->tag());
    }

    public function tagGroup(): TagGroupSync
    {
        return new TagGroup($this->client->tagGroup());
    }

    public function topic(): TopicSync
    {
        return new Topic($this->client->topic());
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestSyncUser
{
    /**
     * @var RestAsyncFactory
     */
    private $client;

    public function badge(): BadgeSync
    {
        return new Badge($this->client->badge());
    }

    public function group(): GroupSync
    {
        return new Group($this->client->group());
    }

    public function invite(): InviteSync
    {
        return new Invite($this->client->invite());
    }

    public function notification(): NotificationSync
    {
        return new Notification($this->client->notification());
    }

    public function user(): UserSync
    {
        return new User($this->client->user());
    }
}
