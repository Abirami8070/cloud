<?php
$conn = new mysqli('localhost', 'root', '', 'cms_db');

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Sec.No</th>
            <th scope="col">RFID no.</th>
            <th scope="col">Section name</th>
            <!-- <th scope="col">function</th> -->
            <th scope="col">Date</th>
             
            <!-- <th scope="col">DELETE</th> -->
            <!-- <th scope="col">Handle</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM rfid";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {


        ?>
            <tr>
                <th><?php echo $row['id']; ?></th>
                <td><?php echo $row['rfid']; ?></td>
                <td><?php echo $row['section']; ?></td>
                 
                <th><?php echo $row['date']; ?></th>
                 
                <td> <a href="del.php?id=<?php echo $row['id']; ?>"> </a> </td>

            </tr>
        <?php } ?>


    </tbody>
</table>