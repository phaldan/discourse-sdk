<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Backups extends HttpClient
{
    const ATTR_WITH_UPLOADS = 'with_uploads';

    /**
     * Request a list of all available backups.
     * More information on http://docs.discourse.org/#tag/Backups%2Fpaths%2F~1admin~1backups.json%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::BACKUPS_LIST);
    }

    /**
     * Generate a new backup. Required field is with_uploads.
     * More information on http://docs.discourse.org/#tag/Backups%2Fpaths%2F~1admin~1backups.json%2Fpost.
     *
     * @param array $options
     *
     * @return PromiseInterface
     */
    public function create(array $options): PromiseInterface
    {
        return $this->client()->post(RouteConstants::BACKUPS_CREATE, $options);
    }
}
