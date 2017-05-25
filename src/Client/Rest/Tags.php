<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Tags extends HttpClient implements TagAsync
{
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::TAG_LIST);
    }

    public function single(string $name): PromiseInterface
    {
        $url = sprintf(RouteConstants::TAG_SINGLE, $name);

        return $this->client()->get($url);
    }
}
