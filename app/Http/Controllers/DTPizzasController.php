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
	    $configuration['list'] = $this->apiIndex()->toArray();
		return view('front-end.list', $configuration);
	}

    public function adminIndex()
    {
        $configuration['list'] = $this->apiIndex()->toArray();
        $configuration['routeView'] = 'app.pizzas.show';
        $configuration['routeEdit'] = 'app.pizzas.edit';

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
	    $configuration['record'] = DTPizzas::find($id);


		return view('front-end.single');
	}

    public function adminShow($id)
    {
        $configuration['record'] = DTPizzas::find($id);

        return view('admin.single');
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

}