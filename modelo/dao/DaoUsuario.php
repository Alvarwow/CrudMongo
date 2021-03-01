<?php


class DaoUsuario
{
    private static $instance = null;
    /*Recoge la instancia de la clase para que se puedan acceder a los metodos de la misma
      desde otras clases sin necesidad de instanciar el objeto DaoUsuario;*/
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function insertarUsuario($usuario)
    {
        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        $bulk = new MongoDB\Driver\BulkWrite;

        // $bulk->insert(['nombre' => $usuario["nombre"], 'telefono' => $contacto["telefono"], 'mail' => $contacto["mail"], 'comentarios' => $contacto["comentarios"]]);

        //  $connection->executeBulkWrite("Agenda.Contactos", $bulk);


    }

    public function eliminarUsuario($id)
    {

        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;

        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $bulk->delete($filter, ['limit' => 0]);

        $connection->executeBulkWrite('Agenda.Contactos', $bulk);
    }

    public function actualizarUsuario($contacto)
    {

        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;

        $filter = ['_id' => new MongoDB\BSON\ObjectId($contacto["id"])];

        $collation = ['$set' => ['nombre' => $contacto["nombre"], 'telefono' => $contacto["telefono"], 'mail' => $contacto["mail"], 'comentarios' => $contacto["comentarios"]]];
        $bulk->update($filter, $collation);
        $connection->executeBulkWrite('Agenda.Contactos', $bulk);
    }


    public function listar()
    {
        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $filter = [];
        $query = new MongoDB\Driver\Query($filter);
        return $connection->executeQuery("Agenda.Contactos", $query);
    }

}