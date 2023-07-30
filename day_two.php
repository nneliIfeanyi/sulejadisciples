<?php require 'inc/header.php'; ?>
<?php if(isset($_SESSION['username'])): 
$year = date('Y');
$sql = "SELECT * FROM participants WHERE year = '$year' AND day_two != '' ";
$query = mysqli_query($conn, $sql);
$info = mysqli_num_rows($query);
$total_participants = $info;
  ?>
 <div class="row">
   <div class="col-md-3">
    <?php include 'inc/nav.php'; ?>
   </div>
   <div class="col-md-9">
      <div class="card bg-light px-2 my-3">
        <div class="row p-2">
          <div class="col-md-6">
            <p class="lead fw-semibold">Greater Bethesda 2023 </p>
             <h2 class="text-success card-title">Day Two Participants</h2>
              <p class="lead">Total of <span class="bg-dark text-white p-1 rounded-circle"><?=$total_participants?></span> participants</p>
          </div>
          <div class="col-md-6 my-auto">
            <div class="dropdown">
              <a class="dropdown-toggle btn btn-outline-success fw-bold" data-bs-toggle="dropdown">Sort Participants</a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a href="full_participants.php" class="dropdown-item">Full Participants</a></li>
                <li><a href="additions1.php" class="dropdown-item">Day two Additions</a></li>
                <li><a href="additions2.php" class="dropdown-item">Day One Absents</a></li>
              </ul>
            </div>
          </div>
        </div>
          <table class="table table-light">
            <thead>
               <tr class="">
                <th><b>S/N</b></th>
                 <th><b>Names</b></th>
                 <th><b>Time Arrived</b></th>
               </tr>
            </thead>

             <tbody>
               <?php 
                 if($info > 0) {
                  $numbering = 1;
                    while($result = mysqli_fetch_array($query)){
                      $other_names = $result['other_names'];
                      $full_name = $result['surname'] . " " . $result['other_names'];
                      $name = $full_name;
                      $arrival_time = $result['day_two'];
                      $id = $result['id'];
                  
                  ?>
                  <tr class="">
                    <th><?= $numbering; ?></th>
                    <td><?= $name; ?></td>
                    <td><?= $arrival_time; ?></td>
                  </tr>
                  <?php
                  $numbering ++;
                  }
                 
                 }else{
                  ?>
                   <tr>
                      <td colspan="5" class="text-danger">No result found.</td>
                   </tr>

                  <?php
                 }

               ?>
             </tbody>
           </table>
           </div>
        </div>
      </div>
<?php else : ?>
  
  <div class="py-4 px-2 bg-light">
    <p class="lead fw-semibold">Greater Bethesda 2023 <br><span class="badge bg-primary">theme</span></p>
    <h1 class="display-1 fw-bold">The Glory of the Gospel</h1>
    <div class="d-grid my-4 d-block d-md-none">
      <a href="login.php" class="btn btn-success">Admin Login</a>
    </div>
  </div>

<?php endif;?>
<?php include 'inc/footer.php'; ?>
