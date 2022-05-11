<?php 
    include 'inc/header.php';
?>
<style type="text/css">
body{
    font-family: 'Bahnschrift Condensed', sans-serif;
    font-size: 16px;
    color: #6f6f6f;
    font-weight: 400;
    line-height: 28px;
    margin-top:20px;
}
.container{
  display: flex;
  align-items: center;
  justify-content: center;
}
.font-size38 {
    font-size: 38px;
}
.team-single-text .section-heading h4,
.section-heading h5 {
    font-size: 36px;
    font-family: 'Bahnschrift Condensed', sans-serif;
}

.team-single-text .section-heading.half {
    margin-bottom: 20px;
}

@media screen and (max-width: 1199px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 32px;
    }
    .team-single-text .section-heading.half {
        margin-bottom: 15px;
    }
}

@media screen and (max-width: 991px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 28px;
    }
    .team-single-text .section-heading.half {
        margin-bottom: 10px;
    }
}

@media screen and (max-width: 767px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 24px;
    }
}


.team-single-icons ul li {
    display: inline-block;
    border: 1px solid #02c2c7;
    border-radius: 50%;
    color: #86bc42;
    margin-right: 8px;
    margin-bottom: 5px;
    -webkit-transition-duration: .3s;
    transition-duration: .3s
}

.team-single-icons ul li a {
    color: #02c2c7;
    display: block;
    font-size: 14px;
    height: 25px;
    line-height: 26px;
    text-align: center;
    width: 25px
}

.team-single-icons ul li:hover {
    background: #02c2c7;
    border-color: #02c2c7;
}

.team-single-icons ul li:hover a {
    color: #fff
}

.team-social-icon li {
    display: inline-block;
    margin-right: 5px
}

.team-social-icon li:last-child {
    margin-right: 0
}

.team-social-icon i {
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    font-size: 15px;
    border-radius: 50px
}

.padding-30px-all {
    padding: 30px;
}
.bg-light-gray {
    background-color: #f7f7f7;
}
.text-center {
    text-align: center!important;
}
img {
    max-width: 100%;
    height: 550px;
}


.list-style9 {
    list-style: none;
    padding: 0
}

.list-style9 li {
    position: relative;
    padding: 0 0 15px 0;
    margin: 0 0 15px 0;
    border-bottom: 1px dashed rgba(0, 0, 0, 0.1)
}

.list-style9 li:last-child {
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 0
}


.text-sky {
    color: #02c2c7
}

.text-orange {
    color: #e95601
}

.text-green {
    color: #5bbd2a
}

.text-yellow {
    color: #f0d001
}

.text-pink {
    color: #ff48a4
}

.text-purple {
    color: #9d60ff
}

.text-lightred {
    color: #ff5722
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<?php
if(!isset($_GET['pjid']) || $_GET['pjid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
    }else {
        $id = $_GET['pjid']; 
    }
?>
<div class="container" style="padding-top: 100px;">
    <div class="team-single">
      <?php 
      $get_project_details = $project->get_details($id);
      if($get_project_details){
        while($result_details =$get_project_details->fetch_assoc()){


       ?>
        <div class="row">
            <div class="col-lg-6 col-md-6 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img src="admin/uploads/<?php echo $result_details['image'] ?>" height="500px" alt="" />
                </div>
                
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <h4 class="font-size38 sm-font-size32 xs-font-size30" style="text-transform: uppercase;"><?php echo $result_details['projectName'] ?></h4>
                    <p class="no-margin-bottom">Mô tả công trình:<?php echo $result_details['project_desc'] ?></p>

                    <div class="contact-info-section margin-40px-tb">
                        <ul class="list-style9 no-margin">
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                     
                                        <strong class="margin-10px-left text-orange">Địa chỉ:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $result_details['address']?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                     
                                        <strong class="margin-10px-left text-yellow">Tổng diện tích:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $result_details['height'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                      
                                        <strong class="margin-10px-left text-lightred">Danh mục công trình:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $result_details['catName'] ?></p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        
                                        <strong class="margin-10px-left text-green">Nhà đầu tư:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $result_details['brandName'] ?></p>
                                    </div>
                                </div>

                            </li>
                         
</ul>
                              

            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
 }
      }
?>
</div>
<?php 
    include 'inc/footer.php';
?>