function emailVer() {
		let mail = (document.getElementById('emailRecuperar').value);
		usuario = mail.substring(0, mail.indexOf("@"));
		dominio = mail.substring(mail.indexOf("@")+ 1, mail.length);
	
		if ((usuario.length >=1) &&
			(dominio.length >=3) &&
			(usuario.search("@")==-1) &&
			(dominio.search("@")==-1) &&
			(usuario.search(" ")==-1) &&
			(dominio.search(" ")==-1) &&
			(dominio.search(".")!=-1) &&
			(dominio.indexOf(".") >=1)&&
			(dominio.lastIndexOf(".") < dominio.length - 1)) {
			document.getElementById("mail3").style.display = 'none';
			document.getElementById("eRec").style.display = 'none';
			document.getElementById("envEmail").style.display = 'block';
			document.getElementById('emailRecuperar').readOnly = true;
		}
		else if ((mail.length === 0)) {
			document.getElementById("mail3").innerHTML="<font color='black'>Insira Um E-mail </font>";
			document.getElementById("mail3").style.display = 'block';
		} else {
			document.getElementById("mail3").innerHTML="<font color='red'>E-mail inválido </font>";
			document.getElementById("mail3").style.display = 'block';
			document.getElementById("emailRecuperar").focus();
		}
}

