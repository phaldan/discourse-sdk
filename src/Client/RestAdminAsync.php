<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\BackupAsync;
use PhALDan\Discourse\Client\RestAsync\Backups;
use PhALDan\Discourse\Client\RestAsync\EmailAsync;
use PhALDan\Discourse\Client\RestAsync\Emails;
use PhALDan\Discourse\Client\RestAsync\PluginAsync;
use PhALDan\Discourse\Client\RestAsync\Plugins;
use PhALDan\Discourse\Client\RestAsync\SiteSettingAsync;
use PhALDan\Discourse\Client\RestAsync\SiteSettings;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestAdminAsync
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
        return new Backups($this->url, $this->http);
    }

    public function email(): EmailAsync
    {
        return new Emails($this->url, $this->http);
    }

    public function plugin(): PluginAsync
    {
        return new Plugins($this->url, $this->http);
    }

    public function siteSetting(): SiteSettingAsync
    {
        return new SiteSettings($this->url, $this->http);
    }
}
