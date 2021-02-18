<?php





class Usuario
{

    private  $id;
    private $nombre;
    private $email;

    /**
     * Usuario constructor.
     * @param $id
     * @param $nombre
     * @param $email
     * @param $pass
     */
    public function __construct($id="", $nombre="", $email="", $pass="")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->pass = $pass;
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
    private $pass;


public function insertarUsuario(){
DaoUsuario::getInstance()->insertarUsuario();
}
public function borrarUsuario(){

}
public function editarUsuario(){

}



}