<?php namespace App\Http\Controllers;

use App\models\DTPads;
use Illuminate\Routing\Controller;

class DTPadsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pads
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $configuration['list'] = DTPads::get()->toArray();
        $configuration['routeView'] = 'app.pads.show';
        $configuration['routeEdit'] = 'app.pads.edit';
        $configuration['routeDelete'] = 'app.pads.delete';

        return view('admin.list', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pads/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pads
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

    public function adminShow($id)
    {
        $configuration['record'] = DTPads::find($id)->toArray();

        return view('admin.single', $configuration);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pads/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function adminDestroy($id)
    {
        DTPads::destroy($id);

        return '{"success":true}';
    }

}