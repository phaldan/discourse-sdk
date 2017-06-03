<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with tag groups.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface TagGroupSync
{
    /**
     * Create a new tag group.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups.json%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function create(array $attributes): ResponseInterface;

    /**
     * Retrieve a list of all tag groups.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups.json%2Fget.
     *
     * @return ResponseInterface
     */
    public function list(): ResponseInterface;

    /**
     * Use numeric identifier to retrieve a tag group.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups~1%7Bid%7D.json%2Fget.
     *
     * @param int $id
     *
     * @return ResponseInterface
     */
    public function single(int $id): ResponseInterface;

    /**
     * Update an existing tag group.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups~1%7Bid%7D.json%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function update(int $id, array $attributes): ResponseInterface;
}
