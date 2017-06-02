<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with backups.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface CategorySync
{
    /**
     * Request categories of all hierarchy levels (Default). Optional options via query-strings:
     *  - parent_category_id: Use slug or numeric identifier to limit result to 2nd-level categories
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories.json%2Fget.
     *
     * @param array $parameters
     *
     * @return ResponseInterface
     */
    public function list(array $parameters = []): ResponseInterface;

    /**
     * Request single category by numeric identifier.
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1c~1%7Bid%7D.json%2Fget.
     *
     * @param int $id
     *
     * @return ResponseInterface
     */
    public function single(int $id): ResponseInterface;

    /**
     * Request single category by slug (lowercase name with minus instead of space).
     *
     * @param string $slug
     *
     * @return ResponseInterface
     */
    public function singleBySlug(string $slug): ResponseInterface;

    /**
     * Create a new category. Required fields are: name, color, text_color
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories.json%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function create(array $attributes): ResponseInterface;

    /**
     * Modify an existing category. Required fields are: name, color, text_color
     * More information on http://docs.discourse.org/#tag/Categories%2Fpaths%2F~1categories~1%7Bid%7D%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function update(int $id, array $attributes): ResponseInterface;
}
