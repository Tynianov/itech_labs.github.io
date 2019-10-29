$(function () {
    $('#button').click(function () {
        $('.scriptcode').each(function () {
            let div = $(this);
            if (div.find('button').length === 0)
                div.prepend(`<button id='copy_code' onclick='copyCode(this)'>Copy</button>`);
        });
    });
});

function copyCode(item) {
    let code = item.parentNode.lastElementChild;
    let text = code.lastElementChild.outerText;
    console.log(text);
    navigator.clipboard.writeText(text)
        .then(() => {
            console.log('Успешно скопировано');
        })
        .catch(err => {
            console.log('Что-то пошло не так: ', err);
        })
}