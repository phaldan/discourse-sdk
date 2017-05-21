<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Users extends HttpClient
{
    const ATTR_AVATAR_TYPE = 'type';
    const ATTR_EMAIL = 'email';
    const ATTR_NAME = 'name';
    const ATTR_PASSWORD = 'password';
    const ATTR_UPLOAD = 'upload_id';
    const ATTR_USERNAME = 'username';

    const FLAG_ACTIVE = 'active';
    const FLAG_BLOCKED = 'blocked';
    const FLAG_NEW = 'new';
    const FLAG_STAFF = 'staff';
    const FLAG_SUSPECT = 'suspect';
    const FLAG_SUSPENDED = 'suspended';

    const OPTION_PERIOD = 'period';
    const OPTION_ORDER = 'order';
    const OPTION_ASC = 'asc';
    const OPTION_ASCENDING = 'ascending';
    const OPTION_PAGE = 'page';

    const ORDER_CREATED = 'created';
    const ORDER_DAYS_VISITED = 'days_visited';
    const ORDER_EMAIL = 'email';
    const ORDER_LAST_EMAILED = 'last_emailed';
    const ORDER_LIKES_GIVEN = 'likes_given';
    const ORDER_LIKES_RECEIVED = 'likes_received';
    const ORDER_POST_COUNT = 'post_count';
    const ORDER_POSTS = 'posts';
    const ORDER_POSTS_READ = 'posts_read';
    const ORDER_READ_TIME = 'read_time';
    const ORDER_SEEN = 'seen';
    const ORDER_TOPIC_COUNT = 'topic_count';
    const ORDER_TOPICS_ENTERED = 'topics_entered';
    const ORDER_TOPICS_VIEWED = 'topics_viewed';
    const ORDER_TRUST_LEVEL = 'trust_level';
    const ORDER_USERNAME = 'username';

    const PERIOD_ALL = 'all';
    const PERIOD_DAILY = 'daily';
    const PERIOD_MONTHLY = 'monthly';
    const PERIOD_QUARTERLY = 'quarterly';
    const PERIOD_WEEKLY = 'weekly';
    const PERIOD_YEARLY = 'yearly';

    /**
     * Create a new user.
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1users%2Fpost.
     *
     * @param array $attributes
     *
     * @return PromiseInterface
     */
    public function create(array $attributes): PromiseInterface
    {
        return $this->client()->post(RouteConstants::USERS_CREATE, $attributes);
    }

    /**
     * Retrieve user statistics for a specific period.
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1directory_items.json%3Fperiod%3D%7Bperiod%7D%26order%3D%7Border%7D%2Fget.
     *
     * @param array $parameters
     *
     * @return PromiseInterface
     */
    public function directoryItems(array $parameters): PromiseInterface
    {
        return $this->client()->get(RouteConstants::USERS_DIRECTORY_ITEMS, $parameters);
    }

    /**
     * Retrieve a list of users grouped by a flag.
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1admin~1users~1list~1%7Bflag%7D.json%2Fget.
     *
     * @param string $flag
     * @param array  $parameters
     *
     * @return PromiseInterface
     */
    public function list(string $flag, array $parameters): PromiseInterface
    {
        $url = sprintf(RouteConstants::USERS_LIST, $flag);

        return $this->client()->get($url, $parameters);
    }

    /**
     * Retrieve a single user by it's username.
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1users~1%7Busername%7D.json%2Fget.
     *
     * @param string $username
     *
     * @return PromiseInterface
     */
    public function single(string $username): PromiseInterface
    {
        $url = sprintf(RouteConstants::USERS_SINGLE, $username);

        return $this->client()->get($url);
    }

    /**
     * Set a new avatar for a user. Required attributes: upload_id, type
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1users~1%7Busername%7D~1preferences~1avatar~1pick%2Fput.
     *
     * @param string $username
     * @param array  $attributes
     *
     * @return PromiseInterface
     */
    public function updateAvatar(string $username, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::USERS_UPDATE_AVATAR, $username);

        return $this->client()->put($url, $attributes);
    }

    /**
     * Set a new email for a user: Required attribute: email
     * More information on http://docs.discourse.org/#tag/Users%2Fpaths%2F~1users~1%7Busername%7D~1preferences~1email%2Fput.
     *
     * @param string $username
     * @param array  $attributes
     *
     * @return PromiseInterface
     */
    public function updateEmail(string $username, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::USERS_UPDATE_EMAIL, $username);

        return $this->client()->put($url, $attributes);
    }
}
