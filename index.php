<?php
require 'simplexml.class.php';
$forms = simplexml_load_file('data/dataBase.xml');
if(isset($_GET['action'])){
    $forms = simplexml_load_file('data/dataBase.xml');
    $id = $_GET['id'];
    $index = 0;
    $i = 0;
    foreach($forms->formulario as $formulario){
        if($formulario['id']==$id){
            $index = $i;
            break;
        }
        $i++;
    }
    unset($forms->formulario[$index]);
    file_put_contents('data/dataBase.xml',$forms->asXML());
    header('location: index.php');
}
echo 'Lista de formularios personales';
echo '<br> Numero de registros:  '.count($forms);
?>

<html>
    <head>
    </head>
    <body>
        <br>
        <a href="addForm.php">Agregar nuevo formulario</a>
        <br>
        <table cellpading="2" cellspacing="2" border="1">
            <tr>
                <th>ID</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Fecha Nacimiento</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($forms->formulario as $formulario) { ?>
                <tr>
                    <td> <?php echo $formulario['id'] ?> </td>
                    <td> <?php echo $formulario->name ?> </td>
                    <td> <?php echo $formulario->ci ?> </td>
                    <td> <?php echo $formulario->phone ?> </td>
                    <td> <?php echo $formulario->birthday ?> </td>
                    <td> <?php echo $formulario->address ?> </td>
                    <td align="center"> <a href="detailsForm.php?id=<?php echo $formulario['id'] ?>">Detalle</a> | <a href="updateForm.php?id=<?php echo $formulario['id'] ?>">Editar</a> | <a href="index.php?action=delete&id=<?php echo $formulario['id']; ?>" onclick="return confirm('Seguro de eliminar registro? ')">Eliminar</a></td>
                </tr>
            <?php } ?>    
        </table>    
    </body>
</html>
