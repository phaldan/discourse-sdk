<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Topics extends HttpClient
{
    const ATTR_CATEGORY = 'category_id';
    const ATTR_NOTIFICATION_LEVEL = 'notification_level';
    const ATTR_STATUS = 'status';
    const ATTR_STATUS_TYPE = 'status_type';
    const ATTR_TIME = 'time';
    const ATTR_TIMESTAMP = 'timestamp';
    const ATTR_TIMEZONE_OFFSET = 'timezone_offset';
    const ATTR_TITLE = 'title';
    const ATTR_USERNAME = 'username';

    const FLAG_ALL = 'all';
    const FLAG_DAILY = 'daily';
    const FLAG_MONTHLY = 'monthly';
    const FLAG_QUARTERLY = 'quarterly';
    const FLAG_WEEKLY = 'weekly';
    const FLAG_YEARLY = 'yearly';

    const OPTION_ASCENDING = 'ascending';
    const OPTION_ORDER = 'order';

    const ORDER_ACTIVITY = 'activity';
    const ORDER_CATEGORY = 'category';
    const ORDER_CREATED = 'created';
    const ORDER_DEFAULT = 'default';
    const ORDER_LIKES = 'likes';
    const ORDER_OP_LIKES = 'op_likes';
    const ORDER_POSTERS = 'posters';
    const ORDER_POSTS = 'posts';
    const ORDER_VIEWS = 'views';

    const STATUS_ARCHIVED = 'archived';
    const STATUS_CLOSED = 'closed';
    const STATUS_PINNED_GLOBALLY = 'pinned_globally';
    const STATUS_VISIBLE = 'visible';

    /**
     * Create a new timed topic.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D~1status_update%2Fpost.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function createScheduled(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_CREATE_SCHEDULED, $id);

        return $this->client()->post($url, $attributes);
    }

    /**
     * Delete an existing topic.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D.json%2Fdelete.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function delete(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_DELETE, $id);

        return $this->client()->delete($url);
    }

    /**
     * Create an invite for a user to a topic. Required attribute: username
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Btopic_id%7D~1invite%2Fpost.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function invite(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_INVITE, $id);

        return $this->client()->post($url, $attributes);
    }

    /**
     * Retrieve a list of the latest topics.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1latest.json%2Fget.
     *
     * @param array $parameter
     *
     * @return PromiseInterface
     */
    public function latest(array $parameter = []): PromiseInterface
    {
        return $this->client()->get(RouteConstants::TOPICS_LATEST, $parameter);
    }

    /**
     * Set a new notification level for a topic. Required attribute: notification_level
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D~1notifications%2Fpost.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function notification(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_NOTIFICATIONS, $id);

        return $this->client()->post($url, $attributes);
    }

    /**
     * Retrieve a single topic with posts.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D.json%2Fget.
     *
     * @param int $id
     *
     * @return PromiseInterface
     */
    public function single(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_SINGLE, $id);

        return $this->client()->get($url);
    }

    /**
     * Retrieve top rated topics.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1top.json%2Fget.
     *
     * @return PromiseInterface
     */
    public function top(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::TOPICS_TOP);
    }

    /**
     * Retrieve a list of top topics filtered by specific time period.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1top~1%7Bflag%7D.json%2Fget.
     *
     * @param string $flag
     *
     * @return PromiseInterface
     */
    public function topFiltered(string $flag): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_TOP_FILTERED, $flag);

        return $this->client()->get($url);
    }

    /**
     * Update an existing topic.
     * More information on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bslug%7D~1%7Bid%7D.json%2Fput.
     *
     * @param string $slug
     * @param int    $id
     * @param array  $attribute
     *
     * @return PromiseInterface
     */
    public function update(string $slug, int $id, array $attribute): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_UPDATE, $slug, $id);

        return $this->client()->put($url, $attribute);
    }

    /**
     * Update an existing timed topic.
     * More informtion on http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D~1change-timestamp%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function updateScheduled(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_UPDATE_SCHEDULED, $id);

        return $this->client()->put($url, $attributes);
    }

    /**
     * Update status of an existing topic.
     * More information on .http://docs.discourse.org/#tag/Topics%2Fpaths%2F~1t~1%7Bid%7D~1status%2Fput.
     *
     * @param int   $id
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function updateStatus(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPICS_UPDATE_STATUS, $id);

        return $this->client()->put($url, $attributes);
    }
}
