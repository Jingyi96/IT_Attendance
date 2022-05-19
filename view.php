<?php
$title = 'View Record';

require_once 'includes/header.php';
require_once 'db/conn.php'; // connect the database

// Get attendee by id
if (!isset($_GET['id'])) { // isset(): check whether id is exist
    // echo "<p>View Details ERROR!</p>";
    include 'includes/erroralert.php';
} else {
    // use $_GET[] to access the value in id from href="view.php?id..." url in viewrecords.php
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);

?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['firstname'] . ' ' . $result['lastname'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name'];  ?>
            </h6>
            <p class="card-text">
                Date Of Birth: <?php echo $result['dateofbirth'];  ?>
            </p>
            <p class="card-text">
                Email Adress: <?php echo $result['email'];  ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $result['contactnumber'];  ?>
            </p>

        </div>
    </div>
    <br />
    <a href="viewrecords.php" class="btn btn-info">Back to List</a>
    <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
    <!-- else之后写成功的代码 -->
<?php } ?>

<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>