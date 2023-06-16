<?PHP

class Autenticacion
{

    /**
     * @param string $usuario nombre completo del usuario
     * @param string $clave clave del usuario
     * @return bool true si el usuario existe y la clave es correcta, false en caso contrario
     */
    public function login(string $nombre_usuario, string $clave): ?bool
    {

        $datosUsuario = (new Usuario())->ingresoUsuario($nombre_usuario);
     

        if ($datosUsuario) {
            if (password_verify($clave, $datosUsuario->getClave())) {
                $datoslogin['nombre_usuario'] = $datosUsuario->getNombreUsuario();
                $datoslogin['id'] = $datosUsuario->getId();
                $_SESSION['loggedIn'] = $datoslogin;
                return TRUE;
            } else {
                //echo "<p>EL PASSWORD NO ES CORRECTO! INTRUSO! >=0 </p>";
                (new Notificaciones())->add_alerta('danger', "Clave incorrecta😒");
                return FALSE;
            }

        }else{
            (new Notificaciones())->add_alerta('warning', "Usuario no existente o incorrecto.🪦");
            return NULL;
        }
    }


    public function logout()
    {

        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        }
    }


    public function verificar(): bool
    {
        if (isset($_SESSION['loggedIn'])) {
            return TRUE;
        } else {
            header("Location: login.php?seccion=login");
        }
        return false;
    }
}
