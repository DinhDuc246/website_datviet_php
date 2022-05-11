<?php
include 'inc/header.php'; 
?>
<section class="news">
    <h1>Nhân sự</h1>
	<table class="table" text-align="jutify"> 
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Năm kinh nghiệm</th>
      <th scope="col" width="270px;">Bằng cấp</th>
      <th scope="col"width="280px;">Chức vụ trong công ty</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $per = new personnel();
        $perlist = $per->show_personnel();
        $i = 0;
          if($perlist){
          
              while ($result = $perlist->fetch_assoc()){
                $i++; 
         ?>
    <tr>
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $result['danhsach'] ?></td>
          <td><?php echo $result['kinhnghiem'] ?></td>
          <td><?php echo $result['bangcap'] ?></td>
          <td><?php echo $result['chucvu'] ?></td>
          
    </tr>
      <?php
              
            
          }
        }
        ?>
  </tbody>
</table>
</section>
<?php
    include 'inc/footer.php';
?>