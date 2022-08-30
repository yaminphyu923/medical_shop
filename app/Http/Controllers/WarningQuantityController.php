<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\WarningQuantity;

class WarningQuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:medical-list-warning-quantity', ['only' => ['index']]);
    // }
    public function index()
    {
        $warning_quantities = WarningQuantity::all();
        return view('backend.medical_lists.warning_quantities.index',compact('warning_quantities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->with('errorForm', $validator->errors()->getMessages())
        //         ->withInput();
        // }

        try {
            $warning_quantity = new WarningQuantity;
            $warning_quantity->yellow_warning = $request->yellow_warning;
            $warning_quantity->red_warning = $request->red_warning;
            $warning_quantity->save();

            return redirect()->back()
                ->with('success', 'Created successfully!');
        }
        catch (Exception $e){
            return redirect()->back()
                ->with('error', $e->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warning_quantity = WarningQuantity::findOrFail($id);
        return view('backend.medical_lists.warning_quantities.edit',compact('warning_quantity'));
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
        try {
            $warning_quantity = WarningQuantity::findOrFail($id);
            $warning_quantity->yellow_warning = $request->yellow_warning;
            $warning_quantity->red_warning = $request->red_warning;
            $warning_quantity->save();

            return redirect()->back()
                ->with('success', 'Updated successfully!');
        }
        catch (Exception $e){
            return redirect()->back()
                ->with('error', $e->getMessage());
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
        WarningQuantity::where('id',$id)->delete();
        return redirect()->back()->with('success','Deleted!');
    }
}
