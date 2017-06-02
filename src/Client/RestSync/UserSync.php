<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface UserSync
{
    /**
     * Create a new user.
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1users%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function create(array $attributes): ResponseInterface;

    /**
     * Retrieve user statistics for a specific period.
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1directory_items.json%3Fperiod%3D%7Bperiod%7D%26order%3D%7Border%7D%2Fget.
     *
     * @param array $parameters
     *
     * @return ResponseInterface
     */
    public function directoryItems(array $parameters): ResponseInterface;

    /**
     * Retrieve a list of users grouped by a flag.
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1admin~1users~1list~1%7Bflag%7D.json%2Fget.
     *
     * @param string $flag
     * @param array  $parameters
     *
     * @return ResponseInterface
     */
    public function list(string $flag, array $parameters): ResponseInterface;

    /**
     * Retrieve a single user by it's username.
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1users~1%7Busername%7D.json%2Fget.
     *
     * @param string $username
     *
     * @return ResponseInterface
     */
    public function single(string $username): ResponseInterface;

    /**
     * Set a new avatar for a user. Required attributes: upload_id, type
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1users~1%7Busername%7D~1preferences~1avatar~1pick%2Fput.
     *
     * @param string $username
     * @param array  $attributes
     *
     * @return ResponseInterface
     */
    public function updateAvatar(string $username, array $attributes): ResponseInterface;

    /**
     * Set a new email for a user: Required attribute: email
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1users~1%7Busername%7D~1preferences~1email%2Fput.
     *
     * @param string $username
     * @param array  $attributes
     *
     * @return ResponseInterface
     */
    public function updateEmail(string $username, array $attributes): ResponseInterface;
}
