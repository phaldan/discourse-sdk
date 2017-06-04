<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\Backup;
use PhALDan\Discourse\Client\RestAsync\BackupAsync;
use PhALDan\Discourse\Client\RestAsync\Email;
use PhALDan\Discourse\Client\RestAsync\EmailAsync;
use PhALDan\Discourse\Client\RestAsync\Plugin;
use PhALDan\Discourse\Client\RestAsync\PluginAsync;
use PhALDan\Discourse\Client\RestAsync\SiteSetting;
use PhALDan\Discourse\Client\RestAsync\SiteSettingAsync;

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
