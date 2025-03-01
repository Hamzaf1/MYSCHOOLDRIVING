<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Bienvenue à l'Admin
                            <small>Auteur</small>
                        </h1>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'update_user':
                                include "includes/update_user.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom d'utilisateur</th>
                                        <th>Prénom</th>
                                        <th>Nom de famille</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>N° de téléphone</th>
                                        <th>Rôle</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  users";
                                        $select_users = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_users)) {
                                            $user_id = $row['user_id'];
                                            $username = $row['username'];
                                            $user_firstname = $row['user_firstname'];
                                            $user_lastname = $row['user_lastname'];
                                            $user_email = $row['user_email'];
                                            $user_role = $row['user_role'];
                                            $user_phoneno = $row['user_phoneno'];  
                                            $user_image = $row['user_image'];                                      

                                     ?>
                                    <tr>
                                        <td><?php echo $user_id ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $user_firstname ?></td>
                                        <td><?php echo $user_lastname ?></td>
                                        <td><img width="100" src="../admin/images/<?php echo $user_image ?>"></td>
                                        <td><?php echo $user_email ?></td>
                                        <td><?php echo $user_phoneno ?></td>
                                        <td><?php echo $user_role ?></td>
                                        
                                        <?php echo "<td><a href='users.php?deleteuser=$user_id'>Delete</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?source=update_user&user_id=$user_id'>Edit</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?make_Learners=$user_id'>Make Learners</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?remove_from_Learners=$user_id'>Remove From Learners</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table><?php
                                break;
                        }
                        
                        ?>
						
					

                        <?php 

                        if (isset($_GET['deleteuser'])) {
                            
                            $user_idd = $_GET['deleteuser'];
                     
                            $query = "DELETE FROM users WHERE user_id = {$user_idd} ";

                            $delete_query = mysqli_query($connection,$query);
                            
                            if(!$delete_query) {
                                die("Query Failed" . mysqli_error($delete_query));
                            }
                            header("Location: users.php");
                        }

                        ?>
						

                        <?php 

                        if (isset($_GET['make_Learners'])) {
                            $user_id = $_GET['make_Learners'];
                            $query = "UPDATE users SET user_role = 'Learners' WHERE user_id = '$user_id'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>

                        <?php 

                        if (isset($_GET['remove_from_Learners'])) {
                            $user_id = $_GET['remove_from_Learners'];
                            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = '$user_id'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>