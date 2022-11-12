function logout() {
    var url = window.location.href + 'api/logout';

    fetch(url)
        .then(response => response.json())
        .then(result => {
            window.location.href = window.location.href
        })
        .catch(err => {
            console.error('Falha ao recuperar informações', err);
        });
}

function listar_agentes() {
    var url = window.location.href + 'api/listar_agentes';

    fetch(url)
        .then(response => response.json())
        .then(result => {
            var row_agentes = '';
            for (key in result) {
                value = result[key]
                row_agentes += `
                <tr>
                <td>${value.id}</td>
                <td>${value.nome}</td>
                <td>${value.status}</td>
                <td>${value.tipo_usuario}</td>
                </tr>
                `
            }
            document.getElementById('lista-agentes').innerHTML = row_agentes
        })
        .catch(err => {
            console.error('Falha ao recuperar informações', err);
        });
}

function cadastrar_agente() {
    var url = window.location.href + 'api/cadastrar_agente';
    const formNovoAgente = document.getElementById("form-novo-agente");
    let data = new FormData(formNovoAgente);

    fetch(url, {
        method: 'post',
        body: data
    })
        .then(response => response.json())
        .then(result => {
            console.log(result)
            if (result.errors) {
                for (key in result.errors) {
                    value = result.errors[key]
                    document.getElementById(key).classList.add('is-invalid');
                    document.getElementById(key + '-feedback').innerHTML = value;
                }
            } else if (result.success) {
                document.getElementById('msg').innerHTML = result.success;
                formNovoAgente.reset();
                let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('modalNovoAgente'))
                modal.hide();
            }
        })
        .catch(err => {
            console.error('Falha ao recuperar informações', err);
        });
}