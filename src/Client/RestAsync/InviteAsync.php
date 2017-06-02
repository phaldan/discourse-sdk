<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with invites.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface InviteAsync
{
    const ATTR_CUSTOM_MESSAGE = 'custom_message';
    const ATTR_EMAIL = 'email';
    const ATTR_GROUP_NAMES = 'group_names';
    const ATTR_QUANTITY = 'quantity';
    const ATTR_USERNAME = 'username';

    /**
     * Invite a user by sending an email. Required attribute: email
     * More information on http://docs.discourse.org/#tag/Invites%2Fpaths%2F~1invites%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function email(array $attributes): PromiseInterface;

    /**
     * Create and retrieve an invite link for a specific mail-address. Required attribute: email
     * More information on http://docs.discourse.org/#tag/Invites%2Fpaths%2F~1invites~1link%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function createLink(array $attributes): PromiseInterface;

    /**
     * Create disposable invite token. Required attribute: username
     * More information on http://docs.discourse.org/#tag/Invites%2Fpaths%2F~1invites~1disposable%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function createToken(array $attributes): PromiseInterface;
}
