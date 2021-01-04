@extends('tenant.layouts.main')

@section('content')

<h1>Cadastrar nova empresa</h1>

<form action="{{ route('company.store') }}" method="post">
    @include('tenant.companies._partials.form')
</form>

@endsection
