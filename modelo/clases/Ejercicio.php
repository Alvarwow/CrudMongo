<?php
require_once "modelo/clases/Ejercicio.php";

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

}