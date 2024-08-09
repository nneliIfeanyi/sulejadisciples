<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Add User / Register
  public function register($data)
  {
    // Prepare Query
    $this->db->query("INSERT INTO participants (surname, other_names, phone, church, referee, reg_date, reg_time) 
      VALUES (:surname, :other_names, :phone, :church, :referee, :reg_date, :reg_time)");

    // Bind Values
    $this->db->bind(':surname', $data['surname']);
    $this->db->bind(':other_names', $data['other_names']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':church', $data['church']);
    $this->db->bind(':referee', $data['invited_by']);
    $this->db->bind(':reg_date', $data['reg_date']);
    $this->db->bind(':reg_time', $data['reg_time']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function lastId()
  {
    $this->db->query("SELECT * FROM participants");
    $this->db->resultset();

    if ($this->db->execute()) {
      return $this->db->lastInsertId();
    }
  }

  // Delete Entry
  public function deleteEntry($id)
  {
    // Prepare Query
    $this->db->query('DELETE FROM participants WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $id);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  //Get registered row count
  public function get_registered_count()
  {
    $this->db->query("SELECT * FROM participants");

    $this->db->resultset();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return $this->db->rowCount();
    } else {
      return false;
    }
  }


  // Find USer BY Email
  public function findUserByEmail($email)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Login / Authenticate User
  public function login($email, $password)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Find User By ID
  public function getUserById($id)
  {
    $this->db->query("SELECT * FROM participants WHERE id = :id");
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}
