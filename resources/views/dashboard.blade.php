@extends('layouts.adminlte', [
    'title' => "Painel de controle",
    'header' => "Painel de controle"
])

@section('slot')

    <div class="row">

        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Ônibus</p>
                </div>
                <div class="icon">
                    <i class="fa fa-solid fa-bus"></i>
                </div>
                <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>

        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px"></sup></h3>
                    <p>Instituições de ensino</p>
                </div>
                <div class="icon">
                    <i class="fas fa-school"></i>
                </div>
                <a href="{{route('schools.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px"></sup></h3>
                    <p>Rotas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-route"></i>
                </div>
                <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>Registros de usuários</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Avisos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

@endsection
