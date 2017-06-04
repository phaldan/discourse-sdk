<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Group extends HttpClient implements GroupAsync
{
    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::GROUP_CREATE, $attributes);
    }

    public function delete(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::GROUP_DELETE, $id);

        return $this->client()->delete($url);
    }

    public function list(array $parameters = []): PromiseInterface
    {
        return $this->client()->get(RouteConstants::GROUP_LIST, $parameters);
    }

    public function single(string $name): PromiseInterface
    {
        $url = sprintf(RouteConstants::GROUP_SINGLE, $name);

        return $this->client()->get($url);
    }

    public function addMember(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::GROUP_ADD_MEMBER, $id);

        return $this->client()->put($url, $attributes);
    }

    public function deleteMember(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::GROUP_DELETE_MEMBER, $id);

        return $this->client()->delete($url, $attributes);
    }
}
