<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
     <?php
      $get_slider = $project->show_slider();
      if($get_slider){
        while($result_slider = $get_slider->fetch_assoc()){
      if($result_slider['sliderid'] == 1 && $result_slider['type'] == 0){
        ?>
         <li data-target="#carousel-example-1z" data-slide-to="<?php echo $result_slider['sliderid']  ?>" class="active"></li>
        <?php
      }else if($result_slider['type'] == 0) {
      ?>
    <!--First slide-->
     <li data-target="#carousel-example-1z" data-slide-to="<?php echo $result_slider['sliderid']  ?>"></li>
    <?php 
     }
    }
        }
         ?>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <?php
      $get_slider = $project->show_slider();
      if($get_slider){
        while($result_slider = $get_slider->fetch_assoc()){
      if($result_slider['sliderid'] == 1 && $result_slider['type'] == 0){
        ?>
        <div class="carousel-item active">
      <img class="d-block w-100" src="admin/uploads/<?php echo $result_slider['slider_image'] ?>"
        alt="">
    </div>
        <?php
      }else if($result_slider['type'] == 0) {
      ?>
    <!--First slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="admin/uploads/<?php echo $result_slider['slider_image'] ?>"
        alt="">
    </div>
    
    <?php 
    }
}
        }
         ?>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->