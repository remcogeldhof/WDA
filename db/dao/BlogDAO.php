<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'data/Blog.php';
include_once 'db/connection/DatabaseConnection.php';
include_once 'db/dao/CommentDAO.php';



class BlogDAO{
    
     private static function getConnection() {
        return DatabaseConnection::getDatabase();
    }
 public static function getAll() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM blog");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }


    public static function getByCategory($categorie) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM blog WHERE categorie='$categorie'");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }

    public static function getByCategoryDetail($categorie, $except) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM blog WHERE categorie='$categorie' AND blogID <> '$except' LIMIT 3");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }

    public static function getByMonth($month) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM blog WHERE MONTH(datum)=$month");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }

    //nieuwste
     public static function getThreeNew() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM blog ORDER BY blogID DESC LIMIT 3");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }
// random && this month
    public static function getThreeRandom() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM blog WHERE Month(datum) = Month(CURRENT_TIMESTAMP) ORDER BY RAND() LIMIT 3");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
}
//SELECT * FROM(SELECT blogID from comment group by blogID order by count(blogID) desc LIMIT 3) t JOIN blog on blogID = t.blogID
    public static function getMostComments() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM(SELECT comment.blogID from comment group by comment.blogID order by count(comment.blogID) desc LIMIT 3) t JOIN blog on blog.blogID = t.blogID");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }

    public static function getById($id) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM blog WHERE blogID=?", array($id));
        if ($result->num_rows == 1) {
            $databaseRij = $result->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }

    public static function insert($blog) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO blog (blogID, auteurID, titel, categorie, datum, foto, tekst) VALUES ('?','?','?','?','?','?','?')", array(null, $blog->auteurID, $blog->titel, $blog->categorie, $blog->datum, $blog->foto, $blog->tekst));
    }

    public static function deleteById($id) {
        return self::getConnection()->voerSqlQueryUit("DELETE FROM blog where blogID='$id'");
    }

 protected static function converteerRijNaarObject($databaseRij) {
        return new Blog($databaseRij['blogID'], $databaseRij['auteurID'], $databaseRij['titel'], $databaseRij['categorie'], $databaseRij['datum'], $databaseRij['foto'],$databaseRij['tekst']);
 }

  

}

?>