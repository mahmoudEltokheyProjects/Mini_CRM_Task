<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if "language" is "Arabic"
        if( config('locale.status') == true )
        {
            /* ++++++++++++++++++ use "session" to change "language" ++++++++++++++++++ 
                1- Check if there are 'key' ==  'locale' in session 
                   And if there are 'key' == 'locale' in 'languages' array in 'config/locale.php'
            */
            if( Session::has('locale') && array_key_exists( Session::get('locale') , config('locale.languages') ) )
            {
                // Set "locale" key [ in 'config/app.php' file ] with the value of "local" session
                App::setlocale(Session::get('locale'));
            }
            else
            {
                // Get "language" Which "user" select
                $userLanguages = preg_split('/[,;]/',$request->server('HTTP_ACCEPT_LANGUAGE'));
                foreach($userLanguages as $language)
                {
                    if( array_key_exists( $language , config('locale.languages') ) )
                    {   
                        // Set "locale" key [ in 'config/app.php' file ] with the value of "$language"
                        App::setLocale($language);
                        // 
                        setlocale( LC_TIME , config('locale.languages')[$language][2] );
                        // 
                        Carbon::setlocale( config('locale.languages')[$language][0] );
                        // language direction
                        if( config('locale.languages')[$language][2] )
                        {
                            \session(['lang-rtl'=>true]);   
                        }
                        else
                        {
                            Session::forget('lang-rtl');
                        }
                        break;
                    }
                }
            }
        } 



        return $next($request);
    }
}
