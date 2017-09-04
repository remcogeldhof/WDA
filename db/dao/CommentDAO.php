<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'data/Comment.php';
include_once 'db/connection/DatabaseConnection.php';


class CommentDAO{
    
     private static function getConnection() {
        return DatabaseConnection::getDatabase();
    }
 public static function getAllByBlog($blogID) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM comment WHERE blogID=$blogID");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }

    public static function getNumberOfComments($blogID) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT count(*) FROM comment WHERE blogID=$blogID");
        $data = mysqli_fetch_array($result);
        return $data;
    }

    public static function getMostCommentsBlogIDs() {
        $result = self::getConnection()->voerSqlQueryUit("SELECt blogID FROM comment group by blogID order by count(blogID) desc LIMIT 3");
        $data = mysqli_fetch_array($result);
        return $data;
    }



    public static function insert($comment) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO comment(commentID, comment, auteurID, blogID) VALUES ('?','?','?','?')", array(null, $comment->comment, $comment->auteurID, $comment->blogID));
    }

    public static function deleteById($id) {
        return self::getConnection()->voerSqlQueryUit("DELETE FROM comment where blogID='$id'");
    }

 protected static function converteerRijNaarObject($databaseRij) {
        return new Comment($databaseRij['commentID'], $databaseRij['comment'], $databaseRij['auteurID'], $databaseRij['blogID']);
 }

}

?>