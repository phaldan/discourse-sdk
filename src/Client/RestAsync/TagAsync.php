<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with tag.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface TagAsync
{
    /**
     * Retrieve a list of all tags.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tags%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface;

    /**
     * Use name to retrieve a single tag.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tags~1%7Btag%7D%2Fget.
     *
     * @param string $name
     *
     * @return PromiseInterface
     */
    public function single(string $name): PromiseInterface;
}
