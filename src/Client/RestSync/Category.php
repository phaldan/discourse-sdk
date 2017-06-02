<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\CategoryAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for CategoryAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Category implements CategorySync
{
    /**
     * @var CategoryAsync
     */
    private $client;

    /**
     * Category constructor.
     *
     * @param CategoryAsync $client
     */
    public function __construct(CategoryAsync $client)
    {
        $this->client = $client;
    }

    public function list(array $parameters = []): ResponseInterface
    {
        return $this->client->list($parameters)->wait();
    }

    public function single(int $id): ResponseInterface
    {
        return $this->client->single($id)->wait();
    }

    public function singleBySlug(string $slug): ResponseInterface
    {
        return $this->client->singleBySlug($slug)->wait();
    }

    public function create(array $attributes): ResponseInterface
    {
        return $this->client->create($attributes)->wait();
    }

    public function update(int $id, array $attributes): ResponseInterface
    {
        return $this->client->update($id, $attributes)->wait();
    }
}
