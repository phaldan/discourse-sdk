<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\Http;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Categories
{
    const URL_GET_LIST = '/categories.json';
    const URL_GET_SINGLE = '/c/%s.json';
    const URL_CREATE = '/categories.json';
    const URL_UPDATE = '/categories/%s';

    const ATTR_COLOR = 'color';
    const ATTR_NAME = 'name';
    const ATTR_TEXT_COLOR = 'text_color';

    const OPTION_PARENT_CATEGORY = 'parent_category_id';

    /**
     * @var Http
     */
    private $client;

    /**
     * @param Http $client client for handling http requests
     */
    public function __construct(Http $client)
    {
        $this->client = $client;
    }

    /**
     * Request categories of all hierarchy levels (Default). Optional options via query-strings:
     *  - parent_category_id: Use slug or numeric identifier to limit result to 2nd-level categories
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories.json%2Fget.
     *
     * @param array $queryParams
     *
     * @return PromiseInterface
     */
    public function list(array $queryParams = []): PromiseInterface
    {
        $queryString = http_build_query($queryParams);

        return $this->client->get(self::URL_GET_LIST.(empty($queryString) ? '' : '?'.$queryString));
    }

    /**
     * Request single category by numeric identifier.
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1c~1%7Bid%7D.json%2Fget.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function single(int $id): PromiseInterface
    {
        return $this->client->get(sprintf(self::URL_GET_SINGLE, (string) $id));
    }

    /**
     * Request single category by slug (lowercase name with minus instead of space).
     *
     * @param string $slug
     *
     * @return PromiseInterface
     */
    public function singleBySlug(string $slug): PromiseInterface
    {
        return $this->client->get(sprintf(self::URL_GET_SINGLE, $slug));
    }

    /**
     * Create a new category. Required fields are: name, color, text_color
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories.json%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function create(array $attributes): PromiseInterface
    {
        return $this->client->post(self::URL_CREATE, $attributes);
    }

    /**
     * Modify an existing category. Required fields are: name, color, text_color
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories~1%7Bid%7D%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function update(int $id, array $attributes): PromiseInterface
    {
        return $this->client->put(sprintf(self::URL_UPDATE, $id), $attributes);
    }
}