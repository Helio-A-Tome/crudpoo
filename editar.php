
<?php
include 'contato.class.php';


$contato = new Contato();


if(!empty($_GET['id'])){

    $id = $_GET['id'];
    
    $info = $contato->getInfo($id);
    
    
    if(empty($info['email'])){
    
    header("Location: index.php");
    
    }
    
    

}else{
    header("Location: index.php");
}




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar contato</h1>
    <form  method="POST" action="editar_submit.php" >
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
   Nome: <input type="text" name="nome" value="<?php echo $info['nome']; ?>"><br><br>
   Email: <input type="email" name="email" value="<?php echo $info['email']; ?>"><br><br>
 
  <input type="submit" value="modificar"><br>
    </form>
    
</body>
</html>