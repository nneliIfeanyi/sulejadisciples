<nav class="navbar border-bottom border-primary navbar-expand-md bg-dark mb-3 navbar-dark shadow" style="position: sticky;top: 0;z-index: 15;">
  <div class="container">
    <a class="navbar-brand text-light d-block d-md-none fst-italic" href="index.php">Suleja Disciples</a>
    <a class="navbar-brand text-primary d-none d-md-block fst-italic" href="index.php">Suleja Disciples</a>

   

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

     
    <div class="collapse navbar-collapse" id="navbarNav">
    
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Resources</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a href="articles.php" class="dropdown-item">Articles</a></li>
            <li><a href="articles.php" class="dropdown-item">Audio</a></li>
            <li><a href="articles.php" class="dropdown-item">Videos</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="contact.php" class="nav-link link-light">Contact Us</a>
        </li>
      </ul>
      <?php if(isset($_SESSION['username'])):?>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Administration</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a href="register.php" class="dropdown-item">Registration</a></li>
            <li><a href="attendance.php" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Attendance</a></li>
            <li><a href="day_one.php" class="dropdown-item">Day One Participants</a></li>
            <li><a href="day_two.php" class="dropdown-item">Day Two Participants</a></li>
            <li><a href="day_three.php" class="dropdown-item">Day Three Participants</a></li>
            <li><a href="comprehensive.php" class="dropdown-item">A Comprehensive List</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="fw-bold btn btn-outline-primary px-5" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </li>
      </ul>
      <?php else:?>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="fw-bold btn btn-outline-primary px-5" href="login.php">Login</a>
        </li>
        
      </ul>
    <?php endif;?>
    </div> 
  </div>
</nav>