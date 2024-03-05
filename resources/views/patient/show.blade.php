@extends('layouts.adminlte3', [
    'title' => "Pacientes",
    'header' => "Visualizando Paciente",
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
                        <input disabled name="name" type="text" class="form-control" value="{{$patient->name}}">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input disabled name="email" type="email" class="form-control" value="{{$patient->email}}">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input disabled name="password" type="text" class="form-control" value="{{$patient->password}}">
                    </div>

                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input disabled name="birth_date" type="date" class="form-control" value="{{$patient->birth_date}}">
                    </div>

                    <div class="form-group">
                        <label>Endereço</label>
                        <input disabled name="address" type="text" class="form-control" value="{{$patient->address}}">
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input disabled name="phone" type="text" class="form-control" value="{{$patient->phone}}">
                    </div>

                    <div class="form-group">
                        <label>CPF</label>
                        <input disabled name="cpf" type="text" class="form-control" value="{{$patient->cpf}}">
                    </div>

                    <div class="form-group">
                        <label>Sangue</label>
                        <input disabled name="blood_type" type="text" class="form-control" value="{{$patient->blood_type}}">
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input disabled name="photo" type="url" class="form-control" value="{{$patient->photo}}">
                    </div>

                    <div class="form-group">
                        <label>Plano</label>
                        <input disabled name="health_plan_id" type="text" class="form-control" value="{{\App\Models\HealthPlan::find($patient->health_plan_id)->name}}">
                    </div>

                </div>

                <div class="card-footer">
                    <a  href="{{url()->previous()}}" disabled type="submit" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>

    </div>
@endsection
