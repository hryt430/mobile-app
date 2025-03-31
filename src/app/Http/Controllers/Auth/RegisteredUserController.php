<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'profile_picture'=> ['required', 'image', 'mimes:jpeg,png,jpg','max:10240','extensions:jpg,png'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // ユーザーがアップロードした画像ファイルを取り出し、安全なファイル名に変換して保存します。
        $file = $request->file('profile_picture');
        $md5Filename = md5($file->getClientOriginalName() . $request->username . Carbon::now()->toDateString()) . '.' . $file->getClientOriginalExtension();
        $profilePicturePath = $request->file('profile_picture')->store(sprintf('/users/profiles/profile_pictures/%s',$md5Filename), 'public');

        // ユーザーの作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'profile_path' => $profilePicturePath,
            'password' => Hash::make($request->password),
        ]);
        
        // ユーザーのログイン
        event(new Registered($user));
        Auth::login($user);

        // ダッシュボードにリダイレクト
        return redirect(route('dashboard', absolute: false));
    }
}
