<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomerRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $avatarUrl = $google_user->getAvatar();
            $user = CustomerRegistration::where('google_id', $google_user->getId())->first();
            $slug = Str::slug($google_user->getName());


            if (!$user) {
                $new_user = CustomerRegistration::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'slug' => $slug,

                ]);
                Auth::guard('customer_registrations')->login($new_user);
            } else {
                Auth::guard('customer_registrations')->login($user);
            }


            if (session()->has('intendedURL')) {
                $url = session()->pull('intendedURL');
                return redirect($url);
            }

            return redirect()->route('home')->with("popsuccess", "Login Successfull");

            return redirect()->intended(route('home'))->with("popsuccess", "Login Successfull");
        } catch (\Throwable $th) {
            dd('something went wrong: ' . $th->getMessage(), $th->getTraceAsString());
        }
    }
}
