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

  public function loadById($id) {
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM table_users WHERE idusuario = :ID", array(":ID" => $id));

    if(count($results) > 0) {
      $row = $results[0];
      $this->setIdUsuario($row["idusuario"]);
      $this->setDeslogin($row["deslogin"]);
      $this->setDespassword($row["despassword"]);
      $this->setDtRegister($row["dtregister"]);
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
