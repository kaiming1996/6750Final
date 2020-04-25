<?php
class DbUtil{
	private $host="localhost"; // set host
	private $username="dbadmin"; // set username
	private $password="aaaaaaaa"; // set password
	private $database="h1b"; // set database name
	private $DBcon; 
	
	public  function connect(){
		$db = new mysqli(DbUtil::$host, DbUtil::$username, DbUtil::$password, DbUtil::$database);
	
		if($db->connect_errno){
			echo("Could not connect to db");
			$db->close();
			exit();
		}
		
		$this->$DBcon=$con;
	}
	
	public function select($table , $row = "*" , $where=null , $order=null){ //
		$query='SELECT '.$row.' FROM '.$table;
		if($where!=null){
			$query.=' WHERE '.$where;
			
		}
		if($order!=null){
			$query.=' ORDER BY '.$order;
		}
		$Result=$this->DbCon->query($query);
		
		return $Result;

	}
	public function insert($table,$value,$row=null){
		$insert= " INSERT INTO ".$table;
		if($row!=null){
			$insert.=" (". $row." ) ";
		}
		for($i=0; $i<count($value); $i++){
			if(is_string($value[$i])){
				$value[$i]= '"'. $value[$i] . '"';
			}
		}
		//make values as array
		$value=implode(',',$value);
		$insert.=' VALUES ('.$value.')';
		$ins=$this->DbCon->query($insert);
		if($ins){
			return true;
		}else{
			return false;
		}
	}
	public function delete($table,$where=null){
		if($where == null)
            {
                $delete = "DELETE ".$table;
            }
            else
            {
                $delete = "DELETE  FROM ".$table." WHERE ".$where;
            }
			$del=$this->DbCon->query($delete);
			if($del){
				return true;
			}else{
				return false;
			}
	}
 	public function disconnect{
		$this->$DBcon->close();
	}
}
?>
