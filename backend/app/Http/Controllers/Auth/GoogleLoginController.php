<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use packages\Web\Auth\AuthRequest;
use packages\Web\Auth\AuthUsecaseInterface;

class GoogleLoginController extends Controller
{
    public function index()
    {
        Auth::logout();
        return view('login');
    }

    public function getGoogleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

    // TODO:
    // ・ユーザーがDBにないときの制御（repositoryとcontrollerのview表示)
    // ・認証処理はここでいいのか？
    public function authGoogleCallback(Request $request, AuthUsecaseInterface $authInteractor)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $authRequest = new AuthRequest($googleUser->getId());
        $authResponse = $authInteractor->handle($authRequest);

        $user = $authResponse->getUser();
        Auth::loginUsingId($user->getId());

        return redirect(route('recipes'));
    }
}
