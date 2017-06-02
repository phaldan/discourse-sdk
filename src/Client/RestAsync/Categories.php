<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Categories extends HttpClient implements CategoryAsync
{
    public function list(array $parameters = []): PromiseInterface
    {
        return $this->client()->get(RouteConstants::CATEGORY_LIST, $parameters);
    }

    public function single(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::CATEGORY_SINGLE, (string) $id);

        return $this->client()->get($url);
    }

    public function singleBySlug(string $slug): PromiseInterface
    {
        $url = sprintf(RouteConstants::CATEGORY_SINGLE, $slug);

        return $this->client()->get($url);
    }

    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::CATEGORY_CREATE, $attributes);
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::CATEGORY_UPDATE, $id);

        return $this->client()->put($url, $attributes);
    }
}
