<?php
	include 'inc/header.php';
	include 'inc/slider.php'; 
?>
<!--BaackToTop!-->
<button onclick="topFunction()" id="myBtn" title="Quay lại đầu trang"><i class="fas fa-chevron-up"></i></button>
<!-- content -->

    <section class="section-content">
        <div id="thungo">
            <div class="row">
                <div class="col-lg-4">
                <img src="images/gthieu.png" style="height: 600px; margin-left: 40px;">
                </div>
            <div class="col-lg-8">
              <div class="container">
          <h1 style="text-align: center;text-transform: uppercase;">Về chúng tôi</h1>
          <div class="spoiler">
          <p class="hidden-text">
          Công ty Cổ phần Quy hoạch Kiến trúc Đất Việt xin gửi lời chúc sức khoẻ và lời chào trân
          trọng nhất đến toàn thể Quý khách hàng.<br> 
          Công ty Cổ phần Quy hoạch Kiến trúc Đất Việt được thành lập từ năm 2015, trên cơ sở
          các thành viên dày dạn kinh nghiệm và tâm huyết với nghề. Mặc dù chỉ mới hình thành
          và hoạt động trong vài năm gần đây, Đất Việt đã trưởng thành nhanh chóng, trở thành
          doanh nghiệp uy tín trong lĩnh vực Thiết kế - Xây dựng - Quy hoạch - Trùng tu Di tích. <br> 
          Với phương châm “Chất Lượng Sản Phẩm Và Dịch Vụ Là Nhân Tố Hàng Đầu”, công ty
          chúng tôi luôn lắng nghe, tận tình tư vấn, chia sẻ kinh nghiệm làm việc cùng quý khách
          hàng. Đến với chúng tôi, quý khách hàng sẽ thực sự hài lòng khi nhận được những lời tư
          vấn tận tình nhất của những kiến trúc sư, kỹ sư và đội ngũ công nhân thi công lành nghề,
          không những mang giá trị thẩm mĩ mà còn đảm bảo chất lượng kỹ thuật với giá cả hợp lý
          nhất. Với phương châm và tôn chỉ làm việc đó, Chúng tôi tin tưởng rằng Công ty Cổ phần
          Quy hoạch Kiến trúc Đất Việt đang dần trở thành công ty phát triển bền vững. <br> 
            Công ty cổ phần Quy hoạch Kiến trúc Đất Việt mong muốn tiếp tục mở rộng liên kết,
          hợp tác với các đơn vị để cùng phát triển và góp phần xây dựng đất nước giàu mạnh. <br> 
          <strong style="font-size: 23px;">Xin chân thành cám ơn và hân hạnh phục vụ Quý khách hàng!</strong>
          </p>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </section>

<section class="section-project">
  <div class="container-fluid" style="padding-left:100px; padding-right:50px;">
    <div class="container">
        <div class="title">
            <h1 style ="text-align: center;">Các dự án nổi bật</h1>
        </div>
        <div class="cards">
           <?php 
         $project_feathered= $project->getproject_feathered();
         if($project_feathered){
            while($result_new = $project_feathered->fetch_assoc()){
             ?>
            <div class="card">
                <img src="admin/uploads/<?php echo $result_new['image'] ?>" width="413px" height ="400px" alt="">
                <div class="card-body">
                  <h5 class="card-title" style="text-align: center;text-transform: uppercase;"><?php echo $result_new['projectName'] ?></h5>
                   <p class="text">Địa chỉ: <?php echo $result_new['address'] ?></p>
                    <p class="text">Mô tả công trình: <?php echo $result_new['project_desc']?></p>
                    <p class="text-date">Độ cao: <?php echo $result_new['height'] ?></p>
                    <a href="details.php?pjid=<?php echo $result_new['projectId'] ?>" class="details" class="card-link">Chi tiết</a>
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
<section class="section-maps">
  <div class="container-maps">
  <h1>Bản đồ</h1> <br>
    <!--Google map-->
<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.408275114259!2d108.21709481478509!3d16.044289788896336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c182db9d0f%3A0x245cb7199c5d16!2zMjcgTMOqIFbEqW5oIEh1eSwgSG_DoCBDxrDhu51uZyBC4bqvYywgSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1626418018048!5m2!1svi!2s"
   width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<!--Google Maps-->
</div>

<!-- footer -->
<?php
	include 'inc/footer.php';
 ?>