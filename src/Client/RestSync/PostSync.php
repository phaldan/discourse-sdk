<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with posts.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface PostSync
{
    /**
     * Create a new post, topic or private-message. Required attribute: raw
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1posts%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function create(array $attributes): ResponseInterface;

    /**
     * Create a new like for a post. Required attributes: id, post_action_type_id
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1post_actions%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function like(array $attributes): ResponseInterface;

    /**
     * Retrieve a post by it'S numeric identifier.
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1post_actions%2Fpost.
     *
     * @param int $id
     *
     * @return ResponseInterface
     */
    public function single(int $id): ResponseInterface;

    /**
     * Remove a like of a post. Required attribute: post_action_type_id
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1post_actions~1%7Bid%7D%2Fdelete.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function unlike(int $id, array $attributes): ResponseInterface;

    /**
     * Update an existing post. No required parameters.
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1posts~1%7Bid%7D%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function update(int $id, array $attributes): ResponseInterface;
}
