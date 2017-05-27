<?php

namespace PhALDan\Discourse\Client;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class RequestDummy implements RequestInterface
{
    public function getProtocolVersion(): string
    {
        return '';
    }

    public function withProtocolVersion($version): RequestInterface
    {
        return new self();
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function hasHeader($name): bool
    {
        return true;
    }

    public function getHeader($name): array
    {
        return [];
    }

    public function getHeaderLine($name): string
    {
        return '';
    }

    public function withHeader($name, $value): RequestInterface
    {
        return new self();
    }

    public function withAddedHeader($name, $value): RequestInterface
    {
        return new self();
    }

    public function withoutHeader($name): RequestInterface
    {
        return new self();
    }

    public function getBody(): StreamInterface
    {
        return new StreamDummy();
    }

    public function withBody(StreamInterface $body): RequestInterface
    {
        return new self();
    }

    public function getRequestTarget(): string
    {
        return '';
    }

    public function withRequestTarget($requestTarget): RequestInterface
    {
        return new self();
    }

    public function getMethod(): string
    {
        return '';
    }

    public function withMethod($method): RequestInterface
    {
        return new self();
    }

    public function getUri(): UriInterface
    {
        return new UriDummy();
    }

    public function withUri(UriInterface $uri, $preserveHost = false): RequestInterface
    {
        return new self();
    }
}
