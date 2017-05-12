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

    public function index()
    {

	}

	public function adminIndex()
	{
        $fillables = new DTIngredients();

	    $configuration['list'] = DTIngredients::get()->toArray();
        $configuration['tableName'] = $fillables->getTableName();

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

	}

    public function adminCreate()
    {

        $fillables = new DTIngredients();


        $configuration['fields'] = $fillables->getFillable();
        $configuration['tableName'] = $fillables->getTableName();
        $configuration['list'] = DTIngredients::get()->toArray();

        return view('admin.createform', $configuration);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ingredients
	 *
	 * @return Response
	 */
	public function store()
	{

	}

    public function adminStore()
    {
        $data = request()->all();

        DTIngredients::create($data);

        return redirect()->back();

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
        $fillables = new DTIngredients();

        $configuration['record'] = DTIngredients::find($id)->toArray();
        $configuration['tableName'] = $fillables->getTableName();


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

        if(DTIngredients::destroy($id)) {
            return '{"success":true}';
        }


	}

}