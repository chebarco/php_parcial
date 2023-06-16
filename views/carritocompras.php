<?PHP

$carritoCliente = new Carrito();
$productos = $carritoCliente->carritoGet();

echo "<pre>";
print_r($productos);
echo "</pre>";
