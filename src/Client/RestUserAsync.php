<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\BadgeAsync;
use PhALDan\Discourse\Client\RestAsync\Badges;
use PhALDan\Discourse\Client\RestAsync\GroupAsync;
use PhALDan\Discourse\Client\RestAsync\Groups;
use PhALDan\Discourse\Client\RestAsync\InviteAsync;
use PhALDan\Discourse\Client\RestAsync\Invites;
use PhALDan\Discourse\Client\RestAsync\NotificationAsync;
use PhALDan\Discourse\Client\RestAsync\Notifications;
use PhALDan\Discourse\Client\RestAsync\UserAsync;
use PhALDan\Discourse\Client\RestAsync\Users;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestUserAsync
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
        return new Badges($this->url, $this->http);
    }

    public function group(): GroupAsync
    {
        return new Groups($this->url, $this->http);
    }

    public function invite(): InviteAsync
    {
        return new Invites($this->url, $this->http);
    }

    public function notification(): NotificationAsync
    {
        return new Notifications($this->url, $this->http);
    }

    public function user(): UserAsync
    {
        return new Users($this->url, $this->http);
    }
}
