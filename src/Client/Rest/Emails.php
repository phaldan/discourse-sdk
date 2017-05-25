<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Emails extends HttpClient
{
    const ACTION_SENT = 'sent';
    const ACTION_SKIPPED = 'skipped';
    const ACTION_BOUNCED = 'bounced';
    const ACTION_RECEIVED = 'received';
    const ACTION_REJECTED = 'rejected';
    const OPTION_OFFSET = 'offset';

    /**
     * Request a list of internal processed emails. Optional parameter: offset
     * More information on http://docs.discourse.org/#tag/Emails%2Fpaths%2F~1admin~1emails~1%7Baction%7D.json%2Fget.
     *
     * @param string $action
     * @param array  $parameters
     *
     * @return PromiseInterface
     */
    public function list(string $action, array $parameters = []): PromiseInterface
    {
        $url = sprintf(RouteConstants::EMAIL_LIST, $action);

        return $this->client()->get($url, $parameters);
    }
}
