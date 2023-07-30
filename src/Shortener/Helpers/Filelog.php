<?php

//namespace App\Shortener\Helpers;
//
//use App\DB\Models\Shortener;
//use App\DB\Models\ShortenerModel;
//use App\Shortener\Helpers\MyExeption;
//
//class Filelog
//{
//
//
//    public string $filename;
//    private array $all = [];
//
//    public function __construct(string $filename
//
//    )
//    {
//        $this->filename = $filename;
//        $this->getContentFromFile();
//
//
//    }
//
//    public function getContentFromFile()
//    {
//        if (file_exists($this->filename)) {
//            $content = file_get_contents($this->filename);
//            $this->all = (array)json_decode($content, true);
//        }
//
//    }
//
//
//
//
//
//    function WriteFile($content)
//
//    {
//
//        $file = fopen($this->filename, "w+");
//        fwrite($file,$content);
//        fclose($file);
//
//    }
//
//    public function __destruct()
//    {
//        $this->writeFile(json_encode($this->all));
//    }
//
//
//}