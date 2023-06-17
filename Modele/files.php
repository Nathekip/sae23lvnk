<?php
function getFiles(){
  $json = file_get_contents('../data/files.json');
  $files = json_decode($json, true);
  return $files;
}

function writeFiles($files){
    $jsonString = json_encode($files, JSON_PRETTY_PRINT);
    $fp = fopen("../data/files.json", 'w');
    fwrite($fp, $jsonString);
    fclose($fp);
}

function delfiltest($filepath){
    unlink($filepath);
    $files = getFiles();
  
    for($i=0; $i < count($files); $i++){
      if ($files[$i]['path'] == $filepath){
        unset($files[$i]);
      }
    } 
    writeFiles($files);   
  }
  
  function deleteFile($deletefile){
    echo "test";
    foreach($deletefile as $file){
      unlink($file);
      $files = getFiles();
  
      foreach ($files as $key => $value){
        if ($files[$key]['path'] == $file){
          unset($files[$key]);
        }
      }
    }
    writeFiles($files);
  }
?>
