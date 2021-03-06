    <?php

    use App\Libraries\Treeviewdata;

    $treeviewdata = new Treeviewdata();

      //dd($treeviewdata->fShowModuleTree($lstModule, "collapsed", "fClickTree", $arrAkses))

    ?>

    <?= $this->extend('tempadmin'); ?>

    <?= $this->section('content'); ?>



    <style>
        .dataTables_filter {
            display: none
        }

        #contoj_length {
            margin-top: 15px !important
        }

   

        .dataTables_filter {
            display: none
        }

        #contoj_length {
            margin-top: 15px !important
        }
    </style>

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
                "serverSide": true,
                "processing": true,
                "search": false,
                "ajax": {
                    url: "<?= base_url("listgroupdata") ?>",
                    type: "GET"
                }
            });


            $("#checkall").click(function() {
                $("#example-0").find(":checkbox").attr("checked", this.checked);
            });

            $('#example-0').tree({
                lazyLoading: true,
                onCheck: {
                    node: 'expand'
                },
                onUncheck: {
                    node: 'collapse'
                }
            });
        });
    </script>


    <!-- Main content -->
    <section class="content">

        <?php error_reporting(0) ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php if ($groupid != "") { ?>
                            <h3 class="box-title">Edit Group</h3>
                        <?php } else { ?>
                            <?php   ?>
                            <h3 class="box-title">Add Group</h3>
                        <?php } ?>

                    </div>
                    <form role="form" method="post" action="<?= base_url('creategroup'); ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <?php if ($GroupId != "") { ?>
                                <input type="hidden" id="txtGroupId" name="txtGroupId" value="<?php echo $GroupId; ?>">
                            <?php } ?>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1">Group Name</label>
                                    <input type="text" class="form-control" placeholder="group name" name="txtGroupName" value="<?php echo $name; ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Nama Module</label><br>

                                    &nbsp;&nbsp;<input type='checkbox' id='checkall' value="<?php echo $moduleid; ?>">&nbsp;<b style="color:#dd4b39;">&nbsp;&nbsp;Select All</b>
                                    <div id="example-0">
                                        <?php $treeviewdata->fShowModuleTree($lstModule, "collapsed", "fClickTree", $arrAkses); ?>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <table class="data display datatable table-striped table-bordered" id="contoj" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Group Name</th>
                                                    <th nowrap width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7" class="dataTables_empty">Loading data from server</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card-footer">
                            <input class="btn btn-success btn-flat" type="submit" name="btnSave" value="Save" />
                            <a class="btn btn-danger btn-flat" href="<?php echo base_url('admin/module'); ?>">Cancel</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?= $this->endsection('content'); ?>


    <script type="text/javascript">
        var contoj;
        var n;
        var v;
        $(function() {
            contoj = $('#contoj').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "sDom": '<"top"i>rt<"bottom"flp><"clear">',
                "sAjaxSource": "<?= base_url('listgroup') ?>",
                "bAutoWidth": true,
                "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                    $('td', nRow).attr('nowrap', 'nowrap');
                    return nRow;

                },
                "fnServerData": function(sSource, aoData, fnCallback, oSettings) {

                    aoData.push({
                        "name": n,
                        "value": v
                    });

                    oSettings.jqXHR = $.ajax({
                        "dataType": 'json',
                        "type": "POST",
                        "url": sSource,
                        "data": aoData,
                        "success": fnCallback
                    });
                }
            });
        });
    </script>