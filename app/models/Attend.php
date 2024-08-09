<?php
class Attend
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    // Get All Posts
    public function getNames()
    {
        $this->db->query("SELECT * From participants");

        $results = $this->db->resultset();

        return $results;
    }

    public function getCountDay1()
    {
        $this->db->query("SELECT * From attendance2 WHERE dayz = :dayz;");
        $this->db->bind(':dayz', 'day1');

        $this->db->resultset();

        return $this->db->rowCount();
    }

    public function getCountDay2()
    {
        $this->db->query("SELECT * From attendance2 WHERE dayz = :dayz;");
        $this->db->bind(':dayz', 'day2');
        $this->db->resultset();

        return $this->db->rowCount();
    }

    public function getCountDay3()
    {
        $this->db->query("SELECT * From attendance2 WHERE dayz = :dayz;");
        $this->db->bind(':dayz', 'day3');
        $this->db->resultset();

        return $this->db->rowCount();
    }

    public function getDay1()
    {
        $this->db->query("SELECT * From attendance2 WHERE dayz = :dayz;");
        $this->db->bind(':dayz', 'day1');
        $results = $this->db->resultset();

        return $results;
    }
    public function getDay2()
    {
        $this->db->query("SELECT * From attendance2 WHERE dayz = :dayz;");
        $this->db->bind(':dayz', 'day2');
        $results = $this->db->resultset();

        return $results;
    }
    public function getDay3()
    {
        $this->db->query("SELECT * From attendance2 WHERE dayz = :dayz;");
        $this->db->bind(':dayz', 'day3');
        $results = $this->db->resultset();

        return $results;
    }

    public function markAttendance($id, $name, $year, $day, $time)
    {
        // Prepare Query
        $this->db->query("INSERT INTO attendance2 (user_id, fullname, yearz, dayz, timez) 
      VALUES (:user_id, :fullname, :yearz, :dayz, :timez)");

        // Bind Values
        $this->db->bind(':user_id', $id);
        $this->db->bind(':fullname', $name);
        $this->db->bind(':yearz', $year);
        $this->db->bind(':dayz', $day);
        $this->db->bind(':timez', $time);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Unmark Attendance
    public function unMarkAttendance($id, $year, $day)
    {
        // Prepare Query
        $this->db->query('DELETE FROM attendance2 WHERE user_id = :user_id AND yearz = :yearz AND dayz = :dayz');

        // Bind Values
        $this->db->bind(':user_id', $id);
        $this->db->bind(':yearz', $year);
        $this->db->bind(':dayz', $day);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Get registered row count
    public function get_attendance_count($day, $year)
    {
        $this->db->query("SELECT * FROM attendance2 WHERE dayz = :dayz AND yearz = :yearz");
        $this->db->bind(':dayz', $day);
        $this->db->bind(':yearz', $year);

        $this->db->resultset();

        //Check Rows
        if ($this->db->rowCount() > 0) {
            return $this->db->rowCount();
        } else {
            return false;
        }
    }

    // Find User By ID
    public function getUserById($id, $dayz, $yearz)
    {
        $this->db->query("SELECT * FROM attendance2 WHERE user_id = :id AND dayz = :dayz AND dayz = :dayz");
        $this->db->bind(':id', $id);
        $this->db->bind(':dayz', $dayz);
        $this->db->bind(':yearz', $yearz);

        $row = $this->db->single();

        //Check Rows
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
