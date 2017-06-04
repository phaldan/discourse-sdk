<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Backup extends HttpClient implements BackupAsync
{
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::BACKUP_LIST);
    }

    public function create(array $options): PromiseInterface
    {
        return $this->client()->post(RouteConstants::BACKUP_CREATE, $options);
    }
}
