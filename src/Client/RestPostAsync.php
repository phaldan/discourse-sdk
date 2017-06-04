<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\RestAsync\Flag;
use PhALDan\Discourse\Client\RestAsync\FlagAsync;
use PhALDan\Discourse\Client\RestAsync\Post;
use PhALDan\Discourse\Client\RestAsync\PostAsync;
use PhALDan\Discourse\Client\RestAsync\PrivateMessage;
use PhALDan\Discourse\Client\RestAsync\PrivateMessageAsync;
use PhALDan\Discourse\Client\RestAsync\Tag;
use PhALDan\Discourse\Client\RestAsync\TagAsync;
use PhALDan\Discourse\Client\RestAsync\TagGroup;
use PhALDan\Discourse\Client\RestAsync\TagGroupAsync;
use PhALDan\Discourse\Client\RestAsync\Topic;
use PhALDan\Discourse\Client\RestAsync\TopicAsync;

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
        return new Flag($this->url, $this->http);
    }

    public function post(): PostAsync
    {
        return new Post($this->url, $this->http);
    }

    public function privateMessage(): PrivateMessageAsync
    {
        return new PrivateMessage($this->url, $this->http);
    }

    public function tag(): TagAsync
    {
        return new Tag($this->url, $this->http);
    }

    public function tagGroup(): TagGroupAsync
    {
        return new TagGroup($this->url, $this->http);
    }

    public function topic(): TopicAsync
    {
        return new Topic($this->url, $this->http);
    }
}
