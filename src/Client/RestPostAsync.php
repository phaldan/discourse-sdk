<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\Rest\FlagAsync;
use PhALDan\Discourse\Client\Rest\Flags;
use PhALDan\Discourse\Client\Rest\PostAsync;
use PhALDan\Discourse\Client\Rest\Posts;
use PhALDan\Discourse\Client\Rest\PrivateMessageAsync;
use PhALDan\Discourse\Client\Rest\PrivateMessages;
use PhALDan\Discourse\Client\Rest\TagAsync;
use PhALDan\Discourse\Client\Rest\TagGroupAsync;
use PhALDan\Discourse\Client\Rest\TagGroups;
use PhALDan\Discourse\Client\Rest\Tags;
use PhALDan\Discourse\Client\Rest\TopicAsync;
use PhALDan\Discourse\Client\Rest\Topics;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
trait RestPostAsync
{
    /**
     * @var Http
     */
    private $http;

    /**
     * Access REST API endpoints for flags.
     *
     * @return FlagAsync
     */
    public function flag(): FlagAsync
    {
        return new Flags($this->http);
    }

    /**
     * Access REST API endpoints for categories.
     *
     * @return PostAsync
     */
    public function post(): PostAsync
    {
        return new Posts($this->http);
    }

    /**
     * Access REST API endpoints for categories.
     *
     * @return PrivateMessageAsync
     */
    public function privateMessage(): PrivateMessageAsync
    {
        return new PrivateMessages($this->http);
    }

    /**
     * Access REST API endpoints for tags.
     *
     * @return TagAsync
     */
    public function tag(): TagAsync
    {
        return new Tags($this->http);
    }

    /**
     * Access REST API endpoints for tag groups.
     *
     * @return TagGroupAsync
     */
    public function tagGroup(): TagGroupAsync
    {
        return new TagGroups($this->http);
    }

    /**
     * Access REST API endpoints for topics.
     *
     * @return TopicAsync
     */
    public function topic(): TopicAsync
    {
        return new Topics($this->http);
    }
}
