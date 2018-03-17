<?php
session_start();
include 'connect.php';
?>

<style>
th{
	  
	background-color:#d81323;
	color:white;
}

  </style>

<br/>
<br/>

<div class="table-responsive responsive">
        <table class="table">
          <thead>
            <tr>
			 
			 <th>ID</th>
			 <th>Username</th>
             <th>Password</th>
			 <th>Firstname</th>
			 <th>Lastname</th>
			 <th>E-mail</th>
			 <th>Address</th>
			 <th>Delete</th>
            </tr>
          </thead>
          <tbody>
		  <?php $sql = "SELECT * FROM members WHERE role ='user';";
             $result = mysql_query($sql);
             while($row = mysql_fetch_array($result)){
                $id = $row["mem_id"]; 
			    $username = $row["username"];
                $password = $row["password"]; 
                $fname = $row["firstname"];
                $lname = $row["lastname"];
                $email = $row["email"];
                $address = $row["address"];?>
 
            <tr>
			 
			 <td><? echo "$id"?></td>
			 <td><? echo "$username"?></td>
             <td><? echo "$password"?></td>
             <td><? echo "$fname"?></td>
			 <td><? echo "$lname"?></td>
			 <td><? echo "$email"?></td>
			 <td><? echo "$address"?></td>
			 <td><? echo"<a href=delete_member.php?Member_ID=$id onclick=\"return confirm('Do you want to delete this?') \"><img src=\"images/del.png\" width='30' height='30' ></a>"?></td>
			</tr>
			 <?}
			 ?>
          </tbody>
        </table>
</div>