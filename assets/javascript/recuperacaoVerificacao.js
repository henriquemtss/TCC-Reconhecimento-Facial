import  verificacao from './verificarCampos.js';

const enviar = document.querySelector(".enviar")

enviar.addEventListener("click", (e) => {
    const senha = document.querySelectorAll(".inputSenha")
    verificacao(e,senha)
})