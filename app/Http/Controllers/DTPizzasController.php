<?php namespace App\Http\Controllers;

use App\models\DTCheeses;
use App\models\DTIngredients;
use App\models\DTPads;
use App\models\DTPizzas;
use Illuminate\Routing\Controller;

class DTPizzasController extends BaseAPIController {

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
        $dataFromModel = new DTPizzas();

	    $configuration['list'] = DTPizzas::get()->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();

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
        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        array_push($configuration['fields'], "ingredients");

        return view('admin.createform2', $configuration);
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

        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        $missingValues= 'Please enter';
        foreach($configuration['fields'] as $key=> $value) {
            if ($value == 'comment'){}

            elseif (!isset($data[$value])) {
                $missingValues = $missingValues . ' ' . $value . ',';
            }
        }
        if (strlen($missingValues) > 12){
            $missingValues = substr($missingValues, 0, -1);
            $configuration['error'] = ['message' => trans($missingValues)];
            return view('admin.createform2', $configuration);
        }

        DTPizzas::create($data);
        $configuration['comment'] = ['message' => trans('Record added successfully')];
        return view('admin.createform',  $configuration);

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
        $dataFromModel = new DTPizzas();

        $configuration['record'] = DTPizzas::find($id)->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();


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
		
	}

	public function adminEdit($id) 
	{

		return view('admin.editform');

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
		
	}

	public function adminUpdate($id) 
	{

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

        if(DTPizzas::destroy($id)) {
            return '{"success":true}';
        }


	}

}