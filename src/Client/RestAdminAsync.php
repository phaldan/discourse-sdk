<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\Rest\BackupAsync;
use PhALDan\Discourse\Client\Rest\Backups;
use PhALDan\Discourse\Client\Rest\EmailAsync;
use PhALDan\Discourse\Client\Rest\Emails;
use PhALDan\Discourse\Client\Rest\PluginAsync;
use PhALDan\Discourse\Client\Rest\Plugins;
use PhALDan\Discourse\Client\Rest\SiteSettingAsync;
use PhALDan\Discourse\Client\Rest\SiteSettings;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestAdminAsync
{
    /**
     * @var Http
     */
    private $http;

    public function backup(): BackupAsync
    {
        return new Backups($this->http);
    }

    public function email(): EmailAsync
    {
        return new Emails($this->http);
    }

    public function plugin(): PluginAsync
    {
        return new Plugins($this->http);
    }

    public function siteSetting(): SiteSettingAsync
    {
        return new SiteSettings($this->http);
    }
}
