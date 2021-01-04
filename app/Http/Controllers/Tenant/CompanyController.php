<?php

namespace App\Http\Controllers\Tenant;

use App\Events\Tenant\CompanyCreated;
use App\Events\Tenant\DatabaseCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;
class CompanyController extends Controller
{

        private $company;
    public function __construct(Company $company)
    {

        $this->company = $company;
    }

    public function index()
    {
        $companies = $this->company->latest()->paginate();

        return view('tenant.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('tenant.companies.create');
    }


    public function store(Request $request)
    {
        // $company = $this->company->create([
        //     'name' => 'Empresa X' . str::random(5),
        //     'domain' =>  str::random(5).'empresalocal.com',
        //     'db_database' => 'tenant_defaul',
        //     'db_hostname' => 'localhost',
        //     'db_username' => 'root',
        //     'db_password' =>''
        // ]);

        // if(false)
        // event(new CompanyCreated($company));
        // else
        //     event(new DatabaseCreated($company));
        // //dd($company);

        // $company = $this->company->create($request->all());

          $company = $this->company->create([
            'name' => $request->name,
            'domain' =>  $request->domain,
            'db_database' => $request->db_database,
            'db_hostname' => $request->db_hostname,
            'db_username' =>  $request->db_username,
            'db_password' =>''
        ]);


        if ($request->has('create_database'))
            event(new CompanyCreated($company));
        else
            event(new DatabaseCreated($company));

        return redirect()
                ->route('company.index')
                ->withSuccess('Cadastro realizado com sucesso!');

    }

    public function show($domain)
    {
        // $company = $this->company->find($id);
        $company = $this->company->where('domain', $domain)->first();

        if (!$company)
            return redirect()->back();

        return view('tenant.companies.show', compact('company'));
    }

    public function edit($domain)
    {
        // $company = $this->company->find($id);
        $company = $this->company->where('domain', $domain)->first();

        if (!$company)
            return redirect()->back();

        return view('tenant.companies.edit', compact('company'));
    }



}
