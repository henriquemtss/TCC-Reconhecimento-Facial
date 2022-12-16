function register() {
  document.getElementById('rm').style.display = 'none';
  document.getElementById('rmMan').style.display = 'block';
  document.getElementById("rmMan").focus();
  document.getElementById('manual').style.display = 'none';
  document.getElementById('sendRm').style.display = 'block';
}

function registro(API) {
if (API === 'api') {
  var rm = document.getElementById('rm').value;
} else if (API === 'sendRm') {
  var rm = document.getElementById('rmMan').value;
}
  var request = new XMLHttpRequest();
  request.open('POST', '../controller/RegistroController.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  request.onload = function() {
  if (request.status >= 200 && request.status < 400) {
      console.log(request.responseText);
      if (JSON.parse(request.responseText).ok === 1) {
        document.getElementById('rm').style.display = 'block';
        document.getElementById('rmMan').style.display = 'none';
        document.getElementById('manual').style.display = 'block';
        document.getElementById('sendRm').style.display = 'none';
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
  request.send("Registrar="+rm);
}