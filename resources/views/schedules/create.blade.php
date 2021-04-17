@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>Criar Agendamento</span>
                    @if (Route::has('schedules.index'))
                        <a href="{{ route('schedules.index') }}" class="btn btn-sm btn-outline-dark">Voltar</a>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Route::has('schedules.store'))
                    <form method="POST" action="{{ route('schedules.store') }}">
                    @endif
                        @csrf
                        @include('schedules.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
