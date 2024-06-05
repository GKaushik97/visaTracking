<?
/**
 * Add state Form
 **/
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="excel_upload" onsubmit="return false" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title fs-5">Upload using Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="name" class="col-sm-3 col-form-label text-end">Upload&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="file" class="form-control form-control-sm" name="excel_file" id="excel_file">
                        <span class="text-danger"><small><?= validation_show_error('excel_file') ?></small></span>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="uploadExcel()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Upload</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
