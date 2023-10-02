<?php

declare(strict_types=1);

namespace Atlance\HttpDoctrineOrmFilter\Test\Acceptance\Filter\Expression;

use Atlance\HttpDoctrineOrmFilter\Test\Acceptance\Filter\AbstractTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * Test a "<" expression with the given HTTP query arguments.
 */
class LessThanTest extends AbstractTestCase
{
    #[DataProvider('dataset')]
    public function test(string $uri, int $count): void
    {
        $this->assertCountByHttpQuery($uri, $count);
    }

    /**
     * @return \Generator<array<int, string|int>>
     */
    public static function dataset(): \Generator
    {
        yield 'single: integer' => [self::LT . '[users_id]=2', 1];
        yield 'single float' => [self::LT . '[cards_balance]=2.70', 2];
        yield 'single: datetime' => [self::LT . '[users_created_at]=2020-01-17 21:50:14', 23];
    }
}
