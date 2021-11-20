<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BENGKEL.ID | Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="style/web/images/favicon.png" />

    <!-- CSS BEGIN -->
    <link href="<?php echo base_url(); ?>/assets/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- JS END -->




</head>

<style>
    @font-face {
        font-family: OpenSans;
        src: url(<?php echo base_url(); ?>assets/OpenSans-Semibold.ttf);
    }

    body {
        margin: 0;
        padding: 0;
        background-color: #213e83;
        height: 100vh;
        font-family: OpenSans;
    }

    @media only screen and (max-width: 726px) {
        body {
            background-color: #213e83;
            color: white;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 60px;
            background-color: white;
            color: black;

        }
    }

    #login .container #login-row #login-column #login-box {
        /* margin-top: 120px; */
        max-width: 600px;
        height: 320px;
        border: 2px solid #EAEAEA;
        border-radius: 5px;
        /* background-color: #EAEAEA; */
    }

    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }

    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }

    @media only screen and (min-width: 726px) {
        .ada {
            /* align-items:center; */
            position: relative;
            /* padding-top:20%;
    padding-bottom:30%; */
            /* width: 100%; */
            /* height: 100%; */
            height: 100vh;
            /* background-size: 100%; */
            /* background-color: brown; */

        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;

        }

        .atas {
            background-color: white;
        }
    }

    .btna {
        border: 2px solid black;
        background-color: white;
        color: black;
        padding: 8px 18px 8px 18px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        /* height:60px */
        width: 105px;

    }

    .biru {
        border-color: #213e83;
        color: #213e83;
    }

    .biru:hover {
        background: #213e83;
        color: white;
    }

    .kanan {
        left: 1px;
    }
</style>

<body>
    <div id="login">
        <!-- <h3 class="text-center text-white pt-5">SELAMAT DATANG</h3> -->
        <div class="container-fluid">
            <div class="row ada">
                <div class="col-md-7 col-xs-11 atas" style="">
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6 col-sm-6">
                                <div id="login-box" class="col-md-12 col-sm-12" style="height:auto;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Sign In</h5>

                                        <?php
                                        $msgHeader = session()->getFlashdata('message_header');
                                        echo "<pre>";
                                        print_r(session()->getFlashdata('message_header'));
                                        echo "</pre>";
                                        if (!empty($msgHeader)) {
                                            $msgTipe = $msgHeader['tipe'];
                                            $msgIcon = "";
                                            switch ($msgTipe) {
                                                case "danger":
                                                    $msgIcon = "fa-ban";
                                                    break;
                                                case "success":
                                                    $msgIcon = "fa-check";
                                                    break;
                                                case "warning":
                                                    $msgIcon = "fa-warning";
                                                    break;
                                                case "info":
                                                    $msgIcon = "fa-info";
                                                    break;
                                            }
                                        ?>
                                            <div class="alert alert-<?= $msgTipe; ?> alert-dismissable" id="message_header">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <h4><?php echo $msgHeader['title']; ?></h4>
                                                <?= $msgHeader['message']; ?>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <div id="alert"></div>
                                        <form id="login-form" class="form" method="post" action="">


                                            <div class="form-group">
                                                <label for="username" class="">Email:</label><br>
                                                <input type="email" style="padding-bottom:10px" name="email" id="email" class="form-control" required>

                                            </div>
                                            <div class="form-group">
                                                <label for="otp" class="">Password</label><br>
                                                <input type="password" name="password" id="password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>  
                                                <input type="submit" name="submit" class="btna biru " value="Masuk">
                                                <!-- <input type="button" class="btna biru " onclick="getOTP()" value="Send OTP" id="btnotp"> -->
                                                <!-- <input type="button" class="btn btn-danger btn-md" onclick="goBack()" value="Kembali"> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-xs-11 " style="background-color: #213e83;margin:auto;">
                    <div style="">
                        <div class="container" style="">
                            <div style="padding-top:40px;padding-bottom:30px;padding-left:30px;color:white;">
                                <h3>Selamat Datang Di Aplikasi MOBKAS</h3>
                                <h3>PT. Topindo Atlas Asia</h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script>
    function goBack() {
        window.history.back();
    }

    var i = 1;
    var boolean = true;

    function getOTP() {
        //console.log(i);
        if (i > 3) {
            $('#alert').empty();
            $('#alert').append('<div class="alert alert-danger" role="alert">Anda Sudah melewati Batas Request OTP ! silahkan Coba lagi Nanti</div>');
            boolean = false;
            $("#btnotp").prop('disabled', true);
        }
        var x = document.getElementById("nomer").value;

        if (boolean) {
            $.ajax({
                url: "<?php echo base_url('/Auth/getOTP') ?>",
                type: "POST",
                // data: { nomer : x, [csrfName]: csrfHash },
                data: $('#login-form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //console.log(data);
                    if (data.valid) {
                        $('#alert').empty();
                        $('#alert').append('<div class="alert alert-success" role="alert">' + data.message + '</div>');
                    } else {
                        $('#alert').empty();
                        $('#alert').append('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    location.reload();
                }


            });

        }
        i++;

    }


    $("#login-form").submit(function(e) {
        e.preventDefault();
        var csrfName = '<?= csrf_token() ?>',
            csrfHash = '<?= csrf_hash() ?>';

        form_data = {
            email: $("#email").val(),
            password: $("#password").val(),
            [csrfName]: csrfHash
        }

        // console.log(form_data);

        $.ajax({
            url: "<?php echo base_url('/Auth/login') ?>",
            data: form_data,
            type: 'post',
            dataType: 'JSON',
            error: function(err) {
                alert('terjadi kesalahan pada sisi server!', 'error');
            },
            success: function(data) {
                //console.log(data);
                if (data.valid) {
                   location.replace('<?= base_url('admin'); ?>');
                } else {
                    $('#alert').empty();
                    $('#alert').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                }
            }
        })

    });
</script>
<!-- END BODY -->

</html>