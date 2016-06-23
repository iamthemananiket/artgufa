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

    require_once("PHPMailer/class.phpmailer.php");

    //Sending the mail
    $email = new PHPMailer();
    $email->From      = 'iamthemananiket@gmail.com';
    $email->FromName  = $_POST['artistname'];
    $email->Subject   = 'Upload Request';
    //$email->Body      = $bodytext;
    $email->AddAddress( 'iamthemananiket@gmail.com' );

    $file_to_attach = "zips/".$_POST['artistname'].",".$_POST['artname'].".zip";

    $email->AddAttachment( $file_to_attach , $_POST['artistname'].",".$_POST['artname'].".zip" );

    return $email->Send();
?>