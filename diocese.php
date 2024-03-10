<?php include 'header.php' ?>

<div class="content" id="content">
    <div class="row">
        <h3>Diocese</h3>
        <div class="col-md-2">
            <select class="form-select" id="minha-diocese" name="minha-diocese">
                <option value="0" selected>Minha diocese</option>
                <option value="1">Outra diocese</option>
            </select>
        </div>
        <div class="col-md-2" id="div-outra-diocese" style="display: none;">
            <select class="form-select" id="outra-diocese" name="outra-diocese">
                <option selected value="0">Selecione outra diocese</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" id="pegar-nucleo"><i class='bx bx-search-alt'></i></button>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="table-dioceses" class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do Núcleo</th>
                    <th>Setor</th>
                    <th>Paróquia</th>
                    <th style="text-align:center">Funções</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-nucleo" tabindex="-1" aria-labelledby="modal-nucleo-label" aria-hidden="true">
        <form id="edit-nucleo" method="$_POST" action="editar_nucleo.php">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal-nucleo-label">Dados do Núcleo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome-nucleo" class="col-form-label">Nome do Núcleo</label>
                            <input type="text" class="form-control desabilitar" id="nome-nucleo" name="nome-nucleo">
                        </div>
                        <div class="mb-3">
                            <label for="paroquia-nucleo" class="col-form-label">Paróquia do Núcleo</label>
                            <input type="text" class="form-control desabilitar" id="paroquia-nucleo"
                                name="paroquia-nucleo">
                        </div>
                        <div class="mb-3">
                            <label for="endereco-nucleo" class="col-form-label">Endereço do Núcleo</label>
                            <input type="text" class="form-control desabilitar" id="endereco-nucleo"
                                name="endereco-nucleo">
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input desabilitar" value="1" type="checkbox" role="switch"
                                    id="nucleo-ativo" name="nucleo-ativo">
                                <label class="form-check-label" for="nucleo-ativo">Nucleo Ativo</label>
                                <input type="hidden" name="id-nucleo" id="id-nucleo">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table-coordenadores" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Cordenação</th>
                                        <th>Tempo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary desabilitar">Salvar alterações</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-excluir-coordenador" tabindex="-1"
        aria-labelledby="modal-excluir-coordenador-label" aria-hidden="true">
        <div class="modal-dialog">
            <form method="_POST" action="remover_coordenacao.php" id="form-remover-coordenacao">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal-excluir-coordenador-label">Remover coordenador</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que gostaria de remover o usuario da coordenação?
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="remover-usuario" name="remove-usuario">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="diocese.js"></script>
<?php include 'footer.php'?>