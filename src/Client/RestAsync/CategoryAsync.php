<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with categories.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface CategoryAsync
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
    public function list(array $parameters = []): PromiseInterface;

    /**
     * Request single category by numeric identifier.
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1c~1%7Bid%7D.json%2Fget.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function single(int $id): PromiseInterface;

    /**
     * Request single category by slug (lowercase name with minus instead of space).
     *
     * @param string $slug
     *
     * @return PromiseInterface
     */
    public function singleBySlug(string $slug): PromiseInterface;

    /**
     * Create a new category. Required fields are: name, color, text_color
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories.json%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function create(array $attributes): PromiseInterface;

    /**
     * Modify an existing category. Required fields are: name, color, text_color
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories~1%7Bid%7D%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function update(int $id, array $attributes): PromiseInterface;
}
