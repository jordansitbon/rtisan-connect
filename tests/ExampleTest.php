<?php

it('can connect', function () {
    expect(\VendorName\Skeleton\Facades\RtisanConnect::tryConnect())->toBeTrue();
});
