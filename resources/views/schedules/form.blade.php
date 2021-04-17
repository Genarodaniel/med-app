<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Médico</label>
    <div class="col-md-6">
        @php
            $doctor_id = $schedule->doctor_id ?? 0;
        @endphp
        <select name="doctor_id" id="doctor_id" class="form-control">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ $doctor->id == $doctor_id ? 'selected="selected"' : '' }}> {{$doctor->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Paciente</label>
    <div class="col-md-6">
        @php
            $patient_id = $schedule->patient_id ?? 0;
        @endphp
        <select name="patient_id" id="patient_id" class="form-control">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}" {{ $patient->id == $patient_id ? 'selected="selected"' : '' }}> {{$patient->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="schedule" class="col-md-4 col-form-label text-md-right">Data de Agendamento</label>
    @php
        $dateSchedule = \Carbon\Carbon::now()->format('Y-m-d\TH:i');
        if (old('schedule')) {
            $dateSchedule = old('schedule');
        } elseif (!empty($schedule)) {
            $dateSchedule = $schedule->schedule->format('Y-m-d\TH:i');
        }
    @endphp
    <div class="col-md-6">
        <input id="schedule" type="datetime-local" class="form-control @error('schedule') is-invalid @enderror" name="schedule" value="{{ $dateSchedule }}" />

        @error('schedule')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ !empty($schedule) ? 'Salvar' : 'Cadastrar' }}
        </button>
    </div>
</div>
@include('utils.scripts')
