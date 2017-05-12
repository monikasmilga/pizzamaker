<?php namespace App\Http\Controllers;

use App\models\DTRoles;
use App\models\DTUsers;
use Illuminate\Routing\Controller;

class DTUsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /dtusers
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $configuration['list'] = DTUsers::get()->toArray();
        $configuration['routeView'] = 'app.users.show';
        $configuration['routeEdit'] = 'app.pizzas.edit';
        $configuration['routeDelete'] = 'app.pizzas.delete';

        return view('admin.list', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /dtusers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dtusers
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /dtusers/{id}
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
        $configuration['list'] = DTUsers::find($id)->toArray();

        return view('admin.single', $configuration);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /dtusers/{id}/edit
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
	 * PUT /dtusers/{id}
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
	 * DELETE /dtusers/{id}
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
        if(DTUsers::destroy($id)) {
            return '{"success":true}';
        }

    }

}