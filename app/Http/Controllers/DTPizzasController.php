<?php namespace App\Http\Controllers;

use App\models\DTPizzas;
use Illuminate\Routing\Controller;

class DTPizzasController extends BaseAPIController {

	/**
	 * Display a listing of the resource.
	 * GET /pizzas
	 *
	 * @return Response
	 */
	public function index()
	{
	    $configuration['list'] = DTPizzas::get()->toArray();
		return view('front-end.list', $configuration);
	}

    public function adminIndex()
    {
        $configuration['list'] = DTPizzas::get()->toArray();
        $configuration['routeView'] = 'app.pizzas.show';
        $configuration['routeEdit'] = 'app.pizzas.edit';
        $configuration['routeDelete'] = 'app.pizzas.delete';

        return view('admin.list', $configuration);
    }

    public function apiIndex()
    {
        return DTPizzas::get();
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /pizzas/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pizzas
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pizzas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $configuration['record'] = DTPizzas::find($id)->toArray();


		return view('front-end.single', $configuration);
	}

    public function adminShow($id)
    {
        $configuration['record'] = DTPizzas::find($id);

        return view('admin.single');
	}

    public function apiShow($id)
    {
        return DTPizzas::find($id)->get();
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pizzas/{id}/edit
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
	 * PUT /pizzas/{id}
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
	 * DELETE /pizzas/{id}
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
        if(DTPizzas::destroy($id)) {
            return '{"success":true}';
        }

    }

}