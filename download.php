<?php 
  
// Initialize a file URL to the variable 
$url = 'http://localhost/6750Final/db/h1b.csv'; 

// Use basename() function to return the base name of file  
$file_name = basename($url); 
$downloadedFileContents = file_get_contents($url);
if($downloadedFileContents === false){
    throw new Exception('Failed to download file at: ' . $url);
}

if(file_put_contents( $file_name,file_get_contents($url))) { 
    echo "File downloaded successfully"; 
} 
else { 
    echo "File downloading failed."; 
}
   
// // Use file_get_contents() function to get the file 
// // from url and use file_put_contents() function to 
// // save the file by using base name 
// if(file_put_contents( $file_name,file_get_contents($url))) { 

// 	$destination_folder = 'downloads/';
// 	$newfname = $destination_folder . basename($url);
// 	$file = fopen ($url, "rb");
//     if ($file) {
//       $newf = fopen ($file_name, "wb");
//       if ($newf)
//       while(!feof($file)) {
//         fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
//       }
//     }

//     if ($file) {
//       fclose($file);
//     }

//     if ($newf) {
//       fclose($newf);
//     }


//     echo "File downloaded successfully"; 
// } 
// else { 
//     echo "File downloading failed."; 
// } 
  
?> 