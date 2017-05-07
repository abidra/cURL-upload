<form enctype="multipart/form-data" encoding='multipart/form-data' method='post' action="form.php">
  <input name="upload_file" type="file" value="choose">
  <input type="submit" value="Upload">
</form>
<?
if ( isset($_FILES['upload_file']) ) {
 $f = getcwd().DIRECTORY_SEPARATOR.$_FILES['upload_file']['name'];
 move_uploaded_file($_FILES['upload_file']['tmp_name'],$f);
 $POST_DATA = array(
   'file' => new CURLFile($f)
 );
 $curl = curl_init();
/* ganti http://example.com dengan external server Anda. */
 curl_setopt($curl, CURLOPT_URL, 'http://example.com/receiver.php');
 curl_setopt($curl, CURLOPT_TIMEOUT, 30);
 curl_setopt($curl, CURLOPT_POST, 1);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $POST_DATA);
 $response = curl_exec($curl);
 curl_close ($curl);
 echo "<h2>File Uploaded</h2>";
}
?>