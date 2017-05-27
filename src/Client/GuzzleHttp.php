<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Implementation of Http interface with GuzzleHttp.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class GuzzleHttp implements Http
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * Intiate GuzzleHttp Client.
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?? new Client();
    }

    /**
     * Returns current Instance of ClientInterface.
     *
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    public function send(RequestInterface $request): PromiseInterface
    {
        return $this->client->sendAsync($request);
    }
}
