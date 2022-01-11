<?php

declare(strict_types=1);

namespace App\Http\Trait;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait ApiBaseTrait
{
    public function get(string $url, array $params = []): JsonResponse
    {
        $request = Request::create(
            $url,
            'GET',
            $params
        );
        return Route::dispatch($request);
    }

    public function post(string $url, array $params = [])
    {
        $request = Request::create(
            $url,
            'POST',
            $params
        );
        return Route::dispatch($request);
    }
}
