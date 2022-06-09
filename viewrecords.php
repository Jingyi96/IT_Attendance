<?php
$title = 'View Records';
require_once 'includes/header.php';
require_once 'db/conn.php'; // connect the database

// Get all attendees
$results = $crud->getAttendees();

?>



<table class="table">
    <!-- tablerow:表格行，只是一行 -->
    <tr>
        <!-- tablehead:每列的表头 -->
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <!-- <th>Date of Birth</th>
        <th>Email Address</th>
        <th>Contact Number</th> -->
        <th>Specialty</th>
        <th>Actions</th>
    </tr>

    <!-- 双冒号是对类中的方法的静态引用，也就是不需要实例化对象，直接通过类名对类中的方法进行引用 -->
    <!-- PDO::FETCH_ASSOC 从结果集中获取以列名为索引的关联数组 -->
    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <!-- 用两个php写while loop是因为中间要写HTML -->
        <tr>
            <!-- 从database中获取数据，必须和database中每列名字完全一致 -->
            <td><?php echo $r['attendee_id'] ?></td>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['name'] ?></td>
            <!-- 重要！！！send attendee_id to getAttendeeDetails($id) in crud.php -->
            <!-- create a link with query string: variable name: id, which is used by getAttendeeDetails($id) -->
            <td>
                <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php require_once 'includes/footer.php'; ?>