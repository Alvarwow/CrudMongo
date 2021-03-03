<?php

class DaoEjercicio
{
    private static $instance = null;
    /*Recoge la instancia de la clase para que se puedan acceder a los metodos de la misma
      desde otras clases sin necesidad de instanciar el objeto DaoEjercicio;*/
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function insertarEjercicio($ejercicio)
    {
        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;



        $bulk->insert(['nombre' => $ejercicio->getNombre(), 'repeticiones' => $ejercicio->getRepeticiones(), 'series' => $ejercicio->getSeries(), 'descanso' => $ejercicio->getDescanso(),'imagen'=>$ejercicio->getImagen()]);
        $connection->executeBulkWrite("Rutinas.Ejercicios", $bulk);


    }

    public function eliminarEjercicio($id)
    {

        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;

        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $bulk->delete($filter, ['limit' => 0]);

        $connection->executeBulkWrite('Rutinas.Ejercicios', $bulk);
    }

    public function actualizarUsuario($ejercicio)
    {

        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_nombre' => new MongoDB\BSON\ObjectId($ejercicio["nomber"])];
        $collation = ['$set' => ['nombre' => $ejercicio["nombre"], 'repeticiones' => $ejercicio["repeticiones"], 'series' => $ejercicio["series"], 'descanso' => $ejercicio["descanso"],'descripcion'=>$ejercicio["descripcion"],'imagen'=>$ejercicio["imagen"]]];
        $bulk->update($filter, $collation);
        $connection->executeBulkWrite('Rutinas.Ejercicios', $bulk);
    }


    public  function listar()
    {
        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $filter = [];
        $query = new MongoDB\Driver\Query($filter);
        return $connection->executeQuery("Rutinas.Ejercicios", $query);
    }

}