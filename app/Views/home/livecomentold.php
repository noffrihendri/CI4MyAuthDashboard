<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/bootstrap-agency/assets/img/favicon.ico') ?> " />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('assets/bootstrap-agency/css/styles.css') ?> " rel="stylesheet" />
</head>

<style>
    nav {
        background-color: #212529;
    }


    .sidenav {
        height: 100%;
        width: 30%;
        position: fixed;
        z-index: 1;
        top: 0;
        right: 0;
        background-color: darkgray;
        overflow-x: hidden;
        padding-top: 20px;
    }
</style>

<body id="page-top">
    <!-- Navigation-->
    <?= $this->include('home/_navbar'); ?>



    <!-- About-->
    <section class="page-section" id="">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Live Streaming</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>



            <iframe src="https://www.youtube.com/embed/live_stream?channel=XYZ123" width="100%" height="720" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

            <div class="sidenav">

            </div>

            <form method="POST" id="comment_form">
                <?= csrf_field() ?>
                <div class="form-group">
                    <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" value="<?= user()->username ?>" readonly />
                </div>
                <div class="form-group">
                    <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="comment_id" id="comment_id" value="0" />
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                </div>
            </form>
            <span id="comment_message"></span>
            <br />
            <div id="display_comment"></div>

        </div>
    </section>



    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a class="mr-3" href="#!">Privacy Policy</a>
                    <a href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="<?= base_url('assets/bootstrap-agency/assets/mail/jqBootstrapValidation.js') ?> "></script>
    <script src="<?= base_url('assets/bootstrap-agency/assets/mail/contact_me.js') ?> "></script>
    <!-- Core theme JS-->
    <script src="<?= base_url('assets/bootstrap-agency/js/scripts.js') ?> "></script>
</body>

</html>

<script>
    let loaddata;
    $(function() {



        loaddata = () => {
            console.log("load");
            $.ajax({
                url: "<?= base_url('listcomment') ?>",
                method: "GET",
                dataType: 'JSON',
                success: function(data) {
                    //  $('#display_comment').html(data);
                    console.log(data);
                    let html = '';
                    $.each(data.data, function(key, value) {
                        // console.log(value);
                        html += '<div class="card"><div class="card-header">By <b>' + value.comment_seeder_name + ' </b> on <i>' + value.created_at + '</i></div><div class="card-body">' + value.comment + '</div><div class="card-footer" align="right"><button type="button" onclick="test(this)" class="btn btn-default reply" id="' + value.comment_id + '">Reply</button></div> </div><br>';


                        if (value.Child.length > 0) {
                            $.each(value.Child, function(key, value2) {
                                html += '<div class="card" style="margin-left:60px;"><div class="card-header">By <b>' + value2.comment_seeder_name + ' </b> on <i>' + value2.created_at + '</i></div><div class="card-body">' + value2.comment + '</div><div class="card-footer" align="right"></div> </div><br>';



                            });

                        }
                    });
                    $('#display_comment').html(html);


                }
            })
        }

        loaddata();


        $('#comment_form').on('submit', function(event) {
            event.preventDefault();
            let form_data = $(this).serialize();

            //  console.log(form_data);
            let proses = true;

            let name = $('#comment_name').val();
            if (name == '') {
                alert('nama tidak boleh kosong');

                proses = false;
            }

            let content = $('#comment_content').val();
            if (content == '' && proses) {
                alert('content tidak boleh kosong');
                proses = false;
            }

            if (proses) {
                $.ajax({
                    url: "<?= base_url('createcommet') ?>",
                    method: "POST",
                    data: form_data,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.error != '') {
                            $('#comment_form')[0].reset();
                            $('#comment_message').html(data.error);
                            $('#comment_id').val('0');
                            loaddata();

                            $('html, body').animate({
                                scrollTop: $(".footer").offset().top
                            }, 1000);
                        }
                    }
                })

            }
        });





    });
    setInterval(function() {
        console.log('timer');
        loaddata();
    }, 3000);




    function test(id) {
        var comment_id = $(id).attr("id");
        // console.log(comment_id);
        $('#comment_id').val(comment_id);
        $('#comment_name').focus();
    }
</script>