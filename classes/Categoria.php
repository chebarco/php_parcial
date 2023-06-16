<?PHP

class Categoria
{
    protected   $id;
    protected   $categoria_id;


    public function lista_completa(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM categoria";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetchAll();

        return $result;
    }


    public function getId(int $id): ?Categoria
    {
    
        $conexion = (new Conexion()) -> getConexion();
        $query = "SELECT * FROM categoria WHERE id = ?";
    
        $PDOStatementCatalogo = $conexion -> prepare($query);
        $PDOStatementCatalogo -> setFetchMode(PDO :: FETCH_CLASS, self::class);
        $PDOStatementCatalogo -> execute([$id]);

        $result = $PDOStatementCatalogo-> fetch(); //FETCH ALL DEVUELVE UN ARRAY
    
        return $result ?? null;

    }
    

    public function categoriaMenu(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT DISTINCT
            categoria.id,
            categoria.categoria_id
    
           FROM catalogo 
           JOIN categoria ON catalogo.categoria_id = categoria.id;";
    
        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatementCatalogo->execute();
    
        $categoria = $PDOStatementCatalogo->fetchAll();
    
        return $categoria;
    }
    
 



    public function getCategoria()
    {
        return $this -> categoria_id;
    }
    
    public function getCategoriaId(){
        return $this -> id;
    }
    

}