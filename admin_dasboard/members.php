<?php
	include('../header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#members').DataTable();
} );
</script>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

  <h2>Welcome,  <span style="color: blue"> <?php echo $_SESSION['username']?></span><br />Manage Users</h2> <br />
           
  <table class="table table-bordered" id="members">
    <thead>
      <tr>
        <th>Name</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Usertype</th>
        
        <th>Profile</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      $members= $connection->query("SELECT * FROM users");
      while($row = $members->fetch_array()) {
       ?>

      	<tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['username'];?></td>
      	<td><?php echo $row['password'];?></td>
        <td><?php echo $row['usertype'];?></td>
       
        <td><?php if($row['profile'] == ''){ ?>
        <img src="http://wiki.bdtnrm.org.au/images/8/8d/Empty_profile.jpg" width="30px" height="30px">
        <?php   } else { ?>
        <img src="../<?php echo $row['profile'];?>" width="30px" height="30px">
        <?php  } ?></td>
      		
      		<td><button type="button" data-toggle="modal" data-target="#deletemember<?php echo $row['member_id']?>" class="btn btn-danger">Delete</button>
      		<button type="button" data-toggle="modal" data-target="#editmember<?php echo $row['member_id'];?>" class="btn btn-warning">Edit</button></td>
      	</tr>
      	 <!-- delete city modal -->
      	<div class="modal fade" id="deletemember<?php echo $row['member_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to delete ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <a href="delete_member.php?member_id=<?php echo $row['member_id'];?>"> <button type="button" class="btn btn-danger">Delete</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- end of delete state modal-->

  <!-- edit member modal -->
  <div class="modal fade" id="editmember<?php echo $row['member_id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Member</h4>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" action="edit_member.php?member_id=<?php echo $row['member_id'];?>" method="post" >
         <div class="form-group">
           <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']?>"></input>
         </div>
          <div class="form-group">
           <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']?>" disabled=""></input>
         </div>

          <div class="form-group">
           <input type="text" name="password" id="password" class="form-control" disabled="" value="<?php echo $row['password']?>" ></input>
         </div>
         
         <div class="form-group">
           <input type="file" name="photo" id="photo" class="form-control" ></input>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Edit</button>

        </div>
      </div>
      </form>
      
    </div>
  </div> 
   
<?php }
      ?>
    </tbody> 
  </table>
</div>
	</div>
</div>

<?php
	include('../footer.php');
?>