<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/project.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pj = new project();
	$fm = new Format();
	if(!isset($_GET['projectid']) || $_GET['projectid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['projectid']; // Lấy catid trên host
        $delProject = $pj->del_project($id); // hàm check delete Name khi submit lên
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Tất cả công trình</h2>
        <div class="block">  
        	
        	<?php
        if(isset($delpro)){
        	echo $delpro;
        }
        ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Stt</th>
					<th>Tên dự án</th>
					<th>Địa điểm</th>
					<th>Tổng diện tích</th>
					<th>Image</th>
					<th>Mô tả</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Đặc điểm</th>
					<th>Xử lý</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$pj = new project();
				$pjlist = $pj->show_project();
				$i = 0;
					if($pjlist){
					
							while ($result = $pjlist->fetch_assoc()){
								$i++;	
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['projectName'] ?></td>
					<td><?php echo $result['address'] ?></td>
					<td><?php echo $result['height'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="100"></td>
					<td>
						<?php echo $fm->textShorten($result['project_desc'], 20);
						 ?></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php 
						if($result['type']==0){
							echo 'Nổi bật';
						}else{
							echo 'Không Nổi Bật';
						}

					?></td>
					
					<td><a href="projectedit.php?projectid=<?php echo $result['projectId'] ?>">Edit</a> || <a onclick = "return confirm('Are you want to delete???')" href="?projectid=<?php echo $result['projectId'] ?>">Delete</a></td>
				</tr>
				<?php
							
						
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
