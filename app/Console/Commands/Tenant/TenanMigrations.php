<?php

namespace App\Console\Commands\Tenant;

use App\Models\Company;
use App\Tenant\ManageTenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TenanMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrations {id?} {--refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Migrations Tenants';

    private $tenant;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ManageTenant $tenant)
    {
        parent::__construct();

        $this->tenant =$tenant;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;

        if($id =$this->argument('id')){

            $company = Company::find($id);

            if($company)
            $this->execCommmand($company);

             return;
        }

        $companies = Company::all();
        foreach ($companies as $company)
        {
               $this->execCommmand($company);
        }


    }


    public function execCommmand(Company $company)
    {

        $comand = $this->option('refresh') ? 'migrate:refresh' : 'migrate';
        $this->tenant->seConnection($company);

        $this->info("Connection {$company->name}");

            Artisan::call($comand, [
                    '--force' => true,
                    '--path' => '/database/migrations/tenant/'

            ]);

            $this->info("End Connection {$company->name}");

            $this->info("------------------");
    }
}
