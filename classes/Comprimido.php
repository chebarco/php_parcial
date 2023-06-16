<?PHP

class Comprimido
{
    protected   $id;
    protected   $tipodecapsula_id;


    public function lista_completa(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM comprimido";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetchAll();

        return $result;
    }


    public function getId(int $id): ?Comprimido
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM comprimido WHERE id = ? ";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatementCatalogo->execute([$id]);

        $result = $PDOStatementCatalogo->fetch();

        return $result ?? null;
    }



    public function capsulaMenu(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT DISTINCT
            comprimido.id,
            comprimido.tipodecapsula_id

           FROM catalogo 
           JOIN comprimido ON catalogo.tipodecapsula_id = comprimido.id;";
    
        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatementCatalogo->execute();
    
        $capsula = $PDOStatementCatalogo->fetchAll();
    
        return $capsula;
    }

   


    public function getCapsula(){
        return $this -> tipodecapsula_id;
    }
    
    public function getComprimidoId(){
        return $this -> id;
    }
    

    
}

