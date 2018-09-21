<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;


class FileController extends Controller
{
    public function fileupload(Request $request){
    	if($request->hasFile('file')){
    		$qwee = $request->file('file');
			$filename = uniqid().'.'. $qwee->getClientOriginalExtension();
			$orgname = $qwee->getClientOriginalName();
			$qwee->move('files',$filename);
			
			$test = new File;

			$test->file = $filename;
			$test->old_name = $orgname;
			$test->save();

			$notification = array(
                'message' => 'A file has been Uploaded Successfully',
                'alert-type' => 'success',
            );

            return response()->json($test);
    	}
    }

    public function delete(Request $request){    
	    $test = File::where('old_name', $request->input('id'))->first();
	    $qwq = $test->file;
	    unlink('files/' . $qwq);
	    File::find($test->id)->delete();

	    return back();
	}
}
