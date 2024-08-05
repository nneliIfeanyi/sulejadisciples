<?php
class Pages extends Controller
{

  public function __construct()
  {
  }

  // Load Homepage
  public function index()
  {
    // If logged in, redirect to posts
    if (isset($_SESSION['user_id'])) {
      redirect('posts');
    }

    //Set Data
    $data = [
      'title' => 'Welcome To SharePosts',
      'description' => 'Simple social network built on the TraversyMVC PHP framework'
    ];

    // Load homepage/index view
    $this->view('pages/index', $data);
  }

  public function contact()
  {
    //Set Data
    $data = [
      'version' => '1.0.0'
    ];

    // Load about view
    $this->view('pages/contact', $data);
  }

  public function register()
  {
    $data = [
      'info' => 'Only Admin is allowed to register participants.'
    ];
    $this->view('pages/error_page', $data);
  }
}
