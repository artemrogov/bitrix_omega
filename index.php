<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?><br>
<?$APPLICATION->IncludeComponent(
	"first:param", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"X" => "20",
		"Z" => "30",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"VM_TR" => "Y"
	),
	false
);?>


<h2>текущая дата время:</h2>

<?php

$book2 = Omg\BookTable::getByPrimary(1)->fetchObject();

echo $book2->get("UF_BOOK_NAME");

$project = Project\MyClass::init();

echo $project;


?>
<? $APPLICATION->IncludeComponent(
	"dev:dv.time", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"FORMAT_D" => "Y-m-d",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>