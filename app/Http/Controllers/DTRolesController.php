<?php namespace App\Http\Controllers;

use App\models\DTRoles;
use Illuminate\Routing\Controller;

class DTRolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /dtroles
	 *
	 * @return Response
	 */
	public function adminIndex()
	{

        $configuration['list'] = DTRoles::get()->toArray();
        $configuration['routeView'] = 'app.roles.show';
        $configuration['routeEdit'] = 'app.roles.edit';
        return view('admin.list', $configuration);


	}

	/**
	 * Show the form for creating a new resource.
	 * GET /dtroles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dtroles
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /dtroles/{id}
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
        $configuration['list'] = DTRoles::find($id);

        return view('admin.single');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /dtroles/{id}/edit
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
	 * PUT /dtroles/{id}
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
	 * DELETE /dtroles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}