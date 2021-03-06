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
class ClassifyTest extends HttpTestCase
{
    /**
     * @depends testStore
     */
    public function testIndex()
    {
        $data = $this->get('classifies');
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }

    public function testStore()
    {
        $data = $this->post('classifies', [
            'type' => 1,
            'name' => '测试分类',
            'grade' => 100,
        ]);
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }

    /**
     * @depends testStore
     */
    public function testUpdate()
    {
        $data = $this->client->put('classifies/1', [
            'type' => 1,
            'name' => '测试分类更新',
            'grade' => 100,
        ]);
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }

    public function testDestroy()
    {
        $data = $this->client->delete('classifies/1');
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }
}
