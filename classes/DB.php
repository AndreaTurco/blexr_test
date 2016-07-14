<?php

class DB{

    protected $db_name = "blexr_odds_conv";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_host = "localhost";

    //open a connection to the database. Make sure this is called
    //on every page that needs to use the database.
    public function connect() {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass,$this->db_name);

        return true;
    }
    
    //Select rows from the database.
    //returns a full row or rows from $table using $where as the where clause.
    //return value is an associative array with column names as keys.
    public function select($table, $where) {
        $sql = "SELECT * FROM $table WHERE $where";
        $result = mysqli_query($sql);
        if(mysqli_num_rows($result) == 1)
            return $result;
        else
            return 0;
    }
    
    //Updates a current row in the database.
    //takes an array of data, where the keys in the array are the column names
    //and the values are the data that will be inserted into those columns.
    //$table is the name of the table and $where is the sql where clause.
    public function update($data, $table, $where) {
        foreach ($data as $column => $value) {
            $sql = "UPDATE $table SET $column = $value WHERE $where";
            mysqli_query($sql) or die(mysqli_error());
        }
        return true;
    }
    
    //Inserts a new row into the database.
    //takes an array of data, where the keys in the array are the column names
    //and the values are the data that will be inserted into those columns.
    //$table is the name of the table.
    public function insert($data, $table) {
        
        $columns = "";
        $values = "";
        
        foreach ($data as $column => $value) {
            $columns .= ($columns == "") ? "" : ", ";
            $columns .= $column;
            $values .= ($values == "") ? "" : ", ";
            $values .= $value;
        }
 
        $sql = "insert into $table ($columns) values ($values)";
 
        mysqli_query($sql) or die(mysqli_error());
 
        //return the ID of the user in the database.
        return mysqli_insert_id();
 
    }

}