<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with invites.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface InviteSync
{
    /**
     * Invite a user by sending an email. Required attribute: email
     * More information on http://docs.discourse.org/#tag/Invites%2Fpaths%2F~1invites%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function email(array $attributes): ResponseInterface;

    /**
     * Create and retrieve an invite link for a specific mail-address. Required attribute: email
     * More information on http://docs.discourse.org/#tag/Invites%2Fpaths%2F~1invites~1link%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function createLink(array $attributes): ResponseInterface;

    /**
     * Create disposable invite token. Required attribute: username
     * More information on http://docs.discourse.org/#tag/Invites%2Fpaths%2F~1invites~1disposable%2Fpost.
     *
     * @param array $attributes
     *
     * @return ResponseInterface
     */
    public function createToken(array $attributes): ResponseInterface;
}
