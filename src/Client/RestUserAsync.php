<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\Badge;
use PhALDan\Discourse\Client\RestAsync\BadgeAsync;
use PhALDan\Discourse\Client\RestAsync\Group;
use PhALDan\Discourse\Client\RestAsync\GroupAsync;
use PhALDan\Discourse\Client\RestAsync\Invite;
use PhALDan\Discourse\Client\RestAsync\InviteAsync;
use PhALDan\Discourse\Client\RestAsync\Notification;
use PhALDan\Discourse\Client\RestAsync\NotificationAsync;
use PhALDan\Discourse\Client\RestAsync\User;
use PhALDan\Discourse\Client\RestAsync\UserAsync;

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
