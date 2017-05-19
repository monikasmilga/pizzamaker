<?php namespace App\Http\Controllers;

use App\models\DTCheeses;
use App\models\DTIngredients;
use App\models\DTPads;
use App\models\DTPizzas;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DTPizzasController extends BaseAPIController {

	/**
	 * Display a listing of the resource.
	 * GET /pizzas
	 *
	 * @return Response
	 */

    public function index()
    {
        $dataFromModel = new DTPizzas();

        $configuration['list'] = DTPizzas::get()->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();

        if($configuration['list'] == [])
        {
            $configuration['error'] = ['message' => trans("Create some " . $configuration['tableName'] . ", then go to list")];
            return view('front-end.list', $configuration);
        }

        return view('front-end.list', $configuration);
    }

	public function adminIndex()
	{
        $dataFromModel = new DTPizzas();

	    $configuration['list'] = DTPizzas::get()->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();

        if($configuration['list'] == [])
        {
            $configuration['error'] = ['message' => trans("Create some " . $configuration['tableName'] . ", then go to list")];
            return view('admin.list', $configuration);
        }

		return view('admin.list', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pizzas/create
	 *
	 * @return Response
	 */
	public function create()
    {
        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        unset($configuration['fields'][6]);
        array_push($configuration['fields'], "ingredients");
        array_push($configuration['fields'], "comment");

        $configuration['cache'] = cache()->get('super-ingredient');

        return view('front-end.createform', $configuration);
    }

    public function adminCreate()
    {
        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        unset($configuration['fields'][6]);
        array_push($configuration['fields'], "ingredients");
        array_push($configuration['fields'], "comment");

        $configuration['cache'] = cache()->get('super-ingredient');

        return view('admin.createform', $configuration);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pizzas
	 *
	 * @return Response
	 */
	public function store()
    {
        $data = request()->all();

        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        $configuration['cache'] = cache()->get('super-ingredient');

        unset($configuration['fields'][6]);
        array_push($configuration['fields'], "ingredients");
        array_push($configuration['fields'], "comment");

        $missingValuesNot= '';
        $missingValues= '';
        foreach($configuration['fields'] as $key=> $value) {
            if ($value == 'comment'){}
            elseif ($value == 'calories'){}
            elseif ($value == 'user_id'){}

            elseif (!isset($data[$value])) {
                $missingValues = $missingValues . ' ' . $value . ',';
            }

            elseif ($value == 'ingredients' and sizeOf($data[$value]) > 3)
            {
                $configuration['error'] = ['message' => trans("Please add up to 3 ingredients")];
                return view('front-end.createform', $configuration);
            }
        }
        if ($missingValues  != $missingValuesNot){
            $missingValues = substr($missingValues, 1, -1);
            $configuration['error'] = ['message' => trans('Please enter ' . $missingValues)];
            return view('front-end.createform', $configuration);
        }

        $pad_calories = array_sum(DB::table('dt_pads')->where('id', '=', $data['pads_id'])->select('calories')->get()->pluck('calories')->toArray());
        $cheeses_calories = array_sum(DB::table('dt_cheeses')->where('id', '=', $data['cheeses_id'])->select('calories')->get()->pluck('calories')->toArray());

        $ingredients_calories = 0;
        foreach ($data['ingredients'] as $ingredient)
        {
            $ingredient_calories = DB::table('dt_ingredients')->where('id', '=', $ingredient)->select('calories')->get()->pluck('calories')->toArray();
            $ingredients_calories+= array_sum($ingredient_calories);
        }

        $data['calories'] = $pad_calories + $cheeses_calories + $ingredients_calories;

        $record = DTPizzas::create($data);

        $record->connection()->sync($data['ingredients']);

        $configuration['comment'] = ['message' => trans(substr($configuration['tableName'], 0, -1) . ' added successfully')];
        return view('front-end.createform',  $configuration);

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

        $configuration['cache'] = cache()->get('super-ingredient');

        unset($configuration['fields'][6]);
        array_push($configuration['fields'], "ingredients");
        array_push($configuration['fields'], "comment");

        $missingValuesNot= '';
        $missingValues= '';
        foreach($configuration['fields'] as $key=> $value) {
            if ($value == 'comment'){}
            elseif ($value == 'calories'){}
            elseif ($value == 'user_id'){}

            elseif (!isset($data[$value])) {
                $missingValues = $missingValues . ' ' . $value . ',';
            }

            elseif ($value == 'ingredients' and sizeOf($data[$value]) > 3)
            {
                $configuration['error'] = ['message' => trans("Please add up to 3 ingredients")];
                return view('admin.createform', $configuration);
            }
        }
        if ($missingValues  != $missingValuesNot){
            $missingValues = substr($missingValues, 1, -1);
            $configuration['error'] = ['message' => trans('Please enter ' . $missingValues)];
            return view('admin.createform', $configuration);
        }

        $pad_calories = array_sum(DB::table('dt_pads')->where('id', '=', $data['pads_id'])->select('calories')->get()->pluck('calories')->toArray());
        $cheeses_calories = array_sum(DB::table('dt_cheeses')->where('id', '=', $data['cheeses_id'])->select('calories')->get()->pluck('calories')->toArray());

        $ingredients_calories = 0;
        foreach ($data['ingredients'] as $ingredient)
        {
            $ingredient_calories = DB::table('dt_ingredients')->where('id', '=', $ingredient)->select('calories')->get()->pluck('calories')->toArray();
            $ingredients_calories+= array_sum($ingredient_calories);
        }

        $data['calories'] = $pad_calories + $cheeses_calories + $ingredients_calories;

        $record = DTPizzas::create($data);

        $record->connection()->sync($data['ingredients']);

        $configuration['comment'] = ['message' => trans(substr($configuration['tableName'], 0, -1) . ' added successfully')];
        return view('admin.createform',  $configuration);

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
        $dataFromModel = new DTPizzas();

        $configuration['record'] = DTPizzas::find($id)->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();


        return view('front-end.single', $configuration);
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
	 * GET /pizzas/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        $configuration['record'] = DTPizzas::find($id)->toArray();
        $configuration['pizza'] = DTPizzas::find($id);

        $configuration['pizzas_ingredients']= $configuration['pizza']->pizzasConnections->pluck('ingredients_id')->toArray();

        unset($configuration['fields'][6]);
        array_push($configuration['fields'], "ingredients");
        array_push($configuration['fields'], "comment");

        return view('front-end.editform', $configuration);
    }

	public function adminEdit($id) 
	{
        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        $configuration['record'] = DTPizzas::find($id)->toArray();
        $configuration['pizza'] = DTPizzas::find($id);

        $configuration['pizzas_ingredients']= $configuration['pizza']->pizzasConnections->pluck('ingredients_id')->toArray();

        unset($configuration['fields'][6]);
        array_push($configuration['fields'], "ingredients");
        array_push($configuration['fields'], "comment");

        return view('admin.editform', $configuration);

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
        $data = request()->all();

        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        unset($configuration['fields'][6]);
        array_push($configuration['fields'], "ingredients");
        array_push($configuration['fields'], "comment");

        $missingValuesNot= '';
        $missingValues= '';
        foreach($configuration['fields'] as $key=> $value) {
            if ($value == 'comment'){}
            elseif ($value == 'calories'){}
            elseif ($value == 'user_id'){}

            elseif (!isset($data[$value])) {
                $missingValues = $missingValues . ' ' . $value . ',';
            }

            elseif ($value == 'ingredients' and sizeOf($data[$value]) > 3)
            {
                $configuration['error'] = ['message' => trans("Please add up to 3 ingredients")];
                return view('front-end.createform', $configuration);
            }
        }
        if ($missingValues  != $missingValuesNot){
            $missingValues = substr($missingValues, 1, -1);
            $configuration['error'] = ['message' => trans('Please enter ' . $missingValues)];
            return view('front-end.createform', $configuration);
        }

        $pad_calories = array_sum(DB::table('dt_pads')->where('id', '=', $data['pads_id'])->select('calories')->get()->pluck('calories')->toArray());
        $cheeses_calories = array_sum(DB::table('dt_cheeses')->where('id', '=', $data['cheeses_id'])->select('calories')->get()->pluck('calories')->toArray());

        $ingredients_calories = 0;
        foreach ($data['ingredients'] as $ingredient)
        {
            $ingredient_calories = DB::table('dt_ingredients')->where('id', '=', $ingredient)->select('calories')->get()->pluck('calories')->toArray();
            $ingredients_calories+= array_sum($ingredient_calories);
        }

        $data['calories'] = $pad_calories + $cheeses_calories + $ingredients_calories;

        $record = DTPizzas::find($id);
        $data = request()->all();
        $record->update($data);

        $record->connection()->sync($data['ingredients']);

        $configuration['comment'] = ['message' => trans(substr($configuration['tableName'], 0, -1) . ' update successfull')];
        return view('front-end.createform',  $configuration);

    }

	public function adminUpdate($id) 
	{
        $data = request()->all();

        $dataFromModel = new DTPizzas();
        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['dropdown']['pads_id']=DTPads::all()->pluck('name', 'id')->toArray();
        $configuration['dropdown']['cheeses_id']=DTCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['checkbox']['ingredients']=DTIngredients::all()->pluck('name', 'id')->toArray();

        unset($configuration['fields'][6]);
        array_push($configuration['fields'], "ingredients");
        array_push($configuration['fields'], "comment");

        $missingValuesNot= '';
        $missingValues= '';
        foreach($configuration['fields'] as $key=> $value) {
            if ($value == 'comment'){}
            elseif ($value == 'calories'){}
            elseif ($value == 'user_id'){}

            elseif (!isset($data[$value])) {
                $missingValues = $missingValues . ' ' . $value . ',';
            }

            elseif ($value == 'ingredients' and sizeOf($data[$value]) > 3)
            {
                $configuration['error'] = ['message' => trans("Please add up to 3 ingredients")];
                return view('admin.createform', $configuration);
            }
        }
        if ($missingValues  != $missingValuesNot){
            $missingValues = substr($missingValues, 1, -1);
            $configuration['error'] = ['message' => trans('Please enter ' . $missingValues)];
            return view('admin.createform', $configuration);
        }

        $pad_calories = array_sum(DB::table('dt_pads')->where('id', '=', $data['pads_id'])->select('calories')->get()->pluck('calories')->toArray());
        $cheeses_calories = array_sum(DB::table('dt_cheeses')->where('id', '=', $data['cheeses_id'])->select('calories')->get()->pluck('calories')->toArray());

        $ingredients_calories = 0;
        foreach ($data['ingredients'] as $ingredient)
        {
            $ingredient_calories = DB::table('dt_ingredients')->where('id', '=', $ingredient)->select('calories')->get()->pluck('calories')->toArray();
            $ingredients_calories+= array_sum($ingredient_calories);
        }

        $data['calories'] = $pad_calories + $cheeses_calories + $ingredients_calories;

        $record = DTPizzas::find($id);
        $data = request()->all();
        $record->update($data);

        $record->connection()->sync($data['ingredients']);

        $configuration['comment'] = ['message' => trans(substr($configuration['tableName'], 0, -1) . ' update successfull')];
        return view('admin.createform',  $configuration);

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
        if (DTPizzas::destroy($id)) {
            return json_encode(["success" => true, "id" => $id]);
        }
    }

    public function adminDestroy($id)
    {
        if (DTPizzas::destroy($id)) {
            return json_encode(["success" => true, "id" => $id]);
        }
	}

}