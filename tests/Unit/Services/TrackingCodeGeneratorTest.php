<?php

use App\Services\TrackingCodeGenerator;

test('tracking code is generated with correct format', function () {
    $generator = new TrackingCodeGenerator();
    $code = $generator->generate();

    expect($code)->toMatch('/^EDU-[A-Z0-9]{6}$/');
});
