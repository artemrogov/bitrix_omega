<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?><br>

<?$APPLICATION->IncludeComponent('nglab:ng',
    Array(
        'AJAX_MODE' => 'Y'
    )
)?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>