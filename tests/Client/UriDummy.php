<?php

namespace PhALDan\Discourse\Client;

use Psr\Http\Message\UriInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class UriDummy implements UriInterface
{
    public function __toString(): string
    {
        return '';
    }

    public function getScheme(): string
    {
        return '';
    }

    public function getAuthority(): string
    {
        return '';
    }

    public function getUserInfo(): string
    {
        return '';
    }

    public function getHost(): string
    {
        return '';
    }

    public function getPort(): ?int
    {
        return null;
    }

    public function getPath(): string
    {
        return '';
    }

    public function getQuery(): string
    {
        return '';
    }

    public function getFragment(): string
    {
        return '';
    }

    public function withScheme($scheme): UriInterface
    {
        return new self();
    }

    public function withUserInfo($user, $password = null): UriInterface
    {
        return new self();
    }

    public function withHost($host): UriInterface
    {
        return new self();
    }

    public function withPort($port): UriInterface
    {
        return new self();
    }

    public function withPath($path): UriInterface
    {
        return new self();
    }

    public function withQuery($query): UriInterface
    {
        return new self();
    }

    public function withFragment($fragment): UriInterface
    {
        return new self();
    }
}
