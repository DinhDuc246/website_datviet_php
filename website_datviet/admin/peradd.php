<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/personnel.php';?>
<?php
$per = new personnel();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
     $insertpersonnel = $per->insert_personnel($_POST);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm dự án</h2>
        <div class="block">  
          <?php
                    if(isset($insertpersonnel)){
                        echo $insertpersonnel;
                    }

                ?>                  
         <form action="peradd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td width="20%">
                        <label>Họ tên</label>
                    </td>
                    <td>
                        <input type="text" name="danhsach" placeholder="Họ tên..." class="medium" />
                    </td>
                </tr> 
                 <tr>
                    <td>
                        <label>Năm kinh nghiệm</label>
                    </td>
                    <td>
                        <input type="text" name="kinhnghiem" placeholder="Năm kinh nghiệm..." class="medium" />
                    </td>
                </tr>
              
                <tr>
                    <td>
                        <label>Bằng cấp</label>
                    </td>
                    <td>
                        <input type="text" name="bangcap" placeholder="Bằng cấp..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chức vụ trong công ty</label>
                    </td>
                    <td>
                        <input type="text" name="chucvu" placeholder="Chức vụ trong công ty..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
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


