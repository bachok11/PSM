<?php

// Get active Admin list in data list
if (!function_exists('_getActiveSuperAdmin')) {
	function _getActiveSuperAdmin($id)
	{	
		$data  = DB::table('users')->where('id','=',$id)->first();
		if(!empty($data))
		{
			$userrole = $data->role;
			if($userrole == 'Super Admin')
			{
				return "yes";
			}
			else
			{	
				return "no";
			}
		}
	}
}

// Get quantity of Mosque Committee
if (!function_exists('getMosqueCommitteeQuantity')) {
    function getMosqueCommitteeQuantity()
    {
        $query = DB::table('tbl_mosque_committee')->count();
        if(!empty($query))
		{
			return $query;
		}
    }
}

// Get quantity of Quran Teachers
if (!function_exists('getQuranTeachersQuantity')) {
    function getQuranTeachersQuantity()
    {
        $query = DB::table('tbl_quran_teachers')->count();
        if(!empty($query))
		{
			return $query;
		}
    }
}

// Get quantity of Hafiz
if (!function_exists('getHafizQuantity')) {
    function getHafizQuantityQuantity()
    {
        $query = DB::table('tbl_hafiz')->count();
        if(!empty($query))
		{
			return $query;
		}
    }
}

?>