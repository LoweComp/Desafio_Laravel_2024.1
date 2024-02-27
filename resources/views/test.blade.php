@extends('layouts.adminlte', [
    'title' => "Estudantes",
    'header' => "Lista de estudantes",
    'addButton' => [
        'title' => "Adicionar estudante",
        'href' => route('healthplan.create')
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
                    Esta ação será <strong>irreverssível</strong>.
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
                        <th>Instituição Escolar</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                </table>
            </div>

        </div>

    </div>
@endsection

