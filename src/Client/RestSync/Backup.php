<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\BackupAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for BackupAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Backup implements BackupSync
{
    /**
     * @var BackupAsync
     */
    private $client;

    /**
     * Backup constructor.
     *
     * @param BackupAsync $client
     */
    public function __construct(BackupAsync $client)
    {
        $this->client = $client;
    }

    public function list(): ResponseInterface
    {
        return $this->client->list()->wait();
    }

    public function create(array $options): ResponseInterface
    {
        return $this->client->create($options)->wait();
    }
}
