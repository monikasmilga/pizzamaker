<?php namespace App\Http\Controllers;

use App\models\DTCheeses;
use Illuminate\Routing\Controller;

class DTCheesesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /cheeses
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    /**
     * Display a listing of the resource.
     * GET /cheeses
     *
     * @return Response
     */
    public function adminIndex()
    {
        $configuration['list']=DTCheeses::get()->toArray();
        $configuration['routeShow']='app.cheeses.show';
        $configuration['routeEdit']='app.cheeses.edit';
        return view("admin-list", $configuration);
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /cheeses/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

    /**
     * Show the form for creating a new resource.
     * GET /cheeses/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        //
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /cheeses
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
     * Store a newly created resource in storage.
     * POST /cheeses
     *
     * @return Response
     */
    public function adminStore()
    {
        //
    }
	/**
	 * Display the specified resource.
	 * GET /cheeses/{id}
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
	 * GET /cheeses/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function adminShow($id)
	{
        return view('admin-single');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /cheeses/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

    /**
     * Show the form for editing the specified resource.
     * GET /cheeses/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
	public function adminEdit($id)
	{
        return view('admin-single');
    }

	/**
	 * Update the specified resource in storage.
	 * PUT /cheeses/{id}
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
	 * PUT /cheeses/{id}
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
	 * DELETE /cheeses/{id}
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
	 * DELETE /cheeses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
        DTCheeses::destroy($id);
        return '{"success":true}';
	}

}