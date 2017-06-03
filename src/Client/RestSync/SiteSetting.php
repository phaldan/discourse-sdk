<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\SiteSettingAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for SiteSettingAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class SiteSetting implements SiteSettingSync
{
    /**
     * @var SiteSettingAsync
     */
    private $client;

    /**
     * SiteSetting constructor.
     *
     * @param SiteSettingAsync $client
     */
    public function __construct(SiteSettingAsync $client)
    {
        $this->client = $client;
    }

    public function update(string $setting, array $attributes): ResponseInterface
    {
        return $this->client->update($setting, $attributes)->wait();
    }
}
