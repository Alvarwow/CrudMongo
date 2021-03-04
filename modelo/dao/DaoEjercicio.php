<?php

class DaoEjercicio
{
    private $connection;
    private static $instance = null;
    /*Recoge la instancia de la clase para que se puedan acceder a los metodos de la misma
      desde otras clases sin necesidad de instanciar el objeto DaoEjercicio;*/
    /**
     * DaoEjercicio constructor.
     * @param $connection
     */
    public function __construct()
    {
        $this->connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public static function getInstance()
    {

        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function insertarEjercicio($ejercicio)
    {

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert(['nombre' => $ejercicio->getNombre(), 'repeticiones' => $ejercicio->getRepeticiones(), 'series' => $ejercicio->getSeries(), 'descanso' => $ejercicio->getDescanso(),'video'=>$ejercicio->getVideo()]);
        $this->connection->executeBulkWrite("Rutinas.Ejercicios", $bulk);


    }

    public function eliminarEjercicio($id)
    {


        $bulk = new MongoDB\Driver\BulkWrite;

        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $bulk->delete($filter, ['limit' => 0]);

        $this->connection->executeBulkWrite('Rutinas.Ejercicios', $bulk);
    }

    public function actualizarUsuario($ejercicio)
    {


        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($ejercicio["id"])];
        $collation = ['$set' => ['nombre' => $ejercicio["nombre"], 'repeticiones' => $ejercicio["repeticiones"], 'series' => $ejercicio["series"], 'descanso' => $ejercicio["descanso"],'video'=>$ejercicio['video']]];
        $bulk->update($filter, $collation);
       $this->connection->executeBulkWrite('Rutinas.Ejercicios', $bulk);
    }


    public  function listar()
    {

        $filter = [];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Rutinas.Ejercicios", $query);
    }
    public  function listarID($id)
    {

        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Rutinas.Ejercicios", $query);

    }

}