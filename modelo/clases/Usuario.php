<?php
class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $pass;
    private $permiso;


    /**
     * @return mixed
     */
    public function getPermiso()
    {
        return $this->permiso;
    }

    /**
     * @param mixed $permiso
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;
    }

    /**
     * Usuario constructor.
     * @param $id
     * @param $nombre
     * @param $email
     * @param $pass
     */
    public function __construct($id = "", $nombre = "", $email = "", $pass = "", $permiso = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->pass = $pass;
        $this->permiso = $permiso;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }


//Llena el objeto con datos del post.
    public function llenarObj($datos)
    {
        $this->setNombre(addslashes($datos['user']));
        $this->setEmail(addslashes($datos['mail']));
        $this->setPass(addslashes($datos['pass']));
        $this->setPermiso("1");
    }


    public function insertarUsuario()
    {
        DaoUsuario::getInstance()->insertarUsuario($this);
    }

    public function borrarUsuario()
    {
        DaoUsuario::getInstance()->eliminarUsuario(000);
    }

    public function editarUsuario()
    {
        DaoUsuario::getInstance()->actualizarUsuario();
    }

    public function logIn($nombre,$pass)
    {


        $rows = DaoUsuario::getInstance()->logIn($nombre,$pass);

        foreach ($rows as $document) {
            $usu = json_decode(json_encode($document), true);

            $this->setNombre($usu['nombre']);
            $this->setPass($usu['pass']);
            $this->setPermiso($usu['permiso']);
            return true;
        }
return false;
    }




}


