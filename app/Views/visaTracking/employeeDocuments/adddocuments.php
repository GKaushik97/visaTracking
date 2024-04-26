<form method="post" id="add_employee_documents" onsubmit="return false" enctype="multipart/form-data" class="mt-2">
    <?= csrf_field() ?>
    <input type="hidden" name="employee_id" id="employee_id" value="<?= $employee_id; ?>">
    <div class="card">
        <div class="card-body">
            <div id="employee_document">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="documenttypes" class="form-label mb-0">DocumentTypes&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <select class="form-select form-select-sm" id="document_type_id" name="document_type_id">
                                <option value="">Select</option>
                                <?php foreach($document as $docu): ?>
                                    <option value="<?= $docu['id']; ?>"<?= set_value('document_type_id') == $docu['id'] ? 'selected' : '' ?>><?= $docu['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="text-danger" id="document_type_id_err"><small><?= validation_show_error('document_type_id') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="file" class="form-label mb-0">Files&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input class="form-control form-control-sm" type="file" name="file" value="<?= set_value('file');?>">
                            <div class="form-text">Allowed file types: .pdf,.doc,.docx, Maximum file size: 2MB.</div>
                            <small class="text-danger"><?= validation_show_error('file'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" onclick="insertEmployeeDocument(<?= $employee_id; ?>)"><span class="bi bi-upload"></span>&nbsp;Upload</button>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><span class="bi bi-x-square"></span>&nbsp;Close</button>
    </div> <!-- Close modal-footer -->
    </div>
    
</form>
