<?php 
require 'simplexml.class.php';
$forms = simplexml_load_file('data/dataBase.xml');

    if(isset($_POST['returnMain'])){
        header('location: index.php');
    }

    foreach($forms->formulario as $formulario){
        if($formulario['id']==$_GET['id']){
            $id = $formulario['id'];
            $name = $formulario->name;
            $ci = $formulario->ci;
            $phone = $formulario->phone;
            $address = $formulario->address;
            $birthday = $formulario->birthday;
            break;
        }
    }
?>

<form method="POST">
    <table border="1" cellpading="2" cellspacing="2">
        <tr>
            <td>ID</td> 
            <td> <?php echo $id ?> </td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><?php echo $name ?> </td>
        </tr>
        <tr>
            <td>Cedula</td>
            <td><?php echo $ci ?></td>
        </tr>
        <tr>
            <td>Fecha de Nacimiento</td>
            <td><?php echo $birthday ?></td>
        </tr>
        <tr>
            <td>Numero Celular</td>
            <td><?php echo $phone ?></td>
        </tr>
        <tr>
            <td>Direccion</td>
            <td><?php echo $address ?></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="returnMain" value="Menu Principal">
            </td>
        </tr>
    </table>
</form>