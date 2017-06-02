<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Badges extends HttpClient implements BadgeAsync
{
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::BADGE_LIST);
    }

    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::BADGE_CREATE, $attributes);
    }

    public function delete(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::BADGE_DELETE, $id);

        return $this->client()->delete($url);
    }
}
