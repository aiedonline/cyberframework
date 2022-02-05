<?php
require_once __DIR__ . "/base.php";
require_once dirname(__FILE__, 2) . "/api/database/mysql.php";

 class User extends Base{ 
	public $isLoad = false;
	public $person_id ;
    public $login ;
	public $increase ;

    private $_tablename = "fky_user";

	public function __construct($row = null) {
	  if($row != null){
	    $this->fill($row);
	  }
	}

	public static function get_increase($login){
		$buffer = new Base(); 
		return $buffer->base_load("select increase from fky_user where login = ? " , [$login])[0]['increase'];
	}
	
	public function change($password){
		if( trim($password) == "" ) {
			error_log("Password vazio", 0);
			die;
		}
		$sql = "UPDATE fky_user SET  password = ?  WHERE  person_id = ? ";
		if( $this->base_save($sql, [$password, $this->person_id]) != 1) {
			throw new Exception('Não há registros afetados.', 1);
		}
		return true;
	}

	public static function load( $person_id) {
		$base = new User();
		$data = $base->base_load("select * from fky_user where  person_id = ? " , [  $person_id ]);
		if(count($data) == 0) {
			return NULL;
		}
		$base->fill($data[0]);
		return $base;
	}
    
	public function save(){
		$values = [ $this->name,  $this->contact];

		$sql = "";
		if( ! $this->isLoad ) {
			$sql = "INSERT INTO ". $_tablename . "(name, contact ) values ( ?  ,  ? )";
		} else {
			array_push($values,  $this->name);
            array_push($values,  $this->contact);
            array_push($values,  $this->person_id);
 			$sql = "UPDATE ". $_tablename . " SET  name = ?  ,  contact = ?  WHERE  person_id = ?   ";
		} 
		if( $this->base_save($sql, $values) != 1) {
			throw new Exception('Não há registros afetados.', 1);
		}
		return true;
	}

	public static function listAll($where = '', $values = []){ 
		 $buffer = new Base(); 
		return $buffer->base_load("select * from fky_user " . $where , $values);
	}

	public function fill($row){
		$this->isLoad = true;
		$this->person_id =   $row["person_id"];
		//$this->rotulo =   $row["name"];
		$this->login = $row['login'];
		//$this->descricao =   $row["contact"];
		$this->increase = $row["increase"];
	}

}

?>
