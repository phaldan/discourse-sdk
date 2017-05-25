<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Flags extends HttpClient implements FlagAsync
{
    public function list(string $type, array $parameters = []): PromiseInterface
    {
        $url = sprintf(RouteConstants::FLAG_LIST, $type);

        return $this->client()->get($url, $parameters);
    }
}
