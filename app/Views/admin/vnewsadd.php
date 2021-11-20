


<?php //dd($user);

use App\Libraries\Imageloader;

$Imageloader = new Imageloader();

    ?>

    <?= $this->extend('tempadmin'); ?>

    <?= $this->section('content'); ?>
    


   

    <script type="text/javascript">
	var availableTags;
	
	$(function () {
		$('#demo3').tagit({tagSource:availableTags, triggerKeys:['enter', 'comma', 'tab']});

		$('#demo3GetTags').click(function () {
			showTags()
		});
		
		
	});
	
	function fSubmit(){
		with (document.formDetail){
			//nicEditors.findEditor('area1').saveContent();
			objTags = $('#demo3').tagit('tags');
			string = "";
			for (var i in objTags){
				string += objTags[i].label + ";";
			}
			$('#tagit').val(string);
			submit();
		}
	}


</script>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <button class="btn btn-warning" onclick="goBack()">back</button>

                    </div>
                    <div class="card-header">


                        <form class="form" id="formuser" method="post" enctype="multipart/form-data" action="<?= base_url('news/save_add'); ?>">
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
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">News Type</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="status" name="news_type">

                                            <?php
                                            $arrdata = [
                                                'News' => 'News',
                                                'Blog' => 'Blog'
                                            ];

                                            $selected="";

                                            foreach ($arrdata as $key => $item) {
                                                if (isset($data)){
                                                    $selected=($data->news_level==$key) ? 'selected' :'';
                                                }
                                                ?>
                                            <option value="<?=$key?>" <?=$selected?>><?=$item?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">News category</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="news_category" name="news_category">

                                           <?php
                                            $selected="";
                                           
                                            foreach ($newscategory as $category ){
                                          
                                                if (isset($data)){
                                                    $selected=($data->news_category_id == $category->category_id) ? 'selected' :'';
                                                }
                                            ?>
                                            <option value="<?=$category->category_id?>" <?=$selected?>>
                                                <?=$category->category?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">News Level</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="status" name="news_level">

                                            <?php
                                            $arrdata = [
                                                '0' => 'OFF',
                                                '1' => '1',
                                                '2' => '2'
                                            ];

                                            $selected="";

                                            foreach ($arrdata as $key => $item) {
                                                if (isset($data)){
                                                    $selected=($data->news_level==$key) ? 'selected' :'';
                                                }
                                                ?>
                                            <option value=<?=$key?> <?=$selected?>><?=$item?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
        

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">News Title</label>
                                <div class="col-sm-6">
                                    <input type="text" name="repassword" class="form-control" id="NewsTitle" required value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                    <div class="col-sm-2">

                                    </div>
                                    <div class="col-sm-8">
                                        <img src="<?=$Imageloader->fCheckImage("")?>"
                                            alt="..." class="img-thumbnail fa fa-user" style="height:200px;"
                                            id="imgItem">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Images</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="image" class="form-control" id="images">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">News Tag</label>
                                    <div class="col-sm-6">
                                        <ul id="demo3">
                                           <?php
                                                foreach ($tag as $key => $value) { ?>
                                                   <li><?=$value->Tag_name?></li>
                                               <?php }
                                           ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">News Synopsys</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="synopsys"
                                            rows="3"><?= isset($data) ? $data->news_synopsys:''?></textarea>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Meta Title</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="meta_title" class="form-control"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Meta Description</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="news_metadescription"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">News Content</label>
                                    <div class="col-sm-8">
                                        <textarea class="mceEditor" name="news_content"
                                            rows="3" id="ckeditor"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">News Status</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="status" name="status">
                                            <?php
                                            $arrdata = [
                                                '1' => 'Publish',
                                                '0' => 'Draft'
                                            ];

                                            $selected="";

                                            foreach ($arrdata as $key => $item) {
                                                if (isset($data)){
                                                    $selected=($data->is_active==$key) ? 'selected' :'';
                                                }
                                                ?>
                                            <option value="<?=$key?>" <?=$selected?>><?=$item?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Publish Date</label>
                                    <div class="col-sm-3">
                                    <input type="date" name="publish_date" class="form-control"
                                            value="}">
                                    </div>
                                </div>


                            <div class="form-group">

                            <input class="btn btn-md btn-primary" type="button" name="savenews" value="Save"   style="color:black;" onClick="fSubmit();"/>
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
    <script src="<?= base_url('/assets/ckeditor4/MyCkeditor.js') ?>"></script>
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