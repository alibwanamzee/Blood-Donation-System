<?php
	include('../header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#donors').DataTable();
} );
</script>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

        <h2>Welcome,  <span style="color: blue"> <?php echo $_SESSION['username']?></span><br /> Manage Pending Donors </h2> <br />
  <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddonor">Add new</button></p> <br />           
  <table class="table table-bordered" id="donors">
    <thead>
      <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>By </th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      $members= $connection->query("SELECT * FROM donor WHERE pends='0'");
      while($row = $members->fetch_array()) {
       ?>

      	<tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['gender'];?></td>
      	<td><?php echo $row['phone'];?></td>
        <td><?php echo $row['username_fk'];?></td>      		
      	<td>
          <button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn btn-danger">Reject</button>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#active<?php echo $row['donor_id']?>" <?php if($row['status'] == '1') { echo 'disabled'; }?>><?php
          if($row['status'] == '1') { echo 'Accepted'; } else {  echo 'Accept'; }
           ?></button>
        </td>
         
      	</tr>
      	 <!-- delete donor modal -->
      	<div class="modal fade" id="deletdonor<?php echo $row['donor_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to reject request?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <a href="delete_donor.php?donor_id=<?php echo $row['donor_id'];?>"> <button type="button" class="btn btn-danger">Reject</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- end of delete donor modal -->
  <!-- active modal -->
  <div class="modal fade" id="active<?php echo $row['donor_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to accept this request? ?</p>
          <form action="edit_status.php?status_id=<?php echo $row['donor_id']?>&pends_id=0" method="post">

            <input type="hidden" name="status" value="1"></input>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-success">Accept</button>
        </div>
        </form>
      </div>
    </div>
  </div>

   
<?php }
      ?>
    </tbody> 
  </table>
</div>
	</div>
</div>

<!-- add state modal -->
<div class="modal fade" id="adddonor" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Donor Details</h4>
        </div>
        <div class="modal-body">
        <form action="add_donor.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"></input>
          </div>

          <div class="form-group">
            <select class="form-control" name="gender" id="gender" >
              <option value="male">Male</option>
              <option value="female">Female</option>
               <option value="other">Other</option>
            </select>
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Enter Registration Date"></input>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight"></input>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"></input>
          </div>
          <div class="form-group">
            <select class="form-control" name="blood" id="blood" >
            <option value="A+">A+</option>
            <option value="B+">B+</option>
            <option value="O+">O+</option>
            <option value="AB+">AB+</option>

             
            </select>
          </div>

           <div class="form-group">
            <select class="form-control" name="state" id="state" >
            <?php 
            $state = $connection->query("SELECT * FROM state");
            while($row = $state->fetch_array()){ ?>
             <option value="<?php echo $row['state_name'];?>"><?php echo $row['state_name'];?></option>
            
            <?php }
            ?>
             
            </select>
          </div>

          <div class="form-group">
            <select class="form-control" name="city" id="city" >
            <?php 
            $state = $connection->query("SELECT * FROM city");
            while($row = $state->fetch_array()){ ?>
             <option value="<?php echo $row['city_name'];?>"><?php echo $row['city_name'];?></option>
            
            <?php }
            ?>
             
            </select>
          </div>


          <div class="form-group">
            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter pincode"></input>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone"></input>
          </div>
          <div class="form-group">
            <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addmember">Add</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<?php
	include('../footer.php');
?>