<?php
class Pages extends Controller
{

  public ?User $userModel;
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }
  // Load Homepage
  public function index()
  {
    redirect('users/login');
  }
}
