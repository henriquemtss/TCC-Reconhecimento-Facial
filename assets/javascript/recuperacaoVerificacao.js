const enviar = document.querySelector(".enviar")
enviar.addEventListener("click", (e) => {
    const senha = document.querySelectorAll(".inputSenha")
    const senha1 = document.querySelector(".first").value
    const senha2 = document.querySelector(".second").value
    const span = document.querySelector(".mensagem")

    for (let i = 0; i < senha.length; i++) {
        if (senha[i].value.length == 0) {
            e.preventDefault()
            senha[i].classList.remove("sucess")
            senha[i].classList.add("erro")
            span.textContent = "Preencha os campos!"
        }else{
            senha[i].classList.add("sucess")
            senha[i].classList.remove("erro")
        }
    }

    if (senha1 !== senha2) {
        e.preventDefault()
        senha.forEach(element => {
            element.classList.add("erro")
            element.classList.remove("sucess")
        });
        console.log("Entrou")
        span.textContent = "Os campos devem ser iguais!"
    }
})