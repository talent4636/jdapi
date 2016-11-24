<?php

class db_file{

//    public $header = '<?php exit(); ';

    public function __construct(){
//        $this->prefix= $prefix;
//        $this->header_length = strlen($this->header);
    }

    public function store($key, $value){
        $this->check_dir();
        $org_file = $this->get_store_file($key);
        $tmp_file = $org_file . '.' . str_replace(' ', '.', microtime()) . '.' . mt_rand();
        if(file_put_contents($tmp_file, $this->header.serialize($data))){
            if(copy($tmp_file, $org_file)){
                @unlink($tmp_file);
                return true;
            }
        }
        return false;
    }

    public function fetch($key, &$value){
        //
    }

    public function delete(){
        //
    }

    public function getFileName($key){
        return md5($key).'.log';
    }


}