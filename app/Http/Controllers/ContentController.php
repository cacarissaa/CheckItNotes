<?php

namespace App\Http\Controllers;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    function index()
    {
        $temp = Content::all();
        return view('searchMaterial', compact('temp'));
    }

    public function getDownload($file_name){

        $file = public_path('content/'.$file_name);
        return response()->download($file);
    }

    function searchContent(Request $search)
    {
        if($search->word == "")
        {
            $temp = Content::paginate(5);
            return view('/searchMaterial', compact('temp'));
        }
        else if($search->word != "")
        {
                $temp = DB::table('contents')
                ->join('majors', 'majors.id', '=', 'contents.majorID')
                ->join('universities','majors.univID','=','universities.id')
                ->select('contents.contentFile')->where([
                    ['contents.contentFile', 'LIKE', '%' . $search->word . '%'],
                    ['universities.id', '=', $search->univ],
                    ['majors.id','=',$search->major]
                ])
                ->paginate(3);

                return view('/searchMaterial', compact('temp'));
        }
    }

    function searchAll(Request $search)
    {
        $temp = Content::where('contentFile', 'LIKE', '%' . $search->word . '%')->paginate(3);
        $temp->appends($search->only('word'));
        return view('/searchMaterial', compact('temp'));
    }
}
