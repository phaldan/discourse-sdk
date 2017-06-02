<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\EmailAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for EmailAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Email implements EmailSync
{
    /**
     * @var EmailAsync
     */
    private $client;

    /**
     * Email constructor.
     *
     * @param EmailAsync $client
     */
    public function __construct(EmailAsync $client)
    {
        $this->client = $client;
    }

    public function list(string $action, array $parameters = []): ResponseInterface
    {
        return $this->client->list($action, $parameters)->wait();
    }
}
