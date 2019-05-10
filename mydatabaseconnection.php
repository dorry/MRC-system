<?php
Class database{
    public static $instance;
    public  $servername;
    public  $username;
    public  $password;
    public  $dbname;
    public $conn;
    public  function __construct($sname, $uname , $p , $dname)
        {
            $this->servername = $sname;
            $this->username = $uname;
            $this->password = $p;
            $this->dbname = $dname;
        if(self::$instance == NULL)
        {
            self::$instance = $this;
            $this->DBC();
        }

        }
    function DBC()
        {
            if($this->conn == NULL)
                {
                    $this->conn= new mysqli($this->servername,  $this->username,$this->password, $this->dbname);
                }
        }
    function query($table, $condition)
        {
        $sql = "select * from ".$table." where ".$condition." ";
        $result = mysqli_query($this->conn,$sql);
      // echo $sql;
      // echo "<br>";
        return $result;
        }
    function cquery($table, $condition)
        {
        $sql = "select COUNT(*) from ".$table." where ".$condition." ";
        $result = mysqli_query($this->conn,$sql);
        //echo $sql;
        //echo "<br>";
        return $result;
        }
    function idquery($table, $condition) {
        $sql = "select id from ".$table." where ".$condition." ";
        $result = mysqli_query($this->conn,$sql);
        //echo $sql;
        return $result;}
    function nquery($table, $condition){
        $sql = "select name from ".$table." where ".$condition." ";
        $result = mysqli_query($this->conn,$sql);
        //echo $sql;
        return $result;}
    function insertlast($table, $attribute , $value )
    {
        $sql = "Insert INTO ".$table." (".$attribute.") values(".$value.") ";
        $result = mysqli_query($this->conn,$sql);
        $lastidreserved=mysqli_insert_id($this->conn);
        echo $sql;
        echo "<br>";
        return $lastidreserved;
    }
    function insertquery($table, $attribute , $value )
        {
        $sql = "Insert INTO ".$table." (".$attribute.") values(".$value.") ";
        $result = mysqli_query($this->conn,$sql);
        echo $sql;
        echo "<br>";
        return $result;
        }
     function updatequery($table, $attribute , $value, $condition) {
        $sql = "UPDATE  ".$table." SET ".$attribute." = ".$value." WHERE ".$condition."  " ;
        $result = mysqli_query($this->conn,$sql);
        echo $sql;
        echo "<br>";
        return $result;}
    function update4query($table, $attribute, $attribute2 ,  $attribute3,  $attribute4 , $value, $value2, $value3 , $value4, $condition)
        {
               $sql = "UPDATE  ".$table." 
                SET ".$attribute." = ".$value." , ".$attribute2." =".$value2." , 
                    ".$attribute3." = ".$value3.", ".$attribute4." = ".$value4."
                WHERE ".$condition."  " ;  
        $result = mysqli_query($this->conn,$sql);
        echo $sql;
        return $result;
        }
        function update7query($table, $attribute, $attribute2 ,  $attribute3,  $attribute4, $attribute5, $attribute6 , $attribute7 , $value, $value2, $value3 , $value4, $value5, $value6, $value7,$condition)
        {
               $sql = "UPDATE  ".$table." 
                SET ".$attribute." = ".$value." , ".$attribute2." =".$value2." , 
                    ".$attribute3." = ".$value3.", ".$attribute4." = ".$value4.",
                    ".$attribute5." = ".$value5.", ".$attribute6." = ".$value6.",
                    ".$attribute7." = ".$value7."   WHERE ".$condition."  " ;  
        $result = mysqli_query($this->conn,$sql);
        return $result;
        }
     function update2query($table, $attribute , $attribute2 , $value, $value2 , $condition)
        {
        $sql = "UPDATE  ".$table." 
                SET ".$attribute." = ".$value." , ".$attribute2." =".$value2."
                WHERE ".$condition."  " ;
        $result = mysqli_query($this->conn,$sql);
        echo $sql;
        return $result;
        }
        function deletequery($table, $attribute , $value, $condition)
        {
        $sql = "UPDATE  ".$table." SET ".$attribute." = ".$value." WHERE ".$condition."  " ;
        $result = mysqli_query($this->conn,$sql);
        return $result;
        }

        static function getinstance()
        {
        if(self::$instance == NULL)
        {
            $object = new database("localhost","root","","mrc");

        }
        return self::$instance;
        }
        function ckeditor($code)
        {
        return mysqli_real_escape_string($this->conn,$code);
        }
    }
?>