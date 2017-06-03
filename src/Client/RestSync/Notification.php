<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\NotificationAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for NotificationAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Notification implements NotificationSync
{
    /**
     * @var NotificationAsync
     */
    private $client;

    public function __construct(NotificationAsync $client)
    {
        $this->client = $client;
    }

    public function list(): ResponseInterface
    {
        return $this->client->list()->wait();
    }
}
