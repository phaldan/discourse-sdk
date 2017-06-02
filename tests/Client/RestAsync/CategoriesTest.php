<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Categories
 */
class CategoriesTest extends HttpTestCase
{
    /**
     * @var Categories
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Categories(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successGetList(): void
    {
        $this->assertNull($this->target->list()->wait());
        $this->assertHttpGet(RouteConstants::CATEGORY_LIST);
    }

    /**
     * @test
     */
    public function successGetListLimitToSecondLevel(): void
    {
        $parameters = [Categories::OPTION_PARENT_CATEGORY => 1337];
        $this->assertNull($this->target->list($parameters)->wait());
        $this->assertHttpGet(RouteConstants::CATEGORY_LIST.'?'.Categories::OPTION_PARENT_CATEGORY.'=1337');
    }

    /**
     * @test
     */
    public function successGetSingle(): void
    {
        $this->assertNull($this->target->single(1337)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::CATEGORY_SINGLE, 1337));
    }

    /**
     * @test
     */
    public function successGetSingleBySlug(): void
    {
        $this->assertNull($this->target->singleBySlug('welcome')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::CATEGORY_SINGLE, 'welcome'));
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $category = $this->createCategory('Welcome', 'FF00FF', '00FF00');
        $this->assertNull($this->target->create($category)->wait());
        $this->assertHttpPost(RouteConstants::CATEGORY_CREATE, $category);
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
        $category = $this->createCategory('Welcome', 'FF00FF', '00FF00');
        $this->assertNull($this->target->update(1337, $category)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::CATEGORY_UPDATE, 1337), $category);
    }
}
