@extends('layouts.adminlte', [
    'title' => "Planos de saúde",
    'header' => "Visualizando plano de saúde",
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
                        <input disabled name="name" type="text" class="form-control" value="{{$healthPlan->name}}">
                    </div>

                    <div class="form-group">
                        <label>Descrição</label>
                        <input disabled name="email" type="email" class="form-control" value="{{$healthPlan->description}}">
                    </div>

                    <div class="form-group">
                        <label>Desconto</label>
                        <input disabled name="phone" type="text" class="form-control" value="{{$healthPlan->discount}}">
                    </div>

                </div>

                <div class="card-footer">
                    <a  href="{{url()->previous()}}" disabled type="submit" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>

    </div>
@endsection
