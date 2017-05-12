<?php namespace App\Http\Controllers;

use App\models\DTCheeses;
use App\models\DTIngredients;
use App\models\DTPads;
use Illuminate\Routing\Controller;

class DTIngredientsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ingredients
	 *
	 * @return Response
	 */
	public function index()
	{
	    $configuration['list']=DTIngredients::get()->toArray();
		return view("front-end-list", $configuration);
	}

    /**
     * Display a listing of the resource.
     * GET /ingredients
     *
     * @return Response
     */
    public function adminIndex()
    {
        $configuration['list']=DTIngredients::get()->toArray();
        $configuration['routeShow']='app.ingredients.show';
        $configuration['routeEdit']='app.ingredients.edit';

        return view("admin-list", $configuration);
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
     * Show the form for creating a new resource.
     * GET /ingredients/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $fillables = new DTCheeses();

        $configuration['fields'] = $fillables->getFillable();
        $configuration['tableName'] = $fillables->getTableName();
        $configuration['list'] = DTCheeses::get()->toArray();
        return view('form', $configuration);
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
     * Store a newly created resource in storage.
     * POST /ingredients
     *
     * @return Response
     */
    public function adminStore()
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

    /**
     * Display the specified resource.
     * GET /ingredients/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function adminShow($id)
    {
        $configuration['record']=DTIngredients::find($id)->toArray();
        $configuration['routeEdit']='app.ingredients.edit';
        $configuration['routeShow']='app.ingredients.show';
        return view("admin-single", $configuration);
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
        return view('form');
	}

    /**
     * Show the form for editing the specified resource.
     * GET /ingredients/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function adminEdit($id)
    {
        return view('form');
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
     * Update the specified resource in storage.
     * PUT /ingredients/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function adminUpdate($id)
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

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ingredients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
        DTIngredients::destroy($id);
        return '{"success":true}';
	}

}