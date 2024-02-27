@extends('layouts.adminlte', [
    'title' => "Especialidades",
    'header' => "Adicionando Especialidade",
])

@section('slot')
    <div class="col-md-12">

        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Informações de cadastro</h3>
            </div>

            <form action="{{route('specialty.store')}}" method="POST">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Nome</label>
                        <input name="name" type="text" class="form-control" value="{{$input['name'] ?? ""}}" required>
                    </div>

                    <div class="form-group">
                        <label>Descrição</label>
                        <input name="description" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Valor</label>
                        <input name="value" type="text" class="form-control" required>
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
