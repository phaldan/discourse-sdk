<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with backups.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface BackupAsync
{
    const ATTR_WITH_UPLOADS = 'with_uploads';

    /**
     * Request a list of all available backups.
     * More information on http://docs.discourse.org/#tag/Backups%2Fpaths%2F~1admin~1backups.json%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface;

    /**
     * Generate a new backup. Required field is with_uploads.
     * More information on http://docs.discourse.org/#tag/Backups%2Fpaths%2F~1admin~1backups.json%2Fpost.
     *
     * @param array $options
     *
     * @return PromiseInterface
     */
    public function create(array $options): PromiseInterface;
}
