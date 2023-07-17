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

    // Click event for the "Send Alert" button
    $(document).on("click", ".btn-primary", function() {
      var $btn = $(this);
      $btn.removeClass("btn-primary").addClass("btn-success").text("Alert Sent");
      alert("Alert sent");
    });
  });

  $(document).ready(function() {
    $('#donors').DataTable();
  });
</script>

<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">

      <h2>Hello,  <span style="color: blue"> <?php echo $_SESSION['username']; ?></span> Manage Donors Here. </h2> <br />
      <!-- <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddonor">Add new</button></p> <br /> -->
      <table class="table table-bordered" id="donors">
        <thead>
          <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>By</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $members= $connection->query("SELECT * FROM donor WHERE status='1'");
          while ($row = $members->fetch_array()) {
          ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['username_fk']; ?></td>
            <td>
              <button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']; ?>" class="btn btn-primary">Send Alert</button>
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

<?php
	include('../footer.php');
?>
