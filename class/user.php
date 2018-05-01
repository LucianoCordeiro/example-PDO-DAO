<?php

class User {

  private $idusuario;
  private $deslogin;
  private $despassword;
  private $dtregister;

  public function getIdUsuario() {
		return $this->idusuario;
	}

	public function setIdUsuario($idusuario) {
		$this->idusuario = $idusuario;
	}

	public function getDeslogin() {
		return $this->deslogin;
	}

	public function setDeslogin($deslogin) {
		$this->deslogin = $deslogin;
	}

  public function getDespassword() {
    return $this->despassword;
  }

  public function setDespassword($despassword) {
    $this->despassword = $despassword;
  }

  public function getDtRegister() {
    return $this->despassword;
  }

  public function setDtRegister($dtregister) {
    $this->dtregister = $dtregister;
  }

  public static function loadById($id) {
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM table_users WHERE idusuario = :ID", array(":ID" => $id));

    if (count($results) > 0) {
      return json_encode($results[0]);
    }
  }

  public static function getList() {
    $sql = new Sql();
    $list = $sql->select("SELECT * FROM table_users ORDER BY deslogin");
    return json_encode($list);
  }

  public static function search($login) {
    $sql = new Sql();
    $list = $sql->select("SELECT * FROM table_users WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(":SEARCH" => "%" . $login . "%"));
    return json_encode($list);
  }

  public static function login($login, $password) {
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM table_users WHERE deslogin = :LOGIN AND despassword = :PASSWORD", array(":LOGIN" => $login, ":PASSWORD" => $password));

    if (count($results) > 0) {
      return json_encode($results[0]);
    }

    else {
      throw new Exception("Login e/ou senha incorretos");
    }
  }

  public function __toString() {
    return json_encode(array(
      "idusuario"=>$this->getIdUsuario(),
      "deslogin"=>$this->getDeslogin(),
      "despassword"=>$this->getDespassword(),
      "dtregister"=>$this->getDtRegister(),
    ));
  }

}

?>
