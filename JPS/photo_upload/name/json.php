<?php

class JsonFile
{
    public $data;
    public $filename;

    function __construct($filename)
    {
        $this->filename = $filename;
        $this->data = json_decode(file_get_contents($this->filename));
    }

    public function add_new(String $en, String $bn)
    {
        $input = array('en' =>$en, 'bn'=>$bn);
        $data[] = $input;

		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents($this->filename, $data);
    }
}

?>