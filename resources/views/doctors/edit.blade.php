@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>Editar Médico</span>
                    <a href="{{ route('doctors.index') }}" class="btn btn-sm btn-outline-dark">Voltar</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ $doctor->id }}" />
                        @csrf
                        @include('doctors.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection