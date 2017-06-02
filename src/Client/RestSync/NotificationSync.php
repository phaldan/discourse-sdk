<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with notifications.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface NotificationSync
{
    /**
     * Retrieve a list of all notifications of the current session.
     * More information on http://docs.discourse.org/#tag/Notifications%2Fpaths%2F~1notifications.json%2Fget.
     *
     * @return ResponseInterface
     */
    public function list(): ResponseInterface;
}
