<?php
/**
 * Profile document
 */
?>
<div class="mb-1">
    <strong>(&nbsp;<?= $doc_tRecords." "."Records"; ?>&nbsp;)</strong>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th>Document Type</th>
                <th>Added Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?
            $i=1;
            if(isset($employee_documents) and !empty($employee_documents))
            {
                foreach ($employee_documents as $key => $doc_val) {?>
                    <tr>
                        <td class="text-center"><? print $i++; ?></td>
                        <td><? print $documentTypes[$doc_val['document_type_id']]['name']; ?></td>
                        <td><? print displayDate($doc_val['created_at']); ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<? echo WEBROOT;?>employee_images/<? print $doc_val['file'];?>" target="_blank"><i class="bi bi-download"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument(<?= $doc_val['employee_id']; ?>, <?= $doc_val['id']; ?>)"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                <?}
            }
            else{?>
                <tr>
                    <td colspan="4">
                        <div class="alert alert-warning" role="alert">
                            No Records Found
                        </div>
                    </td>
                </tr>
            <?}
            ?>
        </tbody>
    </table>
</div>
