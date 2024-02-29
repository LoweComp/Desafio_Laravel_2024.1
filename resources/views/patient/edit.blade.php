@extends('layouts.adminlte', [
    'title' => "Pacientes",
    'header' => "Editando Paciente",
])

@section('slot')
    <div class="col-md-12">

        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Informações de cadastro</h3>
            </div>

            <form action="{{route('patient.update', $patient->id)}}" method="post">
                @method('PUT')
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Nome</label>
                        <input name="name" type="text" class="form-control" value="{{$patient->name}}">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input name="email" type="email" class="form-control" value="{{$patient->email}}">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input name="password" type="text" class="form-control" value="{{$patient->password}}">
                    </div>

                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input name="birth_date" type="date" class="form-control" value="{{$patient->birth_date}}">
                    </div>

                    <div class="form-group">
                        <label>Endereço</label>
                        <input name="address" type="text" class="form-control" value="{{$patient->address}}">
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input name="phone" type="text" class="form-control" value="{{$patient->phone}}">
                    </div>

                    <div class="form-group">
                        <label>CPF</label>
                        <input name="cpf" type="text" class="form-control" value="{{$patient->cpf}}">
                    </div>

                    <div class="form-group">
                        <label>Tipo Sanguineo</label>
                        <select name="blood_type" class="form-control" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input name="photo" type="url" class="form-control" value="{{$patient->photo}}">
                    </div>

                    <div class="form-group">
                        <label for="health_plan_id">Plano de Saúde</label>
                        <select name="health_plan_id" class="form-control" required>
                            <option value="">Selecione um Plano</option>
                            @foreach($healthplans as $healthplan)
                                <option value="{{ $healthplan->id }}">{{ $healthplan->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="card-footer text-md-right">
                    <a  href="{{url()->previous()}}" disabled type="submit" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>

    </div>
@endsection
