<table class="table">
    <thead>
        <tr>
            <th scope="col">No:</th>
            <th scope="col">User email </th>

            <th scope="col">Status</th>
             
            <!-- <th scope="col">ADD</th> -->
             
            <!-- <th scope="col">Handle</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'cms_db');

        $sql = "SELECT * FROM delivery";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {


        ?>
            <tr>
                <th><?php echo $row['id']; ?></th>
                <td><?php echo $row['user']; ?></td>
                <td><?php echo $row['status']; ?></td>
                 
                <!-- <td>ADD</td> -->
                 

            </tr>
        <?php } ?>

    </tbody>
</table>