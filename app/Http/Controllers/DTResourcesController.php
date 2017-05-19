<?php namespace App\Http\Controllers;

use App\models\DTResources;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;

class DTResourcesController extends Controller
{

    public function upload(UploadedFile $file)
    {
        $data = [
            "size" => $file->getSize(),
            "mime_type" => $file->getMimeType(),
        ];

        $path = '/upload'. date('/y/m/d');

        $fileName = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();

        $file->move(public_path($path), $fileName);

        $data["path"]= $path . $fileName;

        return DTResources::create($data);


    }


    /**
     * Display a listing of the resource.
     * GET /dtresource
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /dtresource/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /dtresource
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /dtresource/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /dtresource/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /dtresource/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /dtresource/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}