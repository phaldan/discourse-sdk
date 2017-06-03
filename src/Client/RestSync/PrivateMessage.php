<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\PrivateMessageAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for PrivateMessageAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class PrivateMessage implements PrivateMessageSync
{
    /**
     * @var PrivateMessageAsync
     */
    private $client;

    /**
     * PrivateMessage constructor.
     *
     * @param PrivateMessageAsync $client
     */
    public function __construct(PrivateMessageAsync $client)
    {
        $this->client = $client;
    }

    public function inbox(string $username): ResponseInterface
    {
        return $this->client->inbox($username)->wait();
    }

    public function sent(string $username): ResponseInterface
    {
        return $this->client->sent($username)->wait();
    }

    public function archive(string $username): ResponseInterface
    {
        return $this->client->archive($username)->wait();
    }

    public function group(string $username, string $group): ResponseInterface
    {
        return $this->client->group($username, $group)->wait();
    }

    public function groupArchive(string $username, string $group): ResponseInterface
    {
        return $this->client->groupArchive($username, $group)->wait();
    }
}
