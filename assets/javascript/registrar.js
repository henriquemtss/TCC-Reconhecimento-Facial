time = null;
function registrar() {
	if (document.getElementById('rm').value != "") {
        clearTimeout( time )
        time = setTimeout(function(){
            registrar();
            registro();
            }, 3000);
        function registrar(){
        }
        console.log(document.getElementById('rm').value)
	}
  }

function registro() {
    var rm = document.getElementById('rm').value;
  var request = new XMLHttpRequest();
  request.open('POST', '../model/inserir_registro.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  request.onload = function() {
  if (request.status >= 200 && request.status < 400) {
      console.log(request.responseText);
      if (JSON.parse(request.responseText).rm === rm) {
        alert("Registrado Com Sucesso!");
      }
      if(request.error){
          alert(request.error);
          return false;
      }
  } else {
      alert( "Erro ao localizar. Tipo:" + request.status );
  }
  };
  request.onerror = function() {
      alert("Erro ao localizar. Back-End inacessível.");
  }
  request.send("RM="+rm);
}