@extends('layouts.adminlte', [
    'title' => "Doctors",
    'header' => "Editando Médico(a)",
])

@section('slot')
    <div class="col-md-12">

        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Informações de cadastro</h3>
            </div>

            <form action="{{route('doctor.update', $doctor->id)}}" method="post">
                @method('PUT')
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Nome</label>
                        <input name="name" type="text" class="form-control" value="{{$doctor->name}}">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input name="email" type="email" class="form-control" value="{{$doctor->email}}">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input name="password" type="text" class="form-control" value="{{$doctor->password}}">
                    </div>

                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input name="birth_date" type="date" class="form-control" value="{{$doctor->birth_date}}">
                    </div>

                    <div class="form-group">
                        <label>Endereço</label>
                        <input name="address" type="text" class="form-control" value="{{$doctor->address}}">
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input name="phone" type="text" class="form-control" value="{{$doctor->phone}}">
                    </div>

                    <div class="form-group">
                        <label>CPF</label>
                        <input name="cpf" type="text" class="form-control" value="{{$doctor->cpf}}">
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input name="photo" type="url" class="form-control" value="{{$doctor->photo}}">
                    </div>

                    <div class="form-group">
                        <label>Período</label>
                        <select name="working_period" class="form-control" required>
                            <option value="Diurno">Diurno</option>
                            <option value="Noturno">Noturno</option>
                            <option value="Integral">Integral</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>CRM</label>
                        <input name="crm" type="text" class="form-control" value="{{$doctor->CRM}}">
                    </div>

                    <div class="form-group">
                        <label for="specialty_id">Especialidade</label>
                        <select name="specialty_id" class="form-control" required>
                            <option value="">Selecione uma especialidade</option>
                            @foreach($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
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
