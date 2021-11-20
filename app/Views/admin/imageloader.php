<link href="<?= base_url('/assets/bootstrap/css/bootstrap.min.css') ?> " rel="stylesheet" type="text/css" />
<script src="<?= base_url('/assets/jquery/jquery-3.5.1.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/jquery/jqueryform/jquery.form.min.js') ?>"></script>

<script src="<?= base_url('/assets/js/ajaxupload.js') ?>"></script>
<script src="<?= base_url('/assets/js/ajaxpost.js') ?>"></script>

<script>
    $(document).ready(function(){
	
	$('body').on('click','.imgselect',function(){
		parent.tinymce.activeEditor.windowManager.getParams().oninsert({url:$(this).attr('src'),info:$(this).attr('imgname') });
		// close popup window
		parent.tinymce.activeEditor.windowManager.close();
	});
	$('body').on('click','.imgremove',function(){
		var data = {path :$(this).attr('img')};
		var form = $('#formglobal');
		var url = '{{ url ('') }} admin/<?php  echo $controler; ?>/removeImageContent';

        // console.log(data);
        // console.log(form);
		 postData(data,url,form,function(is_json, data){
			 if(data.valid){
                 console.log('test disini');
				 location.reload();
			 }
		 },true,true );
	});
	
	$('#imgb').change(function(){
	var randomid = Math.floor((Math.random() * 9000) + 1000); 
	$('#imgrow').append('<div class="col-xs-6 imgitem" >'+
						'<div>'+
						'<i  id="imgremove'+randomid+'" class="imgremove glyphicon glyphicon-remove pull-right premove" style=""></i>'+
						'<div class="imgframe">'+
						'<img id="'+randomid+'" class="imgselect" height="100%" imgname="gambarbaru" src=""/>'+
						'</div>'+
						'<div style="display: block; background-color: white; width: 100%; height: 33px;">'+
						'<span id="'+randomid+'-name">upload image ...</span>'+
						'</div>'+
						'</div>' );		
                       // console.log('disini');	
			uploadImage( $('#formimg'), [] ,function(){}, function(data){

               // console.log(data);
				if(data.valid){
					$('body').find('#'+randomid).attr('src',data.path);
					var name =   data.filename; 
					name.replace('<?php echo $dropkey; ?>','');
					if(name.length > 20){
						var t = name.length-20;
						name = name.substr(0, name.length-10-t)+'...'+name.substr(name.length-8, name.length);
					}
					$('body').find('#'+randomid+'-name').html(name);
					$('body').find('#imgremove'+randomid).attr('img',data.shortpath);
				}
			},false);
			
		});
})	


</script>
<style>
    .imgremove {
        cursor: pointer
    }

    body {

        background-color: #eaeaea;
        padding: 0px 15px;
    }

    #imgrow .imgitem {
        padding: 3px;
        margin-bottom: 10px
    }

    #imgrow .imgitem>div {

        background-color: white;
        border: 1px solid #c5c0c0;
        padding: 5px
    }

    #imgrow .imgitem>div .imgframe {
        text-align: center;
        height: 120px;
        width: 100%;
        overflow: hidden;
        margin: auto;
        position: relative;
        cursor: pointer
    }

    .premove {
        color: rgb(255, 0, 0);
        position: absolute;
        top: -2px;
        right: -2px;
        background-color: white;
        z-index: 10;
        padding: 3px;
        border: 1px solid #a7a7a7;
        border-radius: 10px;
    }
</style>

<body>

    <form style="display:none" method="post" action="" id="formglobal"></form>
    <br>
    <div class="container">
        <div class="row" id="imgrow" style="margin-bottom:55px">
            <?php 
			
				foreach($imgdb as $value){
			?>
            <div class="col-xs-6 imgitem">
                <div> <i img="<?php echo $value['path']; ?>"
                        class="imgremove glyphicon glyphicon-remove pull-right premove"></i>

                    <div class="imgframe" style="">
                        <img class="imgselect" height="100%" imgname="<?php echo $value['name']; ?>"
                            src="<?php echo $value['fullpath']; ?>" />
                    </div>
                    <div style="display: block; background-color: white; width: 100%; height: 33px;">
                        <span id="imgname"><?php echo $value['name']; ?></span>
                    </div>
                </div>
            </div>

            <?php }	?>

            <?php 
			
				foreach($imgupload as $value){
			?>
            <div class="col-xs-6 imgitem">
                <div> <i img="<?php echo $value['path']; ?>"
                        class="imgremove glyphicon glyphicon-remove pull-right premove" style=""></i>

                    <div class="imgframe" style="">
                        <img class="imgselect" height="100%" imgname="<?php echo $value['name']; ?>"
                            src="<?php echo $value['fullpath']; ?>" />
                    </div>
                    <div style="display: block; background-color: white; width: 100%; height: 33px;">
                        <span id="imgname"><?php echo $value['name']; ?></span>
                    </div>
                </div>
            </div>

            <?php }	?>

        </div>
        <div class="row"
            style="bottom:0px;position: fixed; left:0px; right:0px;  background-color: white; padding: 15px; border: 1px solid rgb(209, 206, 206);">
            <form style="margin-bottom:0px" class="form-horizontal" method="post" enctype="multipart/form-data"
                action="{{url('news/uploadimage')}}" id="formimg">
                @csrf
                <input type="hidden" name="uploadkey" value="<?php echo $dropkey;?>" />
                <input type="hidden" name="uploadtype" value="imagecontent" />
                <div style="margin-bottom:0px" class="form-group">
                    <div class="col-xs-10 pull-right">
                        <input id="imgb" type="file" name="image">
                    </div>
                    <label style="padding: 2px 17px;"
                        class="col-xs-5 control-label nobold font16 text-right pull-right">Upload Image</label>
                </div>
            </form>
        </div>
    </div>
    </div>


</body>