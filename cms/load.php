<table class="table">
    <thead>
        <tr>
            <th scope="col">S.no</th>
            <th scope="col">Loadcell</th>
            <th scope="col">Crate Weight</th>
            <!-- <th scope="col">ADD</th> -->
            <!-- <th scope="col">DELETE</th> -->
            <!-- <th scope="col">Handle</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'cms_db');

        $sql = "SELECT * FROM loadcell";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {


        ?>
            <tr>
                <th><?php echo $row['id']; ?></th>
                <td><?php echo $row['loadcell']; ?></td>
                <td><?php echo $row['weight']; ?></td>
                <!-- <td>ADD</td> -->
                <!-- <td> <a href="del.php?no=<?php echo $row['id']; ?>">DELETE</a> </td> -->

            </tr>
        <?php } ?>

    </tbody>
</table>