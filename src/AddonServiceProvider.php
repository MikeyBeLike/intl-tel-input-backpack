<?php

namespace MikeyBeLike\BackpackIntlTelInput;

use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'mikey-be-like';
    protected $packageName = 'backpack-intl-tel-input';
    protected $commands = [];
}
