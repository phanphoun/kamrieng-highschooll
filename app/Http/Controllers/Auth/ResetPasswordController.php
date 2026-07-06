<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    /**
     * Step 1 — show the code entry form.
     * The email was stored in the session when the code was sent.
     */
    public function create(Request $request): View|RedirectResponse
    {
        $email = $request->session()->get('password_reset_email');

        if (! $email) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password', ['email' => $email]);
    }

    /**
     * Step 1 — verify the emailed code, then move on to the password form.
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => ['required', 'digits:6'],
        ]);

        $email = $request->session()->get('password_reset_email');

        if (! $email) {
            return redirect()->route('password.request');
        }

        if (! $this->codeIsValid($email, $request->code)) {
            return back()->withErrors(['code' => 'The reset code is invalid or has expired. Please request a new one.']);
        }

        $request->session()->put('password_reset_code', $request->code);

        return redirect()
            ->route('password.new')
            ->with('status', 'Code verified. Now choose your new password.');
    }

    /**
     * Step 2 — show the new password form (only with a verified code).
     */
    public function edit(Request $request): View|RedirectResponse
    {
        $email = $request->session()->get('password_reset_email');
        $code = $request->session()->get('password_reset_code');

        if (! $email || ! $code || ! $this->codeIsValid($email, $code)) {
            return redirect()->route('password.reset');
        }

        return view('auth.set-new-password');
    }

    /**
     * Step 2 — set the user's new password.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $email = $request->session()->get('password_reset_email');
        $code = $request->session()->get('password_reset_code');

        $user = ($email && $code && $this->codeIsValid($email, $code))
            ? User::where('email', $email)->first()
            : null;

        if (! $user) {
            return redirect()
                ->route('password.request')
                ->withErrors(['email' => 'Your reset session has expired. Please request a new code.']);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        DB::table('password_reset_tokens')->where('email', $email)->delete();
        $request->session()->forget(['password_reset_email', 'password_reset_code']);

        event(new PasswordReset($user));

        return redirect()
            ->route('login')
            ->with('status', 'Your password has been reset. Please log in with your new password.');
    }

    /**
     * The code matches the stored hash and has not expired.
     */
    private function codeIsValid(string $email, string $code): bool
    {
        $record = DB::table('password_reset_tokens')->where('email', $email)->first();
        $expires = config('auth.passwords.users.expire', 60);

        return $record
            && Carbon::parse($record->created_at)->addMinutes($expires)->isFuture()
            && Hash::check($code, $record->token);
    }
}
