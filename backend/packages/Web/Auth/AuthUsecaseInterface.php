<?php

declare(strict_types=1);

namespace packages\Web\Auth;

use packages\Web\Auth\AuthRequest;
use packages\Web\Auth\AuthResponse;

interface AuthUsecaseInterface
{
    /**
     * @param AuthRequest
     * @return AuthResponse
     */
    public function handle(AuthRequest $request): AuthResponse;
}
