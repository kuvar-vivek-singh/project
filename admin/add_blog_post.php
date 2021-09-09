<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
    exit();
}
define("preventAccess",TRUE);
require_once("connection.php");
require_once("sideheader_comm.php");
if(isset($_POST['publish'])){
    $statusMsg = '';
    $content=$_POST['text_add'];
    $blogtitle=$_POST['blogtitle'];
    $authorname=$_POST['authorname'];

// File upload path
$targetDir = "blogimg/";
$fileName = $_FILES["uploadfile"]["name"];
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(!empty($_FILES["uploadfile"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert="INSERT INTO `blog_post` (`blog_id`, `blog_title`, `blog_image`, `blog_content`, `Update_time`, `author_name`) VALUES (NULL, '$blogtitle', 'admin/$targetFilePath', '$content', date('Y-m-d h:i:s'), '$authorname')";
            $sql=mysqli_query($conn,$insert);

            if($sql){
                $statusMsg ='<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>New Post</strong> Your written Blog has been Posted.
              </div>';
            }else{
                $statusMsg = '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sorry!</strong> Either fail to upload file or Wrong input.
              </div>';
            } 
        }else{
            $statusMsg = '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Sorry!</strong> There was an error to uploading file.
          </div>';
        }
    }else{
        $statusMsg = '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sorry!</strong> only JPG, JPEG, PNG & GIF files are allowed to upload.
      </div>';
    }
}else{
    $statusMsg = '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Sorry!</strong> Please select a file to upload.
  </div>';
}

}

?>



    <div  class="container shadow p-3">
        <div class="jumbotron text-center bg-light shadow-sm">
            <h2>Create New Blog Post </h2>
            <p>Here is too many option to add post</p>
            <?php if(isset($statusMsg)) echo $statusMsg  ?>
              
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="uploadfile" id="" required>
            </div>
            <div class="form-group">
                <label for="blogtitle">Blog title</label>
                <input type="text" class="form-control" id="blogtitle" name="blogtitle" placeholder="e.g. Wedding songs" required>
              </div>
              <div class="form-group">
                <label for="authorname">Author Name</label>
                <input type="text" class="form-control" id="authorname" name="authorname" placeholder="e.g. Kuvar vivek singh" required>
              </div>
        
                  Blog-content
                <textarea type="text" name="text_add" id="htmeditor"  placeholder="Write a blog here" ></textarea>  
              
              
              <button type="submit" name="publish" class="btn btn-success shadow mt-2 mb-1" >+ add Post</button>
        </form>
    
    

    </div>

 
<script src="https://htmeditor.com/js/htmeditor.min.js" htmeditor_textarea="htmeditor" full_screen="no"  editor_height="480"     run_local="no" > </script>
<?php
require_once("sideheader_end_comm.php");
?>
