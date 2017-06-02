<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with flags.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface FlagAsync
{
    const TYPE_ACTIVE = 'active';
    const TYPE_OLD = 'old';

    const OPTION_OFFSET = 'offset';

    /**
     * Request a list of flagged posts, topics and users. Optional parameter: offset
     * More information on http://docs.discourse.org/#tag/Flags%2Fpaths%2F~1admin~1flags~1%7Btype%7D.json%2Fget.
     *
     * @param string $type
     * @param array  $parameters
     *
     * @return PromiseInterface
     */
    public function list(string $type, array $parameters = []): PromiseInterface;
}
