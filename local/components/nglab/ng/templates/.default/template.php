<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div>
    <form id="formFilter">
        <p><input type="text" id="filter_id" required></p>
        <hr>
        <p><input type="submit" value="получить книги"></p>

    </form>
</div>
<div id="result"></div>
<?php
    $this->addExternalJS("/local/components/nglab/ng/templates/.default/ajax_action.js");
?>


