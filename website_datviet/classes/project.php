<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class project
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_project($data,$files){
			
			$projectName = mysqli_real_escape_string($this->db->link, $data['projectName']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$project_desc = mysqli_real_escape_string($this->db->link, $data['project_desc']);
			$height = mysqli_real_escape_string($this->db->link, $data['height']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if( $projectName == ""|| $category == ""  || $brand == "" || $address == "" || $project_desc == "" || $height == "" || $type == "" || $file_name == ""){
				$alert = "<span class='error'>Fiedls must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_project(projectName,catid,brandid,address,project_desc,height,type,image) VALUES('$projectName','$category','$brand','$address','$project_desc','$height','$type','$unique_image') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Project Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert Project NOT Success</span>";
					return $alert;
				}
			}
		}
		public function show_project()
		{
			$query = 
			"SELECT tbl_project.*, tbl_category.catName, tbl_brand.brandName
			 FROM tbl_project INNER JOIN tbl_category ON tbl_project.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_project.brandId = tbl_brand.brandId
			 order by tbl_project.projectId desc ";

			// $query = "SELECT * FROM tbl_project order by projectId desc ";
			$result = $this->db->select($query);
			return $result;
		}

		
		public function getprojectbyId($id)
		{
			$query = "SELECT * FROM tbl_project where projectId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function getproject_feathered(){
			$query = "SELECT * FROM tbl_project where type = '0'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproject_new(){
			$query = "SELECT * FROM tbl_project where catId = '1'  order by catId  desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproject_zoning(){
			$query = "SELECT * FROM tbl_project where catId = '2'  order by catId  desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproject_news(){
			$query = "SELECT * FROM tbl_project where catId = '3'  order by catId  desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproject_tuvan(){
			$query = "SELECT * FROM tbl_project where catId = '4'  order by catId  desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_category($catName,$id)
		{
			$catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
		 	$catName = mysqli_real_escape_string($this->db->link, $catName);
	 		$id = mysqli_real_escape_string($this->db->link, $id);
		 	if(empty($catName)){
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName= '$catName' WHERE catId = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Category Update Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Update Category NOT Success</span>";
					return $alert;
				}
			}

		 }
		public function del_project($id)
		{
			$query = "DELETE FROM tbl_project where projectId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>project Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>project Deleted Not Success</span>";
				return $alert;
			}
		}
		public function get_details($id){
			$query = 
			"SELECT tbl_project.*, tbl_category.catName, tbl_brand.brandName
			 FROM tbl_project INNER JOIN tbl_category ON tbl_project.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_project.brandId = tbl_brand.brandId WHERE tbl_project.projectId= '$id' ";

			// $query = "SELECT * FROM tbl_project order by projectId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		// public function getcatbyId($id)
		// {
		// 	$query = "SELECT * FROM tbl_category where catId = '$id' ";
		// 	$result = $this->db->select($query);
		// 	return $result;
		// }
		// public function show_category_fontend()
		// {
		// 	$query = "SELECT * FROM tbl_category order by catId desc ";
		// 	$result = $this->db->select($query);
		// 	return $result;
		// }
		
		// public function get_name_by_cat($id)
		// {
		// 	$query = "SELECT tbl_project.*,tbl_category.catName,tbl_category.catId 
		// 			  FROM tbl_project,tbl_category 
		// 			  WHERE tbl_project.catId = tbl_category.catId
		// 			  AND tbl_project.catId ='$id' LIMIT 1 ";
		// 	$result = $this->db->select($query);
		// 	return $result;
		// }
		public function update_project($data,$files,$id)
		{
			$projectName = mysqli_real_escape_string($this->db->link, $data['projectName']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$project_desc = mysqli_real_escape_string($this->db->link, $data['project_desc']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			$height = mysqli_real_escape_string($this->db->link, $data['height']);
			
			
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if( $projectName == ""|| $category == ""  || $brand == "" || $address == "" || $project_desc == "" || $type == "" || $height == "" ){
				$alert = "<span class='error'>Fiedls must be not empty</span>";
				return $alert;

			}else{
					if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 20480) {
		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					$query = "UPDATE tbl_project SET
					projectName = '$projectName',
					catId = '$category',
					brandId = '$brand',
					address = '$address',
					project_desc = '$project_desc',
					type = '$type',
					height = '$height',
					image = '$unique_image'
					WHERE projectId ='$id'";
			}else{
				$query = "UPDATE tbl_project SET
					projectName = '$projectName',
					catId = '$category',
					brandId = '$brand',
					address = '$address',
					project_desc = '$project_desc',
					type = '$type',
					height = '$height'
					WHERE projectId ='$id'";
			}
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Project Update Successfully</span>";
					
					return $alert;
				}else{
					$alert = "<span class='error'>Project Brand NOT Success</span>";
					return $alert;
				}
			}
		}
		public function insert_slider($data,$files){
			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sliderName=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Slider Added Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Slider Added Not Success</span>";
						return $alert;
					}
				}
				
				
			}
		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id){
			$query = "DELETE FROM tbl_slider where sliderId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Slider Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Slider Deleted Not Success</span>";
				return $alert;
			}
		}
	}

 ?>