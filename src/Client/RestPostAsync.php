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
     * @var HttpAdapter
     */
    private $http;

    /**
     * @var string
     */
    private $url;

    public function flag(): FlagAsync
    {
        return new Flags($this->url, $this->http);
    }

    public function post(): PostAsync
    {
        return new Posts($this->url, $this->http);
    }

    public function privateMessage(): PrivateMessageAsync
    {
        return new PrivateMessages($this->url, $this->http);
    }

    public function tag(): TagAsync
    {
        return new Tags($this->url, $this->http);
    }

    public function tagGroup(): TagGroupAsync
    {
        return new TagGroups($this->url, $this->http);
    }

    public function topic(): TopicAsync
    {
        return new Topics($this->url, $this->http);
    }
}
