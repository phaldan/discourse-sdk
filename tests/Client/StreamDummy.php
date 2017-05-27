<?php

namespace PhALDan\Discourse\Client;

use Psr\Http\Message\StreamInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class StreamDummy implements StreamInterface
{
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
}
