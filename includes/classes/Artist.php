<?php
    class Artist {
        private $id;
        private $con;
        public function  __construct($con,$id)
        {
            $this->con = $con;
            $this->id = $id;

        }
        public  function getName(){
            $artistQuery = mysqli_query($this->con, "select name from artists where id='$this->id'");
            $artist = mysqli_fetch_array($artistQuery);
            return $artist['name'];
        }
    }