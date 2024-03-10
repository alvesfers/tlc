<?php include 'header.php'?>
<div class="content" id="content">
    <div class="row">
        <h3>Núcleos</h3>
        <div class="col-md-2">
            <select class="form-select" id="meu-nucleo" name="meu-nucleo">
                <option value="0" selected>Meu núcleo</option>
                <option value="1">Outro núcleo</option>
            </select>
        </div>
        <div class="col-md-2" id="div-outro-nucleo" style="display: none;">
            <select class="form-select" id="outro-nucleo" name="outro-nucleo">
                <option selected value="0">Selecione outro núcleo</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" id="pegar-nucleo"><i class='bx bx-search-alt'></i></button>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="table-dirigentes" class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do Núcleo</th>
                    <th>Função</th>
                    <th>Secretarias</th>
                    <th style="text-align:center">Funções</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-dirigente" tabindex="-1" aria-labelledby="modal-dirigente-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-dirigente-label">Dados do Dirigente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-dirigente" method="$_POST" action="editar_dirigente.php">
                        <div class="mb-3">
                            <label for="nome-dirigente" class="col-form-label">Nome do Dirigente</label>
                            <input type="text" class="form-control desabilitar" id="nome-dirigente">
                        </div>
                        <div class="mb-3">
                            <label for="login-dirigente" class="col-form-label">Login</label>
                            <input type="text" class="form-control desabilitar" id="login-dirigente">
                        </div>
                        <div class="mb-3">
                            <label for="data-tlc" class="col-form-label">Data do tlc</label>
                            <input type="text" class="form-control desabilitar" id="data-tlc">
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input desabilitar" value="1" type="checkbox" role="switch" id="usuario-ativo">
                                <label class="form-check-label" for="usuario-ativo">Está ativo</label>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="table-secretarias" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Secretaria</th>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-excluir-coordenador" tabindex="-1" aria-labelledby="modal-excluir-coordenador-label" aria-hidden="true">
        <div class="modal-dialog">
            <form method="_POST" action="remover_coordenacao.php" id="form-remover-coordenacao">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal-excluir-coordenador-label">Tirar coordenador</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que gostaria de remover a coordenação do
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="remover-usuario" name="remove-usuario">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="nucleo.js"></script>
<?php include 'footer.php'?>