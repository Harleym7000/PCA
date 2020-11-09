<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Policy;

class PoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Policy Documents";
        $policies = DB::table('policies')->get();
        return view('policy.index')->with([
            'title' => $title,
            'policies' => $policies
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        foreach($request->file as $file) {
         $fileName = $file->getClientOriginalName();
         $fileExt = \File::extension($fileName);
        //dd($fileExt);

        $fileExists = DB::table('policies')
        ->where('name', $fileName)
        ->first();
        if(!is_null($fileExists)) {
            $request->session()->flash('error', 'The file '.$fileName. ' already exists');
            return redirect()->back();
        }
        if($fileExt === 'pdf') {
            $storeFile = $file->storeAs('public/policy', $fileName);
            if($storeFile) {
                DB::table('policies')
                ->insert(['name' => $fileName]);
        //print_r($fileName);
    }
}
else {
    $request->session()->flash('error', 'You can only upload files in pdf format');
            return redirect()->back();
}
}
$request->session()->flash('success', 'Files uploaded successfully');
                    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $filename)
    {
        $fileToDelete = $filename;
        $deleteFile = Storage::delete('/public/policy/'.$fileToDelete);
        DB::table('policies')
        ->where('name', $fileToDelete)
        ->delete();
        if($deleteFile) {
            $request->session()->flash('success', ' File deleted successfully');
                return redirect()->back();
        }
        $request->session()->flash('error', 'There was an error deleting the file. Please try again later');
                return redirect()->back();
    }

    public function downloadFile($filename) 
    {
        $file = Storage::download('/public/policy/'.$filename);

        return $file;
    }
}
