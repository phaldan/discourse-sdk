<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\Rest\BadgeAsync;
use PhALDan\Discourse\Client\Rest\Badges;
use PhALDan\Discourse\Client\Rest\GroupAsync;
use PhALDan\Discourse\Client\Rest\Groups;
use PhALDan\Discourse\Client\Rest\InviteAsync;
use PhALDan\Discourse\Client\Rest\Invites;
use PhALDan\Discourse\Client\Rest\NotificationAsync;
use PhALDan\Discourse\Client\Rest\Notifications;
use PhALDan\Discourse\Client\Rest\UserAsync;
use PhALDan\Discourse\Client\Rest\Users;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestUserAsync
{
    /**
     * @var Http
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
