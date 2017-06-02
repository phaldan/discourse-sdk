<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with backups.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface BackupSync
{
    /**
     * Request a list of all available backups.
     * More information on http://docs.discourse.org/#tag/Backups%2Fpaths%2F~1admin~1backups.json%2Fget.
     *
     * @return ResponseInterface
     */
    public function list(): ResponseInterface;

    /**
     * Generate a new backup. Required field is with_uploads.
     * More information on http://docs.discourse.org/#tag/Backups%2Fpaths%2F~1admin~1backups.json%2Fpost.
     *
     * @param array $options
     *
     * @return ResponseInterface
     */
    public function create(array $options): ResponseInterface;
}
