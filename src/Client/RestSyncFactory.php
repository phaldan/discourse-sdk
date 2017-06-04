<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestSync\BackupSync;
use PhALDan\Discourse\Client\RestSync\BadgeSync;
use PhALDan\Discourse\Client\RestSync\CategorySync;
use PhALDan\Discourse\Client\RestSync\EmailSync;
use PhALDan\Discourse\Client\RestSync\FlagSync;
use PhALDan\Discourse\Client\RestSync\GroupSync;
use PhALDan\Discourse\Client\RestSync\InviteSync;
use PhALDan\Discourse\Client\RestSync\NotificationSync;
use PhALDan\Discourse\Client\RestSync\PluginSync;
use PhALDan\Discourse\Client\RestSync\PostSync;
use PhALDan\Discourse\Client\RestSync\PrivateMessageSync;
use PhALDan\Discourse\Client\RestSync\SiteSettingSync;
use PhALDan\Discourse\Client\RestSync\TagGroupSync;
use PhALDan\Discourse\Client\RestSync\TagSync;
use PhALDan\Discourse\Client\RestSync\TopicSync;
use PhALDan\Discourse\Client\RestSync\UserSync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface RestSyncFactory
{
    /**
     * Access REST API endpoints for backups.
     *
     * @return BackupSync
     */
    public function backup(): BackupSync;

    /**
     * Access REST API endpoints for badges.
     *
     * @return BadgeSync
     */
    public function badge(): BadgeSync;

    /**
     * Access REST API endpoints for categories.
     *
     * @return CategorySync
     */
    public function category(): CategorySync;

    /**
     * Access REST API endpoints for emails.
     *
     * @return EmailSync
     */
    public function email(): EmailSync;

    /**
     * Access REST API endpoints for flags.
     *
     * @return FlagSync
     */
    public function flag(): FlagSync;

    /**
     * Access REST API endpoints for groups.
     *
     * @return GroupSync
     */
    public function group(): GroupSync;

    /**
     * Access REST API endpoints for invites.
     *
     * @return InviteSync
     */
    public function invite(): InviteSync;

    /**
     * Access REST API endpoints for notifications.
     *
     * @return NotificationSync
     */
    public function notification(): NotificationSync;

    /**
     * Access REST API endpoints for plugins.
     *
     * @return PluginSync
     */
    public function plugin(): PluginSync;

    /**
     * Access REST API endpoints for categories.
     *
     * @return PostSync
     */
    public function post(): PostSync;

    /**
     * Access REST API endpoints for categories.
     *
     * @return PrivateMessageSync
     */
    public function privateMessage(): PrivateMessageSync;

    /**
     * Access REST API endpoints for site settings.
     *
     * @return SiteSettingSync
     */
    public function siteSetting(): SiteSettingSync;

    /**
     * Access REST API endpoints for tags.
     *
     * @return TagSync
     */
    public function tag(): TagSync;

    /**
     * Access REST API endpoints for tag groups.
     *
     * @return TagGroupSync
     */
    public function tagGroup(): TagGroupSync;

    /**
     * Access REST API endpoints for topics.
     *
     * @return TopicSync
     */
    public function topic(): TopicSync;

    /**
     * Access REST API endpoints for users.
     *
     * @return UserSync
     */
    public function user(): UserSync;
}
