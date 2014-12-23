<?php
class BADummyInfoblock {

  private $arParams;
  public function __construct($arParams)
  {

    // Это необходимо, если выше не было подключения инфоблоков. Без надобности не удалять
    if(!CModule::IncludeModule("iblock")) return;

    // Получение явно переданных параметров из настроек компонента
    $this->arParams = $arParams;

    // Получение параметров вызова
    $this->arParams["IBLOCK_ID"] = intVal(intVal($this->arParams["IBLOCK_ID"]) > 0 ? $this->arParams["IBLOCK_ID"] : $_REQUEST["ID"]);
    $this->arParams["ELEMENT_ID"] = intVal(intVal($this->arParams["ELEMENT_ID"]) > 0 ? $this->arParams["ELEMENT_ID"] : $_REQUEST["ELEMENT_ID"]);
  }

  // контолер
  public function execute()
  {
    if(true) return $this->dummyResults();
  }

  private function dummyResults() {
    return array(
      'TEXT' => 'Ok, this is dummy text: '.$this->arParams['DUMMY_TEXT'],
      'IBLOCK_ID' => $this->arParams["IBLOCK_ID"],
      'ELEMENT_ID' => $this->arParams["ELEMENT_ID"]
    );
  }

}