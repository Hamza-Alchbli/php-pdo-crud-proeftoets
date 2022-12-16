<?php 

require_once "connect.php";
try {
    $sql = 'select * from RichestPeople';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-pdo-proeftoets</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
<table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Naam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $q->fetch()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Id']) ?></td>
                        <td><?php echo htmlspecialchars($row['Naam']); ?></td>
                        <td><?php echo htmlspecialchars($row['Tussenvoegsel']); ?></td>
                        <td><?php echo htmlspecialchars($row['Achternaam']); ?></td>
                        <td>
                            <button class="btn btn-primary"><a href="updateForm.php?updateid=<?= $row['Id'] ?>" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteid=<?= $row['Id'] ?>"   class="text-light">Delete</a></button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>    
        </table>
</body>

</html>