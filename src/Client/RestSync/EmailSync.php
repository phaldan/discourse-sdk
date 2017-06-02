<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with emails.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface EmailSync
{
    /**
     * Request a list of internal processed emails. Optional parameter: offset
     * More information on http://docs.discourse.org/#tag/Emails%2Fpaths%2F~1admin~1emails~1%7Baction%7D.json%2Fget.
     *
     * @param string $action
     * @param array  $parameters
     *
     * @return ResponseInterface
     */
    public function list(string $action, array $parameters = []): ResponseInterface;
}
