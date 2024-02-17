<?php
class FavSeries {
    private $idu;
    private $ids;

    public function __construct($idu, $ids) {
        $this->idu = $idu;
        $this->ids = $ids;
    }

    public static function updatefav($tableName, $conn, $idu, $ids)
{
    $sql = "SELECT idu FROM $tableName WHERE idu='$idu' AND ids='$ids'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $sqlDelete = "DELETE FROM $tableName WHERE idu='$idu' AND ids='$ids'";
        mysqli_query($conn, $sqlDelete);
    } else {
        $sqlInsert = "INSERT INTO $tableName (idu, ids) VALUES ('$idu', '$ids')";
        mysqli_query($conn, $sqlInsert);
    }
}

    public static function selectFavSeries($tableName, $conn,$idu) {
        $sql = "SELECT idu, ids FROM $tableName WHERE idu='$idu'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public static function selectFavSeriesById($tableName, $conn, $ids) {
        $sql = "SELECT idu, ids FROM $tableName WHERE ids = '$ids'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }
}
?>
