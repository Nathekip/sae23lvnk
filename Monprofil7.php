<!DOCTYPE html>
<html>
  <body>
    <?php
      include('fonctions.php');
      setup();
      pageheader();
      pagenavbar("p07");
    ?>
    <form action="Monprofil7.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
    
    <?php
      pr();
    ?>
  </body>
</html>
