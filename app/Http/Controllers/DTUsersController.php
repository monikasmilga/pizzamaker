<?php namespace App\Http\Controllers;

use App\models\DTUsers;
use Illuminate\Routing\Controller;

class DTUsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */

    public function index()
    {

	}

	public function adminIndex()
	{
        $dataFromModel = new DTUsers();

	    $configuration['list'] = DTUsers::get()->toArray();
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
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{

	}

    public function adminCreate()
    {

        $dataFromModel = new DTUsers();


        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();
        $configuration['list'] = DTUsers::get()->toArray();

        return view('admin.createform', $configuration);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{

	}

    public function adminStore()
    {
        $data = request()->all();
        $dataFromModel = new DTUsers();

        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        foreach($configuration['fields'] as $key=> $value) {
            if (!isset($data[$value])) {
                $configuration['error'] = ['message' => trans('Please enter ' . $value)];
                return view('admin.createform', $configuration);
            }
        }

        DTUsers::create($data);
        $configuration['comment'] = ['message' => trans('Record added successfully')];
        return view('admin.createform',  $configuration);

	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
        $dataFromModel = new DTUsers();

        $configuration['record'] = DTUsers::find($id)->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();


        return view('admin.single', $configuration);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
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