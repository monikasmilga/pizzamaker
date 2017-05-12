<?php namespace App\Http\Controllers;



use App\models\DTPizzas;

class DTPizzasController extends DTAPIBaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pizzas
	 *
	 * @return Response
	 */
	public function index()
	{
		return view ('front-end');
	}

	/**
	 * Display a listing of the resource.
	 * GET /pizzas
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        return view ('admin');
	}

    /**
     * Display a listing of the resource.
     * GET /dtpizzasapi
     *
     * @return mixed
     */

    public function apiIndex()
    {
        $config = [];
        $config['list'] = DTPizzas::with(['cheeses', 'crusts', 'ingredients'])->get();
        return $config;
    }
	/**
	 * Show the form for creating a new resource.
	 * GET /pizzas/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return view ('front-end');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pizzas/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
        return view ('admin');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pizzas
	 *
	 * @return Response
	 */
	public function store()
	{
        return view ('front-end');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pizzas
	 *
	 * @return Response
	 */
	public function adminStore()
	{
        return view ('admin');
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
        return view ('admin');
	}

	/**
	 * Display the specified resource.
	 * GET /pizzas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminShow($id)
	{
        return view ('admin');
	}

    /**
     * Display the specified resource.
     * GET /dtpizzasapi/{id}
     *
     * @param  int $id
     * @return mixed
     */
    public function apiShow($id)
    {
        return DTPizzas::with('cheeses', 'crusts', 'ingredients')->find($id);
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
        return view ('front-end');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pizzas/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminEdit($id)
	{
        return view ('admin');
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
        return view ('front-end');
	}

    /**
     * Update the specified resource in storage.
     * PUT /pizzas/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function adminUpdate($id)
    {
        return view ('admin');
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
        return view ('front-end');
	}
	/**
	 * Remove the specified resource from storage.
	 * DELETE /pizzas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
        return view ('admin');
	}
}