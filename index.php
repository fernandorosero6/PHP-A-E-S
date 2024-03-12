<?php
    $servidor="localhost";
    $usuario="root";
    $clave = ""; 
    $baseDeDatos="gordo";
    $enlace=mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contenedor1">
        <div class="contenedor2">
            <form action="#"  name="tabla" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Escriba el nombre</label>
                <input type="email" name="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Escriba una descripcion</label>
                <input type="text" name="Descripcion" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                    <label for="idEliminar" class="form-label">ID del registro a eliminar/actualizar:</label>
                    <input type="number" name="idEliminar" class="form-control" id="idEliminar" min="1">
            </div>
            
            <button type="submit" name="registro" class="btn btn-primary">Ingresar</button>
            <button type="submit" name="Eliminar" class="btn btn-primary">Eliminar</button>
            <button type="submit" name="actualizar" class="btn btn-primary">actualizar</button>

            </form><br>
        </div>
    </div>
</body>
</html> 

<?php
    if (isset($_POST['registro'])) {
        $Name = $_POST['Name'];
        $Descripcion = $_POST['Descripcion'];
    
        $insertarDatos = "INSERT INTO tabla (Name, Descripcion) VALUES ('$Name', '$Descripcion')";
        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
    
        if ($ejecutarInsertar) {
            echo "<p class='contenedor1'>Los datos fueron ingresados correctamente </p>";
            echo "<h2 class='contenedor1'>Datos ingresados:</h2>";
            echo "<p class='contenedor1' >Nombre: $Name</p>";
            echo "<p class='contenedor1' >Descripción: $Descripcion</p>";
        }
    }
    
    if (isset($_POST['Eliminar'])) {
        $idEliminar = $_POST['idEliminar'];
    
        $eliminarRegistro = "DELETE FROM tabla WHERE id = $idEliminar";
        $ejecutarEliminar = mysqli_query($enlace, $eliminarRegistro);
    
        if ($ejecutarEliminar) {
            echo "El registro con ID $idEliminar fue eliminado correctamente";
        } else {
            echo "Error al eliminar el registro";
        }
    }   

    if (isset($_POST['actualizar'])){
        $idActualizar = $_POST['idEliminar'];
        $actualizarName= $_POST['Name'];

        $actualizarRegistro = "UPDATE tabla SET Name= '$actualizarName' where id= $idActualizar ";
        $ejecutarActualizar = mysqli_query($enlace, $actualizarRegistro);

        if($ejecutarActualizar){
            echo"<p class='contenedor1' Se actualizo correctamente</p>";
        }else{
            echo "no se actualizo";
        }
    }

?>