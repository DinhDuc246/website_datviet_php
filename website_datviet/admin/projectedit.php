<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/project.php';?>
<?php
    $prj = new project(); 
    if(!isset($_GET['projectid']) || $_GET['projectid'] == NULL){
        echo "<script> window.location = 'projectlist.php' </script>";
    }else {
        $id = $_GET['projectid']; 
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $updateProject = $prj->update_project($_POST,$_FILES, $id); 
    }
    
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa dự án</h2>
        <div class="block">  
          <?php
                    if(isset($updateProject)){
                        echo $updateProject;
                    }

                ?>     
                <?php
                    $get_project_by_id = $prj->getprojectbyId($id);
                    if ($get_project_by_id){
                        while($result_project = $get_project_by_id->fetch_assoc()){
                ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên công trình</label>
                    </td>
                    <td>
                        <input type="text" name="projectName" value="<?php echo $result_project['projectName'] ?>" class="medium" />
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
                            if($catlist){
                                while ($result = $catlist->fetch_assoc()){
                            
                             ?>
                            <option 
                            <?php 
                            if($result['catId']==$result_project['catId'])
                                { echo 'selected'; }
                             ?>    
                            value=" <?php echo $result['catId'] ?> "> <?php echo $result['catName'] ?></option>
                            
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
                            <option>Chọn nhà đầu tư</option>
                            <?php 
                            $brand = new brand();
                            $brandlist = $brand->show_brand();
                            if($brandlist){
                                while ($result = $brandlist->fetch_assoc()){
                            
                             ?>
                            <option
                            <?php 
                            if($result['brandId']==$result_project['brandId'])
                                { echo 'selected'; }
                             ?> 
                             value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> </option>
                            
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
                        <input type="text" name="address" value="<?php echo $result_project['address'] ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả công trình</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="project_desc"><?php echo $result_project['project_desc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Tổng diện tích:</label>
                    </td>
                    <td>
                        <input type="text" name="height" value="<?php echo $result_project['height'] ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Tải ảnh lên</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_project['image'] ?>" width="120"> <br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại dự án</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if ($result_project['type'] ==0) {
                             ?>
                            <option selected value="0">Nổi bật</option>
                            <option value="1">Không nổi bật</option>
                            <?php 
                                }else{
                            ?>
                            <option value="0">Nổi bật</option>
                            <option selected value="1">Không nổi bật</option>    
                            <?php 
                             }
                             ?>
                             </select>
                    </td>
                </tr>

				<tr>
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


