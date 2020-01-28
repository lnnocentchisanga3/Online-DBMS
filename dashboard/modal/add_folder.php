<div class="modal modal-centered fade " id="add_folder" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">



                <h2 class="modal-title text-left" style="font-weight:bolder;color:green" id="modalLabel"> Create New Folder <i class="ti-folder-plus    "></i></h2>
                <h5 class="close " style="font-weight:bolder;color:green" type="button" data-dismiss="modal">
                 X
                </h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="index.php">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <h4 class="text-left" style="font-weight:bold;color:green">Folder Name *</h4>
                            <input type="text" placeholder="folder_name" required name="name" minlength="4" maxlength="15" class="form-control">
                        </div>


                        <div class="col-md-6 form-group"></div>
                        <div class="col-lg-12 form-group mg-t-8">
                            <button type="submit" name="addfolder" class="btn-fill-lg btn btn-primary btn-block btn-gradient-yellow btn-hover-bluedark">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>