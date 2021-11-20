<?= $this->extend('tempadmin'); ?>
<?= $this->section('content'); ?>

<script type="text/javascript">
    $(document).ready(function() {



        $('.hapus').on('click', function(e) {
            // alert('sfsg');
            e.preventDefault();
            if (confirm('Yakin Hapus Data Tersebut " ' + $(this).attr('data') + ' " ?')) {
                window.location = $(this).attr('href');

            } else {
                return false;
            }
        });



        var table = $('#contoj').DataTable({
            "serverSide": false,
            "processing": false,
            "search": false
        });


        $("#checkall").click(function() {
            $("#example-0").find(":checkbox").attr("checked", this.checked);
        });

    });
</script>
<div class="contenr">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">


                            <?= form_open('news/category'); ?>

                            <label class="box-title">Add Category</label>
                            <input type="category" class="form-control" placeholder="Category" name="category" value="" required>

                            <input type="submit" class="btn btn-primary mt-2"></input>

                            <?= form_close(); ?>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <table class="data display datatable table-striped table-bordered" id="contoj" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>CreatedBy</th>
                                            <th>CreatedDate</th>
                                            <th nowrap width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            foreach ($category as $key => $value) {

                                                echo "<tr>
                                                            <td>$value->category</td>";
                                                echo "<td>$value->created_by</td>";
                                                echo "<td>$value->updated_at</td><td>        <a href=" . base_url('updateuser?id=' . $value->category_id) . " class=''><button class='btn btn-primary btn-xs'>Edit</button></a>
                                                            <a href=" . base_url('updateuser?id=' . $value->category_id) . " class=''><button class='btn btn-danger btn-xs'>delete</button></a>
                                                            
                                                            </td>
                                                    
                                                            </tr>
                                                            ";
                                            }

                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection(); ?>