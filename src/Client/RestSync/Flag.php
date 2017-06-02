<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\FlagAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for FlagAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Flag implements FlagSync
{
    /**
     * @var FlagAsync
     */
    private $client;

    /**
     * Flag constructor.
     *
     * @param FlagAsync $client
     */
    public function __construct(FlagAsync $client)
    {
        $this->client = $client;
    }

    public function list(string $type, array $parameters = []): ResponseInterface
    {
        return $this->client->list($type, $parameters)->wait();
    }
}
