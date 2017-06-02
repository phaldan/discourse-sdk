<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\FlagAsync;
use PhALDan\Discourse\Client\RestAsync\Flags;
use PhALDan\Discourse\Client\RestAsync\PostAsync;
use PhALDan\Discourse\Client\RestAsync\Posts;
use PhALDan\Discourse\Client\RestAsync\PrivateMessageAsync;
use PhALDan\Discourse\Client\RestAsync\PrivateMessages;
use PhALDan\Discourse\Client\RestAsync\TagAsync;
use PhALDan\Discourse\Client\RestAsync\TagGroupAsync;
use PhALDan\Discourse\Client\RestAsync\TagGroups;
use PhALDan\Discourse\Client\RestAsync\Tags;
use PhALDan\Discourse\Client\RestAsync\TopicAsync;
use PhALDan\Discourse\Client\RestAsync\Topics;

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
