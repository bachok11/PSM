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

// Get Daerah
if (!function_exists('getDaerahName')) {
    function getDaerahName($id)
    {
        $query = DB::table('tbl_daerah')->where('daerahID','=',$id)->first();
        if(!empty($query))
		{
			$daerah_name = $query->name;
			return $daerah_name;
		}
    }
}

// Get Daerah
if (!function_exists('getMukimName')) {
    function getMukimName($id)
    {
        $query = DB::table('tbl_mukim')->where('mukimID','=',$id)->first();
        if(!empty($query))
		{
			$mukim_name = $query->name;
			return $mukim_name;
		}
    }
}

?>