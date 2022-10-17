

function functionAlert(msg, myYes) {
    if (1+1 == 2) {
        txt = "Dados Enviados com Sucesso!<br><br><br>";
        document.getElementById("texto").innerHTML = txt;
    //confirm("Press a button!");
    } else {
        txt = "Não Foi Possível Salvar, Tente Novamente, Caso o problema Persista Contate o Administrador do Sistema!";
        document.getElementById("texto").innerHTML = txt;
    }
  var confirmBox = $("#confirm");
  //confirmBox.find(".message").text(msg);
  confirmBox.find(".yes").unbind().click(function() {
     confirmBox.fadeOut();
  });
  confirmBox.find(".yes").click(myYes);
  confirmBox.fadeIn();
}
