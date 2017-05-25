<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Notifications extends HttpClient
{
    /**
     * Retrieve a list of all notifications of the current session.
     * More information on http://docs.discourse.org/#tag/Notifications%2Fpaths%2F~1notifications.json%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::NOTIFICATION_LIST);
    }
}
