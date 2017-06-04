<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\TopicAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for TopicAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Topic implements TopicSync
{
    /**
     * @var TopicAsync
     */
    private $client;

    /**
     * Topic constructor.
     *
     * @param TopicAsync $client
     */
    public function __construct(TopicAsync $client)
    {
        $this->client = $client;
    }

    public function createScheduled(int $id, array $attributes): ResponseInterface
    {
        return $this->client->createScheduled($id, $attributes)->wait();
    }

    public function delete(int $id): ResponseInterface
    {
        return $this->client->delete($id)->wait();
    }

    public function invite(int $id, array $attributes): ResponseInterface
    {
        return $this->client->invite($id, $attributes)->wait();
    }

    public function latest(array $parameters = []): ResponseInterface
    {
        return $this->client->latest($parameters)->wait();
    }

    public function notification(int $id, array $attributes): ResponseInterface
    {
        return $this->client->notification($id, $attributes)->wait();
    }

    public function single(int $id): ResponseInterface
    {
        return $this->client->single($id)->wait();
    }

    public function top(): ResponseInterface
    {
        return $this->client->top()->wait();
    }

    public function topFiltered(string $flag): ResponseInterface
    {
        return $this->client->topFiltered($flag)->wait();
    }

    public function update(string $slug, int $id, array $attributes): ResponseInterface
    {
        return $this->client->update($slug, $id, $attributes)->wait();
    }

    public function updateScheduled(int $id, array $attributes): ResponseInterface
    {
        return $this->client->updateScheduled($id, $attributes)->wait();
    }

    public function updateStatus(int $id, array $attributes): ResponseInterface
    {
        return $this->client->updateStatus($id, $attributes)->wait();
    }
}
