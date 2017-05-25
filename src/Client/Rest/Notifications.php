<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Notifications extends HttpClient implements NotificationAsync
{
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::NOTIFICATION_LIST);
    }
}
