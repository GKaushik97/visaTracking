<?

$id_val = isset($docu['id']) ? $docu['id'] : (isset($_POST['id']) ? $_POST['id'] : '');

$name_val = isset($docu['name']) ? $docu['name'] : set_value('name');
?>

<div class="modal-dialog">
	<div class="modal-content">
		<form method="post" id="editDocumentForm" onsubmit="return false">
			<input type="hidden" name="id" value="<?= $id_val; ?>">
			<div class="modal-header">
				<h5 class="modal-title fs-5">Edit Document</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<label class="col-sm-3 col-form-label text-end" for="name">Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= $name_val; ?>">
						<span class="text-danger"><small><?= validation_show_error('name'); ?></small></span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" onclick="updateDocument()" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
				<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
				</div>
	    </form>
    </div>
</div> 