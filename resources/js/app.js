import './bootstrap';

// import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();

import "bootstrap";

let likeBtns = document.getElementsByClassName("like-btn");

for (let likeBtn of likeBtns) {
    likeBtn.addEventListener('click', () => {
        let method = likeBtn.getAttribute("method");
        let request = new XMLHttpRequest();
        request.onload = function () {
            console.log(this.responseText);
            if (this.status === 200) {
                likeBtn.setAttribute('method', method === 'like' ? 'unlike' : 'like');
                likeBtn.firstElementChild.classList.toggle('bi-heart');
                likeBtn.firstElementChild.classList.toggle('bi-heart-fill');
                likeBtn.parentElement.parentElement.previousElementSibling.innerHTML = this.responseText;
            }
        }
        request.open("GET", "/like/" +
            (method === "like"
                ? "store/"
                : "destroy/")
            + likeBtn.getAttribute("comment")
        );
        request.send();
    });
}
