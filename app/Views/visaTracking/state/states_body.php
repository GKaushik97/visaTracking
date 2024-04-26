<?php
/**
 * @package Visa Traking
 * State Body View
 */

$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$page_no = isset($params['page_no']) ? $params['page_no'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : 'country_id';
$sort_order = isset($params['sort_order']) ? ($params['sort_order'] == 'asc' ? 'asc' : 'desc') : 'desc';
$sort_order_alt = $sort_order === 'asc' ? 'desc' : 'asc';
$rows = isset($params['rows']) ? $params['rows'] : 10;
$total_states = isset($params['total_states']) ? intval($params['total_states']) : 0;



$country_filter = isset($params['country_id']) ? $params['country_id'] : 0;

// Calculating the total pages
$total_pages = $rows > 0 ?ceil($total_states / $rows) : 1;

// Calculate the offset 
$offset = (intval($page_no) - 1) * $rows;



?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here">
            </div>
            <div class="col-auto">
                <select class="form-select form-select-sm" id="country_filter" onchange="stateBody('<?= $rows; ?>','<?= $page_no;?>','<?= $sort_by;?>','<?= $sort_order;?> ')">
                    <option value="">All Countries</option>
                    <?php foreach ($countries as $country): ?>
                        <option value="<?= $country['id']; ?>" <?= (isset($params['country_id']) && $params['country_id'] == $country['id']) ? 'selected' : ''; ?>>
                            <?= $country['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>            
            <div class="col-auto">                
                <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="stateBody('<?= $params['rows'] ?? '';?>','<?= $params['page_no'] ?? '';?>','<?= $params['sort_by'] ?? ''; ?>', '<?= $params['sort_order'] ?? ''; ?>')"><i class="bi bi-search"></i></button>
            </div>           
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning"  name="search" id="reset" onclick="resetstateBody()"><i class=" bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(Records: <?= $total_states; ?>)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">

                <button  type="button" href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addState()"><i class="bi bi-plus-square"></i>&nbsp;Add State</button>
            </div>
            <div class="col-auto">
                <select class="form-select form-select-sm" name="rows" id="rows" onchange="stateBody(this.value, '<?= $page_no;?>','<?= $sort_by;?>','<?= $sort_order;?>')">
                    <option value="10" <?= $rows == 10 ? 'selected="selected"' : ''; ?>>10 Records</option>
                    <option value="20" <?= $rows == 20 ? 'selected="selected"' : ''; ?>>20 Records</option>
                    <option value="50" <?= $rows == 50 ? 'selected="selected"' : ''; ?>>50 Records</option>
                    <option value="100" <?= $rows == 100 ? 'selected="selected"' : ''; ?>>100 Records</option>
                </select>
            </div>
            <div class="col-auto">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm mb-0">
                        <?php if ($page_no == 1) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-left"></i></a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="stateBody('<?= $rows; ?>','1','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="stateBody('<?= $rows; ?>','<?= $page_no - 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        <?php } ?>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link p-0 text-white inv-tracking-select">
                                    <select class="form-select form-select-sm" name="rows" onchange="stateBody('<?= $rows; ?>', this.value, '<?= $sort_by; ?>', '<?= $sort_order; ?>', document.getElementById('edu_val').value)">
                                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                            <option value="<?= $i; ?>" <?= $i == $page_no ? 'selected="selected"' : ''; ?>><?= $i . '/' . $total_pages; ?></option>
                                        <?php } ?>
                                    </select>
                                </span>
                            </li>
                        <?php if ($page_no == $total_pages) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-right"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="stateBody('<?= $rows; ?>','<?= $page_no + 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="stateBody('<?= $rows; ?>','<?= $total_pages; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-right"></i></a>
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
                    <a href="javascript:void(0)" onclick="stateBody('<?= $rows; ?>','<?= $page_no; ?>','name','<?= $sort_order_alt; ?>')">State
                        <?php if($sort_by =='name') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="stateBody('<?= $rows; ?>','<?= $page_no; ?>','country_id','<?= $sort_order_alt; ?>')">Country
                        <?php if($sort_by =='country_id') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>Actions</th>
            </tr>            
        </thead>
        <tbody>
            <?php $i = ($page_no -1) * $rows+1;
           foreach ($state as $value): ?>
                <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td><?= $value['name']; ?></td>
                    <td>
                    <?php
                    
                    foreach ($countries as $country) {
                        if ($country['id'] == $value['country_id']) {
                            echo  $country['name'];
                            break;
                        }
                    }
                    ?>
                    </td>                    
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="editState(<?= $value['id']; ?>)"><i class="bi bi-pencil-square "></i></button>
                        <sbutton type="button" class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="deleteState(<?= $value['id']; ?>)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  
</div>
