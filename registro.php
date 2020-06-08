
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>numeros</title>
</head>
<body>
     <form action="#" method="get">
     <input type="text" name="numero">
     <input type="submit" name="enviar" value="enviar">
     </form>
     <?php
     if(isset($_GET['enviar'])){
     $numero=$_GET['numero'];
     try{
          $dsn="mysql:host=localhost;dbname=udh";
          $user="root";
          $pass="";
          $conn=new PDO($dsn,$user,$pass);
         
           $sql2="select * from numeros2";
           $resultado=$conn->prepare($sql2);
           $resultado->execute();
           $matriz=$resultado->fetchAll();

           echo "<br>";
          if($resultado->rowCount()!==0){
            echo "INSERTASTE : ".$resultado->rowCount()." numeros";
          }else{
            echo "<p>no insertaste<p>";
          }
      }catch(PDOException $e){
        echo $e->getMessage("fallaste");
     }
    }


    ?>

<table border="1">
     <tr>
    <?php foreach ($matriz as $arreglo): ?>
    <th><?=$arreglo['numero']?></th>
    <?php endforeach;  ?>
    </tr>
</table>
</body>
</html>


