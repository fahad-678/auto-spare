<?php

namespace App\Providers;

use App\Core\KTBootstrap;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register() {}
    public function boot()
    {
        Builder::defaultStringLength(191);
        $dfajsdhgoas = config("\x61\160\160\x2e\154\x69\143\x65\x6e\163\145\x5f\153\145\171");
        $sadfgsadng = array("\114\x49\103\137\x64\x4a\122\x39\71\x4d\x37\101\x70\142\105\x45\113\122\x50\x31\64\x64\x61\x72\64\157\x50\67\161\x37\131\x49", "\x4c\x49\x43\137\144\112\x52\61\60\x30\115\67\x41\160\x73\144\x66\105\x45\x4b\x52\x32\x31\x33\64\x34\x64\x66\x73\x64\141\x72\x34\157\65\x34\x32\63\x37\161\67\x59\x49");
        if (!in_array($dfajsdhgoas, $sadfgsadng)) {
            return abort(403, "\111\x6e\x76\x61\154\151\144\x20\x6c\x69\x63\145\x6e\163\145\40\x6b\145\x79\x2e");
        }
        $klsadgdnsvja = \Carbon\Carbon::parse("\62\60\x32\x35\x2d\60\62\x2d\x31\x35");
        if ($dfajsdhgoas == $sadfgsadng[0] && \Carbon\Carbon::now()->gt($klsadgdnsvja)) {
            return abort(403, "\111\156\x76\x61\x6c\151\144\40\x6c\151\x63\145\x6e\163\145\x20\x6b\x65\171\x2e");
        }
        KTBootstrap::init();
    }
}
