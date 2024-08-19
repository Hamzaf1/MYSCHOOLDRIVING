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
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		<br><br>
 
     <button type="button" class="btn btn-primary" onclick="window.location.href='Learners.php'"> 
		  <h2><b>All students</b>  </h2>    
		  <p>Voir plus d'informations</p></br></br></br>
	 </button>
         
     <button type="button" class="btn btn-primary" onclick="window.location.href='Learners.php?source=add_Learners'"> 
		    <h2><b>Ajouter des apprenants</b>  </h2> 
		  <p>Ajouter des apprenants</p></br></br></br>
	 </button>
     
	<button type="button" class="btn btn-primary" onclick="window.location.href='categories.php'"> 
		    <h2><b>Catégories</b>  </h2> 
		  <p>Ajouter des catégories</p></br></br></br>
	 </button>
   <button type="button" class="btn btn-primary" onclick="window.location.href='query.php'"> 
		    <h2><b>Commentaires</b>  </h2> 
		  <p>Voir les commentaires</p></br></br></br>
	 </button>
	 
	<button type="button" class="btn btn-primary" onclick="window.location.href='users.php'"> 
		    <h2><b>Tous les utilisateurs</b>  </h2> 
		  <p>Voir tous les utilisateurs</p></br></br></br>
	 </button>
	 
	 <button type="button" class="btn btn-primary btn-mr-3" onclick="window.location.href='Bookings.php'"> 
		    <h2><b>Réservations</b>  </h2> 
		  <p>Voir Réservations</p></br></br></br>
	 </button></br></br>
	 
	 <button type="button" class="btn btn-primary" onclick="window.location.href='../profile.php'"> 
		    <h2><b>Profile</b>  </h2> 
		  <p>Voir Profile</p></br></br></br>
	 </button>
	 
	 <button type="button" class="btn btn-primary" onclick="window.location.href='report.php'"> 
		    <h2><b>Rapports</b>  </h2> 
		  <p>Voir les rapports totaux</p></br></br></br>
	 </button>
	 
	
<?php include"includes/admin_footer.php"; ?>