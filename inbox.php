<?php include '_header.php'; ?>

<main>
    <div class="container">

        <?php
            include 'assets/php/connect.php';
            if(isset($_GET['mId'])){
                $id=$_GET['mId'];
                $query="SELECT * FROM messages WHERE mId='$id'";
                $result=mysqli_query($connect,$query);
                $row=mysqli_fetch_assoc($result);
                $username=$row['mName'];
                $email=$row['mEmail'];
                $date=$row['mDate'];
                $message=$row['mMessage'];
                echo '<div class="card-white">';
                    echo '<h4>'.$username.', '.$email.' ['.date("D, d M Y", strtotime($date)).' at '.date("H:i A", strtotime($date)).']</h4>';
                    echo '<p>'.$message.'</p>';
                echo '</div>';
                $query="UPDATE messages SET mStatus='seen' WHERE mId='$id'";
                $result=mysqli_query($connect,$query);
            }
        ?>

        <!-- Inbox -->
        <div class="card-white">
            <div class="form-message">
                <h2>Inbox</h2><br>

                <table class="table-message">
                    <tr>
                        <th>From</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                    <?php
                        $query="SELECT * FROM messages ORDER BY mId DESC";
                        $result=mysqli_query($connect,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr';
                            if($row['mStatus']!='seen'){
                                echo ' class="table-message-unseen"';
                            }
                            echo '>';
                                echo '<td style="width:10%;"><a href=inbox.php?mId='.$row['mId'].'>'.$row['mName'].'</a></td>';
                                echo '<td style="width:80%;"><a href=inbox.php?mId='.$row['mId'].'>'.mb_strimwidth($row['mMessage'], 0, 50, "...").'</a></td>';
                                echo '<td style="width:10%;"><a href=inbox.php?mId='.$row['mId'].'>'.date("d M", strtotime($row['mDate'])).'</a></td>';
                            echo '</tr>';
                        }
                    ?>
                </table>

            </div>
        </div>

    </div>
</main>

<?php include '_footer.php';?>