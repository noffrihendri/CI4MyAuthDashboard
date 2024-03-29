<?php

namespace App\Libraries;

use App\Models\Mauthmenurole;

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
                $arrModule["create"]         = (isset($objData->create) ? $objData->create : 0);
                $arrModule["update"]         = (isset($objData->create) ? $objData->update : 0);
                $arrModule["delete"]         = (isset($objData->create) ? $objData->delete : 0);
                $arrModule["Child"]         = $this->ArrangeModuleTreeDataComment($objData->comment_id, $arrRawData);

                array_push($arrResult, $arrModule);
            }
        }

        return $arrResult;
    }

    public function fShowModuleTree($lstModule, $strStatus, $onClick, $arrAkses = array(), $arrChaccess = array(), $GroupId = '')
    {

        $rolemenu = new Mauthmenurole();

        if (count($lstModule) > 0) {

            echo "<ul>";
            foreach ($lstModule as $objModule) {
                $strChecked = "";
                $strEvent = "";



                if (count($arrAkses) > 0) {
                    if (in_array($objModule["ModuleId"], $arrAkses, true)) {
                        $strChecked = "Checked";
                    }
                }

                if ($onClick != "") {
                    $strEvent = "onclick=\"" . $onClick . "('" . $objModule["ModuleId"] . "');\" ";
                }

                if (Count($objModule["Child"]) > 0) {
                    echo "<li class=\"" . $strStatus . "\" id=\"" . $objModule["ModuleId"] . "\"><input name=\"chkModule[]\" " . $strChecked . " " . $strEvent . " value=\"" . $objModule["ModuleId"] . "\" type=\"checkbox\"><span> " . $objModule["ModuleName"] . "</span>";


                    $this->fShowModuleTree($objModule["Child"], $strStatus, $onClick, $arrAkses, $arrChaccess, $GroupId);
                } else {
                  //  $arrModuleAkses = $this->CI->MAkses->getListAkses(array(), );

                    $arrModuleAkses = $rolemenu
                    ->where(array('id_menu' => $objModule["ModuleId"], 'auth_groups_id' => $GroupId))
                    ->get()
                    ->getRow();
                    // d($objModule["ModuleId"]);
                    // d($GroupId);
                  //  d($arrModuleAkses->create);
                    $strCreate = false;
                    $strUpdate = false;
                    $strDelete = false;
                    if (count($arrModuleAkses) > 0) {
                        $strCreate = $arrModuleAkses->create;
                        $strUpdate = $arrModuleAkses->update;
                        $strDelete = $arrModuleAkses->delete;
                    }

                    echo "<li class=\"" . $strStatus . "\" id=\"" . $objModule["ModuleId"] . "\"><input name=\"chkModule[]\" " . $strChecked . " " . $strEvent . " value=\"" . $objModule["ModuleId"] . "\" type=\"checkbox\"><span> " . $objModule["ModuleName"] . "</span>";
                    echo '<br>';
                    echo '<select name="chAccess[]"  id="' . $objModule["ModuleId"] . '" class="selectpicker" multiple="multiple" >
						<option ' . (($strCreate) ? 'selected' : '') . ' value="1-' . $objModule["ModuleId"] . '">Create</option>
						<option ' . (($strUpdate) ? 'selected' : '') . ' value="2-' . $objModule["ModuleId"] . '">Update</option>
						<option ' . (($strDelete) ? 'selected' : '') . ' value="3-' . $objModule["ModuleId"] . '">Delete</option>
					</select>';
                }
            }
          //  die();
            echo "</ul>";
        }
    }

    // public function fShowModuleTree($lstModule, $strStatus, $onClick, $arrAkses = array())
    // {

    //     //   echo "<pre>"; print_r($lstModule); echo "</pre>";
    //     // echo "<pre>";
    //     // print_r($lstModule);
    //     // echo "</pre>"; 
    //     // die();
    //     if (count($lstModule) > 0) {
    //         echo "<ul>";
    //         foreach ($lstModule as $objModule) {
    //             $strChecked = "";
    //             $strEvent = "";

    //             if (count($arrAkses) > 0) {
    //                 if (in_array($objModule["ModuleId"], $arrAkses, true)) {
    //                     $strChecked = "Checked";
    //                     //   echo "masuk";
    //                 }
    //             }

    //             if ($onClick != "") {
    //                 $strEvent = "onclick=\"" . $onClick . "('" . $objModule["ModuleId"] . "');\" ";
    //             }

    //             if (Count($objModule["Child"]) > 0) {
    //                 echo "<li class=\"" . $strStatus . "\" id=\"" . $objModule["ModuleId"] . "\"><input name=\"chkModule[]\" " . $strChecked . " " . $strEvent . " value=\"" . $objModule["ModuleId"] . "\" type=\"checkbox\"><span> " . $objModule["ModuleName"] . "</span>";

             
    //                 $this->fShowModuleTree($objModule["Child"], $strStatus, $onClick, $arrAkses);
    //             } else {
                    
    //                 echo "<li class=\"" . $strStatus . "\" id=\"" . $objModule["ModuleId"] . "\"><input name=\"chkModule[]\" " . $strChecked . " " . $strEvent . " value=\"" . $objModule["ModuleId"] . "\" type=\"checkbox\"><span> " . $objModule["ModuleName"] . "</span>";
    //             }
    //         }
    //         echo "</ul>";
    //     }
    // }
}
