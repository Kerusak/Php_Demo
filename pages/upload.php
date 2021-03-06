<h3>Upload Page</h3>
<?php if (!isset($_POST[uplbtn])):?>
    <form action="index.php?page=2" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="myfile">Select file:</label>
            <input type="file" class="form-control" name="myfile">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit" name="uplbtn">Send file</button>
        </div>
    </form>
<?php else:?>
<?php
    if (isset($_POST['uplbtn'])){
        if ($_FILES['myfile']['error']!=0){
            return err_log('Upload error code: '.$_FILES['myfile']['error']);
        }
        if (is_uploaded_file($_FILES['myfile']['tmp_name'])){
            $tmp_name = $_FILES['myfile']['tmp_name'];
            $file_path = 'images/'.$_FILES['myfile']['name'];
            move_uploaded_file($tmp_name, $file_path);
        }
        err_log('Upload success', false);
    }
    ?>
<?php endif; ?>
