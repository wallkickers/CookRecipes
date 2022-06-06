<?php

declare(strict_types=1);

namespace packages\Web\Auth;

use Illuminate\Http\Request;

class AuthRequest extends Request
{
    /**
     * @var string
     */
    private $serviceId;

    public function __construct(
        string $serviceId
    ){
        $this->serviceId = $serviceId;
    }

    /**
     * @return string
     */
    public function getServiceId(): string
    {
        return $this->serviceId;
    }
}
