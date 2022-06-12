<?php

declare(strict_types=1);

namespace packages\Web\Auth;

use App\Exceptions\InvalidUserException;
use DB;
use packages\Domain\User;
use packages\Web\Auth\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    /**
     * @param string $serviceId 外部サービスID
     * @return User
     */
    public function findByServiceId(string $serviceId): User
    {
        $user = DB::table('users')
            ->where('service_id', $serviceId)
            ->first();

        if (is_null($user)) {
            throw new InvalidUserException;
        }

        return new User(
            $user->id,
            $user->name
        );
    }
}
