<?php

namespace App\Http\Controllers;

use App\Models\Voyant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;






class voyantController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:voyant-list|voyant-create|voyant-edit|voyant-delete', ['only' => ['index','show']]);
         $this->middleware('permission:voyant-create', ['only' => ['create','store']]);
         $this->middleware('permission:voyant-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:voyant-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    {
        // get all the voyants
        $voyants = Voyant::all();
        //$voyants = Voyant::latest()->paginate(5);


        // load the view and pass the voyants
        return View::make('voyants.index',compact('voyants'))
            ->with('voyants', $voyants);
           //->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('voyants.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'biography'      => 'required',
            'note' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('voyants/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $voyant = new voyant;
            $voyant->name       = $request->input('name');
            $voyant->biography      = $request->input('biography');
            $voyant->note = $request->input('note');
            $voyant->save();

            // redirect
            Session::flash('message', 'Voyant crée avec succès!');
            return Redirect::to('voyants');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the voyant
        $voyant = voyant::find($id);

        // show the view and pass the voyant to it
        return View::make('voyants.show')
            ->with('voyant', $voyant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the voyant
        $voyant = voyant::find($id);

        // show the edit form and pass the voyant
        return View::make('voyants.edit')
            ->with('voyant', $voyant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'biography'      => 'required',
            'note' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('voyants/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $voyant = voyant::find($id);
            $voyant->name       = $request->input('name');
            $voyant->biography      = $request->input('biography');
            $voyant->note = $request->input('note');
            $voyant->save();

            // redirect
            Session::flash('message', 'Voyant correctement mis à jour!');
            return Redirect::to('voyants');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $voyant = voyant::find($id);
        $voyant->delete();   

        // redirect
        Session::flash('message', 'Voyant supprimé avec succès!');
        return Redirect::to('voyants');
    }

}
