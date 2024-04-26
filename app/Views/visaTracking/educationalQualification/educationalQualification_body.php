<?php
/**
 * educationQualification_body
 * Table List
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
$rows = isset($params['rows']) ? $params['rows'] : '';
?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here...">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-success"  name="search" id="search" onclick="educationalQualificationBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetEducationalQualificationBody()"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(<?= $tRecords; ?> Records)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <button class="btn btn-success btn-sm" onclick="addQualification()"><i class="bi bi-plus-square"></i>&nbsp;Add Qualification</button>
    </div>
</div>
<div class="table-responsive mt-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>            
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($educationalQualifications as $educationalQualification) :
        ?>
        <tr>
            <td class="text-center"><?= $i++; ?></td>
            <td><?= $educationalQualification['name']; ?></td>
            <td>
                <button class="btn btn-sm btn-primary" onclick="editQualification(<?= $educationalQualification['id']; ?>)"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteQualification(<?= $educationalQualification['id']; ?>)"><i class="bi bi-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($educationalQualifications)){?>
            <tr>
                <td colspan="4" class="bg bg-warning">No Records Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
