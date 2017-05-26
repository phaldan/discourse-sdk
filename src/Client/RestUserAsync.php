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
     * Access REST API endpoints for badges.
     *
     * @return BadgeAsync
     */
    public function badge(): BadgeAsync
    {
        return new Badges($this->http);
    }

    /**
     * Access REST API endpoints for groups.
     *
     * @return GroupAsync
     */
    public function group(): GroupAsync
    {
        return new Groups($this->http);
    }

    /**
     * Access REST API endpoints for invites.
     *
     * @return InviteAsync
     */
    public function invite(): InviteAsync
    {
        return new Invites($this->http);
    }

    /**
     * Access REST API endpoints for notifications.
     *
     * @return NotificationAsync
     */
    public function notification(): NotificationAsync
    {
        return new Notifications($this->http);
    }

    /**
     * Access REST API endpoints for users.
     *
     * @return UserAsync
     */
    public function user(): UserAsync
    {
        return new Users($this->http);
    }
}
