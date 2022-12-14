<?php
class DBController {
	private $host = "127.0.0.1";
	private $user = "root";
	private $password = "";
	private $database = "projet2cpi";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
	    $arr=array();
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
		else return $arr;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	function simpleSearch($table,$colomn,$testedValue)
	{
		$qr="SELECT *FROM `".$table."` WHERE (".$colomn."='".$testedValue."')";
	    $res=$this->runQuery($qr);
	    return $res;
	}
}
?>