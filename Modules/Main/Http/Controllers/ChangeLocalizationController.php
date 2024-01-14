<?php

namespace Modules\Main\Http\Controllers;

class ChangeLocalizationController
{
    public function __invoke($locale)
    {
        session()->put('website-locale', $locale);

        return redirect()->back();
    }
}
