<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\BadgeAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for BadgeAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Badge implements BadgeSync
{
    /**
     * @var BadgeAsync
     */
    private $client;

    /**
     * Badge constructor.
     *
     * @param BadgeAsync $client
     */
    public function __construct(BadgeAsync $client)
    {
        $this->client = $client;
    }

    public function list(): ResponseInterface
    {
        return $this->client->list()->wait();
    }

    public function create(array $attributes): ResponseInterface
    {
        return $this->client->create($attributes)->wait();
    }

    public function delete(int $id): ResponseInterface
    {
        return $this->client->delete($id)->wait();
    }
}
