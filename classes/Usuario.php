<?PHP

class Usuario
{

    private   $id;
    private   $nombre_usuario;
    private   $nombre_completo;
    private   $email;
    private   $clave;
    private   $rol;

    /**
     * Get the value of nombre_usuario
     *@param string $nombre_usuario
     * @return Usuario|null
     */

    public function ingresoUsuario(string $nombre_usuario): ?Usuario
    {

        $conexion = Conexion::getConexion();
        $query = 'SELECT * FROM usuario WHERE nombre_usuario = ?';

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$nombre_usuario]);

        $resultado = $PDOStatement->fetch(); 

        if (!$resultado) {
            return null;
        }
        return $resultado;
    }

    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }
}
