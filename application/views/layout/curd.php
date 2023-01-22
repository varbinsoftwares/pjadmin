<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<!-- ================== BEGIN PAGE CSS STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<link href="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>

<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->

    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo $title; ?> <small><?php $description; ?></small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">

        <div class="panel-body">

            <div class="m-b-15">
                <button type="button" class="btn btn-primary p-l-40 p-r-40" data-toggle="modal" data-target="#add_item"><i class="fa fa-plus"></i> Add New</button>
            </div>
            <div class="table-responsive">
                <table id="user" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <?php
                            foreach ($fields as $fkey => $fvalue) {
                                ?> 
                                <th style='width: <?php echo $fvalue['width']; ?>'><?php echo $fvalue['title']; ?></th>
                                <?php
                            }
                            ?>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_data as $key => $vdata) {
                            ?>  
                            <tr>
                                <?php
                                foreach ($fields as $fkey => $fvalue) {
                                    ?> 

                                    <td>
                                        <?php
                                        if ($fkey == 'id') {
                                            ?>
                                            <?php echo $vdata[$fkey]; ?>

                                            <?php
                                        } else {
                                            ?>
                                            <span  id="<?php echo $fkey; ?>" data-type="textarea" data-pk="<?php echo $vdata['id']; ?>" data-name="<?php echo $fkey; ?>" data-value="<?php echo $vdata[$fkey]; ?>" data-params ={'tablename':'<?php echo $table_name; ?>'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" > <?php echo $vdata[$fkey]; ?></span>

                                        </td>
                                        <?php
                                    }
                                }
                                ?>
                                <td>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end #content -->

<!-- Modal -->
<div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="changePassword">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $form_title; ?></h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach ($form_attr as $fkey => $fvalue) {
                        ?>
                        <div class="form-group">
                            <?php
                            switch ($fvalue['type']) {
                                case "hidden":
                                    ?>
                                    <input type="<?php echo $fvalue['type']; ?>" name="<?php echo $fkey; ?>" class="form-control"  required="<?php echo $fvalue['required']; ?>" placeholder="<?php echo $fvalue['place_holder']; ?>">
                                    <?php
                                    break;
                                case "blue":
                                    echo "Your favorite color is blue!";
                                    break;
                                case "textarea":
                                    ?>
                                    <label for="<?php echo $fkey; ?>"><?php echo $fvalue['title']; ?></label>
                                    <textarea name="<?php echo $fkey; ?>" class="form-control"  required="<?php echo $fvalue['required']; ?>" placeholder="<?php echo $fvalue['place_holder']; ?>"></textarea>

                                    <?php
                                    break;
                                default:
                                    ?>
                                    <label for="<?php echo $fkey; ?>"><?php echo $fvalue['title']; ?></label>
                                    <input type="<?php echo $fvalue['type']; ?>" name="<?php echo $fkey; ?>" class="form-control"  required="<?php echo $fvalue['required']; ?>" placeholder="<?php echo $fvalue['place_holder']; ?>">

                                <?php
                            }
                            ?>

                       </div>
                        <?php
                    }
                    ?>



                </div>


                <div class="modal-footer">
                    <button type="submit" name="submitData" class="btn btn-primary">Submit</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
$this->load->view('layout/footer');
?>
<script>
    $(function () {


        $('#tags').tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        });


        $('.edit_detail').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            $($(this).prev()).editable('toggle');
        });

        $(".editable").editable();




                })
</script>