
<?= $this->extend('tempadmin'); ?>

<?= $this->section('content'); ?>

<script>
    $(document).ready(function() {

        var table = $('.datatable').DataTable({
            "serverSide": true,
            "processing": true,
            language: {
                searchPlaceholder: "Search By Username"
            },
            "ajax": {
                url: "<?= base_url("news/listdata") ?>",
                type: "GET"
            }
        });

    });
</script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List News</h3>
                </div>

                <div class="card-header">
                    <a type="button" href="<?= base_url('news/add'); ?>" class="btn btn-primary">add News</a>


                </div>

                <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="box-body">



                    </div>



                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Tipe</th>
                                    <th>Is_active</th>
                                    <th>Created Date</th>


                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>




                            </tbody>

                        </table>
                    </div>







                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</section>
<?= $this->endsection(); ?>