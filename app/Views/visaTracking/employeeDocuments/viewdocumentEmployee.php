<?php
/**
 * view employeedocument details
 */
$tab_id = isset($tab_id) ? $tab_id : 1;
?>
<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="candidate-details-header">
                <nav class="attachment-tabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link <? if($tab_id == 1) { echo 'active'; } ?>" id="nav-attachment-tab" data-bs-toggle="tab" data-bs-target="#nav-attachment" type="button" role="tab" aria-controls="nav-attachment" aria-selected="true"><i class="bi bi-person-circle"></i>&nbsp;Attachments</button>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade <? if($tab_id == 1) { echo 'show active'; } ?>" id="nav-attachment" role="tabpanel" aria-labelledby="nav-attachment-tab" tabindex="0">
                        <div class="clearfix">
                            <div class="float-end">
                                <button type="button" class="btn btn-sm btn-success" onclick="addEmployeeDocument(4)"><span class="bi bi-plus"></span>&nbsp;AddEmployeeDocuments</button>
                            </div>
                            <div id="documents_form"></div>
                            
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><span class="bi bi-x-square"></span>&nbsp;Close</button>
        </div>
    </div>
</div>

