<?php

namespace PhALDan\Discourse\Client;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Test dummy of PSR7 ResponseInterface.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class ResponseDummy implements ResponseInterface
{
    public function getStatusCode(): int
    {
        return 0;
    }

    public function withStatus($code, $reasonPhrase = ''): ResponseInterface
    {
        return new self();
    }

    public function getReasonPhrase(): string
    {
        return '';
    }

    public function getProtocolVersion(): string
    {
        return '';
    }

    public function withProtocolVersion($version): ResponseInterface
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

    public function withHeader($name, $value): ResponseInterface
    {
        return new self();
    }

    public function withAddedHeader($name, $value): ResponseInterface
    {
        return new self();
    }

    public function withoutHeader($name): ResponseInterface
    {
        return new self();
    }

    public function getBody(): StreamInterface
    {
        return new StreamDummy();
    }

    public function withBody(StreamInterface $body): ResponseInterface
    {
        return new self();
    }
}
