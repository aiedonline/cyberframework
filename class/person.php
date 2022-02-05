<?php
require_once __DIR__ . "/base.php";
require_once __DIR__ . "/user.php";
require_once dirname(__FILE__, 2) . "/api/database/mysql.php";

class Person extends Base { 
	public $isLoad = false;
	public $_id ;
    public $name ;
	public $contact ;
	public $bio;
	public $image;
    private $_tablename = "fky_person";


	public function __construct($row = null) {
	  if($row != null){
	    $this->fill($row);
	  }
	}

	public static function exists_login($login){
		$list = User::listAll(" where login = ? ", [$login] );
		return count($list) > 0;
	}

	public function user(){
		return User::load($this->_id);
	}

	public function fill($row){
		$this->_id =   $row["_id"];
		$this->name =   $row["name"];
		$this->bio =   $row["bio"];
		$this->contact =   $row["contact"];
		$this->image = $row["image"];
		$this->isLoad = true;
	}

	public static function listAll($where = '', $values = []){ 
		$buffer = new Base(); 
	   return $buffer->base_load("select * from fky_person " . $where , []);
    }
	
	public static function load( $_id) {
		$base = new Person();
		$data = $base->base_load("select * from fky_person where  _id = ? " , [  $_id ]);
		if(count($data) == 0) {
			return NULL;
		}
		//$buffer = new Person();
		$base->fill($data[0]);
		return $base;
	}

	public static function load_by_login( $login) {
		$base = new Person();
		$data = $base->base_load("select * from fky_person where  login = ? " , [  $login ]);
		if(count($data) == 0) {
			return NULL;
		}
		//$buffer = new Person();
		$base->fill($data[0]);
		return $base;
	}

	public static function login( $login, $password){
		if(trim($login) == "" || trim($password) == "") die;
		$base = new Person();
		$data = $base->base_load("select fpe.* from fky_person as fpe inner join fky_user as fus on fpe._id = fus.person_id  where fus.login = ? and fus.password = ? " , [  $login, $password ]);
		if(count($data) == 0) {
			return NULL;
		}
		$base->fill($data[0]);
		return $base;
	}

	public static function register($login, $name, $contact, $password, $increase){
		if(trim($login) == "" || trim($password) == "") die;
		
		$mysql = new Mysql();
		return $mysql->executeNoQuery("CALL register (?, ?, ?, ?, ?)", [$login, $name, $contact, $password, $increase ]);
	}

	public function save(){
		$values = [ $this->name,  $this->contact, $this->bio, $this->image];

		$sql = "";
		if( ! $this->isLoad ) {
			$sql = "INSERT INTO `fky_person` (`name`, `contact`, `bio`, `image` ) values ( ?, ?, ?, ? )";
		} else {
			//array_push($values,  $this->name);
            //array_push($values,  $this->contact);
            //array_push($values,  $this->bio);
			array_push($values,  $this->_id);
 			$sql = "UPDATE `fky_person` SET  `name` = ?  , `contact` = ?, `bio` = ?, `image` = ?  WHERE  _id = ?   ";
		} 
		if( $this->base_save($sql, $values) != 1) {
			throw new Exception('Não há registros afetados.', 1);
		}
		return true;
	}

	//public function remove(){
	//	$sql = "DELETE FROM ". $_tablename . " WHERE  _id = ?   " ; 
	//	$values = [];
	//	array_push($values,  $this->_id);
    //
	//	if( $this->base_remove($sql, $values) != 1) {
	//		throw new Exception('Não há registros afetados.', 1);
	//	}
	//	return true;
	//}
}

?>
