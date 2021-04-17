<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ !empty($patient) ? $patient->name : old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ !empty($patient) ? $patient->email : old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Celular</label>

    <div class="col-md-6">
        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ !empty($patient) ? $patient->phone_number : old('phone_number') }}" required>
        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>

    <div class="col-md-6">
        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ !empty($patient) ? $patient->cpf : old('cpf') }}" required autocomplete="cpf">

        @error('cpf')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="date_birthday" class="col-md-4 col-form-label text-md-right">Data de nascimento</label>

    <div class="col-md-6">
        <input id="date_birthday" type="date" class="form-control @error('date_birthday') is-invalid @enderror" name="date_birthday" value="{{ !empty($patient) ? $patient->date_birthday : old('date_birthday') }}" />

        @error('date_birthday')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="gender" class="col-md-4 col-form-label text-md-right">Gênero</label>
    @php
        $gender = '';
        if (old('gender')) {
            $gender = old('gender');
        } elseif (!empty($patient)) {
            $gender = $patient->gender;
        }
    @endphp
    <div class="col-md-6">
        <select name="gender" id="gender" class="form-control">
            <option value="M" {{ $gender == "M" ? 'selected="selected"' : '' }}>Masculino</option>
            <option value="F" {{ $gender == "F" ? 'selected="selected"' : '' }}>Feminino</option>
        </select>
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ !empty($patient) ? 'Salvar' : 'Cadastrar' }}
        </button>
    </div>
</div>
@include('utils.scripts')
