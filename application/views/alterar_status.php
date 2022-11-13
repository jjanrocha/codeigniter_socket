<table id="table-cabecalho">
    <tbody>
        <tr>
            <td>
                <span id="titulo-cabecalho">Status Agente</span>
                <a id="btn-logout" onclick="logout()">Logout</a>
            </td>
        </tr>
    </tbody>
</table>

<hr id="hr-cabecalho">

<div class="mt-2">
    Bem-vindo(a), <?php echo $_SESSION['usuario_nome'] ?>.
</div>

<?php echo $_SESSION['usuario_nome'] ?>

<div class="d-inline-flex col-md-4 col-form-label mt-2">
    <form id="form-alterar-status" class="row">
        <div class="col-auto">
            <label for="status_id" class="col-form-label">Status:</label>
        </div>
        <div class="col-auto">
            <select id="status_id" name="status_id" class="form-select"></select>
        </div>
        <div class="col-auto">
            <button class="btn btn-secondary" onclick="alterar_status()">Alterar</button>
        </div>

    </form>
</div>
<div id="msg"></div>
<div id="root"></div>
<script src="assets/js/agente.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        lista_status()

        var host = 'ws://192.168.15.6:12345/websockets.php';
        var socket = new WebSocket(host);

        socket.onopen = function(e) {
            console.log('Conectado no websocket com sucesso.')
        }

        socket.onmessage = function(e) {
            document.getElementById('root').innerHTML = e.data;
        };

        socket.onclose = function(e) {
            console.log('Conexão com websocket encerrada.')
        }

        socket.onerror = function(e) {
            console.log('Houve um erro na conexão com websocket.')
        }
    });
</script>