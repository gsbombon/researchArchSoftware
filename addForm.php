<?php 
    if(isset($_POST['submitSave'])){
        require 'simplexml.class.php';
        $forms = simplexml_load_file('data/dataBase.xml');
        $form = $forms->addChild('formulario'); 
        $form->addAttribute('id',$_POST['id']);
        $form->addChild('name',$_POST['name']);
        $form->addChild('ci',$_POST['ci']);
        $form->addChild('phone',$_POST['phone']);
        $form->addChild('birthday',$_POST['birthday']);
        $form->addChild('address',$_POST['address']);
        file_put_contents('data/dataBase.xml',$forms->asXML());
        header('location: index.php');
    }
?>

<form method="POST">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Cedula</td>
            <td><input type="text" name="ci"></td>
        </tr>
        <tr>
            <td>Fecha de Nacimiento</td>
            <td><input type="text" name="birthday"></td>
        </tr>
        <tr>
            <td>Numero Celular</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td>Direccion</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submitSave" value="Guardar Formulario"></td>
        </tr>
    </table>
</form>