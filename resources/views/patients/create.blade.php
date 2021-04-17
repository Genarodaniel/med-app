@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>Cadastrar Paciente</span>
                    @if (Route::has('patients.index'))
                        <a href="{{ route('patients.index') }}" class="btn btn-sm btn-outline-dark">Voltar</a>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Route::has('patients.store'))
                    <form method="POST" action="{{ route('patients.store') }}">
                    @endif
                        @csrf
                        @include('patients.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
