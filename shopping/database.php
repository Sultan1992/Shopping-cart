<?php

require_once("component.php");

class craeteDb{


    public $sarvername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

public function __construct(
    $sarvername="localhost:8889",
    $username="root",
    $password="",       
     $dbname="newdb",
    $tablename="productdb"


)
{ 
    $this->dbname=$dbname;
    $this->tablename=$tablename;
    $this->servername=$sarvername;
    $this->username=$username;
    $this->password=$password;
    //create connection to the data base.
    $this->con=mysqli_connect($sarvername,$username,"");
    //check the connecntion.
    if(!$this->con){
        die("connection failed". mysqli_connect_error());
    }
     //create database.
     $sql="CREATE DATABASE IF NOT EXISTS $dbname" ;

    if(mysqli_query($this->con,$sql)){
        $this->con=mysqli_connect($sarvername,$username,"",$dbname);

//create a table
$sql="CREATE TABLE IF NOT EXISTS $tablename 
(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY
product_name VARCHAR(25) NOT NULL,
product_price FLOAT,
product_image VARCHAR(100)
);";
IF(!mysqli_query($this->con,$sql)){
    echo "Error creating table".mysql_error($this->con);
  
}
   
}else{
    return false;
}
}
//get product from the database
public function getData(){
    $sql="SELECT*FROM $this->tablename";
$result=mysqli_query($this->con,$sql);
if(mysqli_num_rows($result)>0){
    return $result;
       
}



}

}
