@extends('layouts.adminlte', [
    'title' => "Especialidades",
    'header' => "Visualizando Especialidade",
])

@section('slot')
    <div class="col-md-12">

        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Informações cadastradas</h3>
            </div>

            <form>
                <div class="card-body">

                    <div class="form-group">
                        <label>Nome</label>
                        <input disabled name="name" type="text" class="form-control" value="{{$specialty->name}}">
                    </div>

                    <div class="form-group">
                        <label>Descrição</label>
                        <input disabled name="description" type="text" class="form-control" value="{{$specialty->description}}">
                    </div>

                    <div class="form-group">
                        <label>Valor</label>
                        <input disabled name="value" type="text" class="form-control" value="{{$specialty->value}}">
                    </div>

                </div>

                <div class="card-footer">
                    <a  href="{{url()->previous()}}" disabled type="submit" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>

    </div>
@endsection
