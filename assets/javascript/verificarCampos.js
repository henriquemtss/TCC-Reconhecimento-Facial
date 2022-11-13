const verificacao = (event,campos) =>{
    //verificando os inputs se estão preenchidos
    for (let i = 0; i < campos.length; i++) {
        if (campos[i].value.length == 0) {
            console.log(campos[i])
            event.preventDefault()
            campos[i].classList.remove("sucess")
            campos[i].classList.add("erro")
        }
        else{
            campos[i].classList.remove("erro")
            campos[i].classList.add("sucess")
        }
    }

    return campos;
}

export default verificacao;
