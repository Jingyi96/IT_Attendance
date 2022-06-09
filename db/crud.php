<!-- crud: a naming convention for a create, read, update, delete file -->
<?php
class crud
{
    // private database object
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn; // this.db = conn; in Java, -> 是 . 的意思
    }

    // function to insert a new record into the attendee database
    public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,email,contactnumber,specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql); // stmt = this.db.prepare(sql)
            // bind all placeholders to the actual values
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);

            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendees()
    {
        try {
            // 把表attendee和表specialties根据共同的一列specialty_id关联在一起
            // 这样我们就能拿到specialties表中的所有数据，包括name这一列
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialties()
    {
        try {
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendeeDetails($id)
    {
        try {
            // :id is a placeholder
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id 
                 where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`email`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id ";
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);

            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttendee($id)
    {
        try {
            $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>