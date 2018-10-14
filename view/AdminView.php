<?php

class AdminView
{
    function Mostrar($personajes, $roles){
        $smarty = new Smarty();
        $smarty->assign('personajes',$personajes);
        $smarty->assign('roles',$roles);
        //$smarty->debugging = true;
        $smarty->display('templates/admin_lista.tpl');
    }

    function MostrarAgregarPJ($roles){
        $smarty = new Smarty();
        $smarty->assign('roles',$roles);
        $smarty->display('templates/agregar_personaje.tpl');
    }
}

?>