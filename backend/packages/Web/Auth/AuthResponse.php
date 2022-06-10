<?php

declare(strict_types=1);

namespace packages\Web\Auth;

use Illuminate\Http\Response;
use packages\Domain\User;

class AuthResponse extends Response
{
    private User $user;

    public function __construct(
        User $user
    ){
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
