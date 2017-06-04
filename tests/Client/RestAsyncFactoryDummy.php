<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\BackupAsync;
use PhALDan\Discourse\Client\RestAsync\BackupAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\BadgeAsync;
use PhALDan\Discourse\Client\RestAsync\BadgeAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\CategoryAsync;
use PhALDan\Discourse\Client\RestAsync\CategoryAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\EmailAsync;
use PhALDan\Discourse\Client\RestAsync\EmailAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\FlagAsync;
use PhALDan\Discourse\Client\RestAsync\FlagAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\GroupAsync;
use PhALDan\Discourse\Client\RestAsync\GroupAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\InviteAsync;
use PhALDan\Discourse\Client\RestAsync\InviteAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\NotificationAsync;
use PhALDan\Discourse\Client\RestAsync\NotificationAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\PluginAsync;
use PhALDan\Discourse\Client\RestAsync\PluginAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\PostAsync;
use PhALDan\Discourse\Client\RestAsync\PostAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\PrivateMessageAsync;
use PhALDan\Discourse\Client\RestAsync\PrivateMessageAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\SiteSettingAsync;
use PhALDan\Discourse\Client\RestAsync\SiteSettingAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\TagAsync;
use PhALDan\Discourse\Client\RestAsync\TagAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\TagGroupAsync;
use PhALDan\Discourse\Client\RestAsync\TagGroupAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\TopicAsync;
use PhALDan\Discourse\Client\RestAsync\TopicAsyncDummy;
use PhALDan\Discourse\Client\RestAsync\UserAsync;
use PhALDan\Discourse\Client\RestAsync\UserAsyncDummy;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class RestAsyncFactoryDummy implements RestAsyncFactory
{
    public function backup(): BackupAsync
    {
        return new BackupAsyncDummy();
    }

    public function badge(): BadgeAsync
    {
        return new BadgeAsyncDummy();
    }

    public function category(): CategoryAsync
    {
        return new CategoryAsyncDummy();
    }

    public function email(): EmailAsync
    {
        return new EmailAsyncDummy();
    }

    public function flag(): FlagAsync
    {
        return new FlagAsyncDummy();
    }

    public function group(): GroupAsync
    {
        return new GroupAsyncDummy();
    }

    public function invite(): InviteAsync
    {
        return new InviteAsyncDummy();
    }

    public function notification(): NotificationAsync
    {
        return new NotificationAsyncDummy();
    }

    public function plugin(): PluginAsync
    {
        return new PluginAsyncDummy();
    }

    public function post(): PostAsync
    {
        return new PostAsyncDummy();
    }

    public function privateMessage(): PrivateMessageAsync
    {
        return new PrivateMessageAsyncDummy();
    }

    public function siteSetting(): SiteSettingAsync
    {
        return new SiteSettingAsyncDummy();
    }

    public function tag(): TagAsync
    {
        return new TagAsyncDummy();
    }

    public function tagGroup(): TagGroupAsync
    {
        return new TagGroupAsyncDummy();
    }

    public function topic(): TopicAsync
    {
        return new TopicAsyncDummy();
    }

    public function user(): UserAsync
    {
        return new UserAsyncDummy();
    }
}
