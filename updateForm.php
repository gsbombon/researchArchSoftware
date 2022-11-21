<?php 
require 'simplexml.class.php';
$forms = simplexml_load_file('data/dataBase.xml');

    if(isset($_POST['submitUpdate'])){
        foreach($forms->formulario as $formulario){
            if($formulario['id']==$_POST['id']){
                $formulario->name = $_POST['name'];
                $formulario->ci = $_POST['ci'];
                $formulario->phone = $_POST['phone'];
                $formulario->birthday = $_POST['birthday'];
                $formulario->address = $_POST['address'];
                break;
            }    
        }
        file_put_contents('data/dataBase.xml',$forms->asXML());
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
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="id" value=" <?php echo $id ?> " readonly></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="name" value=" <?php echo $name ?> "></td>
        </tr>
        <tr>
            <td>Cedula</td>
            <td><input type="text" name="ci" value=" <?php echo $ci ?> "></td>
        </tr>
        <tr>
            <td>Fecha de Nacimiento</td>
            <td><input type="text" name="birthday" value=" <?php echo $birthday ?> "></td>
        </tr>
        <tr>
            <td>Numero Celular</td>
            <td><input type="text" name="phone" value=" <?php echo $phone ?> "></td>
        </tr>
        <tr>
            <td>Direccion</td>
            <td><input type="text" name="address" value=" <?php echo $address ?> "></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submitUpdate" value="Actualizar Formulario"></td>
        </tr>
    </table>
</form>