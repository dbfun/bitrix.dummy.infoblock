<?php
// для использования вывода модуля в произвольном месте страницы использовать шаблон global, который помещает вывод в глобальную переменную
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
ob_start();?>


<div class=""><?=$arResult['TEXT'];?></div>
<div class="">IBLOCK_ID: <?=$arResult['IBLOCK_ID'];?></div>
<div class="">ELEMENT_ID: <?=$arResult['ELEMENT_ID'];?></div>

<?php
$block = ob_get_contents();
ob_end_clean();
$GLOBALS['BA_DUMMY_BLOCK'] = $block;