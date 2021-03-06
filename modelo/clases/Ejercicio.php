<?php

class ListaEjercicio{

    private $lista;

    public function __construct(){

        $this->lista = array();

    }


    public function obtenerLista($nombre){
        $rows = DaoEjercicio::getInstance()->listar($nombre);
        foreach ($rows as $document) {
            $ejercicio = json_decode(json_encode($document),true);
            $id = implode($ejercicio["_id"]);
            array_push($this->lista,new Ejercicio($ejercicio["nombre"],$ejercicio["repeticiones"],$ejercicio["series"],$ejercicio["descanso"],$ejercicio['video'],$id) );
        }
    }


    public function imprimirEnTabla(){

$txt="";
        for($i=0;$i<sizeof($this->lista);$i++){
            $txt .= "<div class='ejercicio'>";
            $txt .= "<div class='datos'>";
            $txt .= $this->lista[$i]->imprimeFilaTb();

        }

        return $txt;
    }







}





class Ejercicio extends ArrayObject
{


    private $id;
    private $nombre;
    private $repeticiones;
    private $series;
    private $descanso;
    private $video;

    /**
     * Ejercicio constructor.
     * @param $nombre
     * @param $repeticiones
     * @param $series
     * @param $descanso

     * @param $imagen
     */
    public function __construct($nombre = "", $repeticiones = "", $series = "", $descanso = "",  $video = "",$id="")
    {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->repeticiones = $repeticiones;
        $this->series = $series;
        $this->descanso = $descanso;


        $this->video = $video;
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
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param mixed|string $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }
    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    //Llena el objeto con datos del post.
    public function llenarObj($datos)
    {
        $this->setNombre(addslashes($datos['nombre']));
        $this->setRepeticiones(addslashes($datos['repeticiones']));
        $this->setSeries(addslashes($datos['series']));
        $this->setDescanso(addslashes($datos['descanso']));
        $this->setVideo(addslashes($datos['video']));

    }

    public function insertar()
    {
        DaoEjercicio::getInstance()->insertarEjercicio($this);
    }
    public function borrar($id)
    {
        DaoEjercicio::getInstance()->eliminarEjercicio($id);
    }
    public function actualizar($id){
        $this->setId($id);
        DaoEjercicio::getInstance()->actualizarUsuario($this);
    }

    public function listarID($id){
       $rows=DaoEjercicio::getInstance()->listarID($id);

        foreach ($rows as $document) {
            $ejercicio = json_decode(json_encode($document),true);
            $this->setId($id);
            $this->setNombre($ejercicio["nombre"]);
            $this->setRepeticiones($ejercicio["repeticiones"]);
            $this->setSeries($ejercicio["series"]);
            $this->setDescanso($ejercicio["descanso"]);
            $this->setVideo($ejercicio['video']);
    }

    }


    /**
     * Genera un codigo de div con los datos de un ejercicio
     * @return string cadena de html del div
     */
    public function imprimeFilaTb(){
        $txt = "";
            $txt .= "<h2 class='nombre''>".$this->getNombre();".</h2>";
            $txt .= "<h2 class='numeros''>Repeticiones: ".$this->getRepeticiones();".</h2>";
            $txt .= "<h2 class='numeros''>Series: ".$this->getSeries();".</h2>";
            $txt .= "<h2 class='numeros''>Descanso: ".$this->getDescanso();".</h2>";
            $txt .= "</div>";
            $txt .= "<iframe class='video'  src='".$this->getVideo()."'></iframe>";
        $txt .= "<div class='botones'>";
if ($_SESSION['permiso'] == 3221){


    $txt .= "<a class='editar' href='formuInsert.php?id=".$this->id."'>Editar</a>";
    $txt .= "<a class='eliminar' href='javascript:borrarEjercicio(`" . $this->id . "`)'>Eliminar</a>";
}




        $txt .= "</div>";
        $txt .= "</div>";
        return $txt;

    }

}