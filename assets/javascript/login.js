import  verificacao from './verificarCampos.js';

const inputs = document.querySelectorAll(".input");
const submit = document.querySelector("#entrar");

submit.addEventListener('click',function(e){
    verificacao(e, inputs)
})