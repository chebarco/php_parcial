<?PHP
class Carrito{

function agregar_producto(int $productoId, int $cantidad){
    $vitamina = (new Catalogo)->getxId($productoId);

    if($vitamina){
        $_SESSION['carrito'][$productoId] = [
            'imagen' => $vitamina->getImagen(),
            'nombre' => $vitamina->getVitamina(),
            'precio' => $vitamina->getPrecio(),
            'cantidad' => $cantidad,
            'subtotal' => $vitamina->getPrecio() * $cantidad
        ];


    }

}
    
public function carritoGet(){
    if(!empty($_SESSION['carrito'])){
        return $_SESSION['carrito'];
    }else{
        return [];
    }
}


public function total(){
    $total = 0;
    foreach($this->carritoGet() as $producto){
        $total += $producto['subtotal'];
    }
    return $total;
}



public function eliminar_producto(int $productoId){
    if(isset($_SESSION['carrito'][$productoId])
    ){
        unset($_SESSION['carrito'][$productoId]);
    }
}

public function vaciar_carrito(){
    $_SESSION['carrito'] = [];

}


public function subir_producto(array $cantidad){
    foreach($cantidad as $key => $value){
        if(isset($_SESSION['carrito'][$key])){
            $_SESSION['carrito'][$key]['cantidad'] = $value;
            $_SESSION['carrito'][$key]['subtotal'] = $_SESSION['carrito'][$key]['cantidad'] * $_SESSION['carrito'][$key]['precio'];
        }
    }
}


public function precioTotal(){
    $total = 0;
    if(!empty($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $producto){
            $total += $producto['subtotal'];
        }
    }
}

public function cantidadTotal(){
    $total = 0;
    if(!empty($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $producto){
            $total += $producto['cantidad'];
        }
    }
}



}