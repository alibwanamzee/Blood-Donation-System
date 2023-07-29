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
  $(function() {
    $("#datepicker").datepicker();
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#donors').DataTable();
  });
</script>

<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <h2>Welcome, <span style="color: blue"><?php echo $_SESSION['username'] ?></span><br />Manage Pending Donors</h2><br />
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
          $members = $connection->query("SELECT d.*, u.name FROM donor d INNER JOIN users u ON d.member_id = u.member_id WHERE d.pends = '0'");
          while ($row = $members->fetch_array()) {
          ?>

            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['gender']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td>
                <button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id'] ?>" class="btn btn-danger">Reject</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#active<?php echo $row['donor_id'] ?>" <?php if ($row['status'] == '1') {
                                                                                                                                      echo 'disabled';
                                                                                                                                    } ?>>
                  <?php
                  if ($row['status'] == '1') {
                    echo 'Accepted';
                  } else {
                    echo 'Accept';
                  }
                  ?>
                </button>
              </td>
            </tr>

            <!-- delete donor modal -->
            <div class="modal fade" id="deletdonor<?php echo $row['donor_id'] ?>" role="dialog">
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
                    <a href="delete_donor.php?donor_id=<?php echo $row['donor_id']; ?>"><button type="button" class="btn btn-danger">Reject</button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of delete donor modal -->

            <!-- active modal -->
            <div class="modal fade" id="active<?php echo $row['donor_id'] ?>" role="dialog">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Are you sure ?</h4>
                  </div>
                  <div class="modal-body">
                    <p>Want to accept this request?</p>
                  </div>
                  <form action="edit_status.php?status_id=<?php echo $row['donor_id'] ?>" method="post">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Accept</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
include('../footer.php');
?>
