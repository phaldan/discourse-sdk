<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with tag.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface TagSync
{
    /**
     * Retrieve a list of all tags.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tags%2Fget.
     *
     * @return ResponseInterface
     */
    public function list(): ResponseInterface;

    /**
     * Use name to retrieve a single tag.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tags~1%7Btag%7D%2Fget.
     *
     * @param string $name
     *
     * @return ResponseInterface
     */
    public function single(string $name): ResponseInterface;
}
