<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/personnel.php' ?>
<?php
    $per = new personnel(); 
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script> window.location = 'perlist.php' </script>";
    }else {
        $id = $_GET['id']; 
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $updatepersonnel = $prj->update_personnel($_POST, $id); 
    }
    
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa dự án</h2>
        <div class="block">  
          <?php
                    if(isset($updatepersonnel)){
                        echo $updatepersonnel;
                    }

                ?>     
                <?php
                    $per = $per->personnelbyid($id);
                    if ($per){
                        while($result_personnel = $per->fetch_assoc()){
                ?>             
         

          <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td width="20%">
                        <label>Họ tên</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_personnel['danhsach'] ?>" placeholder="Họ tên..." class="medium" />
                    </td>
                </tr> 
                 <tr>
                    <td>
                        <label>Năm kinh nghiệm</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_personnel['kinhnghiem'] ?>" placeholder="Năm kinh nghiệm..." class="medium" />
                    </td>
                </tr>
              
                <tr>
                    <td>
                        <label>Bằng cấp</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_personnel['bangcap'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chức vụ trong công ty</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_personnel['chucvu'] ?>" placeholder="Chức vụ trong công ty..." class="medium" />
                    </td>
                </tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Cập nhật" />
                    </td>
                </tr>
            </table>
            </form>
            <?php 
                }
            }
             ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


