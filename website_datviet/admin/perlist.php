<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/personnel.php';?>
<?php require_once '../helpers/format.php'; ?>
<?php
	$per = new personnel();
	$fm = new Format();
	  if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delid = $per -> del_personnel($id); // hàm check delete Name khi submit lên
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Tất cả công trình</h2>
        <div class="block">  
        	
        	<?php
        if(isset($delper)){
        	echo $delper;
        }
        ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ tên</th>
					<th>Năm kinh nghiệm</th>
					<th>Bằng cấp</th>
					<th>Chức vụ trong công ty</th>
					<th></th>
					
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
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['danhsach'] ?></td>
					<td><?php echo $result['kinhnghiem'] ?></td>
					<td><?php echo $result['bangcap'] ?></td>
					<td><?php echo $result['chucvu'] ?></td>
					<td><a href="peredit.php?id=<?php echo $result['id'] ?>">Edit</a> || <a onclick = "return confirm('Are you want to delete???')" href="?delid=<?php echo $result['id'] ?>">Delete</a></td>
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
