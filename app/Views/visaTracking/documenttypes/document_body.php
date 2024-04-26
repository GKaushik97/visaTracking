<?php

$keywords = isset($params['keywords']) ? $params['keywords'] : '';

?>
<div class="clearfix">
	<div class="float-start">
		<div class="row gx-1 align-items-center">
			<div class="col-auto">
				<input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here">
			</div>
			<div class="col-auto">
				<button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="documentBody()"><i class="bi bi-search"></i></button>
			</div>
			<div class="col-auto">
				<button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetdocumentBody()"><i class="bi bi-arrow-clockwise"></i></button>
			</div>
			<div class="col-auto">
				<strong>(Records: <?= $total_records; ?>)</strong>
			</div>
		</div>
	</div>
	<div class="float-end">
		<button type="button" href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addDocument()"><i class="bi bi-plus-square"></i>&nbsp;Add Document</button>
	</div>
</div>


	<table class="table table-bordered mt-2">
		<thead>
			<tr>
				<th width="1%" class="text-center">S.No</th>
				<th>Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			   $i = 1;
			   if (isset($document) and !empty($document)) {
			    	
			   foreach ($document as $docu){ ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $docu['name']; ?></td>
					<td>
						<button type="button" class="btn btn-sm btn-primary" onclick="editDocument(<?= $docu['id']; ?>)"><i class="bi bi-pencil-square"></i></button>
						<button type="button" class="btn btn-sm btn-danger" onclick="deleteDocument(<?= $docu['id']; ?>)"><i class="bi bi-trash"></i></button>
					</td>
				</tr>
			<?php } 
			    }
			    else { 
			?>
			<tr>
				<td colspan="5">
					<div class="alert alert-warning"> No Records found</div>
				</td>
			</tr>
		<? }?>
		</tbody>
	</table>

