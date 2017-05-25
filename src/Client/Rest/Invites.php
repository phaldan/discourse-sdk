<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Invites extends HttpClient
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
    public function email(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::INVITE_EMAIL, $attributes);
    }

    /**
     * Create and retrieve an invite link for a specific mail-address. Required attribute: email
     * More information on http://docs.discourse.org/#tag/Invites%2Fpaths%2F~1invites~1link%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function createLink(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::INVITE_CREATE_LINK, $attributes);
    }

    /**
     * Create disposable invite token. Required attribute: username
     * More information on http://docs.discourse.org/#tag/Invites%2Fpaths%2F~1invites~1disposable%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function createToken(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::INVITE_CREATE_TOKEN, $attributes);
    }
}
