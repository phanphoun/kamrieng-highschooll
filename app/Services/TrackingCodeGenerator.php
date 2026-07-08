<?php

namespace App\Services;

use App\Models\EnrollmentApplication;
use Illuminate\Support\Str;

class TrackingCodeGenerator
{
    /**
     * Generate a unique tracking code.
     */
    public function generate(): string
    {
        do {
            $code = 'EDU-'.strtoupper(Str::random(6));
        } while (EnrollmentApplication::where('tracking_code', $code)->exists());

        return $code;
    }
}
