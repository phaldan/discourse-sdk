<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with posts.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface PostAsync
{
    const ATTR_ARCHETYPE = 'archetype';
    const ATTR_CATEGORY = 'category';
    const ATTR_CREATED_AT = 'created_at';
    const ATTR_FLAG_TOPIC = 'flag_topic';
    const ATTR_ID = 'id';
    const ATTR_POST_ACTION_TYPE = 'post_action_type_id';
    const ATTR_POST_RAW = 'post[raw]';
    const ATTR_RAW = 'raw';
    const ATTR_TARGET = 'target_usernames';
    const ATTR_TITLE = 'title';
    const ATTR_TOPIC = 'topic_id';

    /**
     * Create a new post, topic or private-message. Required attribute: raw
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1posts%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function create(array $attributes): PromiseInterface;

    /**
     * Create a new like for a post. Required attributes: id, post_action_type_id
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1post_actions%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function like(array $attributes): PromiseInterface;

    /**
     * Retrieve a post by it'S numeric identifier.
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1post_actions%2Fpost.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function single(int $id): PromiseInterface;

    /**
     * Remove a like of a post. Required attribute: post_action_type_id
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1post_actions~1%7Bid%7D%2Fdelete.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function unlike(int $id, array $attributes): PromiseInterface;

    /**
     * Update an existing post. No required parameters.
     * More information on http://docs.discourse.org/#tag/Posts%2Fpaths%2F~1posts~1%7Bid%7D%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function update(int $id, array $attributes): PromiseInterface;
}
