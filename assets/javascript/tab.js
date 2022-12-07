window.onload = function(){
    document.getElementById('tabpadrao').click(); 
    id('telFunc').onkeyup = function(){
		mascara( this, mtel );
	}   
};
	

function abrirTab(event, idTab){
    
   

    var conteudos = document.getElementsByClassName('conteudo');

    for (var i=0; i < conteudos.length; i++) {
        conteudos[i].style.display = 'none';

    }

    var tabs = document.getElementsByClassName('tab-button');
    for (var i=0; i < tabs.length; i++) {
        tabs[i].className = tabs[i].className.replace('ativo', '');

    }
    
    document.getElementById(idTab).style.display = 'block';
    event.currentTarget.className += ' ativo';

    
}

/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
