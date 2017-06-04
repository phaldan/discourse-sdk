<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\UserAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class User implements UserSync
{
    /**
     * @var UserAsync
     */
    private $client;

    /**
     * User constructor.
     *
     * @param UserAsync $client
     */
    public function __construct(UserAsync $client)
    {
        $this->client = $client;
    }

    public function create(array $attributes): ResponseInterface
    {
        return $this->client->create($attributes)->wait();
    }

    public function directoryItems(array $parameters): ResponseInterface
    {
        return $this->client->directoryItems($parameters)->wait();
    }

    public function list(string $flag, array $parameters): ResponseInterface
    {
        return $this->client->list($flag, $parameters)->wait();
    }

    public function single(string $username): ResponseInterface
    {
        return $this->client->single($username)->wait();
    }

    public function updateAvatar(string $username, array $attributes): ResponseInterface
    {
        return $this->client->updateAvatar($username, $attributes)->wait();
    }

    public function updateEmail(string $username, array $attributes): ResponseInterface
    {
        return $this->client->updateEmail($username, $attributes)->wait();
    }
}
