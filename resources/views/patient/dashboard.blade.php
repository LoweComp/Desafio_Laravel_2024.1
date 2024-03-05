@extends('layouts.adminlte3', [
    'title' => "Painel de controle",
    'header' => "Painel de controle"
])

@section('slot')

    <div class="row">

        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>10</h3>
                    <p>Consultas</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-user-nurse"></i>
                </div>
                <a href="{{route('surgery.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>

        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>30<sup style="font-size: 20px"></sup></h3>
                    <p>Cadastro</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="{{route('patient.editByID')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>4<sup style="font-size: 20px"></sup></h3>
                    <p>Planos de Saúde</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <a href="{{route('patient.dashboard')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>4</h3>
                    <p>Especialidades</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-clipboard"></i>
                </div>
                <a href="{{route('patient.dashboard')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>1</h3>
                    <p>Emails</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <a href="{{route('mail.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

@endsection
