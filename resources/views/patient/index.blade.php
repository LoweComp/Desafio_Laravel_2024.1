@extends('layouts.adminlte', [
    'title' => "Pacientes",
    'header' => "Lista de Pacientes",
    'addButton' => [
        'title' => "Adicionar Paciente",
        'href' => route('patient.create')
]
])

@push('scripts')
    <script src="{{asset("/js/destroyModal.js")}}"></script>
@endpush

@section('slot')
    <!-- Modal de exclusão -->
    <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir este registro?
                    <br>
                    Esta ação será <strong>irreversível</strong>.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    <form id="destroyForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" class="btn btn-danger">Sim, excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 350px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>Tipo Sanguíneo</th>
                        <th>Plano</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->name}}</td>
                            <td>{{$patient->phone}}</td>
                            <td>{{$patient->cpf}}</td>
                            <td>{{$patient->blood_type}}</td>
                            <td>{{\App\Models\HealthPlan::find($patient->health_plan_id)->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('patient.show', $patient->id)}}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-warning" href="{{route('patient.edit', $patient->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button onclick="fillModal('patient/{{$patient->id}}')" class="btn btn-danger" data-bs-toggle="modal" data-toggle="modal" data-target="#destroyModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection

