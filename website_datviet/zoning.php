<?php 
    include 'inc/header.php';
?>
        <section class="section-project">
        <div class="container-fluid" style="padding-left:100px; padding-right:50px; padding-top: 100px;">
        <div class="container"> 
         <div class="title" style="text-align: center;text-transform: uppercase;">
            <h3>Dự án thi công </h3>
        </div>  
            <div class="cards">
                 <?php 
         $project_zoning = $project->getproject_zoning();
         if($project_zoning){
            while($result_zoning = $project_zoning->fetch_assoc()){
                 ?>
                <div class="card">
                <img src="admin/uploads/<?php echo $result_zoning['image'] ?>" width="413px" height ="400px" alt="">
                <div class="card-body">
                  <h5 class="card-title" style="text-align: center;text-transform: uppercase;"><?php echo $result_zoning['projectName'] ?></h5>
                   <p class="text">Địa chỉ: <?php echo $result_zoning['address'] ?></p>
                    
                    <p class="text">Mô tả công trình: <?php echo $result_zoning['project_desc']?></p>
                    <p class="text-date">Độ cao: <?php echo $result_zoning['height'] ?></p>
                    <a href="details.php?pjid=<?php echo $result_zoning['projectId'] ?>" class="details" class="card-link">Chi tiết</a>
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