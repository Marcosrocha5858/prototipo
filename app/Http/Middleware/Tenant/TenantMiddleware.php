<?php

namespace App\Http\Middleware\Tenant;

use App\Models\Company;
use App\Tenant\ManageTenant;
use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $manege = app(ManageTenant::class);
        $company = $this->getCompany($request->getHost());

    //    if(!$company && $request->url() != route('404.tenant')){
    //     return redirect()->route('404.tenant');

    //    }else if($request->url() != route('404.tenant') && !$manege->domainsIsmain())
    //    {
    //     $manege->seConnection($company);

    // }

       return $next($request);
    }



    public function getCompany($host){

           return Company::where('domain', $host)->first();

    }
}
