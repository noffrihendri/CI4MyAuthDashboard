    <?= $this->extend('tempadmin'); ?>

    <?= $this->section('content'); ?>

    <!-- Main content -->
    <section class="content">

        <form class="form" id="formuser" method="post" enctype="multipart/form-data" action="<?= base_url(); ?>/admin/testupload">
            <?= csrf_field(); ?>
      
         

            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">image</label>
                <div class="col-sm-6">
                    <input type="file" name="image" class="form-control" >
                </div>
            </div>


            <div class="form-group">

                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                <button type="reset" class="btn btn-md btn-danger">Cancel</button>
            </div>


        </form>
    </section>

    <?= $this->endsection('content'); ?>