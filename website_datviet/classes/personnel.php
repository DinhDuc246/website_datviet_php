<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
    /**
    * 
    */
    class personnel
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_personnel($data){
            $danhsach = mysqli_real_escape_string($this->db->link, $data['danhsach']);
            $kinhnghiem = mysqli_real_escape_string($this->db->link, $data['kinhnghiem']);
            $bangcap = mysqli_real_escape_string($this->db->link, $data['bangcap']);
            $chucvu = mysqli_real_escape_string($this->db->link, $data['chucvu']);
             //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
            
            if(empty($danhsach)){
                $alert = "<span class='error'>Category must be not empty</span>";
                return $alert;
            }else{
            	$query = "INSERT INTO tbl_personnel(danhsach,kinhnghiem,bangcap,chucvu) VALUES('$danhsach','$kinhnghiem','$bangcap','$chucvu')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert Category Successfully</span>";
                    return $alert;
                }else {
                    $alert = "<span class='error'>Insert Category NOT Success</span>";
                    return $alert;
                }
            }
        }
        public function show_personnel()
        {
            $query = "SELECT * FROM tbl_personnel order by id asc ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_personnel($id)
        {
            $danhsach = mysqli_real_escape_string($this->db->link, $data['danhsach']);
            $kinhnghiem = mysqli_real_escape_string($this->db->link, $data['kinhnghiem']);
            $bangcap = mysqli_real_escape_string($this->db->link, $data['bangcap']);
            $chucvu = mysqli_real_escape_string($this->db->link, $data['chucvu']);
               if(empty($id)){
                $alert = "<span class='error'>Category must be not empty</span>";
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_personnel WHERE id = '$id' ";
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

         public function personnelbyid($id)
        {
            $query = "SELECT * FROM tbl_personnel where id = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_personnel($id)
        {
            $query = "DELETE FROM tbl_personnel where id = '$id' ";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Category Deleted Successfully</span>";
                return $alert;
            }else {
                $alert = "<span class='success'>Category Deleted Not Success</span>";
                return $alert;
            }
        }
       
    //     public function show_category_fontend()
    //     {
    //         $query = "SELECT * FROM tbl_category order by catId desc ";
    //         $result = $this->db->select($query);
    //         return $result;
    //     }
    //     public function get_project_by_cat($id)
    //     {
    //         $query = "SELECT * FROM tbl_project where catId = '$id' order by catId desc LIMIT 8";
    //         $result = $this->db->select($query);
    //         return $result;
    //     }
    //     public function get_name_by_cat($id)
    //     {
    //         $query = "SELECT tbl_project.*,tbl_category.catName,tbl_category.catId 
    //                   FROM tbl_project,tbl_category 
    //                   WHERE tbl_project.catId = tbl_category.catId
    //                   AND tbl_project.catId ='$id' LIMIT 1 ";
    //         $result = $this->db->select($query);
    //         return $result;
    //     }
     }
 ?>