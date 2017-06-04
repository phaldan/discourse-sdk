<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Notification extends HttpClient implements NotificationAsync
{
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::NOTIFICATION_LIST);
    }
}
