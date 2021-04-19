<?php
/*
 * Project: TogetherPeopleStrong ver.6
 * @author: Aiden Yoshioka
 * Module: Page-Level Security ver. 2
 * Date: 04/18/21
 * Synopsis: This handles page level security, making sure that if the user is not logged in and tries to enter pages that aren't login, register, or admin_login, they get taken to the login page for users,
 *          and the admin login for admins. Later it was added for the rest api to not be affected by this, so the api would work.
 * References: This is referenced everywhere when a new url is being loaded.
 */
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Closure;

class SecurityMiddleware
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
        //step 1 
        $path = $request->path();
        //Log::info("Entering security in middleware at path: " . $path);
        //Log::info("Security session variable: " . session()->get('security'));
        
        //echo "<script> console.log('"."security: " . session()->get('security') . "');</script>";
        
        //step 2:run the business rules that check the URI that you do not need to secure
        $secure_check = true;
        if($request->is("admin") || $request->is("login") || $request->is('register') || $request->is('admin_login') || str_contains($request->url(),"rest")){
            $secure_check = false;
        }else{
            
        }
        //Log::info($secure_check ? "Security Middleware in handle... Needs Security" : "Security Middleware in handle... no security required");
       
        //step 3: if no security required, redirect
        if(session()->get('security')!= null){
            if(str_contains(session()->get('security'),"admin")){
                return $next($request);
            }
        }
        else if(Auth::user() != null){
            if(str_contains($request->url(),"admin"))
                return back();
            return $next($request);
        }
        if($secure_check){
            //Log:info("Leaving security middleware in handle doing a redirect to login");
            if(str_contains($request->url(),"admin"))
                return redirect('/admin');
            return redirect('/login');
        }
        return $next($request);
    }
}
