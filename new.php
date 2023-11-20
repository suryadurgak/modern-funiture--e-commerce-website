<?php
include("./include/conn.php");
session_start();
$msg = '';
$action = "add";

$productid='';
$productname='';
$description='';
$price='';
$categoryid='';

 
if(isset($_POST['save']))
{

$productid = $_POST['productid'];
$productname  = $_POST['productname'];
$description = $_POST['description'];
$price  = $_POST['price'];
$categoryid  = $_POST['categoryid'];


   
if($_POST['action']=="add") {
 
 $sql="SELECT * FROM producttable  WHERE productid = '$productid' ";
 $rs = $conn->query($sql);
 								 
 if ($row = $rs->fetch_assoc()) {
    header("location: new.php?act=6");
 }
else  {
  $sql="INSERT INTO producttable VALUES ('$productid','$productname','$description','$price','$categoryid'  )";
  $rs = $conn->query($sql) ;
    
   echo '<script type="text/javascript">            window.location="new.php?act=1";
   </script>';
  }
 }
 else if($_POST['action']=="update") {
  $sql="UPDATE  producttable  SET  productid  = '$productid', productname   = '$productname'  , Description= '$Description'   WHERE  price  = '$price', categoryid= '$categoryid'  "; 	
   if($conn->query($sql)===TRUE)
   echo '<script type="text/javascript">  window.location="new.php?act=2";
   </script>';
   else
	echo '<script type="text/javascript">  window.location="new.php?act=7";
   </script>';   
 }

}

if(isset($_GET['action']) && $_GET['action']=="delete"){
$productid=$_GET['productid'];
$sql="delete from  producttable WHERE productid='$productid'";
if($conn->query($sql)===TRUE)
  header("location: new.php?act=3");
else
  header("location: new.php?act=4");
}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" )
{
 $productid =  $_GET['productid'];
 $sql="SELECT * FROM producttable WHERE productid='".$productid."'";
 $rs = $conn->query($sql);
if($rs->num_rows){
   $row = $rs->fetch_assoc();
   extract($row);
   $action = "update";
}else{
$_GET['action']="";
}

}

if(isset($_REQUEST['act']) && $_REQUEST['act']=="1")
{
$msg = "<div class='alert alert-success'>   <strong>Success!</strong> Details Added successfully
  </div>";
}else if(isset($_REQUEST['act']) && $_REQUEST['act']=="2")
{
$msg = "<div class='alert alert-success'> <strong>Success!</strong> Details Edited successfully
</div>";
}
else if(isset($_REQUEST['act']) && $_REQUEST['act']=="3"  )
{
$msg = "<div class='alert alert-success'> <strong>Success!</strong> Details Deleted successfully</div>";
}
else if(isset($_REQUEST['act']) && $_REQUEST['act']=="4"){
$msg = "<div class='alert alert-danger'> <strong>Fail!</strong> Details is not Deleted </div>";	
}
else if(isset($_REQUEST['act']) && $_REQUEST['act']=="6"){
$msg = "<div class='alert alert-danger'> <strong>Fail!</strong> Details is  already exists!! </div>";	
}
else if(isset($_REQUEST['act']) && $_REQUEST['act']=="7"){
$msg = "<div class='alert alert-danger'> <strong>Fail!</strong> Details  is not updated!! </div>";	
}
?>

<!DOCTYPE html>
<html>
<head>  

        <link rel="shortcut icon" href="./dist/img/img.png">
        <link rel="icon" href="./dist/img/img.png" type="image/x-icon">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
              


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 </head>
 <div class="content-wrapper">
 <section class= "content">
<div class="row">
<div class="col-md-12">
        
<h1 class="page-head-line">Furniture Details
<?php
echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
? '<a href="new.php" class="btn btn-primary  pull-right"> Back <i class="glyphicon glyphicon-arrow-right"></i></a>' 
: '<a href="new.php?action=add" class="btn btn-primary   pull-right"><i class="glyphicon glyphicon-plus"></i> Add info. </a>';
 ?>
</h1>
                     
<?php
echo $msg;
?>
 </div>
</div>
  <?php 
 if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit"){
 ?>
	   <div class="row">
		<div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
        <div class="panel-heading">
  <?php echo ($action=="add")? "Add ": "Edit "; ?>
      </div>
		<form action="event.php" method="post"   class="form-horizontal">
        <div class="panel-body">
		<div class="form-group">
		<label class="col-sm-2 control-label" for="Old">productid</label>
		<div class="col-sm-10">
 	 <input type="text" class="form-control" id="productid" name="productid"  value="<?php echo $productid;?>" required  />
		</div>
		</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Old">productname</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="productname" name="productname"  value="<?php echo $productname;?>" required />
	</div>
	</div>
							
	<div class="form-group">
	<label class="col-sm-2 control-label" for="old">  description</label>
	<div class="col-sm-10">
	  <textarea class="form-control" id="description" name="description" required><?php echo $description ;?></textarea >
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="old">  price </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="price" name="price" value="<?php echo $price;?>"  required />
	</div>
	
	</div>
	
	<div class="form-group">
	<label class="col-sm-2 control-label" for="old">  categoryid </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="categoryid" name="categoryid" value="<?php echo $categoryid;?>"  required />
	</div>
	
	</div>
	
						
	<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
	<input type="hidden" name="id" 
	               value="<?php echo $id;?>">
    <input type="hidden" name="action" 
                    value="<?php echo $action;?>">
    <button type="submit" name="save" 
             class="btn btn-primary">Save </button>
</div>
</div>
 </div>
</form>
		
 </div>
 </div>
</div>
<?php
} else 
{
?>
		
	<div class="panel panel-primary">
         <div class="panel-heading">
             Modern Furniture
         </div>
    <div class="panel-body">
    <div class="table-sorting table-responsive">
    <table class="table table-striped table-bordered table-hover" >
     <thead>
         <tr>
           <th>SNo</th>
           <th>productid</th>
		   <th>productname</th>
           <th> description</th>
           <th>price</th>
		     <th>categoryid</th>
           <th>Action</th>
         </tr>
    </thead>
    <tbody>
	<?php
	$sql = "select * from producttable ";
	$rs = $conn->query($sql);
	$i=1;
	while($row = $rs->fetch_assoc())
	{
	  echo '<tr>
       <td>'.$i.'</td>
       <td>'.$row['productid'].'</td>
       <td>'.$row['productname'].'</td>
		<td>'.$row['description'].'</td>
       <td>'.$row['price'].'</td>
	   <td>'.$row['categoryid'].'</td>
	 
         
		<td>
<a href="event.php?action=edit&productid='.$row['productid'].'" class="btn btn-success btn-xs">
	<span class="glyphicon glyphicon-edit"></span>
</a>
<a onclick="return confirm(\'Are you sure you want to delete department\');" href="event.php?action=delete&productid='.$row['productid'].'" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span></a> 
</td>
</tr>';
$i++;
}
?>
	</tbody>
     </table>
     </div>
   </div>
    </div>
	
	
	
	
	
	
    <?php
	}
	?> 
	</section>
</div>

    <!-- /. WRAPPER  -->   
        <!-- ./wrapper -->

        <!-- jQuery -->

   
       
 
</body>
</html>