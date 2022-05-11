<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/project.php';?>
<?php
$pro = new project();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
     $insertproject = $pro->insert_project($_POST, $_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm dự án</h2>
        <div class="block">  
          <?php
                    if(isset($insertproject)){
                        echo $insertproject;
                    }

                ?>                  
         <form action="projectadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên công trình</label>
                    </td>
                    <td>
                        <input type="text" name="projectName" placeholder="Nhập tên công trình..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục công trình</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Chọn</option>
                            <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if ($catlist) {
                                   while ($result = $catlist->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $result ['catId'] ?>"><?php echo $result['catName'] ?></option>
                            <?php
                                 }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Nhà đầu tư</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn</option>
                            <?php
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if ($brandlist) {
                                   while ($result = $brandlist->fetch_assoc()) {
                                    ?>
                            <option value="<?php echo $result ['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                           <?php
                             }
                                }
                           ?>
                        </select>
                    </td>
                </tr>
				
                 <tr>
                    <td>
                        <label>Địa điểm</label>
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Địa điểm..." class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả công trình</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="project_desc"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Tổng diện tích:</label>
                    </td>
                    <td>
                        <input type="text" name="height" placeholder="Tổng diện tích..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Tải ảnh lên</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại dự án</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn</option>
                            <option value="0">Nổi bật</option>
                            <option value="1">Không nổi bật</option>
                        </select>
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


