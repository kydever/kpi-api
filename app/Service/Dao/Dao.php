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
namespace App\Service\Dao;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use Han\Utils\Service;

class Dao extends Service
{
    protected function isLoader(int $userId): bool
    {
        if (! di(UserDao::class)->isLeader($userId)) {
            throw new BusinessException(ErrorCode::OPERATION_INVALID);
        }

        return true;
    }
}
