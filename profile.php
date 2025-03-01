<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

   

    <div class="container" style="width: 50%;">
                              
        <h2 style="margin-left: 40%;">Profile</h2>
        <?php $image = $_SESSION['s_image'] ; ?>
        <img src="admin/images/<?php echo $image;?>" width="200" style="margin-left: 32%;" class="img-circle" alt="Profile"> 
        <br><br><br><br>
        <div class="tab">
            <button class="tablinks" style="width: 33%" onclick="openCity(event, 'Personel Details')">Détails personnels</button>
            <button class="tablinks" style="width: 33%" onclick="openCity(event, 'Learners Booked')">Apprenants inscrits</button>
            <button class="tablinks" style="width: 33%"  onclick="openCity(event, 'Edit Details')">Modifier les détails</button>
        </div>


        <div id="Personel Details" class="tabcontent">
          <h3>Détails</h3>
          <!-- <?php echo $_SESSION['s_id'];?> -->
          <br>
          <?php
          $curr_user_id = $_SESSION['s_id'];
          
          $query = "SELECT * FROM users where user_id = $curr_user_id";

          $select_user = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_user)) {
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_phoneno = $row['user_phoneno'];
            ?>

            <table class="table table-striped" style="width: 50%">
              <tbody>
                <tr>
                  <td><b>Nom d'utilisateur :</b> </td>
                  <td><?php echo $username; ?></td>
                </tr>
                <tr>
                  <td><b>Prénom :</b> </td>
                  <td><?php echo ucfirst($user_firstname); ?></td>
                </tr>
                <tr>
                  <td><b>Nom : </b></td>
                  <td><?php echo ucfirst($user_lastname); ?></td>
                </tr>
                <tr>
                  <td><b>Email: </b></td>
                  <td><?php echo $user_email; ?></td>
                </tr>
                <tr>
                  <td><b>Numéro de téléphone: </b></td>
                  <td><?php echo $user_phoneno; ?></td>
                </tr>
              </tbody>
            </table>

          <?php } ?>
        </div>

        <div id="Learners Booked" class="tabcontent">
          
          <br>

          <h3><b>Détails des réservations My Learners:</b></h3>
          <?php

          $query = "SELECT * FROM orders INNER JOIN posts ON orders.Learners_id = posts.post_id where orders.user_id = $curr_user_id";

          $select_user_orders = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_user_orders)) {
            $order_name = $row['order_name'];
            $order_age = $row['user_age'];
			$dob = $row['date'];
			$order_Phone = $row['order_Phone'];

           
            ?>
            <br>
            <table class="table table-striped" style="width: 50%">
              <tbody>
                <tr>
                  <td><b>Nom du passager:</b> </td>
                  <td><?php echo $order_name; ?></td>
                </tr>
                <tr>
                  <td><b>Âge des passagers:</b> </td>
                  <td><?php echo $order_age; ?></td>
                </tr>
                
                <tr>
                  <td><b>Destination: </b></td>
                  <td><?php echo $order_Phone; ?></td>
                </tr>
                <tr>
                  <td><b>Date de la commande: </b></td>
                  <td><?php echo $dob; ?></td>
                </tr>
                
                <br><br><br>
              </tbody>
            </table>

          <?php } ?>

<br><br><br>


        </div>

        <div id="Edit Details" class="tabcontent">
          <h3>Modifier les détails</h3>
          <br>
          <?php
            //echo $_SESSION['s_id'];

            $curr_user_id = $_SESSION['s_id'];
            $query = "SELECT * FROM users WHERE user_id = $curr_user_id ";
            $select_users = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_users)) {
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_password = $row['user_password'];
                $user_phoneno = $row['user_phoneno'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
            }

            if (isset($_POST['update-user'])) {
              $username = $_POST['username'];
              $user_password = $_POST['user_password'];
              $user_firstname = $_POST['user_firstname'];
              $user_lastname = $_POST['user_lastname'];
              $user_phoneno = $_POST['user_phoneno'];
              $user_email = $_POST['user_email'];


              $image = $_FILES['images']['name'];
              $tmp_image = $_FILES['images']['tmp_name'];

              move_uploaded_file($tmp_image, "admin/images/$image");

              $query = "UPDATE users SET username='{$username}', user_password='{$user_password}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_password='{$user_password}', user_phoneno={$user_phoneno}, user_email='{$user_email}', user_image='{$image}' WHERE user_id=$curr_user_id";
              
              //echo $title . " " . $admin;
              
              $update_bus = mysqli_query($connection,$query);

              if (!$update_bus) {
                die("Query Failed" . mysqli_error($connection));
              }
              $_SESSION['s_image'] = $image;
              header("Location:profile.php");
            }

            ?>

            <form action="" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
              </div>

              <div class="form-group">
                <label for="firstname">Prénom</label>
                <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
              </div>

              <div class="form-group">
                <label for="lastname">Nom de famille</label>
                <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
              </div>

              <div class="form-group">
                <label for="phoneno">N° de téléphone</label>
                <input value="<?php echo $user_phoneno; ?>" type="text" class="form-control" name="user_phoneno">
              </div>

              <div class="form-group">
                <label for="password">Mot de passe</label>
                <input value="<?php echo $user_password?>" id="myInput" type="password" class="form-control" name="user_password">
              </div>

              <div class="form-group">
                <input type="checkbox" onclick="myFunction()">Afficher le mot de passe
              </div>

              <div class="form-group">
                <img width="100" src="admin/images/<?php echo $user_image ?>">
              </div>

              <div class="form-group">
                <label>Image de l'utilisateur</label>
                <input type="file" name="images" >
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update-user" value="Update">
              </div>
            </form>


        </div>

    </div>
        <hr>


    <script>

    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }


    function openCity(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

<?php include "includes/footer.php"; ?> 