<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['register'])) {
//echo "registered";

    $u_role = $_POST['u_role'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "admin/images/$image");
    if ($image == "") {
      $image = "user_default.jpg";
    }

if ($username=="" || $firstname=="" || $lastname=="" || $email=="" || $phone_no=="" || $image=="" || $password=="") {
  # code...
  echo "**TOUS LES CHAMPS SONT OBLIGATOIRES";
}

else {

$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_phoneno, user_role, user_image) VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$phone_no', '$u_role', '$image') ";

$register_user = mysqli_query($connection, $query);

if(!$register_user) {
    die("Query Failed" . mysqli_error($connection));
}

 echo "<script>alert('Vous avez réussi à vous inscrire Veuillez vous connecter')</script>";
    
                  echo "<script> document.location.href='index.php';</script>";

}

}

?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="images/raj.png" style="margin-top: 30%;">
            </div>
            <div class="col-lg-6">
                
              
              <h2 style="margin-left: 40%;">Inscription</h2>
              <form action="" method="post" enctype="multipart/form-data">
			  
			  
			    <div class="form-group">
				  <label for="email">Sélectionnez votre type d'utilisateur</label>
			   <select name="u_role" class="form-control" required>
			   <option value='' selected='selected' hidden='hidden'>Choisir le type d'inscription</option>
          
			<option value="subscriber">Inscription de l'utilisateur</option>
            <option value="Learners">Inscription des apprenants</option>
           
                    </select>
			     </div> 
		
                <div class="form-group">
                  <label>Nom d'utilisateur :</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Username" name="username" required>
                </div>

                <div class="form-group">
                  <label>Prénom:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Firstname" name="firstname" required>
                </div>

                <div class="form-group">
                  <label>Nom de famille:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Lastname" name="lastname" required>
                </div>

                <div class="form-group">
                    <label>Image de l'utilisateur</label>
                    <input type="file" name="image" >
                </div>

                <div class="form-group">
                  <labe>Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                
                <div class="form-group">
                  <label>N° de téléphone:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Enter phone No" name="phone_no" required>
                </div>

                <div class="form-group">
                  <label>Mot de passe:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                </div>
				
		
        
                <button type="submit" class="btn btn-primary" name="register" style="margin-left: 45%; margin-top: 20px;">s'inscrire</button>
              </form>
            

            </div>
        </div>

    </div>
        <hr>


<?php include "includes/footer.php"; ?>