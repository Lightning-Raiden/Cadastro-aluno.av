<?php
   require 'config.php';
   include 'head.php';
?>

<body>
   <div class="container">
      <h1> Alterar foto do Perfil </h1>
   </div>

   <div class="mb-3">
      <form action="perfil_action.php" method="post" enctype="multipart/form-data" />

         <label for="" class="form-label">
            Imagem do Perfil: <br/>
            <input type="file" name="perfil_img" class="form-control"/>
         </label><br/><br/>

         <input type="submit" value="Enviar" class="btn btn-success">
         <a href="home.php" class="btn btn-danger"> Cancelar </a>
      </form>
   </div>

</body>