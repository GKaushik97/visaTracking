<?php
/**
 * @package Visa Traking
 * District Body View
 */

$keywords = isset($params['keywords']) ? htmlspecialchars($params['keywords']) : '';
$pageno = isset($params['pageno']) ? intval($params['pageno']) : 1;
$sort_by = isset($params['sort_by']) ? htmlspecialchars($params['sort_by']) : 'state_id';
$sort_order = isset($params['sort_order']) && $params['sort_order'] == 'asc' ? 'asc' : 'desc';
$sort_order_alt = $sort_order === 'asc' ? 'desc' : 'asc';
$rows = isset($params['rows']) ? intval($params['rows']) : 50;
$tRecords = isset($params['tRecords']) ? intval($params['tRecords']) : 0;

$total_pages = $rows > 0 ? ceil($tRecords / $rows) : 1;

$offset = ($pageno - 1) * $rows;

?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here...">
            </div>
            <div class="col-auto">
                <select class="form-select form-select-sm" id="state_filter" onchange="districtBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>',)">
                    <option value="">All States</option>
                    <?php foreach ($state as $stateValue): ?>
                        <option value="<?= $stateValue['id']; ?>" <?= (isset($params['state_id']) && $params['state_id'] == $stateValue['id']) ? 'selected' : ''; ?>>
                            <?= $stateValue['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="districtBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetDistrictBody()"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(<?= $tRecords; ?> Records)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <button class="btn btn-success btn-sm" onclick="addDistrict()"><i class="bi bi-plus-square"></i>&nbsp;Add District</button>
            </div>
            <div class="col-auto">
                <select class="form-select form-select-sm" name="rows" id="rows" onchange="districtBody(this.value, '<?= $pageno ?>', '<?= $sort_by ?>', '<?= $sort_order ?>')">
                    <option value="50" <?= $rows == 50 ? 'selected="selected"' : ''; ?>>50 Records</option>
                    <option value="100" <?= $rows == 100 ? 'selected="selected"' : ''; ?>>100 Records</option>
                    <option value="200" <?= $rows == 200 ? 'selected="selected"' : ''; ?>>200 Records</option>
                    <option value="500" <?= $rows == 500 ? 'selected="selected"' : ''; ?>>500 Records</option>
                    <option value="1000" <?= $rows == 1000 ? 'selected="selected"' : ''; ?>>1000 Records</option>
                </select>
            </div>
            <div class="col-auto">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm mb-0">
                        <?php if ($pageno == 1) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-left"></i></a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="districtBody('<?= $rows; ?>','1','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="districtBody('<?= $rows; ?>','<?= $pageno - 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        <?php } ?>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link p-0 text-white inv-tracking-select">
                                <select class="form-select form-select-sm" name="rows" onchange="districtBody('<?= $rows; ?>', this.value, '<?= $sort_by; ?>', '<?= $sort_order; ?>')">
                                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                        <option value="<?= $i; ?>" <?= $i == $pageno ? 'selected="selected"' : ''; ?>><?= $i . '/' . $total_pages; ?></option>
                                    <?php } ?>
                                </select>
                            </span>
                        </li>
                        <?php if ($pageno == $total_pages) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-right"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="districtBody('<?= $rows; ?>','<?= $pageno + 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="districtBody('<?= $rows; ?>','<?= $total_pages; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-right"></i></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive mt-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th>
                    <a href="javascript:void(0)" onclick="districtBody('<?= $rows; ?>','<?= $pageno; ?>','name','<?= $sort_order_alt; ?>')">District
                        <?php if($sort_by =='name') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="districtBody('<?= $rows; ?>','<?= $pageno; ?>','state_id','<?= $sort_order_alt; ?>')">States
                        <?php if($sort_by =='state_id') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th width="15%">Actions</th>
            </tr>            
        </thead>
        <tbody>
            <?php
                $i =($pageno - 1) * $rows + 1;
                foreach ($district as $districtValue) :
            ?>
            <tr>
                <td class="text-center"><?= $i++; ?></td>
                <td><?= $districtValue['name']; ?></td>
                <td>
                    <?php
                        foreach ($state as $stateValue) {
                            if ($stateValue['id'] == $districtValue['state_id']) {
                                echo $stateValue['name'];
                                break;
                            }
                        }
                    ?>
                </td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="editDistrict(<?= $districtValue['id']; ?>)"><i class="bi bi-pencil-square"></i> Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteDistrict(<?= $districtValue['id']; ?>)"><i class="bi bi-trash"></i> Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($district)): ?>
                <tr>
                    <td colspan="4"><div class="alert alert-warning"><i class="bi bi-info-circle"></i>&nbsp;No Records Found.</div></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>