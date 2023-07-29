<?php
	include('../header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://smtpjs.com/v3/smtp.js"></script>

<script>
  $(function() {
    $("#datepicker").datepicker();
  });

  $(document).ready(function() {
    $('#donors').DataTable();
  });
</script>

<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">

      <h2>Welcome,  <span style="color: blue"> <?php echo $_SESSION['username']; ?></span><br> Manage Approved Donors</h2> <br />
      <!-- <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddonor">Add new</button></p> <br /> -->
      <table class="table table-bordered" id="donors">
        <thead>
          <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>City</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $members = $connection->query("SELECT d.*, u.name FROM donor d INNER JOIN users u ON d.member_id = u.member_id WHERE d.pends = '1'");
            while($row = $members->fetch_array()) {
          ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adddonor">Donate</button>
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- add donor modal -->
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
            <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Enter Registration Date"></input>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight"></input>
          </div>

          <div class="form-group">
            <select class="form-control" name="blood" id="blood" >
            <option>Select Blood Group</option>
            <option value="A+">A+</option>
            <option value="B+">B+</option>
            <option value="O+">O+</option>
            <option value="AB+">AB+</option>
            </select>
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

<script>
  $(function() {
    $("#datepicker").datepicker();
  });

  $(document).ready(function() {
    $('#donors').DataTable();
  });
</script>
