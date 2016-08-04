<?php
    mkdir("uploads/".$_POST['artistname'].",".$_POST['artname']);
    $txtfile = fopen("uploads/".$_POST['artistname'].",".$_POST['artname']."/details.txt", "w") or die("Unable to open file!");
    fwrite($txtfile,"Artist Name - ".$_POST['artistname']."\r\n");
    fwrite($txtfile,"Phone number - ".$_POST['phone']."\r\n");
    fwrite($txtfile,"Pick Up address - ".$_POST['address']."\r\n");
    fwrite($txtfile,"Pin Code - ".$_POST['pincode']."\r\n\r\n");
    fwrite($txtfile,"Name of Art - ".$_POST['artname']."\r\n");
    fwrite($txtfile,"Description - ".$_POST['description']."\r\n");
    fwrite($txtfile,"Price - ".$_POST['price']."\r\n");
    fwrite($txtfile,"Painting Medium - ".$_POST['medium']."\r\n");
    fwrite($txtfile,"State of the painting - ".$_POST['painting_state']."\r\n");
    fclose($txtfile);
    //$zipFile = "zips/".$_POST['artistname'].",".$_POST['artname'].".zip";
    //$zipArchive = new ZipArchive();
    //if (!$zipArchive->open($zipFile, ZIPARCHIVE::OVERWRITE))
      //  die("Failed to create archive\n");
    //$zipArchive->addGlob("uploads/".$_POST['artistname'].",".$_POST['artname']);
    //if (!$zipArchive->status == ZIPARCHIVE::ER_OK)
     //   echo "Failed to write local files to zip\n";
    //$zipArchive->close();
    //////////////////////////////
    //Photo uploads
    // Count # of uploaded files in array
    $total = count($_FILES['photos']['name']);
    // Loop through each file
    for($i=0; $i<$total; $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['photos']['tmp_name'][$i];
        //Make sure we have a filepath
        if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = "uploads/".$_POST['artistname'].",".$_POST['artname']."/". $_FILES['photos']['name'][$i];
            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                //Handle other code here
            }
        }
    }
    $rootPath = realpath("uploads/".$_POST['artistname'].",".$_POST['artname']);
    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open("zips/".$_POST['artistname'].",".$_POST['artname'].".zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);
    // Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );
    foreach ($files as $name => $file)
    {
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // POST real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);
        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
    }
    // Zip archive will be created only after closing object
    $zip->close();
    
    $sURL = "https://prod-00.southeastasia.logic.azure.com:443/workflows/41734d60479541938dc4c04ca1675e1f/triggers/manual/run?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=LTDFN7kV6VWZWKnJKwqJhOcI1lOReANRO-qQhEDgJPI"; // The POST URL
    $sPD = array('artist' => $_POST['artistname'],
    'artname' => $_POST['artname'],
    'phone' => $_POST['phone'],
    'address' => $_POST['address'],
    'description' => $_POST['description'],
    'artname' => $_POST['artname'],
    'price' => $_POST['price'],
    'medium' => $_POST['medium'],
    'state'=> $_POST['painting_state'],
    'url' => 'http://agbeta.azurewebsites.net/upload/uploads'.'zips/'.$_POST['artistname'].','.$_POST['artname'].'.zip'
    );
    
    $aHTTP = array(
    'http' => // The wrapper to be used
        array(
        'method'  => 'POST', // Request Method
        // Request Headers Below
        'header'  => 'Content-type: application/json',
        'content' => json_encode($sPD)
        )
    );
    $context = stream_context_create($aHTTP);
    $contents = file_get_contents($sURL, false, $context);

    //require_once("PHPMailer/class.phpmailer.php");
    //Sending the mail
    // $email = new PHPMailer();
    // $email->From      = 'iamthemananiket@gmail.com';
    // $email->FromName  = $_POST['artistname'];
    // $email->Subject   = 'Upload Request';
    // //$email->Body      = $bodytext;
    // $email->AddAddress( 'iamthemananiket@gmail.com' );
    // $file_to_attach = "zips/".$_POST['artistname'].",".$_POST['artname'].".zip";
    // $email->AddAttachment( $file_to_attach , $_POST['artistname'].",".$_POST['artname'].".zip" );
    // return $email->Send();
    
    
?>
