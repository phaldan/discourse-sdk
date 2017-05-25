<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with private messages.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface PrivateMessageAsync
{
    /**
     * Retrieve a list of received private messages of a user.
     * More information on http://docs.discourse.org/#tag/Private-Messages%2Fpaths%2F~1topics~1private-messages~1%7Busername%7D.json%2Fget.
     *
     * @param string $username
     *
     * @return PromiseInterface
     */
    public function inbox(string $username): PromiseInterface;

    /**
     * Retrieve a list of sent private message of a user.
     * More information on http://docs.discourse.org/#tag/Private-Messages%2Fpaths%2F~1topics~1private-messages-sent~1%7Busername%7D.json%2Fget.
     *
     * @param string $username
     *
     * @return PromiseInterface
     */
    public function sent(string $username): PromiseInterface;

    /**
     * Retrieve a list of archived private messages of a user.
     *
     * @param string $username
     *
     * @return PromiseInterface
     */
    public function archive(string $username): PromiseInterface;

    /**
     * Retrieve a list of private messages of group.
     *
     * @param string $username
     * @param string $group
     *
     * @return PromiseInterface
     */
    public function group(string $username, string $group): PromiseInterface;

    /**
     * Retrieve a list of archived private messages of a group.
     *
     * @param string $username
     * @param string $group
     *
     * @return PromiseInterface
     */
    public function groupArchive(string $username, string $group): PromiseInterface;
}
