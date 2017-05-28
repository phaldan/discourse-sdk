<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\Rest\BackupAsync;
use PhALDan\Discourse\Client\Rest\BadgeAsync;
use PhALDan\Discourse\Client\Rest\CategoryAsync;
use PhALDan\Discourse\Client\Rest\EmailAsync;
use PhALDan\Discourse\Client\Rest\FlagAsync;
use PhALDan\Discourse\Client\Rest\GroupAsync;
use PhALDan\Discourse\Client\Rest\InviteAsync;
use PhALDan\Discourse\Client\Rest\NotificationAsync;
use PhALDan\Discourse\Client\Rest\PluginAsync;
use PhALDan\Discourse\Client\Rest\PostAsync;
use PhALDan\Discourse\Client\Rest\PrivateMessageAsync;
use PhALDan\Discourse\Client\Rest\SiteSettingAsync;
use PhALDan\Discourse\Client\Rest\TagAsync;
use PhALDan\Discourse\Client\Rest\TagGroupAsync;
use PhALDan\Discourse\Client\Rest\TopicAsync;
use PhALDan\Discourse\Client\Rest\UserAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface RestAsyncFactory
{
    /**
     * Access REST API endpoints for backups.
     *
     * @return BackupAsync
     */
    public function backup(): BackupAsync;

    /**
     * Access REST API endpoints for emails.
     *
     * @return EmailAsync
     */
    public function email(): EmailAsync;

    /**
     * Access REST API endpoints for plugins.
     *
     * @return PluginAsync
     */
    public function plugin(): PluginAsync;

    /**
     * Access REST API endpoints for site settings.
     *
     * @return SiteSettingAsync
     */
    public function siteSetting(): SiteSettingAsync;

    /**
     * Access REST API endpoints for categories.
     *
     * @return CategoryAsync
     */
    public function category(): CategoryAsync;

    /**
     * Access REST API endpoints for flags.
     *
     * @return FlagAsync
     */
    public function flag(): FlagAsync;

    /**
     * Access REST API endpoints for categories.
     *
     * @return PostAsync
     */
    public function post(): PostAsync;

    /**
     * Access REST API endpoints for categories.
     *
     * @return PrivateMessageAsync
     */
    public function privateMessage(): PrivateMessageAsync;

    /**
     * Access REST API endpoints for tags.
     *
     * @return TagAsync
     */
    public function tag(): TagAsync;

    /**
     * Access REST API endpoints for tag groups.
     *
     * @return TagGroupAsync
     */
    public function tagGroup(): TagGroupAsync;

    /**
     * Access REST API endpoints for topics.
     *
     * @return TopicAsync
     */
    public function topic(): TopicAsync;

    /**
     * Access REST API endpoints for badges.
     *
     * @return BadgeAsync
     */
    public function badge(): BadgeAsync;

    /**
     * Access REST API endpoints for groups.
     *
     * @return GroupAsync
     */
    public function group(): GroupAsync;

    /**
     * Access REST API endpoints for invites.
     *
     * @return InviteAsync
     */
    public function invite(): InviteAsync;

    /**
     * Access REST API endpoints for notifications.
     *
     * @return NotificationAsync
     */
    public function notification(): NotificationAsync;

    /**
     * Access REST API endpoints for users.
     *
     * @return UserAsync
     */
    public function user(): UserAsync;
}
