<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = array(\App\Http\Middleware\TrustProxies::class, \Illuminate\Http\Middleware\HandleCors::class, \App\Http\Middleware\PreventRequestsDuringMaintenance::class, \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, \App\Http\Middleware\TrimStrings::class, \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, \App\Http\Middleware\ConfigureKernel::class);
    protected $middlewareGroups = array("\167\x65\x62" => array(\App\Http\Middleware\EncryptCookies::class, \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, \Illuminate\Session\Middleware\StartSession::class, \Illuminate\View\Middleware\ShareErrorsFromSession::class, \App\Http\Middleware\VerifyCsrfToken::class, \Illuminate\Routing\Middleware\SubstituteBindings::class), "\141\x70\151" => array("\x74\x68\x72\157\164\x74\x6c\x65\72\x61\160\151", \Illuminate\Routing\Middleware\SubstituteBindings::class));
    protected $routeMiddleware = array("\x61\x75\164\x68" => \App\Http\Middleware\Authenticate::class, "\x61\x75\164\150\56\x62\141\x73\x69\x63" => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class, "\x61\165\x74\150\x2e\163\145\163\163\x69\157\156" => \Illuminate\Session\Middleware\AuthenticateSession::class, "\x63\141\x63\150\x65\x2e\150\145\141\x64\x65\162\163" => \Illuminate\Http\Middleware\SetCacheHeaders::class, "\x63\141\156" => \Illuminate\Auth\Middleware\Authorize::class, "\147\165\x65\x73\x74" => \App\Http\Middleware\RedirectIfAuthenticated::class, "\160\x61\x73\x73\167\157\x72\144\56\143\157\x6e\x66\x69\162\155" => \Illuminate\Auth\Middleware\RequirePassword::class, "\163\151\147\x6e\145\144" => \App\Http\Middleware\ValidateSignature::class, "\x74\x68\162\157\x74\x74\x6c\145" => \Illuminate\Routing\Middleware\ThrottleRequests::class, "\166\145\x72\x69\146\151\x65\144" => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class);
}
