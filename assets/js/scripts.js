$(document).ready(function() {

    $('#taskList').DataTable({
        'pageLength': 3
    });

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        $(`#loginHelp`).html('')
        $(`#passwordHelp`).html('')

        $.post(url, data, (res) => {
            console.log(res);

            if (res.status === 'success') {
                location.href = '/admin'

            } else {
                for (message of res.message) {
                    for (i in message) {
                        $(`#${i}`).html(message[i])
                    }
                }
            }
        })
    })

    $('#taskForm').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        $(`#usernameHelp`).html('')
        $(`#emailHelp`).html('')
        $(`#taskHelp`).html('')
        console.log(data);


        $.post(url, data, (res) => {
            console.log(res);

            if (res.status === 'success') {
                alert('Задача добавлено / изменено');
                location.href = document.referrer

            } else {
                for (message of res.message) {
                    for (i in message) {
                        $(`#${i}`).html(message[i])
                    }
                }
            }
        })
    })

})