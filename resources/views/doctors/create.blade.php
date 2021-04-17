@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>Cadastrar Médico</span>
                    @if (Route::has('doctors.index'))
                        <a href="{{ route('doctors.index') }}" class="btn btn-sm btn-outline-dark">Voltar</a>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Route::has('doctors.store'))
                    <form method="POST" action="{{ route('doctors.store') }}">
                    @endif
                        @csrf
                        @include('doctors.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
