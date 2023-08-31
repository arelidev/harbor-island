window.addEventListener("load", function () {
    const modals = document.querySelectorAll(".modal");
    const modalButtons = document.querySelectorAll(".modal-button");
    const modalClose = document.querySelectorAll(".close");

    modalButtons.forEach((modalButton) => {
        modalButton.addEventListener("click", function (e) {
            e.preventDefault();
            console.log("#" + this.dataset.targetModal)
            document.querySelector("#" + this.dataset.targetModal).style.display = "block";
        })
    })

    modalClose.forEach((closeButton) => {
        closeButton.addEventListener("click", function (e) {
            e.preventDefault();

            modals.forEach((modal) => {
                modal.style.display = "none"
            })
        })
    })

    window.addEventListener("click", function (event) {
        if (event.target.classList.contains("modal")) {
            modals.forEach((modal) => {
                modal.style.display = "none"
            })
        }
    });
})