<?php
require_once dirname(__FILE__, 2) . "/api/database/mysql.php";

class Base {
	
	function __construct() {	
		
	}
	public function __destruct() { 
		
	}
	
	protected function validate_input($values){
		for($i = 0; $i < count($values); $i++){
			if ($values[$i] != htmlspecialchars($values[$i])){
				return $i;
			}
		}
		return -1;
	}

	protected function base_load($sql, $values){
		// validar aqui permiss�o de acesso pelo nome da classe ++++++++++++++++++++++++++++++++++++++++++++++
		$mysql = new Mysql();
		if($this->validate_input($values) >= 0){
			die;
		}
		return $mysql->dataTable($sql, $values);
	}

	protected function base_save($sql, $values){
		// validar aqui permiss�o de acesso  nome da classe e campos alterados ++++++++++++++++++++++++++++++++++
		// validar inje��o de XSS aqui...-------------------------------------------------------------------------------------------------------------------
		$mysql = new Mysql();
		if($this->validate_input($values) >= 0){
			die;
		}
		return $mysql->executeNoQuery($sql, $values);
	}

	protected function base_insert($sql, $values){
		// validar aqui permiss�o de acesso  nome da classe e campos alterados ++++++++++++++++++++++++++++++++++
		// validar inje��o de XSS aqui...-------------------------------------------------------------------------------------------------------------------
		$mysql = new Mysql();
		if($this->validate_input($values) >= 0){
			die;
		}
		return $mysql->executeInsert($sql, $values);
	}

	protected function base_remove($sql, $values){
		//error_log(gettype($values), 0);
		//error_log(json_encode($values), 0);
		//error_log($sql, 0);
		if(count($values) == 0){
			throw new Exception('Não pode executar uma exclusão sem chave.', 1);
		}
		for($i = 0; $i < count($values); $i++){
			if($values[$i] == null || $values[$i] == "" || $values[$i] == "0"){
				throw new Exception('Não pode executar uma exclusão com chave vazia.', 1);
			}
		}

		$mysql = new Mysql();
		return $mysql->executeNoQuery($sql, $values);
	}
}

?>