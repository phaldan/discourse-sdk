<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with badges.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface BadgeSync
{
    /**
     * Requests a list of badges.
     * More information on http://docs.discourse.org/#tag/Badges%2Fpaths%2F~1admin~1badges.json%2Fget.
     *
     * @return ResponseInterface
     */
    public function list(): ResponseInterface;

    /**
     * Create a new badge. Badge has no required fields.
     * More information on http://docs.discourse.org/#tag/Badges%2Fpaths%2F~1admin~1badges.json%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function create(array $attributes): ResponseInterface;

    /**
     * Delete a single badge identified by it's numeric identifier.
     * More information on http://docs.discourse.org/#tag/Badges%2Fpaths%2F~1user_badges~1%7Bid%7D%2Fdelete.
     *
     * @param int $id
     *
     * @return ResponseInterface
     */
    public function delete(int $id): ResponseInterface;
}
