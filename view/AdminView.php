<?php

class AdminView
{
    function Mostrar($personajes, $roles){
        $smarty = new Smarty();
        $smarty->assign('personajes',$personajes);
        $smarty->assign('roles',$roles);
        $smarty->display('templates/admin_lista.tpl');
    }

    function MostrarUsuarios($usuarios){
        $smarty = new Smarty();
        $smarty->assign('usuarios',$usuarios);
        $smarty->display('templates/usuarios.tpl');
    }

    function MostrarAgregarPJ($roles){
        $smarty = new Smarty();
        $smarty->assign('roles',$roles);
        $smarty->display('templates/agregar_personaje.tpl');
    }

    function MostrarEditarPersonaje($personaje, $roles){
        $smarty = new Smarty();
        $smarty->assign('personaje',$personaje);
        $smarty->assign('roles',$roles);
        $smarty->display('templates/editar_personaje.tpl');
      }

    function MostrarAgregarRol(){
        $smarty = new Smarty();
        $smarty->display('templates/agregar_rol.tpl');
    }

    function MostrarEditarRol($rol){
        $smarty = new Smarty();
        $smarty->assign('rol',$rol);
        $smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
        $smarty->display('templates/editar_rol.tpl');
    }
}

?>