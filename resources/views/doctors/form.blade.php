<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ !empty($doctor) ? $doctor->name : old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ !empty($doctor) ? $doctor->email : old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Telefone</label>

    <div class="col-md-6">
        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ !empty($doctor) ? $doctor->phone_number : old('phone_number') }}" required>
        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="crm" class="col-md-4 col-form-label text-md-right">CRM</label>
    <div class="col-md-6">
        <input id="crm" type="text" class="form-control @error('crm') is-invalid @enderror" name="crm" value="{{ !empty($doctor) ? $doctor->crm : old('crm') }}" required autocomplete="crm">
        @error('crm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="specialty" class="col-md-4 col-form-label text-md-right">Especialização</label>
    <div class="col-md-6">
        <input id="specialty" type="text" class="form-control @error('specialty') is-invalid @enderror" name="specialty" value="{{ !empty($doctor) ? $doctor->specialty : old('specialty') }}" required autocomplete="specialty" autofocus>
        @error('specialty')
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
        } elseif (!empty($doctor)) {
            $gender = $doctor->gender;
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
            {{ !empty($doctor) ? 'Salvar' : 'Cadastrar' }}
        </button>
    </div>
</div>
@include('utils.scripts')
