<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2>List of series from database</h2>

    <br>
    <br>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include("conn.php");
        $cnx=new Connection();
        $cnx->selectDatabase('datauser');
        
        include("series.php");
       
        $series = Serie::selectSeries('series', $cnx->conn);
       
        foreach ($series as $row) {
            echo "<tr>
                <td>$row[id]</td>
                <td>$row[titre]</td>
                <td>
                    <a class='btn btn-success btn-sm' href='updateserie.php?id=$row[id]'>edit</a>
                    <a class='btn btn-danger btn-sm' href='deleteserie.php?id=$row[id]'>delete</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
