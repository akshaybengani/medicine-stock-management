<?php

include "action.php";



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <title>Document</title>
    <style>
    a{
        text-decoration: none;
        color: white;
    }
    a:hover{
        text-decoration: none;
        color: white;
    }
   
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Inventory stock</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                 <div class="panel panel-primay"> 
                    <div class="panel-heading">Enter the Inventory Details</div>
                    <div class="panel-body">
                        <?php
                        
                            if(isset($_GET["update"]))
                            {
                                $id = $_GET['id'] ?? null;
                                //$where = array("id"=>$id);
                                // $obj->select_record("inventory",$id);
                                 $inventory = $obj->seletion_med("inventory",$id);
                                foreach($inventory as $row)
                                {

                                // }
                            // }
                            
                        ?>
                        <div id="update">
                        <form action="#" method="post">
                            <table class="table table:hover">
                                <tr>
                                    <td>Inventory Name</td>
                                    <td><input type="text" class="form-control" name="name" value="<?php echo $row['i_name'];?>"></td>
                                </tr>
                                <tr>
                                    <td>quantity</td>
                                    <td><input type="number" class="form-control" name="qty" value="<?php echo $row['qty'];?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input class="btn btn-primary" type="submit" name="update" value="update"></td> 
                                </tr>
                            </table>
                            <?php
                            
                             if(isset($_POST['update']))
                             {
                                $myArray2 = array(
                                    "i_name" => $_POST['name'],
                                    "qty" => $_POST['qty']
                                );
                                if($obj->select_record("inventory",$myArray2,$id))
                                {
                                    header("location:index.php");
                                }
                             }
                            }
                        }else{
                         ?>
                        </form>
                        </div>

                        <!-- ordiginal -->
                    <div >
                        <form method="post" action="action.php">
                            <table id="store" class="table table-hover">
                                <tr>
                                    <td>inventory Name</td>
                                    <td><input type="text" class="form-control" name="name" placeholder="Enter inventory Name."></td>
                                </tr>
                                <tr>
                                    <td>quantity</td>
                                    <td><input type="number" class="form-control" name="qty" placeholder="quantity"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input class="btn btn-primary" type="submit" name="submit" value="store"></td> 
                                </tr>
                            </table>
                        </form>
                    </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>inventory Name</th>
                        <th>Availablity</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                    $medi =  $obj->fetch_record("inventory");
                    foreach($medi as $row)
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['i_name']; ?></td>
                        <td><b><?php echo $row["qty"]; ?></b></td>
                        <td><button class="btn btn-info" onclick="myfun()"><a href="index.php?update=1&id=<?php echo $row['id']; ?>">Edit</a></button></td>
                        <td><a href="action.php?delete=1&id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <script>
    function myfun()
    {
        document.getElementById('store').style.display = "none";
    }
    </script>
</body>
</html>