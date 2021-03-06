<?php


class DaoUsuario
{
    private $connection;
    private static $instance = null;


    /*Recoge la instancia de la clase para que se puedan acceder a los metodos de la misma
      desde otras clases sin necesidad de instanciar el objeto DaoUsuario;*/
    /**
     * DaoUsuario constructor.
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


    public function insertarUsuario($usuario)
    {


        $bulk = new MongoDB\Driver\BulkWrite;

         $bulk->insert(['nombre' => $usuario->getNombre(),'pass' => $usuario->getPass(),'email'=>$usuario->getEmail(),'permiso' => $usuario->getPermiso()] );

          $this->connection->executeBulkWrite("Usuarios.ListaUsu", $bulk);


    }

    public function eliminarUsuario($id)
    {


        $bulk = new MongoDB\Driver\BulkWrite;

        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $bulk->delete($filter, ['limit' => 0]);

        $this->connection->executeBulkWrite('Agenda.Contactos', $bulk);
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
    public function logIn($nombre,$pass){

        $filter = ['nombre' =>$nombre,'pass'=>$pass];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Usuarios.ListaUsu", $query);

    }

}