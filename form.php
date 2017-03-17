<form enctype="multipart/form-data" encoding='multipart/form-data' method='post' action="form.php">
  <input name="upload_file" type="file" value="choose">
  <input type="submit" value="Upload">
</form>
<?
if ( isset($_FILES['upload_file']) ) {
 $filename  = $_FILES['upload_file']['tmp_name'];
 $handle    = fopen($filename, "r");
 $data      = fread($handle, filesize($filename));
 $POST_DATA = array(
   'file' => base64_encode($data)
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