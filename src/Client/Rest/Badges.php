<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Badges extends HttpClient
{
    /**
     * Requests a list of badges.
     * More information on http://docs.discourse.org/#tag/Badges%2Fpaths%2F~1admin~1badges.json%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::BADGES_LIST);
    }

    /**
     * Create a new badge. Badge has no required fields.
     * More information on http://docs.discourse.org/#tag/Badges%2Fpaths%2F~1admin~1badges.json%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::BADGES_CREATE, $attributes);
    }

    /**
     * Delete a single badge identified by it's numeric identifier.
     * More information on http://docs.discourse.org/#tag/Badges%2Fpaths%2F~1user_badges~1%7Bid%7D%2Fdelete.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function delete(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::BADGES_DELETE, $id);

        return $this->client()->delete($url);
    }
}
