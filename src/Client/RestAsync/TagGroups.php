<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class TagGroups extends HttpClient implements TagGroupAsync
{
    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::TAG_GROUP_CREATE, $attributes);
    }

    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::TAG_GROUP_LIST);
    }

    public function single(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::TAG_GROUP_SINGLE, $id);

        return $this->client()->get($url);
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TAG_GROUP_SINGLE, $id);

        return $this->client()->put($url, $attributes);
    }
}
