<?php namespace App\Http\Controllers;

use App\models\DTPermissions;
use Illuminate\Routing\Controller;

class DTPermissionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /permissions
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $configuration['list'] = DTPermissions::get()->toArray();
        $configuration['routeView'] = 'app.permissions.show';
        $configuration['routeEdit'] = 'app.permissions.edit';
        $configuration['routeDelete'] = 'app.permissions.delete';

        return view('admin.list');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /permissions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /permissions
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /permissions/{id}
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
        $configuration['record'] = DTPermissions::find($id)->toArray();

        return view('admin.single', $configuration);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /permissions/{id}/edit
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
	 * PUT /permissions/{id}
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
	 * DELETE /permissions/{id}
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
        DTPermissions::destroy($id);

        return '{"success":true}';
    }

}