<?php
class Uploader
{
    private $destinationPath;
    private $errorMessage = [];
    private $extensions;
    private $maxSize;
    private $uploadName;
    public $name='Uploader';

    function setDir($path){
        $this->destinationPath  =   $path;
    }

    function setMaxSize($sizeMB){
        $this->maxSize  =   $sizeMB * (1024*1024);
    }

    function setExtensions($options){
        $this->extensions   =   $options;
    }

    function setMessage($message){
        $this->errorMessage[] =   $message;
    }

    function getMessage(){
        return $this->errorMessage;
    }

    function getUploadName(){
        return $this->uploadName;
    }

    function doUpload($result ,$size ,$name,$tempName , $ext){

        $this->uploadName =  $name;
        if(empty($name))
        {
            $this->setMessage("File not selected ");
        }
        else if($size>$this->maxSize)
        {
            $this->setMessage("Too large file !");
        }
        else if(in_array($ext,$this->extensions))
        {
            if(!is_dir($this->destinationPath))
                mkdir($this->destinationPath);
            if(!is_dir($this->destinationPath.'/'.$ext))
                mkdir($this->destinationPath.'/'.$ext);

            if(file_exists($this->destinationPath.'/'.$ext.'/'.$this->uploadName))
                $this->setMessage("File already exists. !");
            else if(!is_writable($this->destinationPath.'/'.$ext))
                $this->setMessage("Destination is not writable !");
            else
            {
                if(move_uploaded_file($tempName,$this->destinationPath.'/'.$ext.'/'.$this->uploadName))
                {
                    $result =   true;
                }
                else
                {
                    $this->setMessage("Upload failed , try later !");
                }
            }
        }
        else
        {
            $this->setMessage("Invalid file format !");
        }
        return $result;
    }

    function multUploadFile($fileBrowse){

        if(!array_key_exists($fileBrowse, $_FILES)){
            $this->setMessage("File not selected ");
            return false;
        }

        $files = $_FILES[$fileBrowse];
        foreach ($files['name'] as $key => $name) {
            $result =   false;
            $size   =   $files["size"][$key];
            $tempName = $files["tmp_name"][$key];
            $ext    =   pathinfo($name,PATHINFO_EXTENSION);
            return $this->doUpload($result ,$size ,$name, $tempName , $ext);
        }

    }


    function uploadFile($fileBrowse){
        if(!array_key_exists($fileBrowse, $_FILES)){
            $this->setMessage("File not selected ");
            return false;
        }

        $result =   false;
        $size   =   $_FILES[$fileBrowse]["size"];
        $name   =   $_FILES[$fileBrowse]["name"];
        $tempName   =   $_FILES[$fileBrowse]["tmp_name"];
        $ext    =   pathinfo($name,PATHINFO_EXTENSION);
        return $this->doUpload($result ,$size ,$name, $tempName , $ext);
    }

    function deleteUploaded($fileBrowse){
        $name   =   $_FILES[$fileBrowse]["name"];
        $ext    =   pathinfo($name,PATHINFO_EXTENSION);
        unlink($this->destinationPath.'/'.$ext.'/'.$this->uploadName);
    }
}
?>