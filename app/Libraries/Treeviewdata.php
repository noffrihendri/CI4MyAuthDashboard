<?php

namespace App\Libraries;

class Treeviewdata
{
    var $CI;

    function __construct()
    {
    }

    public function ArrangeModuleTreeData($intParent, $arrRawData)
    {
        $arrResult = array();

        //Generate Menu
        if (isset($arrRawData[$intParent])) {
            $lstData = $arrRawData[$intParent];

            foreach ($lstData as $objData) {
                $arrModule = array();
                $arrModule["ModuleId"]         = $objData->auth_menu_id;
                $arrModule["ModuleName"]     = $objData->title;
                $arrModule["PermaLink"]     = $objData->link;
                $arrModule["Child"]         = $this->ArrangeModuleTreeData($objData->auth_menu_id, $arrRawData);

                array_push($arrResult, $arrModule);
            }
        }

        return $arrResult;
    }

    public function ArrangeModuleTreeDataComment($intParent, $arrRawData)
    {
        $arrResult = array();

        //Generate Menu
        if (isset($arrRawData[$intParent])) {
            $lstData = $arrRawData[$intParent];

            foreach ($lstData as $objData) {
                $arrModule = array();
                $arrModule["comment_id"]         = $objData->comment_id;
                $arrModule["parent_comment_id"]     = $objData->parent_comment_id;
                $arrModule["comment"]     = $objData->comment;
                $arrModule["comment_seeder_name"]     = $objData->comment_seeder_name;
                $arrModule["topik"]     = $objData->topik;
                $arrModule["created_at"]     = $objData->created_at;
                $arrModule["Child"]         = $this->ArrangeModuleTreeDataComment($objData->comment_id, $arrRawData);

                array_push($arrResult, $arrModule);
            }
        }

        return $arrResult;
    }

    public function fShowModuleTree($lstModule, $strStatus, $onClick, $arrAkses = array())
    {

        //   echo "<pre>"; print_r($lstModule); echo "</pre>";
        // echo "<pre>";
        // print_r($arrAkses);
        // echo "</pre>"; 
        // die();
        if (count($lstModule) > 0) {
            echo "<ul>";
            foreach ($lstModule as $objModule) {
                $strChecked = "";
                $strEvent = "";

                if (count($arrAkses) > 0) {
                    if (in_array($objModule["ModuleId"], $arrAkses, true)) {
                        $strChecked = "Checked";
                        //   echo "masuk";
                    }
                }

                if ($onClick != "") {
                    $strEvent = "onclick=\"" . $onClick . "('" . $objModule["ModuleId"] . "');\" ";
                }

                if (Count($objModule["Child"]) > 0) {
                    echo "<li class=\"" . $strStatus . "\" id=\"" . $objModule["ModuleId"] . "\"><input name=\"chkModule[]\" " . $strChecked . " " . $strEvent . " value=\"" . $objModule["ModuleId"] . "\" type=\"checkbox\"><span> " . $objModule["ModuleName"] . "</span>";
                    $this->fShowModuleTree($objModule["Child"], $strStatus, $onClick, $arrAkses);
                } else {
                    echo "<li class=\"" . $strStatus . "\" id=\"" . $objModule["ModuleId"] . "\"><input name=\"chkModule[]\" " . $strChecked . " " . $strEvent . " value=\"" . $objModule["ModuleId"] . "\" type=\"checkbox\"><span> " . $objModule["ModuleName"] . "</span>";
                }
            }
            echo "</ul>";
        }
    }
}
