<?php

$permitidos = array('image/jpg', 'image/jpeg', 'image/png');

if(in_array($_FILES['perfil_img']['type'], $permitidos)) {
    $nome = 
    move_uploaded_file($_FILES['perfil_img']['tmp_name'], 'arquivos/'.$nome);

   echo 'Arquivo salvo com sucesso!';
} else {
   echo 'Arquivo não permitido.';
}

?>