import  verificacao from './verificarCampos.js';

const alunos = document.querySelectorAll(".inputAluno")
console.log(alunos)
const funcionarios = document.querySelectorAll(".inputFuncionario")

const enviarAluno = document.querySelector(".enviarAluno");
const enviarFuncionario = document.querySelector(".enviarFuncionario");

enviarAluno.addEventListener('click', function(e){
    verificacao(e,alunos)
})

enviarFuncionario.addEventListener('click', function(e){
    verificacao(e,funcionarios)
})