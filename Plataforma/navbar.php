<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#007bff"><!--dark #009efb-->
  <a class="navbar-brand" href="#" id="btnSalirDeLipacun">LIPACUN &nbsp; |</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" data-toggle="modal" data-target="#TipoCompetencia" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Index.php">INICIO &nbsp; |<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Inscribir_Evento.php">INSCRIBIR CLUB A EVENTO &nbsp; |</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../Inscripciones/Evento.php">INSCRIBIR DEPORTISTAS A EVENTO &nbsp; |</a>
      </li>		
	  <li class="nav-item active">
        <a class="nav-link" href="Resultados/Eventos.php">RESULTADOS &nbsp; |</a>
      </li>
    </ul>
  </div>
</nav>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnSalirDeLipacun').click(function(){
			alertify.confirm('Esta saliendo de la plataforma LIPACUN','Esta saliendo de la plataforma LIPACUN, para continuar y dirigirse a la pagina de LIPACUN presione continuar.',function(){
				window.open('https://www.lipacun.com/','_self');
			},function(){
				alertify.error('Cancelado');
			}).set({labels:{ok:'Continuar', cancel:'Cancelar'}});
		});
	});
</script>