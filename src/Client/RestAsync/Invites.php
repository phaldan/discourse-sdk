<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Invites extends HttpClient implements InviteAsync
{
    public function email(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::INVITE_EMAIL, $attributes);
    }

    public function createLink(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::INVITE_CREATE_LINK, $attributes);
    }

    public function createToken(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::INVITE_CREATE_TOKEN, $attributes);
    }
}
