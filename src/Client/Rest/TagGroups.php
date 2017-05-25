<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class TagGroups extends HttpClient
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
    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::TAG_GROUP_CREATE, $attributes);
    }

    /**
     * Retrieve a list of all tag groups.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups.json%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::TAG_GROUP_LIST);
    }

    /**
     * Use numeric identifier to retrieve a tag group.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups~1%7Bid%7D.json%2Fget.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function single(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::TAG_GROUP_SINGLE, $id);

        return $this->client()->get($url);
    }

    /**
     * Update an existing tag group.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tag_groups~1%7Bid%7D.json%2Fput.
     *
     * @param int $id
     * @param $attributes
     *
     * @return PromiseInterface
     */
    public function update(int $id, $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TAG_GROUP_SINGLE, $id);

        return $this->client()->put($url, $attributes);
    }
}
