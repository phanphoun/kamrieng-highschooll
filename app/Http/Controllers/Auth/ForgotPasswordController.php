<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetCode;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    /**
     * Show the forgot-password form.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Email a 6-digit password reset code to the given user.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => "We can't find a user with that email address."]);
        }

        // Don't allow re-sending a code more than once per minute.
        $existing = DB::table('password_reset_tokens')->where('email', $user->email)->first();
        $throttle = config('auth.passwords.users.throttle', 60);

        if ($existing && Carbon::parse($existing->created_at)->addSeconds($throttle)->isFuture()) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Please wait a minute before requesting another code.']);
        }

        $code = (string) random_int(100000, 999999);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['token' => Hash::make($code), 'created_at' => now()],
        );

        Mail::to($user->email)->send(new PasswordResetCode($code));

        $request->session()->put('password_reset_email', $user->email);

        return redirect()
            ->route('password.reset')
            ->with('status', 'Please check your email and paste the reset code.');
    }
}
