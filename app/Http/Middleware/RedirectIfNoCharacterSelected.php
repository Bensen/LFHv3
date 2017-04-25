<?php

namespace App\Http\Middleware;

use Closure;
use App\Character;

class RedirectIfNoCharacterSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Character::check()) {
            $request->session()->flash('status', 'Du musst zuerst einen Kämpfer auswählen.');
            return redirect()->route('character.index');
        }

        return $next($request);
    }
}
