<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\Backup;
use PhALDan\Discourse\Client\RestAsync\BackupAsync;
use PhALDan\Discourse\Client\RestAsync\Badge;
use PhALDan\Discourse\Client\RestAsync\BadgeAsync;
use PhALDan\Discourse\Client\RestAsync\Category;
use PhALDan\Discourse\Client\RestAsync\CategoryAsync;
use PhALDan\Discourse\Client\RestAsync\Email;
use PhALDan\Discourse\Client\RestAsync\EmailAsync;
use PhALDan\Discourse\Client\RestAsync\Flag;
use PhALDan\Discourse\Client\RestAsync\FlagAsync;
use PhALDan\Discourse\Client\RestAsync\Group;
use PhALDan\Discourse\Client\RestAsync\GroupAsync;
use PhALDan\Discourse\Client\RestAsync\Invite;
use PhALDan\Discourse\Client\RestAsync\InviteAsync;
use PhALDan\Discourse\Client\RestAsync\Notification;
use PhALDan\Discourse\Client\RestAsync\NotificationAsync;
use PhALDan\Discourse\Client\RestAsync\Plugin;
use PhALDan\Discourse\Client\RestAsync\PluginAsync;
use PhALDan\Discourse\Client\RestAsync\Post;
use PhALDan\Discourse\Client\RestAsync\PostAsync;
use PhALDan\Discourse\Client\RestAsync\PrivateMessage;
use PhALDan\Discourse\Client\RestAsync\PrivateMessageAsync;
use PhALDan\Discourse\Client\RestAsync\SiteSetting;
use PhALDan\Discourse\Client\RestAsync\SiteSettingAsync;
use PhALDan\Discourse\Client\RestAsync\Tag;
use PhALDan\Discourse\Client\RestAsync\TagAsync;
use PhALDan\Discourse\Client\RestAsync\TagGroup;
use PhALDan\Discourse\Client\RestAsync\TagGroupAsync;
use PhALDan\Discourse\Client\RestAsync\Topic;
use PhALDan\Discourse\Client\RestAsync\TopicAsync;
use PhALDan\Discourse\Client\RestAsync\User;
use PhALDan\Discourse\Client\RestAsync\UserAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class RestAsync implements RestAsyncFactory
{
    use RestAsyncAdmin;
    use RestAsyncPost;
    use RestAsyncUser;

    /**
     * @var HttpAdapter
     */
    private $http;

    /**
     * @var string
     */
    private $url;

    /**
     * RestAsync constructor.
     *
     * @param string      $url
     * @param HttpAdapter $http
     */
    public function __construct(string $url, HttpAdapter $http)
    {
        $this->url = $url;
        $this->http = $http;
    }

    public function category(): CategoryAsync
    {
        return new Category($this->url, $this->http);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestAsyncUser
{
    /**
     * @var HttpAdapter
     */
    private $http;

    /**
     * @var string
     */
    private $url;

    public function badge(): BadgeAsync
    {
        return new Badge($this->url, $this->http);
    }

    public function group(): GroupAsync
    {
        return new Group($this->url, $this->http);
    }

    public function invite(): InviteAsync
    {
        return new Invite($this->url, $this->http);
    }

    public function notification(): NotificationAsync
    {
        return new Notification($this->url, $this->http);
    }

    public function user(): UserAsync
    {
        return new User($this->url, $this->http);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestAsyncAdmin
{
    /**
     * @var HttpAdapter
     */
    private $http;

    /**
     * @var string
     */
    private $url;

    public function backup(): BackupAsync
    {
        return new Backup($this->url, $this->http);
    }

    public function email(): EmailAsync
    {
        return new Email($this->url, $this->http);
    }

    public function plugin(): PluginAsync
    {
        return new Plugin($this->url, $this->http);
    }

    public function siteSetting(): SiteSettingAsync
    {
        return new SiteSetting($this->url, $this->http);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestAsyncPost
{
    /**
     * @var HttpAdapter
     */
    private $http;

    /**
     * @var string
     */
    private $url;

    public function flag(): FlagAsync
    {
        return new Flag($this->url, $this->http);
    }

    public function post(): PostAsync
    {
        return new Post($this->url, $this->http);
    }

    public function privateMessage(): PrivateMessageAsync
    {
        return new PrivateMessage($this->url, $this->http);
    }

    public function tag(): TagAsync
    {
        return new Tag($this->url, $this->http);
    }

    public function tagGroup(): TagGroupAsync
    {
        return new TagGroup($this->url, $this->http);
    }

    public function topic(): TopicAsync
    {
        return new Topic($this->url, $this->http);
    }
}
