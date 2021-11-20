    <?php //dd($user);
    ?>

    <?= $this->extend('tempadmin'); ?>

    <?= $this->section('content'); ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <button class="btn btn-warning" onclick="goBack()">back</button>

                    </div>
                    <div class="card-header">


                        <form class="form" id="formuser" method="post" enctype="multipart/form-data" action="<?= base_url('createuser'); ?>">
                            <?= csrf_field(); ?>

                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h4>Periksa Entrian Form</h4>
                                    </hr />
                                    <?php echo session()->getFlashdata('error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <input type="text" hidden name="id" value="<?php echo isset($user) ? $user['id'] : '' ?>" id="id">

                            <div class="col-sm-8">
                                <div class="alert"></div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">username</label>
                                <div class="col-sm-6">
                                    <input type="username" name="username" class="form-control" id="username" required value="<?php echo isset($user) ? $user['username'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">email</label>
                                <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control" id="email" required value="<?php echo isset($user) ? $user['email'] : '' ?>">
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" class="form-control" id="Password" required value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Repassword</label>
                                <div class="col-sm-6">
                                    <input type="password" name="repassword" class="form-control" id="Repassword" required value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Group</label>
                                <div class="col-sm-6">
                                    <select id="group" class="form-control" name="group" required>
                                        <option>Choose...</option>

                                        <?php
                                        foreach ($role as $role) {
                                            $selected = "";
                                            if (isset($user)) {
                                                if (User()->getRoles()[1] == $role['name']) {
                                                    $selected = "selected";
                                                }
                                            }

                                        ?>
                                            <option value="<?php echo $role['name'] ?>" <?= $selected ?>><?php echo $role['name']    ?></option>
                                        <?php     }
                                        ?>



                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" name="is_active">
                                    <label class="custom-control-label" for="customSwitch3">is active</label>
                                </div>
                            </div>


                            <div class="form-group">

                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                            </div>


                        </form>


                    </div>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <script>
        function goBack() {
        window.history.back();
        }
        // $("#formuser").submit(function(e) {
        //     e.preventDefault();

        //     ///crf token
        //     var csrfName = '<?= csrf_token() ?>',
        //         csrfHash = '<?= csrf_hash() ?>';

        //     form_data = {
        //         id: $("#id").val(),
        //         username: $("#username").val(),
        //         email: $("#email").val(),
        //         nomer: $("#Phonenumber").val(),
        //         nomer: $("#Password").val(),
        //         nomer: $("#Repassword").val(),
        //         role: $("#role").val(),
        //         isactive: $('#customSwitch3').is(":checked"),
        //         [csrfName]: csrfHash
        //     }

        //     console.log(form_data);

        //     $.ajax({
        //         url: "<?= base_url(); ?>/Home/adduser",
        //         data: form_data,
        //         type: 'post',
        //         dataType: 'JSON',
        //         headers: {
        //             'api-key': 'myKey'
        //         },
        //         error: function(err) {
        //             alert('terjadi kesalahan pada sisi server!', 'error');
        //         },
        //         success: function(data) {
        //             if (data.valid) {
        //                 $('.alert').html('<div class="alert alert-success" role="alert">' + data.msg + '</div>');
        //                 document.getElementById("formuser").reset();
        //             } else {
        //                 $('.alert').html('<div class="alert alert-danger" role="alert">' + data.msg + '</div>');
        //             }
        //         }
        //     })

        // });
    </script>


    <?= $this->endsection(); ?>