<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class DimensionTest extends HttpTestCase
{
    public function testIndex()
    {
        $data = $this->get('dimensions');
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }

    public function testStore()
    {
        $data = $this->post('dimensions', [
            'classify_id' => 1,
            'review' => '测试维度评价',
            'score' => 100,
            'review_description' => '测试维度评价说明',
            'user_id' => 1,
        ]);
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }

    public function testUpdate()
    {
        $data = $this->client->put('dimensions/1', [
            'classify_id' => 1,
            'review' => '测试评价维度',
            'score' => 100,
            'review_description' => '测试评价维度说明',
            'user_id' => 1,
        ]);
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }

    public function testDestroy()
    {
        $data = $this->client->delete('dimensions/1');
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }
}
