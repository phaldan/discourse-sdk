<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\HttpDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Categories
 */
class CategoriesTest extends TestCase
{
    /**
     * @test
     */
    public function successGetList(): void
    {
        $client = $this->createGetClient();
        $target = new Categories($client);
        $this->assertNull($target->list()->wait());
        $this->assertSame(Categories::URL_GET_LIST, $client->path);
    }

    /**
     * @test
     */
    public function successGetListLimitToSecondLevel(): void
    {
        $client = $this->createGetClient();
        $target = new Categories($client);
        $this->assertNull($target->list([Categories::OPTION_PARENT_CATEGORY => 1337])->wait());
        $path = Categories::URL_GET_LIST.'?'.Categories::OPTION_PARENT_CATEGORY.'=1337';
        $this->assertSame($path, $client->path);
    }

    /**
     * @test
     */
    public function successGetSingle(): void
    {
        $client = $this->createGetClient();
        $target = new Categories($client);
        $this->assertNull($target->single(1337)->wait());
        $this->assertSame(sprintf(Categories::URL_GET_SINGLE, 1337), $client->path);
    }

    /**
     * @test
     */
    public function successGetSingleBySlug(): void
    {
        $client = $this->createGetClient();
        $target = new Categories($client);
        $this->assertNull($target->singleBySlug('welcome')->wait());
        $this->assertSame(sprintf(Categories::URL_GET_SINGLE, 'welcome'), $client->path);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $client = new class() extends HttpDummy {
            public $path;
            public $json;

            public function post(string $path, array $json): PromiseInterface
            {
                $this->path = $path;
                $this->json = $json;

                return parent::get($path);
            }
        };
        $target = new Categories($client);
        $category = $this->createCategory('Welcome', 'FF00FF', '00FF00');
        $this->assertNull($target->create($category)->wait());
        $this->assertSame(Categories::URL_CREATE, $client->path);
        $this->assertSame($category, $client->json);
    }

    public function createCategory(string $name, string $color, string $textColor): array
    {
        return [
            Categories::ATTR_NAME => $name,
            Categories::ATTR_COLOR => $color,
            Categories::ATTR_TEXT_COLOR => $textColor,
        ];
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $client = new class() extends HttpDummy {
            public $path;
            public $json;

            public function put(string $path, array $json): PromiseInterface
            {
                $this->path = $path;
                $this->json = $json;

                return parent::get($path);
            }
        };
        $target = new Categories($client);
        $category = $this->createCategory('Welcome', 'FF00FF', '00FF00');
        $this->assertNull($target->update(1337, $category)->wait());
        $this->assertSame(sprintf(Categories::URL_UPDATE, 1337), $client->path);
        $this->assertSame($category, $client->json);
    }

    private function createGetClient()
    {
        return new class() extends HttpDummy {
            public $path;

            public function get(string $path): PromiseInterface
            {
                $this->path = $path;

                return parent::get($path);
            }
        };
    }
}
