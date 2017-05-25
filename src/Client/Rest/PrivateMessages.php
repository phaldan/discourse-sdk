<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PrivateMessages extends HttpClient implements PrivateMessageAsync
{
    public function inbox(string $username): PromiseInterface
    {
        $url = sprintf(RouteConstants::PRIVATE_MESSAGE_INBOX, $username);

        return $this->client()->get($url);
    }

    public function sent(string $username): PromiseInterface
    {
        $url = sprintf(RouteConstants::PRIVATE_MESSAGE_SENT, $username);

        return $this->client()->get($url);
    }

    public function archive(string $username): PromiseInterface
    {
        $url = sprintf(RouteConstants::PRIVATE_MESSAGE_ARCHIVE, $username);

        return $this->client()->get($url);
    }

    public function group(string $username, string $group): PromiseInterface
    {
        $url = sprintf(RouteConstants::PRIVATE_MESSAGE_GROUP, $username, $group);

        return $this->client()->get($url);
    }

    public function groupArchive(string $username, string $group): PromiseInterface
    {
        $url = sprintf(RouteConstants::PRIVATE_MESSAGE_GROUP_ARCHIVE, $username, $group);

        return $this->client()->get($url);
    }
}
