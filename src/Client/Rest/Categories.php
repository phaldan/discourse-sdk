<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Categories extends HttpClient
{
    const ATTR_COLOR = 'color';
    const ATTR_NAME = 'name';
    const ATTR_TEXT_COLOR = 'text_color';

    const OPTION_PARENT_CATEGORY = 'parent_category_id';

    /**
     * Request categories of all hierarchy levels (Default). Optional options via query-strings:
     *  - parent_category_id: Use slug or numeric identifier to limit result to 2nd-level categories
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories.json%2Fget.
     *
     * @param array $parameters
     *
     * @return PromiseInterface
     */
    public function list(array $parameters = []): PromiseInterface
    {
        return $this->client()->get(RouteConstants::CATEGORIES_LIST, $parameters);
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
        $url = sprintf(RouteConstants::CATEGORIES_SINGLE, (string) $id);

        return $this->client()->get($url);
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
        $url = sprintf(RouteConstants::CATEGORIES_SINGLE, $slug);

        return $this->client()->get($url);
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
        return $this->client()->post(RouteConstants::CATEGORIES_CREATE, $attributes);
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
        $url = sprintf(RouteConstants::CATEGORIES_UPDATE, $id);

        return $this->client()->put($url, $attributes);
    }
}
