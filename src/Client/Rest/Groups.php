<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Groups extends HttpClient
{
    const OPTION_OFFSET = 'offset';
    const OPTION_LIMIT = 'limit';

    const ATTRIBUTE_GROUP_NAME = 'group[name]';
    const ATTRIBUTE_USERNAMES = 'usernames';
    const ATTRIBUTE_USER_ID = 'user_id';

    /**
     * Create a new group. Required attribute: group[name]
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1admin~1groups%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::GROUP_CREATE, $attributes);
    }

    /**
     * Delete a single group identified by it's numeric identifier.
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1admin~1groups~1%7Bgroup_id%7D.json%2Fdelete.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function delete(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::GROUP_DELETE, $id);

        return $this->client()->delete($url);
    }

    /**
     * Retrieve a list of groups. Optional parameters: offset, limit
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1admin~1groups.json%2Fget.
     *
     * @param array $parameters
     *
     * @return PromiseInterface
     */
    public function list(array $parameters = []): PromiseInterface
    {
        return $this->client()->get(RouteConstants::GROUP_LIST, $parameters);
    }

    /**
     * Retrieve a single group by it's name.
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1groups~1%7Bgroup_name%7D~1members.json%2Fget.
     *
     * @param string $name
     *
     * @return PromiseInterface
     */
    public function single(string $name): PromiseInterface
    {
        $url = sprintf(RouteConstants::GROUP_SINGLE, $name);

        return $this->client()->get($url);
    }

    /**
     * Add a new member to a group identified by it'S username. Required attribute: usernames
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1groups~1%7Bgroup_id%7D~1members.json%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function addMember(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::GROUP_ADD_MEMBER, $id);

        return $this->client()->put($url, $attributes);
    }

    /**
     * Delete a single member by it'S numeric identifier of a group.
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1groups~1%7Bgroup_id%7D~1members.json%2Fdelete.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function deleteMember(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::GROUP_DELETE_MEMBER, $id);

        return $this->client()->delete($url, $attributes);
    }
}
