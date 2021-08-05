<?php

// Get active Admin list in data list
if (!function_exists('getActiveAdmin')) {
	function getActiveAdmin($id)
	{
		$query = DB::table('users')->where('id', '=', $id)->first();
		if (!empty($query)) {
			$userrole = $query->role;
			if ($userrole == 'Super Admin' || $userrole == 'Admin') 
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

//Get User Role List
if (!function_exists('getUserRoleList')) {
	function getUserRoleList()
	{
		$query = DB::table('roles')->get()->toArray();
		if (!empty($query)) {
			return $query;
		}
	}
}

//Get User Role in Table User using ID
if (!function_exists('getUsersRole_User')) {
	function getUsersRole_User($id)
	{
		$query = DB::table('users')->where('id', '=', $id)->first();
		if (!empty($query)) {
			$name = $query->role;
			return $name;
		} else {
			return NULL;
		}
	}
}

//Get User Role From Id
if (!function_exists('getUsersRole')) {
	function getUsersRole($id)
	{
		$query = DB::table('roles')->where('id', '=', $id)->first();
		if (!empty($query)) {
			$name = $query->role_name;
			return $name;
		} else {
			return NULL;
		}
	}
}

//check if role has access of admin or not
if (!function_exists('isAdmin')) {
	function isAdmin($roleId)
	{
		$role = DB::table('roles')->find($roleId);

		if ($role) {
			if ($role->is_admin == 1) {
				return true;
			} else {
				return false;
			}
		} else {
			return NULL;
		}
	}
}

//
if (!function_exists('getRoleName')) {
	function getRoleName($id)
	{
		$query  = DB::table('roles')->where('id', '=', $id)->first();
		if (!empty($query)) {
			if ($id == 1) {
				return $query->role_name;
			} else if ($id == 2) {
				return $query->role_name;
			} else if ($id == 3) {
				return $query->role_name;
			} else {
				return $query->role_name;
			}
		}
	}
}

// Get active Admin list in data list
if (!function_exists('getActiveSuperAdmin')) {
	function getActiveSuperAdmin($id)
	{
		$data  = DB::table('users')->where('id', '=', $id)->first();
		if (!empty($data)) {
			$userrole = $data->role;
			if ($userrole == 'Super Admin') {
				return "yes";
			} else {
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
		if (!empty($query)) {
			return $query;
		}
	}
}

// Get quantity of Quran Teachers
if (!function_exists('getQuranTeachersQuantity')) {
	function getQuranTeachersQuantity()
	{
		$query = DB::table('tbl_quran_teachers')->count();
		if (!empty($query)) {
			return $query;
		}
	}
}

// Get quantity of Hafiz
if (!function_exists('getHafizQuantity')) {
	function getHafizQuantity()
	{
		$query = DB::table('tbl_hafiz')->where('pass_test', '=', 1)->count();
		if (!empty($query)) {
			return $query;
		}
	}
}

// Get quantity of appointments
if (!function_exists('getAppointmentsQuantity')) {
	function getAppointmentsQuantity()
	{
		$query = DB::table('tbl_appointments')->where('pass_test', '=', 0)->count();
		if (!empty($query)) {
			return $query;
		}
	}
}

// Get Daerah
if (!function_exists('getDaerahName')) {
	function getDaerahName($id)
	{
		$query = DB::table('tbl_daerah')->where('daerahID', '=', $id)->first();
		if (!empty($query)) {
			$daerah_name = $query->name;
			return $daerah_name;
		}
	}
}

// Get Daerah
if (!function_exists('getMukimName')) {
	function getMukimName($id)
	{
		$query = DB::table('tbl_mukim')->where('mukimID', '=', $id)->first();
		if (!empty($query)) {
			$mukim_name = $query->name;
			return $mukim_name;
		}
	}
}

//Get Name Based On ID From Appointment List
if (!function_exists('getName')) {
	function getName($id)
	{
		$query = DB::table('tbl_appointments')->where('id', '=', $id)->first();
		$query2 = DB::table($query->reference)->where('id', '=', $query->id_reference)->first();
		if (!empty($query2)) {
			return $query2->name . ' ' . $query2->lastname;
		}
	}
}

//Get Tester Name for Appointments
if (!function_exists('getTesterName')) {
	function getTesterName($id)
	{
		$query = DB::table('users')->where('id', '=', $id)->first();
		// $query2 = DB::table($query->reference)->where('id','=',$query->id_reference)->first();
		if (!empty($query)) {
			return $query->name . ' ' . $query->lastname;
		}
	}
}

//Get Users Name
if (!function_exists('getUserName')) {
	function getUserName($id)
	{
		$query = DB::table('users')->where('id', '=', $id)->first();
		if (!empty($query)) {
			return $query->name . ' ' . $query->lastname;
		}
	}
}

//Get Number Range of Juzuk based on test_type
if (!function_exists('getTypeExam')) {
	function getTypeExam($id)
	{
		$query = DB::table('tbl_exam')->where('id', '=', $id)->first();
		if (!empty($query)) {
			return $query->name;
		}
	}
}

//Get Image for Appointment List
if (!function_exists('getImageListAppointment')) {
	function getImageListAppointment($id)
	{
		$query = DB::table('users')->where('id', '=', $id)->first();
		if (!empty($query)) {
			return $query->name;
		}
	}
}

//Get Number Range of Juzuk based on Hafiz
if (!function_exists('getJuzukFromHafiz')) {
	function getJuzukFromHafiz($id)
	{
		$query = DB::table('tbl_hafiz')->where('id_juzuk', '=', $id)->first();
		// dump($query);

		if (!empty($query) == 1) {
			return 'Juzuk 1 - 10';
		} else if (!empty($query) == 2) {
			return 'Juzuk 11 - 20';
		} else if (!empty($query) == 3) {
			return 'Juzuk 21 - 30';
		}
	}
}
