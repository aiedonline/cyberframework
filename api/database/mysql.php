<?php

// ---------------------================= COMO CRIAR UM DATABASE NO MYSQL DE FORMA CORRETA =============----------------------
//CREATE USER 'cyber_site'@'%' IDENTIFIED BY  '123456Aa!';
//CREATE USER 'cyber_admin'@'%' IDENTIFIED BY '123456Aa!';
//CREATE DATABASE IF NOT EXISTS cyber;
//GRANT SELECT, INSERT, CREATE, ALTER, DROP, LOCK TABLES, CREATE TEMPORARY TABLES, DELETE, UPDATE, EXECUTE ON cyber.* TO 'cyber_admin'@'%';
// OU: GRANT ALL PRIVILEGES ON cyber.* TO 'cyber_admin'@'%';
//GRANT SELECT, INSERT, DELETE, UPDATE, EXECUTE ON cyber .* TO 'cyber_site'@'%';

class Mysql
{
	var $con = null;
	var $action = false;
	
	function __construct($config = null) {
		if($config != null){
			if(is_string($config)){
				$this->CONFIG = json_decode(file_get_contents(dirname(__FILE__, 3) . "/data/". $config .".json"));
			} else {
				$this->CONFIG =  $config;
			}
		} else {
			$this->CONFIG = json_decode(file_get_contents(dirname(__FILE__, 3) . "/data/default.json"));
		}
		
	}
	

	public function __destruct() { 
		unset($this->con);
	}

    public function  Connection(){
        try
        {
            if($this->con == null){
				// Porta padrao 3306
				$port = 3306;
				if (array_key_exists('port', $this->CONFIG->site->db->connection)){
					$port = $this->CONFIG->site->db->connection->port;
				}
				$this->con = new PDO('mysql:host=' . $this->CONFIG->site->db->connection->host . ';port='. $port .';charset=utf8;dbname=' . $this->CONFIG->site->db->connection->name, $this->CONFIG->site->db->connection->user, $this->CONFIG->site->db->connection->password);
				$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
            return $this->con;
        } catch (PDOException $e) {
			throw $e;
        }
    }

    // preparement state pdo: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
    public function dataTable($sql, $values){
    	try{
    		$this->validade_sql($sql);
			$query = $this->Connection()->prepare($sql);
			$query->execute($values);
			return $query->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
        	//throw $e;
        	echo $e->getMessage();
			throw new Exception('Erro: ' .  $e->getMessage() . " - " . $sql);
        } finally {
			if($this->action == false) {
				$this->con = null;
			}
		}
    }
	
	private function validade_sql($sql){
		//if(strpos($sql, "fky_user") > 0 ){
		//	die;
		//}
	}
	
	public function executeNoQuery($sql, $values){
		try{
			$this->validade_sql($sql);
			if(count($values) == 0){
				throw new Exception('Execu��es de Update e Insert n�o podem afetar toda uma tabela.');
			} else {
				$i = false;
				for( $i = 0; $i < count($values); $i++){
					if($values[$i] != ""){
						$i = true;
						break;
					}
				}
				if($i == false){
					throw new Exception('N�o existe valores para os argumentos.');
				}
			}
			
			//error_log($sql, 0);
			$query = $this->Connection()->prepare($sql);
			$query->execute($values);
			return $query->rowCount(); 
			
		}catch(Exception $e){
			throw $e;
		} finally {
			if($this->action == false) {
				$this->con = null;
			}
		}
    }

	public function executeInsert($sql, $values){
		try{
			$this->validade_sql($sql);
			if(count($values) == 0){
				throw new Exception('Execu��es de Update e Insert n�o podem afetar toda uma tabela.');
			} else {
				$i = false;
				for( $i = 0; $i < count($values); $i++){
					if($values[$i] != ""){
						$i = true;
						break;
					}
				}
				if($i == false){
					throw new Exception('N�o existe valores para os argumentos.');
				}
			}
			
			//error_log($sql, 0);
			$query = $this->Connection()->prepare($sql);
			$query->execute($values);
			return $this->Connection()->lastInsertId();
			
		}catch(Exception $e){
			throw $e;
		} finally {
			if($this->action == false) {
				$this->con = null;
			}
		}
    }
	

	public function BeginTransaction(){
		$this->Connection()->beginTransaction();
		$this->action = true;
	}

	public function CommitTransaction(){
		$this->Connection()->commit();
		$this->action = false;
	}

	public function RollbackTransaction(){
		$this->Connection()->rollback();
		$this->action = false;
	}

}

?>
