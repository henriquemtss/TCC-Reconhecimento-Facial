const buttonPesquisa = document.querySelector(".consulta__botao")
const tableColumns = document.querySelector(".resultado__campos")

//../Controller/ConsultaController.php
buttonPesquisa.addEventListener("click", () => {
    const inputPesquisa = document.querySelector("#consulta__pesquisa").value
    if (inputPesquisa.length > 0) {
        $.ajax({
            url: "http://localhost/tcc-reconhecimento/TCC-Reconhecimento-Facial/Controller/ConsultaController.php",
            method: "POST",
            data: { rm: inputPesquisa },
            datatype: "JSON"
        }).then((aluno) => {
            if (aluno.length > 6) {
                const alunoJson = JSON.parse(aluno)
                console.log(alunoJson)
                const tbody = document.querySelector("tbody")
                tbody.innerHTML = "";
                tbody.appendChild(tableColumns)

                const tr = document.createElement("tr")
                tr.classList.add("resultado__puxado")

                //recebendo as informações do aluno
                const trNome = document.createElement("td")
                trNome.classList.add("puxado__nome")
                trNome.textContent = alunoJson.Nome
                tr.appendChild(trNome)

                const trCurso = document.createElement("td")
                trCurso.classList.add("puxado__curso")
                trCurso.textContent = alunoJson.Curso
                tr.appendChild(trCurso)

                const trStatus = document.createElement("td")
                trStatus.classList.add("puxado__status")
                trStatus.textContent = alunoJson.Status
                tr.appendChild(trStatus)

                tbody.appendChild(tr)
            } else {
                window.alert("RM inválido!")
            }
        })
    } else {
        window.alert("Digite um RM!")
    }

})