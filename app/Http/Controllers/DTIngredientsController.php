<?php namespace App\Http\Controllers;

use App\models\DTIngredients;
use Illuminate\Routing\Controller;

class DTIngredientsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ingredients
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
	    $configuration['list'] = DTIngredients::get()->toArray();
	    $configuration['routeView'] = 'app.ingredients.show';
	    $configuration['routeEdit'] = 'app.ingredients.edit';
	    $configuration['routeDelete'] = 'app.ingredients.delete';

		return view('admin.list', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ingredients/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ingredients
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ingredients/{id}
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
        $configuration['record'] = DTIngredients::find($id)->toArray();

        return view('admin.single', $configuration);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /ingredients/{id}/edit
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
	 * PUT /ingredients/{id}
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
	 * DELETE /ingredients/{id}
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
        DTIngredients::destroy($id);

        return '{"success":true}';
	}

}