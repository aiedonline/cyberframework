<?php
require_once __DIR__ . "/base.php";
require_once dirname(__FILE__, 2) . "/api/database/mysql.php";

class Project extends Base{
	public $isLoad = false;
	public $_id ;
    public $name ;
    public $git;
    public $description;
    public $person_id;
    public $image;
	public $short_name;
    private $_tablename = "fky_project";

	public function __construct($row = null) {
	  if($row != null){
	    $this->fill($row);
	  }
	}

	public function fill($row){
        $this->isLoad = false;
		$this->_id =   $row["_id"];
		$this->short_name = $row['short_name'];
		$this->name =   $row["name"];
        $this->git =   $row["git"];
        $this->description =   $row["description"];
        $this->person_id =   $row["person_id"];
        $this->image =   $row["image"];
        $this->isLoad = true;
	}

	public static function listAll($where = '', $values = []){ 
		$buffer = new Base(); 
	   return $buffer->base_load("select * from fky_project " . $where , []);
    }
	
	public static function load( $_id) {
		$base = new Project();
		$data = $base->base_load("select * from fky_project where  _id = ? " , [  $_id ]);
        if(count($data) == 0) {
			return NULL;
		}
		$base->fill($data[0]);
		return $base;
	}

	public function save(){
		$values = [ $this->name, $this->git, $this->description, $this->image, $this->short_name];

		$sql = "";
		if( ! $this->isLoad ) {
            array_push($values,  $this->person_id);
			$sql = "INSERT INTO ". $this->_tablename . "(name, git, description, image, short_name, person_id ) values ( ?, ?, ?, ?, ?, ?)";
			return  $this->base_insert($sql, $values);
		} else {
            array_push($values,  $this->_id);
 			$sql = "UPDATE ". $this->_tablename . " SET  name = ?  ,  git = ?, description = ?, image = ?, short_name = ? WHERE  _id = ? ";
			//error_log(json_encode($values), 0);
			if( $this->base_save($sql, $values) != 1) {
				error_log('Não há registros afetados.', 0);
			}
		} 
        
		return true;
	}

}

?>