<?php

namespace MikeyBeLike\BackpackIntlTelInput;

use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'mikeybelike';
    protected $packageName = 'intl-tel-input-backpack';
    protected $commands = [];
}
