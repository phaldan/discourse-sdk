<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Flag extends HttpClient implements FlagAsync
{
    public function list(string $type, array $parameters = []): PromiseInterface
    {
        $url = sprintf(RouteConstants::FLAG_LIST, $type);

        return $this->client()->get($url, $parameters);
    }
}
