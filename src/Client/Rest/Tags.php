<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Tags extends HttpClient
{
    /**
     * Retrieve a list of all tags.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tags%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::TAG_LIST);
    }

    /**
     * Use name to retrieve a single tag.
     * More information on http://docs.discourse.org/#tag/Tags%2Fpaths%2F~1tags~1%7Btag%7D%2Fget.
     *
     * @param string $name
     *
     * @return PromiseInterface
     */
    public function single(string $name): PromiseInterface
    {
        $url = sprintf(RouteConstants::TAG_SINGLE, $name);

        return $this->client()->get($url);
    }
}
