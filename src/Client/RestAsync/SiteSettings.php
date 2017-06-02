<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class SiteSettings extends HttpClient implements SiteSettingAsync
{
    public function update(string $setting, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::SITE_SETTING_SET, $setting);

        return $this->client()->put($url, $attributes);
    }
}
