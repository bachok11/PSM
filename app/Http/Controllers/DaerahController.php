<?php

namespace App\Http\Controllers;

use App\tbl_daerah;
use App\tbl_mukim;

use Auth; 
use \Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DaerahController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	//get mukim
	public function getMukim()
	{ 
			$id = Input::get('daerahID');

			$query = tbl_mukim::where('daerahID','=',$id)->get();
			if(!empty($query))
			{
				foreach($query as $key)
				{ ?>
				
				<option value="<?php echo  $key->mukimID; ?>"  class="mukim_of_daerah"><?php echo $key->name; ?></option>
				
				<?php }
			}
	}

	public function getReport()
	{
		return view('report.report');
	}
}
