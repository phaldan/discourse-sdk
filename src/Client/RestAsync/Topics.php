<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Topics extends HttpClient implements TopicAsync
{
    public function createScheduled(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_CREATE_SCHEDULED, $id);

        return $this->client()->post($url, $attributes);
    }

    public function delete(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_DELETE, $id);

        return $this->client()->delete($url);
    }

    public function invite(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_INVITE, $id);

        return $this->client()->post($url, $attributes);
    }

    public function latest(array $parameters = []): PromiseInterface
    {
        return $this->client()->get(RouteConstants::TOPIC_LATEST, $parameters);
    }

    public function notification(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_NOTIFICATIONS, $id);

        return $this->client()->post($url, $attributes);
    }

    public function single(int $id): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_SINGLE, $id);

        return $this->client()->get($url);
    }

    public function top(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::TOPIC_TOP);
    }

    public function topFiltered(string $flag): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_TOP_FILTERED, $flag);

        return $this->client()->get($url);
    }

    public function update(string $slug, int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_UPDATE, $slug, $id);

        return $this->client()->put($url, $attributes);
    }

    public function updateScheduled(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_UPDATE_SCHEDULED, $id);

        return $this->client()->put($url, $attributes);
    }

    public function updateStatus(int $id, array $attributes): PromiseInterface
    {
        $url = sprintf(RouteConstants::TOPIC_UPDATE_STATUS, $id);

        return $this->client()->put($url, $attributes);
    }
}
