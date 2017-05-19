<?php namespace App\Http\Controllers;

use App\models\DTUsersResourcesConnections;
use Illuminate\Routing\Controller;
use phpDocumentor\Reflection\Types\Resource;

class DTGameController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /dtgame
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /dtgame/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $configuration['auth'] = (auth()->user());
        return view('front-end.game', $configuration);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dtgame
	 *
	 * @return Response
	 */
	public function store()
	{
		$resource = request()->file('thefile');

		$resourceController = new DTResourcesController();

		$record = $resourceController->upload($resource);

		DTUsersResourcesConnections::create([
		   "users_id" => auth()->user()->id,
            "resources_id" => $record->id,
        ]);


	}

	/**
	 * Display the specified resource.
	 * GET /dtgame/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /dtgame/{id}/edit
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
	 * PUT /dtgame/{id}
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
	 * DELETE /dtgame/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}