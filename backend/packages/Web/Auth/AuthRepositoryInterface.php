<?php

declare(strict_types=1);

namespace packages\Web\Auth;

interface AuthRepositoryInterface
{
    public function findByServiceId(string $serviceId);
}
