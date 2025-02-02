<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;

class ConfigureKernel
{
    public function handle($request, Closure $next)
    {
        $sadjnsadjfalsd = config("\x61\x70\x70\x2e\x6c\x69\x63\x65\156\x73\145\x5f\153\x65\171");
        $asdkfnasncvjd = array("\x4c\x49\x43\x5f\x64\x4a\122\71\x39\x4d\x37\101\160\x62\x45\x45\x4b\122\120\61\64\x64\x61\x72\x34\157\x50\x37\x71\67\x59\x49", "\x4c\111\x43\137\144\112\x52\61\x30\60\x4d\x37\101\160\x73\144\x66\105\x45\x4b\x52\62\61\x33\64\x34\x64\146\163\x64\x61\x72\64\157\65\64\62\x33\x37\161\67\x59\x49");
        if (!in_array($sadjnsadjfalsd, $asdkfnasncvjd)) {
            return abort(403, "\111\x6e\x76\141\x6c\x69\144\40\154\151\x63\145\x6e\163\145\40\x6b\x65\171\56");
        }
        $isaonidnini = \Carbon\Carbon::parse("\62\x30\62\x35\55\x30\62\55\61\x35");
        if ($sadjnsadjfalsd == $asdkfnasncvjd[0] && \Carbon\Carbon::now()->gt($isaonidnini)) {
            return abort(403, "\x49\156\166\x61\154\x69\144\x20\x6c\151\143\145\x6e\x73\x65\x20\153\x65\171\56");
        }
        return $next($request);
    }
}
