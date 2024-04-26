+<?php

$keywords = isset($params['keywords']) ? $params['keywords'] : '';

?>
<div class="clearfix">
	<div class="float-start">
		<div class="row gx-1 align-items-center">
			<div class="col-auto">
				<input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here">
			</div>
			<div class="col-auto">
				<button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="employeedocumentBody()"><i class="bi bi-search"></i></button>
			</div>
			<div class="col-auto">
				<button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetemployeedocumentBody()"><i class="bi bi-arrow-clockwise"></i></button>
			</div>
			<div class="col-auto">
				<strong>(Records: <?= $total_records; ?>)</strong>
			</div>
		</div>
	</div>
	
</div>


	<table class="table table-bordered mt-2">
		<thead>
			<tr>
				<th width="1%" class="text-center">S.No.</th>
				<th>Document types</th>
				<th>File</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<button type="button" onclick="viewDocuments(4)">view</button>
		</tbody>
	</table>

