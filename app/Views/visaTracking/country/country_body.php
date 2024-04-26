<?php
/**
 * Country_body
 * Table List
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = ($params['sort_by']);
$sort_order_alt = ($params['sort_order'] == 'asc') ? 'desc' : 'asc';
$sort_order = ($params['sort_order'] == 'asc') ? 'asc' : 'desc';
$rows = $params['rows'];
?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-success"  name="search" id="search" onclick="countryBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetCountryBody()"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(<?= $tRecords; ?> Records)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <button class="btn btn-success btn-sm" onclick="addCountry()"><i class="bi bi-plus-square"></i>&nbsp;Add Country</button>
    </div>
</div>
<table class="table table-bordered mt-2">
    <thead>
        <tr>
            <th width="1%" class="text-center">S.No.</th>
            <th>
                <a href="javascript:void(0)" onclick="countryBody('<?= $rows; ?>', '<?= $pageno; ?>', 'name', '<?= $sort_order_alt; ?>')">Country
                        <? if($sort_by == 'name') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
            </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach($countries as $country) :
        ?>
        <tr>
            <td class="text-center"><?= $i++; ?></td>
            <td><?= $country['name']; ?></td>
            <td>
                <button class="btn btn-sm btn-primary" onclick="editCountry(<?= $country['id']; ?>)"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteCountry(<?= $country['id']; ?>)"><i class="bi bi-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($countries)){?>
            <tr>
                <td colspan="4" class="bg bg-warning">No Such Records Found</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
