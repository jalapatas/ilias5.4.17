<?php
/*
    +-----------------------------------------------------------------------------+
    | ILIAS open source                                                           |
    +-----------------------------------------------------------------------------+
    | Copyright (c) 1998-2001 ILIAS open source, University of Cologne            |
    |                                                                             |
    | This program is free software; you can redistribute it and/or               |
    | modify it under the terms of the GNU General Public License                 |
    | as published by the Free Software Foundation; either version 2              |
    | of the License, or (at your option) any later version.                      |
    |                                                                             |
    | This program is distributed in the hope that it will be useful,             |
    | but WITHOUT ANY WARRANTY; without even the implied warranty of              |
    | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the               |
    | GNU General Public License for more details.                                |
    |                                                                             |
    | You should have received a copy of the GNU General Public License           |
    | along with this program; if not, write to the Free Software                 |
    | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA. |
    +-----------------------------------------------------------------------------+
*/

/**
* Class ilObjSurveyAdministration
*
* @author Helmut Schottmüller <helmut.schottmueller@mac.com>
* @version $Id$
*
* @ingroup ModulesSurvey
* @extends ilObject
*/

require_once "./Services/Object/classes/class.ilObject.php";

class ilObjSurveyAdministration extends ilObject
{
    public $setting;
    
    /**
    * Constructor
    * @access	public
    * @param	integer	reference_id or object_id
    * @param	boolean	treat the id as reference_id (true) or object_id (false)
    */
    public function __construct($a_id = 0, $a_call_by_reference = true)
    {
        include_once "./Services/Administration/classes/class.ilSetting.php";
        $this->setting = new ilSetting("survey");
        $this->type = "svyf";
        parent::__construct($a_id, $a_call_by_reference);
    }

    /**
    * update object data
    *
    * @access	public
    * @return	boolean
    */
    public function update()
    {
        if (!parent::update()) {
            return false;
        }

        // put here object specific stuff

        return true;
    }


    /**
    * delete object and all related data
    *
    * @access	public
    * @return	boolean	true if all object data were removed; false if only a references were removed
    */
    public function delete()
    {
        // always call parent delete function first!!
        if (!parent::delete()) {
            return false;
        }

        //put here your module specific stuff

        return true;
    }
    
    /* #7927: special users are deprecated
    function addSpecialUsers($arr_user_id)
    {
        $surveySetting = new ilSetting("survey");
        $allowedUsers = strlen($surveySetting->get("multiple_survey_users")) ? explode(",",$surveySetting->get("multiple_survey_users")) : array();
        $arr = array_unique(array_merge($allowedUsers, $arr_user_id));
        $surveySetting->set("multiple_survey_users", implode(",", $arr));
    }

    function removeSpecialUsers($arr_user_id)
    {
        $surveySetting = new ilSetting("survey");
        $allowedUsers = strlen($surveySetting->get("multiple_survey_users")) ? explode(",",$surveySetting->get("multiple_survey_users")) : array();
        $arr = array_diff($allowedUsers, $arr_user_id);
        $surveySetting->set("multiple_survey_users", implode(",", array_values($arr)));
    }

    function getSpecialUsers()
    {
        $surveySetting = new ilSetting("survey");
        return strlen($surveySetting->get("multiple_survey_users")) ? explode(",",$surveySetting->get("multiple_survey_users")) : array();
    }
    */
} // END class.ilObjSurveyAdministration.php
