<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Email extends HttpClient implements EmailAsync
{
    public function list(string $action, array $parameters = []): PromiseInterface
    {
        $url = sprintf(RouteConstants::EMAIL_LIST, $action);

        return $this->client()->get($url, $parameters);
    }
}
