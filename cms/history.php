<?php
$conn = new mysqli('localhost', 'root', '', 'cms_db');


?>


<form action="" method="POST">
    <label for="">Enter company contact</label><br>
    <input type="text" name="contact" placeholder="Enter company contact">
    <input type="submit" name="submit" value="Enter">

</form>

<table class="table">
    <thead>

        <tr>
            <th scope="col">Company Name</th>
            <th scope="col">Contact</th>
            <th scope="col">RFID</th>
            <th scope="col">Date</th>

            <!-- <th scope="col">Handle</th> -->
        </tr>
    </thead>
    <tbody>

        <?php
        if (isset($_POST["submit"])) {
            $contact = $_POST['contact'];
            if(strlen($contact)!=0){
                $sql = "SELECT * FROM `parcels` WHERE sender_contact='$contact'";
            }else{
                $sql = "SELECT * FROM `parcels`";
            }
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) {


        ?>
                <tr>


                    <th><?php echo $row['recipient_name']; ?></th>
                    <td><?php echo $row['recipient_contact']; ?></td>
                    
                    <td><?php echo $row['rfid']; ?></td>
                    <td><?php echo $row['date_created']; ?></td>


                </tr>
            <?php } ?>
            <h5>Total Packs: <?php echo mysqli_num_rows($result); ?></h5>
        <?php   } ?>