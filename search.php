<?php require 'inc/header.php'; ?>
<?php if(isset($_SESSION['username'])):

  if (isset($_GET['surname'])) {
    $search_input = trim($_GET['surname']);
    $year = '2023';
    $sql = "SELECT * FROM participants WHERE surname = '$search_input' AND year = '$year' ";
    $query = mysqli_query($conn, $sql);
  }


?>
<div>
 <div class="row">
   <div class="col-md-3">
    <?php include 'inc/nav.php'; ?>
   </div>
   <div class="col-md-9">
    <div class=" mx-auto">
      <div class="card bg-light px-2 my-3">
        <p class="lead fw-semibold">Greater Bethesda 2023</p>
        <h2 class="text-success h5 card-title">Search results for all registered participants</h2>
          <div class="row">
            <div class="col-md-6">
              <form action="search.php" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                  <input type="text" class="form-control" name="surname" placeholder="Search More ...">
                  <button type="submit" class="input-group-text bg-success text-light">
                  <i class="fa fa-fw fa-search text-white"></i> Search
                  </button>
                </div>
              </form>
            </div>
            <div class="col-12 py-2">
            <a href="comprehensive.php" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Go Back</a>
          </div>
          </div>
        <div class="card-body">
          <table class="table table-light">
            <thead>
               <tr class="">
                <th><b>S/N</b></th>
                 <th><b>Names</b></th>
                 <th><b>Day one</b></th>
                 <th><b>Day two</b></th>
                 <th><b>Day three</b></th>
               </tr>
            </thead>

             <tbody>
               <?php 
                 $info = mysqli_num_rows($query);
                 if($info > 0) {
                  $numbering = 1;
                    while($result = mysqli_fetch_array($query)){
                      $other_names = $result['other_names'];
                      $full_name = $result['surname'] . " " . $result['other_names'];
                      $name = $full_name;
                      $day_one = $result['day_one'];
                      $day_two = $result['day_two'];
                      $day_three = $result['day_three'];
                      $id = $result['id'];
                  
                  ?>
                  <tr class="t-row">
                     <style type="text/css">
                      .t-row a{
                        text-decoration: none;
                      }
                      .t-row a:hover{
                        background: inherit;
                        color: inherit;
                        cursor: pointer;
                      }
                    </style>
                    <th><?= $numbering;?></th>
                    <td><?=$name?></td>
                    <td>
                      <?php if(empty($day_one)):?>
                       <a class="badge bg-danger">Absent</a>
                       <?php else:?>
                           <a class="badge text-dark fw-semibold"><?=$day_one?></a>
                       <?php endif;?>
                    </td>
                     <td>
                      <?php if(empty($day_two)):?>
                       <a class="badge bg-danger">Absent</a>
                       <?php else:?>
                           <a class="badge text-dark fw-semibold"><?=$day_two?></a>
                       <?php endif;?>
                    </td>
                     <td>
                      <?php if(empty($day_three)):?>
                       <a class="badge bg-danger">Absent</a>
                       <?php else:?>
                           <a class="badge text-dark fw-semibold"><?=$day_three?></a>
                       <?php endif;?>
                    </td>
                   
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
