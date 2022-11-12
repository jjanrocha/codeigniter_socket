function lista_status() {
    var url = window.location.href + 'api/listar_status';

    fetch(url)
        .then(response => response.json()) // retorna uma promise
        .then(result => {
            var select = document.getElementById('status_id')
            for (key in result.todos_status) {
                value = result.todos_status[key]
                let option = document.createElement('option');
                option.value = value.id
                option.innerHTML = value.status
                if (option.value == result.status_agente[0].id) {
                    option.selected = true
                }
                select.appendChild(option);
            }
        })
        .catch(err => {
            console.error('Falha ao recuperar informações', err);
        });
}

function alterar_status() {
    event.preventDefault();
    let data = new FormData(document.getElementById("form-alterar-status"));
    var url = window.location.href + 'api/alterar_status';

    fetch(url, {
        method: 'post',
        body: data
    })
        .then(response => response.json())
        .then(result => {
            document.getElementById('msg').innerHTML = result.mensagem;
        })
        .catch(err => {
            console.error('Falha ao recuperar informações', err);
        });
}

function logout() {
    var url = window.location.href + 'api/logout';

    fetch(url)
        .then(response => response.json()) // retorna uma promise
        .then(result => {
            window.location.href = window.location.href
        })
        .catch(err => {
            console.error('Falha ao recuperar informações', err);
        });
}

function teste_cli() {
    var url = window.location.href + 'proc_test';
    
    fetch(url)
        .then(response => response.json())
        .then(result => {
            console.log(result)
        })
        .catch(err => {
            console.error('Falha ao recuperar informações', err);
        });
}