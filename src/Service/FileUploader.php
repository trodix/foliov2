<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

class FileUploader
{
    
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file, $directoryName = "divers")
    {
        $this->setTargetDirectory($this->getTargetDirectory() ."/". $directoryName);

        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
            throw new Exception;
        }

        return $fileName;
    }

    // public function initWhenUpdate(&$entity) {
    //     $file = $entity->getImage();
    //     $fs = New Filesystem();

    //     $filePath = $this->getTargetDirectory().$entity->getImage();
    //     if($fs->exists($filePath)) {
    //         $fileValue = new File($filePath);
    //     } else {
    //         $fileValue = null;
    //     }
    // }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    public function setTargetDirectory($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

}
