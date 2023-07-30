<?php require 'inc/header.php'; ?>
<?php if(isset($_SESSION['username'])):
  $year = date('Y');
  if (isset($_GET['surname'])) {
    $search_input = trim($_GET['surname']);
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
       
        <h2 class="text-success card-title">Participants Attendance</h2>
        <?php flash('error'); ?>
        <?php flash('success'); ?>
        <form action="search_results.php" method="get" class="modal-content modal-body border-0 p-0">
          <div class="row">
            <div class="col-md-6">
            <div class="input-group mb-2">
                <input type="text" class="form-control" name="surname" placeholder="Search by surname ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
          </div>
        </div>
        </form>
        <div class="card-body">
          <table class="table table-light">
            <thead>
               <tr class="">
                <th><b>S/N</b></th>
                 <th><b>Names</b></th>
                 <th><b>Day 1</b></th>
                 <th><b>Day 2</b></th>
                 <th><b>Day 3</b></th>
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
                  <tr class="">
                    <style type="text/css">
                      .btn-group a{
                        text-decoration: none;
                      }
                      .btn-group a:hover{
                        background: inherit;
                        color: inherit;
                        cursor: pointer;
                      }
                      
                    </style>
                    <th><?= $numbering;?></th>
                    <td><?=$name?></td>
                    <td>
                     <?php if(empty($day_one)):?>
                      <div class="btn-group">
                        <a href="attendance.php?id=<?=$id?>&name=<?=$full_name?>&day=day_one" class="badge bg-danger"><i class="fa fa-times" aria-hidden="true"></i> Absent</a>
                      </div>
                      <?php else:?>
                        <div class="btn-group">
                          <a class="badge bg-success mark"><i class="fa fa-check" aria-hidden="true"></i> present</a>
                          <!--
                            Reverse the attendace-->
                            <a href="attendance.php?id2=<?=$id?>&name=<?=$full_name?>&day=day_one" class="badge bg-warning"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                      <?php endif;?>
                    </td>
                    <td>
                      <?php if(empty($day_two)):?>
                        <div class="btn-group">
                          <a href="attendance.php?id=<?=$id?>&name=<?=$full_name?>&day=day_two" class="badge bg-danger"><i class="fa fa-times" aria-hidden="true"></i> Absent</a>
                        </div>
                      <?php else:?>
                        <div class="btn-group">
                            <a class="badge bg-success"><i class="fa fa-check" aria-hidden="true"></i> present</a>
                        <!--Reverse the attendace-->
                            <a href="attendance.php?id2=<?=$id?>&name=<?=$full_name?>&day=day_two" class="badge bg-warning"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                      <?php endif;?>
                    </td> 
                    <td>
                      <?php if(empty($day_three)):?>
                        <div class="btn-group">
                          <a href="attendance.php?id=<?=$id?>&name=<?=$full_name?>&day=day_three" class="badge bg-danger"><i class="fa fa-times" aria-hidden="true"></i> Absent</a>
                        </div>
                      <?php else:?>
                        <div class="btn-group">
                            <a class="badge bg-success"><i class="fa fa-check" aria-hidden="true"></i> present</a>
                        <!--Reverse the attendace-->
                            <a href="attendance.php?id2=<?=$id?>&name=<?=$full_name?>&day=day_three" class="badge bg-warning"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
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
