@include('tenant.includes.alerts')

@csrf

<div class="form-group">
    <input value="{{ $company->name ?? ''}}" class="form-control" type="text" name="name" placeholder="Nome:">
</div>
<div class="form-group">
    <input value="{{ $company->domain ?? '' }}" class="form-control" type="text" name="domain" placeholder="Domínio:">
</div>
<div class="form-group">
    <input value="{{ $company->db_database ?? ''}}" class="form-control" type="text" name="db_database" placeholder="Database:">
</div>
<div class="form-group">
    <input value="{{ $company->db_hostname ?? ''}}" class="form-control" type="text" name="db_hostname" placeholder="Host:">
</div>
<div class="form-group">
    <input value="{{ $company->db_username ?? '' }}" class="form-control" type="text" name="db_username" placeholder="Usuário:">
</div>
<div class="form-group">
    <input value="" class="form-control" type="password" name="" placeholder="Senha:">
</div>

@if (!isset($company))
<div class="form-group">
    <label for="create_database">
        <input type="checkbox" name="create_database" checked>
        Criar banco de dados?
    </label>
</div>
@endif

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
