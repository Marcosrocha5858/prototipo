<?php


namespace App\Tenant;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ManageTenant
{


public function seConnection(Company $company)
{

    DB::purge('tenant');

    config()->set('database.connections.tenant.host', $company->db_hostname);
    config()->set('database.connections.tenant.database', $company->db_database);
    config()->set('database.connections.tenant.username', $company->db_username);
    config()->set('database.connections.tenant.password', $company->db_password);

    DB::reconnect('tenant');

    Schema::connection('tenant')->getConnection()->reconnect();
}

public function domainsIsmain()
{

       return  request()->getHost() == config('tenant.domain_main');
}


}
