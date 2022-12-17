function register() {
  var time =null;
  document.getElementById('cam').srcObject.getTracks()[0].enabled = false;
  console.log("Vid off");
  time = setTimeout(function(){
    document.getElementById('rm').style.display = 'none';
    document.getElementById('nome').style.display = 'none';
    document.getElementById('periodo').style.display = 'none';
    document.getElementById('curso').style.display = 'none';
    document.getElementById('rmMan').style.display = 'block';
    document.getElementById("rmMan").focus();
    document.getElementById('manual').style.display = 'none';
    document.getElementById('sendRm').style.display = 'block';
}, 1000);
  
}

function registro(API) {

if (API === 'api') {
  var rm = document.getElementById('rm').value;
} else if (API === 'sendRm') {
  var rm = document.getElementById('rmMan').value;
}
  //alert(rm);
  var request = new XMLHttpRequest();
  request.open('POST', '../controller/RegistroController.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  request.onload = function() {
  if (request.status >= 200 && request.status < 400) {
    console.log(request.responseText);
        if (JSON.parse(request.responseText) === false && API === 'sendRm') {
          document.getElementById('rm').style.display = 'block';
          document.getElementById('nome').style.display = 'block';
          document.getElementById('periodo').style.display = 'block';
          document.getElementById('curso').style.display = 'block';
          document.getElementById('rmMan').style.display = 'none';
          document.getElementById('rmMan').value = "";
          document.getElementById('manual').style.display = 'block';
          document.getElementById('sendRm').style.display = 'none';
          document.getElementById('cam').srcObject.getTracks()[0].enabled = true;
          alert("Registrado Com Sucesso!");
        } else if (JSON.parse(request.responseText) === false && API === 'api') {
          alert("Registrado Com Sucesso!");
        } else {
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