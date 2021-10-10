<?php 
	
	include('dbconfig.php');
	session_start();
//Login start
    if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$error = 0;
		if($username == ""){
			$error = $error + 1;
		}
		if($password == ""){
			$error = $error + 1;
		}

		if($error == 0){
			$sql = "SELECT * FROM users WHERE username='$username' && password='$password'";
	        $connection = db_config::DBConnect();
	        $resource_data = $connection->view($sql);
		    $resource_obj = $resource_data->fetch_object();
		    if(count((array)$resource_obj) == 0){
		    	 $_SESSION["login_msg"] = "Username or password invalid";
				 header('location:../index.php');

		    }else{
		    	// $username = $resource_obj->username;
				$sql = "SELECT * FROM users where username='$username'";
		        $connection = db_config::DBConnect();
		        $resource_data = $connection->view($sql);
			    $resource_obj = $resource_data->fetch_object();
				$_SESSION["username"] = $resource_obj->username;
             	header('location:../phonebook.php');
		    }

		}

        if ($error>0) {
			$_SESSION["login_msg"] = "Username or password field empty";
			header('location:../index.php');
        }
	

	}
//login end

if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['username'])){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$connection = db_config::DBConnect();
	$sql = "INSERT INTO contuctlist VALUES('$username','$name','$phone')";
	$connection->insert($sql);

}

if(isset($_POST['display']) && isset($_POST['username'])){
	$username=$_POST['username'];
	$number=1;
	$table='<table class="table table-dark table-hover table-striped">
	<thead>
	  <tr>
		<th scope="col">SI No.</th>
		<th scope="col">Name</th>
		<th scope="col">Phone</th>
	  </tr>
	</thead>';
	$sql = "SELECT * FROM contuctlist where username='$username'";
	$connection = db_config::DBConnect();
	$resource_data = $connection->view($sql);
	while($resource_obj = $resource_data->fetch_object()){
	$table.='
    <tr>
      <td>'.$number.'</td>
      <td>'.$resource_obj->name.'</td>
      <td>'.$resource_obj->phone.'</td>
    </tr>
	';
	$number++;
	}

	$table.='</table>';
	echo $table;
};


if(isset($_GET['logout'])){
	session_destroy();
	header('location:../index.php');
}
?>