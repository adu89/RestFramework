<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-10-04
 * Time: 11:23 AM
 */

    class Menu {

        private $Menu;

        function __construct() {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/restfulController/application/database.php';
            $database = new Database();
            $query = "SELECT * FROM Menu LEFT JOIN Content ON Menu.MenuContentKey = Content.ContentKey ORDER BY Menu.MenuID ASC";
            $this->Menu = $database->execute($query);
            $database->close();
        }

        function getLinearMenu ($menuResult) {
            $linearMenu = array ();
            foreach($menuResult as $menu) {
                $menuID = $menu["MenuID"];
                $menuLanguage = $menu["ContentLanguageID"];
                $parentID = $menu["MenuParentID"];
                $linearMenu[$menuID]["ParentID"] = $parentID;
                $linearMenu[$menuID]["ID"] = $menuID;
                $linearMenu[$menuID]["ContentKey"] = $menu["MenuContentKey"];
                $linearMenu[$menuID]["Index"] = $menu["MenuIndex"];
                $linearMenu[$menuID]["Icon"] = $menu["MenuIcon"];
                $linearMenu[$menuID]["ContentValues"][$menuLanguage] = $menu["ContentValue"];

            }
            return $linearMenu;
        }

        function getTreeMenu () {
            $linearMenu = $this->getLinearMenu($this->Menu);
            $treeMenu = array ();
            foreach($linearMenu as $linearMenuItem) {
                $treeMenu = array_replace_recursive($treeMenu, $this->recursiveParentLookup($linearMenuItem, $linearMenu));
            }
            return $treeMenu;
        }

        private function recursiveParentLookup($child) {
            $linearMenu = $this->getLinearMenu($this->Menu);
            $parentID = $child["ParentID"];
            if($parentID != 0) {
                $parent = $linearMenu[$parentID];
                if(isset($parent["Submenu"])) $parent["Submenu"] = array ();
                $parent["Submenu"][$child["ID"]] = $child;
                return $this->recursiveParentLookup($parent, $linearMenu);
            } else {
                return array($child["Index"] => $child);
            }
        }
    }