<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\Category;
use PhALDan\Discourse\Client\RestAsync\CategoryAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class RestAsync implements RestAsyncFactory
{
    use RestAdminAsync;
    use RestPostAsync;
    use RestUserAsync;

    /**
     * @var HttpAdapter
     */
    private $http;

    /**
     * @var string
     */
    private $url;

    /**
     * RestAsync constructor.
     *
     * @param string      $url
     * @param HttpAdapter $http
     */
    public function __construct(string $url, HttpAdapter $http)
    {
        $this->url = $url;
        $this->http = $http;
    }

    public function category(): CategoryAsync
    {
        return new Category($this->url, $this->http);
    }
}
