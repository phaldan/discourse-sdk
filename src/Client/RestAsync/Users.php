<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Users extends HttpClient implements UserAsync
{
    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::USER_CREATE, $attributes);
    }

    public function directoryItems(array $parameters): PromiseInterface
    {
        return $this->client()->get(RouteConstants::USER_DIRECTORY_ITEMS, $parameters);
    }

    public function list(string $flag, array $parameters): PromiseInterface
    {
        $url = sprintf(RouteConstants::USER_LIST, $flag);

        return $this->client()->get($url, $parameters);
    }

    public function single(string $username): PromiseInterface
    {
        $url = sprintf(RouteConstants::USER_SINGLE, $username);

        return $this->client()->get($url);
    }

    public function updateAvatar(string $username, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::USER_UPDATE_AVATAR, $username);

        return $this->client()->put($url, $attributes);
    }

    public function updateEmail(string $username, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::USER_UPDATE_EMAIL, $username);

        return $this->client()->put($url, $attributes);
    }
}
