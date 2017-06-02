<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\GroupAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for GroupAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Group implements GroupSync
{
    /**
     * @var GroupAsync
     */
    private $client;

    /**
     * Group constructor.
     *
     * @param GroupAsync $client
     */
    public function __construct(GroupAsync $client)
    {
        $this->client = $client;
    }

    public function create(array $attributes): ResponseInterface
    {
        return $this->client->create($attributes)->wait();
    }

    public function delete(int $id): ResponseInterface
    {
        return $this->client->delete($id)->wait();
    }

    public function list(array $parameters = []): ResponseInterface
    {
        return $this->client->list($parameters)->wait();
    }

    public function single(string $name): ResponseInterface
    {
        return $this->client->single($name)->wait();
    }

    public function addMember(int $id, array $attributes): ResponseInterface
    {
        return $this->client->addMember($id, $attributes)->wait();
    }

    public function deleteMember(int $id, array $attributes): ResponseInterface
    {
        return $this->client->deleteMember($id, $attributes)->wait();
    }
}
