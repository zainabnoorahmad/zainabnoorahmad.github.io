<?php
include('header.php');
include_once("config.php");
$db_select = mysqli_select_db($con, $dbname);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($con));
}

?>
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.form.js"></script>
    <script type="text/javascript" src="scripts/upload.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />

    <div class="main-content">
        <div class="header pb-7 pt-5 pt-lg-8 d-flex align-items-center" style="
      height: 250px;
      background-image: url(img/main5.jpg);
      background-size: cover;
      background-position: top;
    ">
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <p class="heading" style="font-size: 30px; padding-left: 10px; padding-top: 0px">
                        Barbershop
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0" id="profile-main">
                    <div class="cardprof card-profile shadow bg-secondary shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 order-lg-2">
                                <div class="card-profile-image">
                                    <?php
					session_start();
					$session_email=$_SESSION['email'];
					$records = mysqli_query($con, "select * from clientregister where `email`='$session_email' "); 
					while ($data = mysqli_fetch_array($records))
					 {	 
											?>
                                        <h3 class="text-center">
                                            <?php echo $data['name']; ?>
                                        </h3>
                                        <h5 class="text-center">
                                            <?php echo $data['email']; ?>
                                        </h5>
                                        <br /><br /><br />
                                        <img id="rounded-circle" class="preview" src="uploads/<?php
					 if ($data['profile_photo']==NULL)
					 {$photo=" profiledefault.jpg ";}
					 else
					 {$photo=$data['profile_photo'];}
					 echo $photo; ?>" width="100" height="100">

				<?php
				}
				?>

                                  <div class=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="cardprof bg-secondary shadow">
                        <div class="card-body">
                            <div class="container">
                                <h3>Upload Your Image</h3>
                                <br />
                                <div class="upload_container">
                                    <br clear="all" />
                                    <center>
                                        <div style="width: 350px" align="center">
                                            <div id="preview"></div>
                                            <form id="image_upload_form" method="POST" enctype="multipart/form-data" action="image_upload.php" autocomplete="off">
                                                <div class="browse_text">Browse Image File:</div>
                                                <div class="file_input_container">
                                                    <div class="upload_button">
                                                        <input type="file" name="photo" id="photo" class="file_input" />
                                                    </div>
                                                </div>
                                                <br clear="all" />
                                                <input class="btn btn-outline-light" type="submit" name="save" onClick="window.location.reload();" />
                                            </form>
                                        </div>
                                    </center>
                                    <br clear="all" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php');?>
    </div>
