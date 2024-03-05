@extends('layouts.adminlte3', [
    'title' => "Nova Consulta",
    'header' => "Agende sua Consulta",
])

@section('slot')
    <div class="col-md-12">

        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Informações de cadastro</h3>
            </div>

            <form action="{{route('surgery.store')}}" method="POST">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Paciente</label>
                        <input disabled name="patient_id" type="text" class="form-control" value="{{ \App\Models\Patient::find($patientId)->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="specialty_id">Tipo de Cirurgia</label>
                        <select name="specialty_id" class="form-control" required>
                            <option value="">Selecione uma Especialidade</option>
                            @foreach($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <script>
                        //Objetivo era dinamicamente limitar os médicos à especialidade escolhida

                        document.getElementById('specialty_id').addEventListener('change', function() {
                            var specialtyId = this.value;

                            // Ocultar todos
                            var doctorOptions = document.querySelectorAll('#doctor_id option');
                            doctorOptions.forEach(function(option) {
                                option.style.display = 'none';
                            });

                            // Mostra apenas os médicos da especialidade
                            var doctorsWithSpecialty = document.querySelectorAll('.specialty-' + specialtyId);
                            doctorsWithSpecialty.forEach(function(option) {
                                option.style.display = 'block';
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label for="doctor_id">Médico(a) Responsável</label>
                        <select id="doctor_id" name="doctor_id" class="form-control" required>
                            <option value="">Selecione um Médico(a)</option>
                            @foreach($doctors as $doctor)
                                <option class="doctor-option specialty-{{ $doctor->specialty_id }}" value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start">Data e Hora</label>
                        <input id="start" name="start" type="datetime-local" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Valor Final</label>
                        <input disabled name="value" type="text" class="form-control" value="{{ $specialty->value * (1 - (\App\Models\Patient::find($patientId)->healthplan->discount)) }}">
                    </div>

                </div>

                <div class="card-footer text-md-right">
                    <a  href="{{url()->previous()}}" disabled type="submit" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>

    </div>
@endsection
