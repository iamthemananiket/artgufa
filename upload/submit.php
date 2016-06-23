<?php
    mkdir("uploads/".$_GET['artistname'].",".$_GET['artname']);
    $txtfile = fopen("uploads/".$_GET['artistname'].",".$_GET['artname']."/details.txt", "w") or die("Unable to open file!");
    fwrite($txtfile,"Artist Name - ".$_GET['artistname']."\r\n");
    fwrite($txtfile,"Phone number - ".$_GET['phone']."\r\n");
    fwrite($txtfile,"Pick Up address - ".$_GET['address']."\r\n");
    fwrite($txtfile,"Pin Code - ".$_GET['pincode']."\r\n\r\n");

    fwrite($txtfile,"Name of Art - ".$_GET['artname']."\r\n");
    fwrite($txtfile,"Description - ".$_GET['description']."\r\n");
    fwrite($txtfile,"Price - ".$_GET['price']."\r\n");
    fwrite($txtfile,"Painting Medium - ".$_GET['medium']."\r\n");
    fwrite($txtfile,"State of the painting - ".$_GET['painting_state']."\r\n");

    fclose($txtfile);

    //$zipFile = "zips/".$_GET['artistname'].",".$_GET['artname'].".zip";
    //$zipArchive = new ZipArchive();

    //if (!$zipArchive->open($zipFile, ZIPARCHIVE::OVERWRITE))
      //  die("Failed to create archive\n");

    //$zipArchive->addGlob("uploads/".$_GET['artistname'].",".$_GET['artname']);
    //if (!$zipArchive->status == ZIPARCHIVE::ER_OK)
     //   echo "Failed to write local files to zip\n";

    //$zipArchive->close();

    $rootPath = realpath("uploads/".$_GET['artistname'].",".$_GET['artname']);

    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open("zips/".$_GET['artistname'].",".$_GET['artname'].".zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);

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
        // Get real and relative path for current file
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
    $email->FromName  = $_GET['artistname'];
    $email->Subject   = 'Upload Request';
    //$email->Body      = $bodytext;
    $email->AddAddress( 'iamthemananiket@gmail.com' );

    $file_to_attach = "zips/".$_GET['artistname'].",".$_GET['artname'].".zip";

    $email->AddAttachment( $file_to_attach , $_GET['artistname'].",".$_GET['artname'].".zip" );

    return $email->Send();
?>