<?php
function getFiles(){
  $json = file_get_contents('../data/files.json');
  $files = json_decode($json, true);
  return $files;
}
