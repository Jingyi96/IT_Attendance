<!-- includes: if file not found, send warning, but website will continue
     require: if file not found, the website will crush -->


<?php
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php'; // connect the database

$results = $crud->getSpecialties(); // results = $crud.getSpecialties()
?>

<h1>Registration for IT conference</h1>

<!-- method: get, post    action: the page after submit -->
<form method="post" action="success.php">
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <!-- "name" is used for server to get value!!!!!!!!!!!!!!! -->
        <!-- "required" 表明这一行必须填写 -->
        <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname">
    </div>

    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob">
    </div>

    <div class="mb-3">
        <label for="specialty">Area Of Expertise</label>
        <select class="form-select" id="specialty" name="specialty">
            <!-- <option>Database Admin</option>
            <option>Software Developer</option>
            <option>Web Administration</option>
            <option>Other</option> -->
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
            <?php } ?>

        </select>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
        <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>


    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


<?php require_once 'includes/footer.php'; ?>