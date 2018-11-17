<?php

class AdminView
{
    function Mostrar($personajes, $roles, $usuario = null){
        $smarty = new Smarty();
        $smarty->assign('personajes',$personajes);
        $smarty->assign('roles',$roles);
        $smarty->assign('usuario',$usuario);
        $smarty->display('templates/admin_lista.tpl');
    }

    function MostrarUsuarios($usuarios, $usuario = null){
        $smarty = new Smarty();
        $smarty->assign('usuarios',$usuarios);
        $smarty->assign('usuario',$usuario);
        $smarty->display('templates/usuarios.tpl');
    }

    function MostrarAgregarPJ($roles, $usuario = null){
        $smarty = new Smarty();
        $smarty->assign('roles',$roles);
        $smarty->assign('usuario',$usuario);
        $smarty->display('templates/agregar_personaje.tpl');
    }

    function MostrarEditarPersonaje($personaje, $roles, $usuario = null){
        $smarty = new Smarty();
        $smarty->assign('personaje',$personaje);
        $smarty->assign('roles',$roles);
        $smarty->assign('usuario',$usuario);
        $smarty->display('templates/editar_personaje.tpl');
      }

    function MostrarAgregarRol($usuario = null){
        $smarty = new Smarty();
        $smarty->assign('usuario',$usuario);
        $smarty->display('templates/agregar_rol.tpl');
    }

    function MostrarEditarRol($rol, $usuario = null){
        $smarty = new Smarty();
        $smarty->assign('rol',$rol);
        $smarty->assign('usuario',$usuario);
        $smarty->display('templates/editar_rol.tpl');
    }
}

?>