
//recebendo os inputs com a classe form__input
const inputs = document.querySelectorAll(".box__input");

const submit = document.querySelector("#entrar");


//criando condição ao apertar o botao de enviar
//ao apertar acionara a função para verificar se todos os campos da respectiva classe foram preenchidos


submit.addEventListener('click',function verificacao(event){
    //verificando os inputs se estão preenchidos
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value.length == 0) {
            event.preventDefault()
            inputs[i].classList.remove("sucess")
            inputs[i].classList.add("erro")
            submit.classList.add("notSubmit")
        }
        else{
            inputs[i].classList.remove("erro")
            inputs[i].classList.add("sucess")
        }
    }

})
