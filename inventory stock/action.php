<?php

include "db.php";

class DataOperation extends DataBase
{

    //Insertion Query 
    public function insert_record($table,$fileds) 
    {
        //"INSERT INTO Table_name (,,) VALUES ('','')";
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= "(".implode(",",array_keys($fileds)).") VALUES "; 
        $sql .= "('".implode("','",array_values($fileds))."')";
        $query = mysqli_query($this->con,$sql);
        if($query)
        {
            return true;
        }
    }



    //selection query
    public function fetch_record($table)
    {
        //"SELECT * FROM table_name
        $sql = "SELECT * FROM ".$table;
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query))
        {
            $array[] = $row;
        }
        return $array;
    }

    //updation query
    public function select_record($table,$where,$id)
    {
        // echo $table." ".$where;
        
        // $sql = "";
        // $condition = "";
        // foreach($where as $key=>$value)
        // {
            
        // }

        // echo $table."".$id;
        // print_r($where);

        // $sql = "UPDATE ".$table." SET i_name='".$newname."',qty='".$qty."' WHERE id='".$id."'";
        $sql = "";
        $sql .= "UPDATE ".$table." SET i_name='";
        $sql .= $where['i_name']."',qty='".$where['qty']."' WHERE id='".$id."'";
        $query = mysqli_query($this->con,$sql);
        if($query)
        {
            return true;
        }
    }

    public function seletion_med($dbname,$id)
    {
        $arr = array();
        $sql = "SELECT * FROM ".$dbname." WHERE id='".$id."'";
        //echo $sql ;
        $result = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_array($result))
        {
            $arr[] = $row;
        }
        return $arr;
    }
    
    public function delete_record($table,$id)
    {
        //DELETE $table WHERE id = $id
        // echo $table.",".$id;

        $sql = "DELETE FROM ".$table." WHERE id='".$id."'";
        $query = mysqli_query($this->con,$sql);
        if($query)
        {
            return true;
        }
    }

}
$obj = new DataOperation;
if(isset($_POST['submit']))
{
    $myArray = array(
        "i_name" => $_POST['name'],
        "qty" => $_POST['qty']
    );
    // foreach($myArray as $arr)
    // {
    //     echo $arr."<br>";
    // }


    if($obj->insert_record("inventory",$myArray)){
        header("location:index.php?msg=Record Inserted"); //if insertion query gives true than it work.
    }
}

if(isset($_GET['delete']))
{
    $id = $_GET['id'];
    if($obj->delete_record("inventory",$id))
    {
        header("location:index.php");
    }
    
}


?>