<?php

it('can connect', function () {
    expect(\Rtisan\Connect\Facades\RtisanConnect::tryConnect())->toBeTrue();
});
