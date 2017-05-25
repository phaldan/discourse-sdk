<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Emails extends HttpClient implements EmailAsync
{
    public function list(string $action, array $parameters = []): PromiseInterface
    {
        $url = sprintf(RouteConstants::EMAIL_LIST, $action);

        return $this->client()->get($url, $parameters);
    }
}
