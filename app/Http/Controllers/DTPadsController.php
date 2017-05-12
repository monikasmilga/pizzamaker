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
	public function index()
	{
		//
	}

	/**
	 * Display a listing of the resource.
	 * GET /pads
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $configuration['list']=DTPads::get()->toArray();
        $configuration['routeShow']='app.pads.show';
        $configuration['routeEdit']='app.pads.edit';

        return view("admin-list", $configuration);
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
	 * Show the form for creating a new resource.
	 * GET /pads/create
	 *
	 * @return Response
	 */
	public function adminCreate()
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
	 * Store a newly created resource in storage.
	 * POST /pads
	 *
	 * @return Response
	 */
	public function adminStore()
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

	/**
	 * Display the specified resource.
	 * GET /pads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminShow($id)
	{
        return view('admin-single');
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
	 * Show the form for editing the specified resource.
	 * GET /pads/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminEdit($id)
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
	 * Update the specified resource in storage.
	 * PUT /pads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editUpdate($id)
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

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
        DTPads::destroy($id);
        return '{"success":true}';
	}

}