<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/admin_sb/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/admin_sb/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" integrity="sha512-PIAUVU8u1vAd0Sz1sS1bFE5F1YjGqm/scQJ+VIUJL9kNa8jtAWFUDMu5vynXPDprRRBqHrE8KKEsjA7z22J1FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" integrity="sha512-xnwMSDv7Nv5JmXb48gKD5ExVOnXAbNpBWVAXTo9BJWRJRygG8nwQI81o5bYe8myc9kiEF/qhMGPjkSsF06hyHA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-gradient-primary mt-5">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                                <img class="" src="<?php echo base_url(); ?>assets/ricelytics_logo.png" alt="...">
                            </div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img class="" src="<?php echo base_url(); ?>assets/ricelytics_logo.png" alt="...">
                                        <!-- <h1 class="h4 text-gray-900 mb-4">Login</h1> -->
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label ml-2" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-user btn-block" id="submitLogInBtn">Login</a>
                                        <!-- <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block"><i class="fab fa-google fa-fw"></i> Login with Google</a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block"><i class="fab fa-facebook-f fa-fw"></i> Login with Facebook</a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/admin_sb/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin_sb/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/admin_sb/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/admin_sb/js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function(){
            // Press enter, trigger submit button
            $("#password").keypress(function(event) {
                if (event.keyCode === 13) {
                    // alert("pressed!");
                    $("#submitLogInBtn").click();
                }
            });

            $("#submitLogInBtn").click(function(){
                var flag = 0;
                var email = $('#email').val();
                var password = $('#password').val();

                // alert(email);
                // alert(password);

                if (email == '' || email == undefined) {
                    $('#email').css('border', '1px solid red');
                    flag = 1;
                }

                if (password == '' || password == undefined) {
                    $('#password').css('border', '1px solid red');
                    flag = 1;
                }

                if (flag == 0) {
                    // console.log('<?php echo base_url(); ?>main/login');
                    $.ajax({
                        url: "<?php echo base_url(); ?>main/login",
                        method: 'POST',
                        dataType: "JSON",
                        data: {
                            email: email, 
                            password: password
                        },
                        success: function (result) {
                            console.log(result);

                            window.location.href = '<?php echo base_url(); ?>main/dashboard';

                            // if (result['error'] == false){
                            //     // alert("Success!");
                            //     $('#signinModal').modal('toggle');
                            //     $('#loadingLoginSuccessModal').modal('show');

                            //     setTimeout(function() {
                            //         $('#loadingLoginSuccessModal').modal('hide');
                            //         window.location.href = '<?php echo base_url(); ?>main/index';
                            //     }, 3500);
                            // } else {
                            //     console.log(result);
                            //     // alert(result['message']);
                            //     document.getElementById("errorPtag").innerHTML = result['message'];
                            //     $('#errorModal').modal('show');
                            //     $('#signinModal').modal('toggle');

                            //     setTimeout(function() {
                            //         window.location.reload();
                            //     }, 3500);
                            // }
                        },
                        error: function (request, status, error) {
                            alert(request.responseText);
                        }
                    });
                } else {
                    alert('Something went wrong');
                }
            });
        });
    </script>

</body>

</html>