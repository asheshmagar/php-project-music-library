<?php
class Album {
    private $id;
    private $con;
    private  $title;
    private  $artistId;
    private  $genre;
    private  $artworkPath;
    public function  __construct($con,$id)
    {
        $this->con = $con;
        $this->id = $id;


        $query = mysqli_query($this->con, "select * from albums where id='$this->id'");
        $album = mysqli_fetch_array($query);
        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genre = $album['genre'];
        $this->artworkPath = $album['artworkPath'];


    }
    public  function getTitle(){
        return $this->title;
    }
    public  function  getArtist(){
        return new Artist($this->con, $this->artistId);
    }
    public  function getArtwork(){
        return $this->artworkPath;
    }

    public  function getGenre()
    {
        return $this->genre;
    }
    public  function getNumberOfSongs(){
        $query = mysqli_query($this->con,"select id from songs where album='$this->id'");
        return mysqli_num_rows($query);

    }
    public function getSongIds(){
        $query = mysqli_query($this->con, "select id from songs where album='$this->id' order by albumOrder ASC ");
        $array = array();
        while($row = mysqli_fetch_array($query)){
            array_push($array,$row['id']);
        }
        return $array;
    }
}