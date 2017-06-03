<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\InviteAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for InviteAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Invite implements InviteSync
{
    /**
     * @var InviteAsync
     */
    private $client;

    /**
     * Invite constructor.
     *
     * @param InviteAsync $client
     */
    public function __construct(InviteAsync $client)
    {
        $this->client = $client;
    }

    public function email(array $attributes): ResponseInterface
    {
        return $this->client->email($attributes)->wait();
    }

    public function createLink(array $attributes): ResponseInterface
    {
        return $this->client->createLink($attributes)->wait();
    }

    public function createToken(array $attributes): ResponseInterface
    {
        return $this->client->createToken($attributes)->wait();
    }
}
