<?PHP

class Catalogo
{
    private   $id;
    private   $categoria;
    private   $nombre_vitamina;
    private   $tipodecapsula;
    private   $cantidad;
    private   $ingredientes;
    private   $tipo;
    private   $imagen;
    private   $descripcion;
    private  $precio;
    private  $fecha;

    private $categoria_secundaria;


    private static $createValues = ['id', 'nombre_vitamina', 'cantidad', 'ingredientes', 'tipo', 'imagen', 'descripcion', 'precio', 'fecha'];




    /*
* @return array
*/
    //devuelve el catalogo completo de productos
    public function catalogo_completo(): array
    {

        $catalogo = [];

        $conexion = (new Conexion())->getConexion();
        $query =
            "SELECT  
    catalogo.*,
    GROUP_CONCAT(categorixcapsula.categoria_id) as categoria_secundaria
    FROM `catalogo` 
    LEFT JOIN categorixcapsula ON catalogo.id = categorixcapsula.productocapsula_id
    GROUP BY catalogo.id;";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatementCatalogo->execute();


        while ($result = $PDOStatementCatalogo->fetch()) {
            $catalogo[] = $this->createCatalogo($result);
        }

        return $catalogo;
    }

    public function getxId(int $id): ?Catalogo
    {

        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM catalogo WHERE id = ?";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatementCatalogo->execute([$id]);

        $result = $PDOStatementCatalogo->fetch(); //FETCH ALL DEVUELVE UN ARRAY

        return $result ?? null;
    }


    public function insert(int $categoria, string $nombre_vitamina, int $tipodecapsula, int $cantidad, string $ingredientes, string $tipo,  string $precio, string $fecha, string $descripcion, string $imagen)
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO catalogo VALUES (NULL, :categoria_id, :nombre_vitamina, :tipodecapsula_id, :cantidad, :ingredientes, :tipo, :precio, :fecha,   :descripcion , :imagen)";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->execute(
            [
                'categoria_id' => $categoria,
                'nombre_vitamina' => $nombre_vitamina,
                'tipodecapsula_id' => $tipodecapsula,
                'cantidad' => $cantidad,
                'ingredientes' => $ingredientes,
                'tipo' => $tipo,
                'precio' =>  $precio,
                'fecha' => $fecha,
                'descripcion' => $descripcion,
                'imagen' => $imagen,

            ]
        );
    }


    public function edit(  $nombre_vitamina,  $cantidad,  $tipo,   $precio,  $fecha  )
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE catalogo SET  nombre_vitamina = :nombre_vitamina, cantidad = :cantidad, tipo = :tipo, precio = :precio, fecha = :fecha  WHERE id = :id";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->execute(
            [
                'id' => $this->id,
                'nombre_vitamina' => $nombre_vitamina,
                'cantidad' => $cantidad,
                'tipo' => $tipo,
                'precio' =>  $precio,
                'fecha' => $fecha,
            ]
        );
    }

    /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM catalogo WHERE id = ?;";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }



    public function catalogoPorCategoria(int $categoria_id): array
    {
        $catalogo = [];


        $conexion = (new Conexion())->getConexion();
        $query = "SELECT *  FROM catalogo WHERE categoria_id = ? ";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatementCatalogo->execute([$categoria_id]);

        while ($result = $PDOStatementCatalogo->fetch()) {
            $catalogo[] = $this->createCatalogo($result);
        }

        return $catalogo;
    }




    public function catalogoTipoCapsula(int $tipodecapsula_id): array
    {

        $catalogo = [];

        $conexion = (new Conexion())->getConexion();
        $query = "SELECT *  FROM catalogo WHERE tipodecapsula_id = ? ";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatementCatalogo->execute([$tipodecapsula_id]);


        while ($result = $PDOStatementCatalogo->fetch()) {
            $catalogo[] = $this->createCatalogo($result);
        }

        return $catalogo;
    }




    public function productoId(int $idProducto): ?Catalogo
    {
        $conexion = (new Conexion())->getConexion();
        $query =  "SELECT   catalogo.*,
        GROUP_CONCAT(categorixcapsula.categoria_id) as categoria_secundaria
        FROM `catalogo` 
        LEFT JOIN categorixcapsula ON categorixcapsula.productocapsula_id = catalogo.id WHERE catalogo.id = ?
        GROUP BY catalogo.id;";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatementCatalogo->execute([$idProducto]);


        $result = $this->createCatalogo($PDOStatementCatalogo->fetch()); //FETCH ALL DEVUELVE UN ARRAY


        return $result ?? null;
    }




    private function createCatalogo($catalogoData): Catalogo
    {

        $catalogo = new self();

        foreach (self::$createValues as $value) {
            $catalogo->{$value} = $catalogoData[$value];
        }


        $catalogo->categoria = (new Categoria())->getId($catalogoData['categoria_id']);;
        $catalogo->tipodecapsula = (new Comprimido())->getId($catalogoData['tipodecapsula_id']);

        $categoriaSecundaria_Id = !empty($catalogoData['categoria_secundaria']) ? explode(',', $catalogoData['categoria_secundaria']) : [];
        $categoria_secundaria = [];

        if (!empty($categoriaSecundaria_Id[0])) {
            foreach ($categoriaSecundaria_Id as $categoriaSecundariaIds) {
                $categoria_secundaria[] = (new Categoria())->getId(intval($categoriaSecundariaIds));
            }
        }


        $catalogo->categoria_secundaria = $categoria_secundaria;


        return $catalogo;
    }




    //METODO que devuelve los productos en oferta
    public function mostrar_productos_destacados(): array
    {
        $catalogo = $this->catalogo_completo();

        // Obtener un subconjunto de los productos destacados
        $productos_destacados = array_filter($catalogo, function ($producto) {
            return $producto->id == true;
        });

        $productos_destacados = array_slice($productos_destacados, 0, 6);

        return $productos_destacados;
    }



// METODO que muestra un texto corto de la descripcion
    public function textoCorto(string $texto, int $limite = 20): string
    {

        $texto = $this->descripcion;


        $palabras = explode(" ", $texto);
        if (count($palabras) <= $limite) {
            $resultado = $texto;
        } else {
            array_splice($palabras, $limite);
            $resultado = implode(" ", $palabras) . "...";
        }
        return $resultado;
    }


//METODO que busca productos por nombre o precio
    public function buscadorVitaminas(string $buscador): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT *  FROM catalogo WHERE nombre_vitamina  LIKE '%$buscador%'  OR precio LIKE '%$buscador%'  ";

        $PDOStatementCatalogo = $conexion->prepare($query);
        $PDOStatementCatalogo->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatementCatalogo->execute();
        $catalogo = $PDOStatementCatalogo->fetchAll(); //FETCH ALL DEVUELVE UN ARRAY


        return $catalogo;
    }






    

    //FUNCIONES GET


    public function getId()
    {
        return $this->id;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getIngredientes()
    {
        return $this->ingredientes;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getFecha()
    {
        return $this->fecha;
    }

    public function getVitamina()
    {
        return $this->nombre_vitamina;
    }


    public function getCategoriaCatalogo()
    {
        return $this->categoria->getCategoria();
    }


    public function getCapsula()
    {
        return $this->tipodecapsula->getCapsula();
    }


    public function categoriaSecundaria()
    {
        return $this->categoria_secundaria;
    }
}
