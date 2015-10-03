<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<?php 
//session_start();
if(isset($_SESSION['registrado'])){  ?>

    <div class="container">

      <form class="form-ingreso" onsubmit="GuardarVoto();return false">
        <h2 class="form-ingreso-heading">Votacion</h2>
        <label for="provincia" class="sr-only">Provincia</label>
        <input type="text"  minlength="6" name="provincia"  id="provincia" title="Se necesita un nombre de provincia" class="form-control" placeholder="provincia" required="" autofocus=""><br>
        <label for="candidato" class="sr-only">Candidato</label>
        <select name="candidato" id="candidato">
          <option value="KK">KK</option>
          <option value="+A">+A</option>
          <option value="Neoliberal">Neoliberal</option>
        </select><br>
        <label for="sexo" class="sr-only">Sexo</label>
        <input type="radio" name="sexo" id="sexo"
          <?php if (isset($sexo) && $sexo=="F") echo "checked";?>
          value="F">Female
        <input type="radio" name="sexo" id="sexo"
          <?php if (isset($sexo) && $sexo=="M") echo "checked";?>
          value="M">Male
       <input type="hidden" name="idVoto" id="idVoto" class="form-control">
        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
     
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>";?>         
   
  <?php  }  ?>