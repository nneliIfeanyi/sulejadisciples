<?php
class Auth
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  /**
   * Login user (by username or email) — verifies password
   */
  public function login($identifier, $password)
  {
    $this->db->query('SELECT * FROM users WHERE username = :identifier OR email = :identifier');
    $this->db->bind(':identifier', $identifier);

    $row = $this->db->single();

    if ($row) {
      if (password_verify($password, $row->password)) {
        return $row;
      }
      return false;
    }
    return false;
  }

  /**
   * Get user by ID
   */
  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    $this->db->bind(':id', $id);

    return $this->db->single();
  }


  /**
   * Check if user exists
   */
  public function userExists($identifier)
  {
    $this->db->query('SELECT * FROM users WHERE username = :identifier OR email = :identifier');
    $this->db->bind(':identifier', $identifier);
    if ($this->db->rowCount() > 0) {
      return true;
    }
    return false;
  }
}
