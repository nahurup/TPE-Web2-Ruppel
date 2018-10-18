<?php

class AdminView
{
    function Mostrar($personajes, $roles){
        $smarty = new Smarty();
        $smarty->assign('personajes',$personajes);
        $smarty->assign('roles',$roles);
        $smarty->display('templates/admin_lista.tpl');
    }

    function MostrarAgregarPJ($roles){
        $smarty = new Smarty();
        $smarty->assign('roles',$roles);
        $smarty->display('templates/agregar_personaje.tpl');
    }

    function MostrarAgregarRol(){
        $smarty = new Smarty();
        $smarty->display('templates/agregar_rol.tpl');
    }

    function MostrarAgregarUsuario(){
        $smarty = new Smarty();
        $smarty->display('templates/agregar_usuario.tpl');
    }

    function mostrarLogin($message = ''){
        $smarty = new Smarty();
        $smarty->assign('Message',$message);
        $smarty->display('templates/login.tpl');
    }
}

?>