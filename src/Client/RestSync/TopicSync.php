<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with tags.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface TopicSync
{
    /**
     * Create a new timed topic.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D~1status_update%2Fpost.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function createScheduled(int $id, array $attributes): ResponseInterface;

    /**
     * Delete an existing topic.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D.json%2Fdelete.
     *
     * @param int $id
     *
     * @return ResponseInterface
     */
    public function delete(int $id): ResponseInterface;

    /**
     * Create an invite for a user to a topic. Required attribute: username
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Btopic_id%7D~1invite%2Fpost.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function invite(int $id, array $attributes): ResponseInterface;

    /**
     * Retrieve a list of the latest topics.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1latest.json%2Fget.
     *
     * @param array $parameters
     *
     * @return ResponseInterface
     */
    public function latest(array $parameters = []): ResponseInterface;

    /**
     * Set a new notification level for a topic. Required attribute: notification_level
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D~1notifications%2Fpost.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function notification(int $id, array $attributes): ResponseInterface;

    /**
     * Retrieve a single topic with posts.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D.json%2Fget.
     *
     * @param int $id
     *
     * @return ResponseInterface
     */
    public function single(int $id): ResponseInterface;

    /**
     * Retrieve top rated topics.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1top.json%2Fget.
     *
     * @return ResponseInterface
     */
    public function top(): ResponseInterface;

    /**
     * Retrieve a list of top topics filtered by specific time period.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1top~1%7Bflag%7D.json%2Fget.
     *
     * @param string $flag
     *
     * @return ResponseInterface
     */
    public function topFiltered(string $flag): ResponseInterface;

    /**
     * Update an existing topic.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bslug%7D~1%7Bid%7D.json%2Fput.
     *
     * @param string $slug
     * @param int    $id
     * @param array  $attributes
     *
     * @return ResponseInterface
     */
    public function update(string $slug, int $id, array $attributes): ResponseInterface;

    /**
     * Update an existing timed topic.
     * More informtion on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D~1change-timestamp%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function updateScheduled(int $id, array $attributes): ResponseInterface;

    /**
     * Update status of an existing topic.
     * More information on .http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D~1status%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function updateStatus(int $id, array $attributes): ResponseInterface;
}
