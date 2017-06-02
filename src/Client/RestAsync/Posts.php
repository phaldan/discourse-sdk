<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Posts extends HttpClient implements PostAsync
{
    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::POST_CREATE, $attributes);
    }

    public function like(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::POST_LIKE, $attributes);
    }

    public function single(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::POST_SINGLE, $id);

        return $this->client()->get($url);
    }

    public function unlike(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::POST_UNLIKE, $id);

        return $this->client()->delete($url, $attributes);
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::POST_UPDATE, $id);

        return $this->client()->put($url, $attributes);
    }
}
