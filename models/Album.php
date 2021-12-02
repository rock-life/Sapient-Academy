<?php
class Album{
    private $id, $name,$price,$release_date,$e_album,$physical_quantity,$id_user,$sample_link,$album_link,$poster_link, $description;

  public function AddAlbum($name,$price,$release_date, $e_album,$physical_quantity,$id_user,$sample_link,$album_link,$poster_link,$description){
        $sql="insert into album(name,price,release_date,e_album,physical_quantity,id_user,sample_link,album_link,poster_link,description) values(:name,:price,:release_date,:e_album,:physical_quantity,:id_user,:sample_link,:album_link,:poster_link,:description)";
        $stmp=DBConnect::Connection()->prepare($sql);
        $stmp->bindValue(":name",$name);
        $stmp->bindValue(":price",$price);
        $stmp->bindValue(":release_date",$release_date);
        $stmp->bindValue(":e_album",$e_album);
        $stmp->bindValue(":physical_quantity",$physical_quantity);
        $stmp->bindValue(":id_user",$id_user);
        $stmp->bindValue(":sample_link",$sample_link);
        $stmp->bindValue(":album_link",$album_link);
        $stmp->bindValue(":poster_link",$poster_link);
        $stmp->bindValue(":description",$description);
        $stmp->execute();
    }

    function EditAlbum($id,$name,$price,$release_date, $e_album,$physical_quantity,$id_user,$sample_link,$album_link,$poster_link,$description){
        $sql="update album set name=:name, description=:description, price=:price, release_date=:release_date, e_album=:e_album, 
         physical_quantity=:physical_quantity, id_user=:id_user, sample_link=:sample_link, album_link=:album_link, poster_link=:poster_link
        where id=:id";
        $stmp=DBConnect::Connection()->prepare($sql);
        $stmp->bindValue(":id", $id);
        $stmp->bindValue(":name",$name);
        $stmp->bindValue(":price",$price);
        $stmp->bindValue(":release_date",$release_date);
        $stmp->bindValue(":e_album",$e_album);
        $stmp->bindValue(":physical_quantity",$physical_quantity);
        $stmp->bindValue(":id_user",$id_user);
        $stmp->bindValue(":sample_link",$sample_link);
        $stmp->bindValue(":album_link",$album_link);
        $stmp->bindValue(":poster_link",$poster_link);
        $stmp->bindValue(":description",$description);
        $stmp->execute();
    }

    function Delete($id){
        $sql="delete from album where id=:id";
        $stmp=DBConnect::Connection()->prepare($sql);
        $stmp->bindValue(":id",$id);
        $stmp->execute();
    }

    function GetAlbumById($id){
        $sql="select * from album where id=:id";
        $stmp=DBConnect::Connection()->prepare($sql);
        $stmp->bindValue(":id",$id);
        $stmp->execute();
        if($stmp->rowCount()>0)
        foreach($stmp as $row)
        {
            $this->name=$row["name"];
            $this->price=$row["price"];
            $this->release_date=$row["release_date"];
            $this->e_album=$row["e_album"];
            $this->physical_quantity=$row["physical_quantity"];
            $this->id_user=$row["id_user"];
            $this->sample_link=$row["sample_link"];
            $this->album_link=$row["album_link"];
            $this->poster_link=$row["poster_link"];
            $this->description=$row["description"];
        }
    }

    static function getAllAlbumArray(){
        $sql="select *from album order by id desc";
        $result=DBConnect::Connection()->query($sql);
        $v=0;
        while($row=$result->fetch())
        {
            $album = new Album();
            $album->setId($row["id"]);
            $album->setName($row["name"]);
            $album->setPrice($row["price"]);
            $album->setRelease_date($row["release_date"]);
            $album->setE_album($row["e_album"]);
            $album->setPhysical_quantity($row["physical_quantity"]);
            $album->setId_user($row["id_user"]);
            $album->setSample_link($row["sample_link"]);
            $album->setAlbum_link($row["album_link"]);
            $album->setPoster_link($row["poster_link"]);
            $album->setDescription($row["description"]);
            $array_albums[$v]=$album;
            $v++;
        }
        return $array_albums;
    }

    function getId(){
        return $this->id;
    }

    function getDescription(){
        return $this->description;
    }

    function getName(){
        return $this->name;
    }
    function getPrice(){
        return $this->price;
    }
    function getRelease_date(){
        return $this->release_date;
    }
    function getE_album(){
        return $this->e_album;
    }
    function getPhysical_quantity(){
        return $this->physical_quantity;
    }
    function getId_user(){
        return $this->id_user;
    }
    function getSample_link(){
        return $this->sample_link;
    }
    function getAlbum_link(){
        return $this->album_link;
    }
    function getPoster_link(){
        return $this->poster_link;
    }

    function setId($id){
        $this->id=$id;
    }

    function setDescription($description){
        $this->description=$description;
    }

    function setName($name){
        $this->name=$name;
    }
    function setPrice($price){
        $this->price=$price;
    }
    function setRelease_date($release_date){
        $this->release_date=$release_date;
    }
    function setE_album($e_album){
        $this->e_album=$e_album;
    }
    function setPhysical_quantity($physical_quantity){
        $this->physical_quantity=$physical_quantity;
    }
    function setId_user($id_user){
        $this->id_user=$id_user;
    }
    function setSample_link($sample_link){
        $this->sample_link=$sample_link;
    }
    function setAlbum_link($album_link){
        $this->album_link=$album_link;
    }
    function setPoster_link($poster_link){
        $this->poster_link=$poster_link;
    }
}
?>