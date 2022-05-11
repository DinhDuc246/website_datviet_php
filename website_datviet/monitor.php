<?php 
    include 'inc/header.php';
?>
        <section class="section-project">
        <div class="container-fluid" style="padding-left:100px; padding-right:50px; padding-top: 100px;">
        <div class="container"> 
         <div class="title" style="text-align: center;text-transform: uppercase;">
            <h3>Dự án giám sát</h3>
        </div>  
            <div class="cards">
                 <?php 
         $project_new = $project->getproject_new();
         if($project_new){
            while($result_monitor = $project_new->fetch_assoc()){
                 ?>
                <div class="card">
                <img src="admin/uploads/<?php echo $result_monitor['image'] ?>" width="413px" height ="400px" alt="">
                <div class="card-body">
                  <h5 class="card-title" style="text-align: center;text-transform: uppercase;"><?php echo $result_monitor['projectName'] ?></h5>
                   <p class="text">Địa chỉ: <?php echo $result_monitor['address'] ?></p>
                    <p class="text">Mô tả công trình: <?php echo $result_monitor['project_desc']?></p>
                    <p class="text-date">Độ cao: <?php echo $result_monitor['height'] ?></p>
                    <a href="details.php?pjid=<?php echo $result_monitor['projectId'] ?>" class="details" class="card-link">Chi tiết</a>
                </div>
            </div>
            <?php 
                }
               } 
               ?>
            </div>
        </div>
        </div>
        </section>
<?php 
    include 'inc/footer.php';
?>