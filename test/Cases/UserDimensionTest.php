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
class UserDimensionTest extends HttpTestCase
{
    public function testIndex()
    {
        $data = $this->get('user/dimensions');
        $this->assertNotEmpty($data);
        $this->assertSame(0, $data['code']);
    }
}
