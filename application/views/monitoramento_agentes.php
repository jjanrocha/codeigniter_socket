<table id="table-cabecalho">
    <tbody>
        <tr>
            <td class="align-middle">
                <span id="titulo-cabecalho">Monitoramento</span>
                <a id="btn-logout" onclick="logout()">Logout</a>
            </td>
        </tr>
    </tbody>
</table>

<hr id="hr-cabecalho">

<div class="mt-2">
    Bem-vindo(a), <?php echo $_SESSION['usuario_nome'] ?>.
    <div style="float:right">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovoAgente">
            Novo Agente
        </button>
    </div>
</div>

<table id="table-agentes" class="table mt-2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Status</th>
            <th>Tipo de Usuário</th>
        </tr>
    </thead>
    <tbody id="lista-agentes"></tbody>
</table>

<span id="msg"></span>

<div class="modal fade" id="modalNovoAgente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo Agente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="POST" id="form-novo-agente">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-form-label" for="nome-agente">Nome:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nome-agente" name="nome-agente">
                            <span id="nome-agente-feedback" class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="col-form-label" for="usuario-agente">Usuário:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="usuario-agente" name="usuario-agente">
                            <span id="usuario-agente-feedback" class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="col-form-label" for="tipo-usuario-id">Tipo de Usuário:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" name="tipo-usuario-id" id="tipo-usuario-id">
                                <option value="">Selecione</option>
                                <option value="1">Agente</option>
                                <option value="2">Supervisor</option>
                            </select>
                            <span id="tipo-usuario-id-feedback" class="invalid-feedback"></span>
                        </div>
                    </div>
                </form>
                <span id="msgModalNovoAgente"></span>
                <span id="msgModalNovoAgente-feedback"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="cadastrar_agente()">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/supervisor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        listar_agentes()

        document.querySelectorAll('input').forEach(item => {
            item.addEventListener('keyup', event => {
                var input = item.getAttribute('id')
                document.getElementById(input).classList.remove('is-invalid');
            })
        })

        document.querySelectorAll('select').forEach(item => {
            item.addEventListener('click', event => {
                var input = item.getAttribute('id')
                document.getElementById(input).classList.remove('is-invalid');
            })
        })
    });
</script>