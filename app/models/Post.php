<?php
class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Add OR Shedule Appointment
  public function addPost($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO appointment (phone, name, message) 
      VALUES (:phone, :name, :message)');

    // Bind Values
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':message', $data['message']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Register Participant
  public function register($data)
  {
    // Prepare Query for participant registration
    $this->db->query('INSERT INTO registration (firstname, middlename, surname, phone, email, age, marital_status, denomination, address, event_ongoing, event_year, is_member, created_at) 
      VALUES (:firstname, :middlename, :surname, :phone, :email, :age, :marital_status, :denomination, :address, :event_ongoing, :event_year, :is_member, NOW())');

    // Bind Values - Format names to proper case (capitalize first letter)
    $this->db->bind(':firstname', ucwords(strtolower($data['firstname'])));
    $this->db->bind(':middlename', !empty($data['middlename']) ? ucwords(strtolower($data['middlename'])) : '');
    $this->db->bind(':surname', ucwords(strtolower($data['surname'])));
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':age', $data['age']);
    $this->db->bind(':marital_status', $data['marital_status']);
    $this->db->bind(':denomination', $data['denomination']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':event_ongoing', $data['event_ongoing']);
    $this->db->bind(':event_year', $phpdate = date('Y')); // Automatically set current year
    $this->db->bind(':is_member', $data['is_member']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Get All Registrations
  public function getRegistrations()
  {
    $this->db->query('SELECT * FROM registration ORDER BY created_at DESC');
    return $this->db->resultset();
  }

  // Get Single Registration By ID
  public function getRegistrationById($id)
  {
    $this->db->query('SELECT * FROM registration WHERE id = :id');
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  // Update a Participant Record
  public function updateRegistration($data)
  {
    $this->db->query('UPDATE registration SET firstname = :firstname, middlename = :middlename, surname = :surname, phone = :phone, email = :email, age = :age, marital_status = :marital_status, denomination = :denomination, address = :address, event_ongoing = :event_ongoing, is_member = :is_member WHERE id = :id');

    $this->db->bind(':id', $data['id']);
    $this->db->bind(':firstname', ucwords(strtolower($data['firstname'])));
    $this->db->bind(':middlename', !empty($data['middlename']) ? ucwords(strtolower($data['middlename'])) : '');
    $this->db->bind(':surname', ucwords(strtolower($data['surname'])));
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':age', $data['age']);
    $this->db->bind(':marital_status', $data['marital_status']);
    $this->db->bind(':denomination', $data['denomination']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':event_ongoing', $data['event_ongoing']);
    $this->db->bind(':is_member', $data['is_member']);

    return $this->db->execute();
  }

  // Delete a Participant Record
  public function deleteRegistration($id)
  {
    $this->db->query('DELETE FROM registration WHERE id = :id');
    $this->db->bind(':id', $id);
    return $this->db->execute();
  }

  // Save Audio File URL to DB
  public function saveAudio($data)
  {
    $this->db->query('INSERT INTO audios (title, category, details, duration, audio_url, thumbnail_url) VALUES (:title, :category, :details, :duration, :audio_url, :thumbnail_url)');
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':details', $data['details']);
    $this->db->bind(':duration', $data['duration']);
    $this->db->bind(':audio_url', $data['audio_url']);
    $this->db->bind(':thumbnail_url', $data['thumbnail_url']);
    return $this->db->execute();
  }
}
