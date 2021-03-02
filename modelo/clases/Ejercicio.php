<?php

class ListaEjercicio{

    private $lista;

    public function __construct(){

        $this->lista = array();

    }


    public function obtenerLista(){
        $rows = DaoContactos::listar();
        foreach ($rows as $document) {
            $contacto = json_decode(json_encode($document),true);
            $id = implode($contacto["_id"]);
            array_push($this->lista,new Contacto($id,$contacto["nombre"],$contacto["telefono"],$contacto["mail"],$contacto["comentarios"]) );
        }
    }


    public function imprimirFigurasEnBack()
    {


        $html = " <div class='containerdemangas' id=''>";

        for ($i = 0; $i < sizeof($this->lista); $i++) {

            $html .= $this->lista[$i]->imprimeteEnTr();

        }

        $html .= "</div>";

        return $html;

    }


}





class Ejercicio extends ArrayObject
{

    private $id;
    private $nombre;
    private $repeticiones;
    private $series;
    private $descanso;
    private $descripcion;
    private $imagen;

    /**
     * Ejercicio constructor.
     * @param $nombre
     * @param $repeticiones
     * @param $series
     * @param $descanso
     * @param $descripcion
     * @param $imagen
     */
    public function __construct($nombre = "", $repeticiones = "", $series = "", $descanso = "", $descripcion = "", $imagen = "",$id="")
    {
        $this->nombre = $nombre;
        $this->repeticiones = $repeticiones;
        $this->series = $series;
        $this->descanso = $descanso;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }

    /**
     * @return mixed|string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed|string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed|string
     */
    public function getRepeticiones()
    {
        return $this->repeticiones;
    }

    /**
     * @param mixed|string $repeticiones
     */
    public function setRepeticiones($repeticiones)
    {
        $this->repeticiones = $repeticiones;
    }

    /**
     * @return mixed|string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param mixed|string $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @return mixed|string
     */
    public function getDescanso()
    {
        return $this->descanso;
    }

    /**
     * @param mixed|string $descanso
     */
    public function setDescanso($descanso)
    {
        $this->descanso = $descanso;
    }

    /**
     * @return mixed|string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed|string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed|string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed|string $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    //Llena el objeto con datos del post.
    public function llenarObj($datos)
    {
        $this->setNombre(addslashes($datos['nombre']));
        $this->setRepeticiones(addslashes($datos['repeticiones']));
        $this->setSeries(addslashes($datos['series']));
        $this->setDescanso(addslashes($datos['descanso']));
        $this->setDescripcion(addslashes($datos['descripcion']));

    }

    public function insertar()
    {
        DaoEjercicio::getInstance()->insertarEjercicio($this);
    }
    /**
     * Genera un codigo de div con los datos de un manga
     * @return string cadena de html del div
     */
    public function imprimeteEnTr()
    {

        $html =

            "<div class='contenedormanga'>
    <div class='nombre'>
     <a href='javascript:borrarManga(" . $this->id . ")'><img id='eliminar' src='img/eliminar.png'onmouseover='cambiarEliminarAzul(this)'onmouseout='cambiarEliminarBlanco(this)'></a> 
     <a href='insertarManga.php?id=" . $this->id . "''> <img id='editar' src='img/editar.png'onmouseover='cambiarEditarAzul(this)'onmouseout='cambiarEditarBlanco(this)'></a> 
        <h3>" . $this->titulo . "</h3>
      
    </div>  
    <div class='imagen'>";
        if ($this->imagen != null) {
            $html .= "  <img src='" . $this->carpeta . $this->imagen . "'>
</div>";
        } else {
            $html .= " <img src='" . $this->carpeta . "totoro.png'>
</div>";
        }

        $html .= "<div class='datosVarios'>
 <div class='descripcion'>" . $this->descripcion . "</div>
    <h4> " . $this->coleccion . "</h4>
    <h4> " . $this->categoria . "</h4>
    <h4> " . $this->idioma . "</h4>
    <h4>  " . $this->precio . "€</h4>
</div>
</div>";


        return $html;
    }

}