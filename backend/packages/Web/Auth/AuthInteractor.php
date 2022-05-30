<?php

declare(strict_types=1);

namespace packages\Web\Auth;

use packages\Web\Auth\AuthRepositoryInterface;
use packages\Web\Auth\AuthRequest;
use packages\Web\Auth\AuthResponse;
use packages\Web\Auth\AuthUsecaseInterface;

class AuthInteractor implements AuthUsecaseInterface
{
    protected AuthRepositoryInterface $authRepositoryInterface;

    public function __construct(
        AuthRepositoryInterface $authRepositoryInterface
    ) {
        $this->authRepositoryInterface = $authRepositoryInterface;
    }

    /**
     * @param AuthRequest
     * @return AuthResponse
     */
    public function handle(AuthRequest $request): AuthResponse
    {
        $user = $this->authRepositoryInterface->findByServiceId($request->getServiceId());
        return new AuthResponse($user);
    }
}
