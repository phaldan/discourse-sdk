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
        return $this;
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
        return $this;
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
        return $this;
    }

    public function withAddedHeader($name, $value): ResponseInterface
    {
        return $this;
    }

    public function withoutHeader($name): ResponseInterface
    {
        return $this;
    }

    public function getBody(): StreamInterface
    {
        return new class() implements StreamInterface {
            public function __toString(): string
            {
                return '';
            }

            public function close(): void
            {
            }

            public function detach()
            {
            }

            public function getSize(): ?int
            {
                return null;
            }

            public function tell(): int
            {
                return 1337;
            }

            public function eof(): bool
            {
                return true;
            }

            public function isSeekable(): bool
            {
                return true;
            }

            public function seek($offset, $whence = SEEK_SET): void
            {
            }

            public function rewind(): void
            {
            }

            public function isWritable(): bool
            {
                return true;
            }

            public function write($string): int
            {
                return 42;
            }

            public function isReadable(): bool
            {
                return true;
            }

            public function read($length): string
            {
                return '';
            }

            public function getContents(): string
            {
                return '';
            }

            public function getMetadata($key = null): ?array
            {
                return null;
            }
        };
    }

    public function withBody(StreamInterface $body): ResponseInterface
    {
        return $this;
    }
}
