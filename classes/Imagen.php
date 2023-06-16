<?PHP

class Imagen
{
    private $error;


    public function subirImagen ($directorio, $datosArchivo) : ?string
    {

        echo "<pre>";
        print_r($datosArchivo);
        echo "</pre>";

        if (!empty($datosArchivo['tmp_name'])) {
            $og_name = (explode(".", $datosArchivo['name']));
            $extension = end($og_name);

            
            $filename = time() . ".$extension";

            $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$filename");
            

            if (!$fileUpload) {
                $this->error = "No se pudo subir la imagen";
                return null;
            } 
                return $filename;
            }
            return NULL;
        }
    


    public function borrarImagen($archivo): bool
    {
        if (file_exists(($archivo))) {

            $fileDelete =  unlink($archivo);

            if (!$fileDelete) {
                throw new Exception("No se pudo borrar la imagen");
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Get the value of error
     */
    public function getError()
    {
        return $this->error;
    }
}
