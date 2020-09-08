<?php 
    class Alt extends Controller
    {
    
        public function index($name = '', $otherName = '')
        {
            $data = "";
            //$this->view('home/about-us', $data);
            $this->view('home/index', $data);
        }
    
    }
?>