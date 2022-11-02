/* LIVETIME */
window.addEventListener("load", () => {
  clock();
  function clock() {
    //const today = new Date();
    
    document.getElementById("date-time").innerHTML = new Date().toLocaleDateString('pt-br',{
      //weekday: 'long',
     year: 'numeric', month: 'long', day: '2-digit'//, hour: '2-digit', minute: '2-digit', second: '2-digit'
    }) + ' - ' + new Date().toLocaleTimeString();
    setTimeout(clock, 1000);
  }
});

/*Import
*	<script src="Clock.js" type="text/javascript"></script>
*/

/* Uso
	<div class="header_title">
    	<h4 id="date-time"></h4>
    </div>
*/

