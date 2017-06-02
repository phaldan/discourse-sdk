<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with groups.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface GroupSync
{
    /**
     * Create a new group. Required attribute: group[name]
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1admin~1groups%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function create(array $attributes): ResponseInterface;

    /**
     * Delete a single group identified by it's numeric identifier.
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1admin~1groups~1%7Bgroup_id%7D.json%2Fdelete.
     *
     * @param int $id
     *
     * @return ResponseInterface
     */
    public function delete(int $id): ResponseInterface;

    /**
     * Retrieve a list of groups. Optional parameters: offset, limit
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1admin~1groups.json%2Fget.
     *
     * @param array $parameters
     *
     * @return ResponseInterface
     */
    public function list(array $parameters = []): ResponseInterface;

    /**
     * Retrieve a single group by it's name.
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1groups~1%7Bgroup_name%7D~1members.json%2Fget.
     *
     * @param string $name
     *
     * @return ResponseInterface
     */
    public function single(string $name): ResponseInterface;

    /**
     * Add a new member to a group identified by it'S username. Required attribute: usernames
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1groups~1%7Bgroup_id%7D~1members.json%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function addMember(int $id, array $attributes): ResponseInterface;

    /**
     * Delete a single member by it'S numeric identifier of a group.
     * More information on http://docs.discourse.org/#tag/Groups%2Fpaths%2F~1groups~1%7Bgroup_id%7D~1members.json%2Fdelete.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function deleteMember(int $id, array $attributes): ResponseInterface;
}
