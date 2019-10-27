$(function () {
    const workers = {};

    $('button').click(function () {
        const name = $('#last_name').val();
        const date = $('#work_time').val();

        if (!name || !date) {
            alert('Все поля должны быть заполнены!')
        } else if (name in workers) {
            alert('Такой работник уже существует')
        } else {
            workers[name] = date;
            $('#worker_list').append(`<li> ${name} : ${date}</li>`);
            set_exp();
        }
        clear_input();

    });

    function clear_input() {
        $('#last_name').val('');
        $('#work_time').val('');
    }

    function set_exp() {
        let avg_exp = 0;
        let workers_amount = 0;

        for (const i in workers) {
            if (workers.hasOwnProperty(i)) {
                const temp = workers[i].split('-');
                workers_amount++;
                let worker_date = new Date(temp[0], temp[1]-1, temp[2]);
                avg_exp += getDayDelta(worker_date);
            }
        }
        $('#experience').text(`${parseInt(avg_exp/workers_amount)} Дней`);
    }

    function getDayDelta(worker_date) {
        let today = new Date(), delta;
        today.setHours(0);
        today.setMinutes(0);
        today.setSeconds(0);
        today.setMilliseconds(0);

        delta = today - worker_date ;

        return Math.ceil(delta / 1000 / 60 / 60 / 24);
    }

});
