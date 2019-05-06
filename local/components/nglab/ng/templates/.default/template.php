<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?$this->addExternalCss("/bitrix/css/main/bootstrap_v4/bootstrap.css");?>
<div class="container">
    <div class="row">
    <div class="col-12">
        <form id="formFilter" class="form-inline">
            <div class="form-group">
                <label for="filter_id">Введите ID:</label>
                <input type="text" id="filter_id" class="form-control" placeholder="введите id highload блока" required>
            </div>
            <div class="form-group">
                <input type="submit" value="получить книги" class="btn btn-primary ml-2">
            </div>
        </form>
    </div>
        <div class="col-12 mt-5">
            <div id="result" class="alert alert-success" role="alert"></div>
        </div>
    </div>
</div>

<?php
    $this->addExternalJS("/local/components/nglab/ng/templates/.default/ajax_action.js");
?>


