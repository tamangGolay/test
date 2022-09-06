<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;
use DB;
use Illuminate\Support\Facades\Storage;


class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();

        $files = DB::table('files')
        ->join('users', 'users.id', '=', 'files.user_id')
      
       ->select('users.name as user','users.cid','files.id','files.name','files.size','files.type')
       ->get();

        return view('files.index', [
            'files' => $files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
        // dd($request->status);
        try{
        $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();  
         $status = $request->status;
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $request->file->move(public_path('file'), $fileName);

        File::create([
            'user_id' => auth()->id(),
            'name' => $fileName,
            'type' => $type,
            'size' => $size

        ]);

        return redirect()->route('files.index')->withSuccess(__('File added successfully.'));
        }

            catch(\Illuminate\Database\QueryException $p){
                $errorCode = $p->errorInfo[1];
                if($errorCode == '1062'){
                    return redirect()->route('files.index')->withError(__('You cannot submit file twice.'));

                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->delete);

        $file=File::where('name',$request->delete)->delete();

        return redirect('/files');
    }

    public function download(Request $request){
        
        $file = public_path('file/'.$request->file);
        return response()->download($file);

    }
}
