<div class="table-responsive">
    <table class="table table-responsive table-hover ">


        <thead>
            <tr>
                <th> Filename</th>
                <th> Size</th>
                <th>Folder</th>
                <th>Uploaded</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'connect.php';
            $query = mysqli_query($mycon, "SELECT * FROM `file` order BY id desc limit 10");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['size']."kb" ?></td>
                    <td><?php echo $row['folder'] ?></td>

                    <td><?php echo $row['uploaded'] ?></td>
                    <td><a href="trash.php"> <i class="ti-trash"></i></a><a href="download.php"> <i class="ti-cloud-down"></i></a></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>