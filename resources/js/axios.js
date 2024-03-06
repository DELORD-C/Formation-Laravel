let form = document.getElementById("comment_create");
let commentEditBtns = document.getElementsByClassName('comment-edit');

if (form) {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        axios.post(form.getAttribute('action'), {
            body: document.getElementById('body').value
        })
            .then(function (response) {
                if (response.status === 200) {
                    location.reload();
                }
            })
    })
}

if (commentEditBtns) {
    for (let btn of commentEditBtns) {
        btn.addEventListener('click', (e) => {
            handleCommentUpdate(btn)
        })

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && e.target === btn.parentElement.parentElement.firstElementChild.firstElementChild) {
                handleCommentUpdate(btn)
            }
        })
    }
}


function handleCommentUpdate (btn) {
    if (btn.classList.contains('btn-primary')) {
        btn.classList.remove('btn-primary');
        btn.classList.add('btn-success');
        btn.innerHTML = 'Save <i class="bi bi-floppy"></i>'
        btn.parentElement.parentElement.firstElementChild.innerHTML = `<input value="` + btn.parentElement.parentElement.firstElementChild.innerHTML + `">`
    }
    else {
        let newValue = btn.parentElement.parentElement.firstElementChild.firstElementChild.value;
        let url = btn.dataset.action;
        btn.innerHTML = '<img style="width: 20px" src="https://i.gifer.com/origin/34/34338d26023e5515f6cc8969aa027bca.gif">'
        axios.post(url, {
            body: newValue
        })
            .then(function (response) {
                btn.classList.remove('btn-success');
                btn.classList.add('btn-primary');
                btn.innerHTML = 'Edit <i class="bi bi-pencil-square"></i>';
                btn.parentElement.parentElement.firstElementChild.innerHTML = newValue;
            })
    }
}
