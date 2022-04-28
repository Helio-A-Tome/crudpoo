<?php
require 'contato.class.php';


$contato = new Contato();
/*
$contato->adicionar('netshark@live.com','Helio Tome');
//$contato->adicionar('sharktech@gmail.com','sharktech');

$nome = $contato->getNome('netshark@live.com');

echo 'Nome : '.$nome;

$lista= $contato->getAll();

print_r($lista);

$apaga = $contato->excluir('sharktech@gmail.com');

if($apaga ==true){
echo 'email excluido';
}else{
echo 'email não existe';
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud Pdo</title>
</head>
<body>
    <h1>Contatos</h1>
    <a href="adicionar.php"><button>adicionar</button></a>
    <br><hr>
    <table border="1" width="600">
    <tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Açoes</th>
    </tr>
    
    <?php 
    $lista = $contato->getAll();
    foreach($lista as $item):
    ?>
    <tr>
    <td><?php echo $item['id']; ?></td>
     <td><?php  echo $item['nome']; ?></td>
      <td><?php echo $item['email']; ?></td>
      <td>
      --<a href="editar.php?id=<?php echo $item['id'] ?> "><button>editar</button></a>-
      -<a href="excluir.php?id=<?php echo $item['id'] ?> "><button>excluir</button></a>--
      </td>
      </tr>
    
    <?php endforeach;  ?>
    
    </table>
</body>
</html>
