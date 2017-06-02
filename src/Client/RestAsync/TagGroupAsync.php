<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with tag groups.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface TagGroupAsync
{
    const ATTR_NAME = 'name';

    /**
     * Create a new tag group.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups.json%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function create(array $attributes): PromiseInterface;

    /**
     * Retrieve a list of all tag groups.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups.json%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface;

    /**
     * Use numeric identifier to retrieve a tag group.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups~1%7Bid%7D.json%2Fget.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function single(int $id): PromiseInterface;

    /**
     * Update an existing tag group.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups~1%7Bid%7D.json%2Fput.
     *
     * @param int $id
     * @param $attributes
     *
     * @return PromiseInterface
     */
    public function update(int $id, $attributes): PromiseInterface;
}
