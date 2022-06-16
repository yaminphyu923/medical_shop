<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Models\MedicalList;
use Illuminate\Http\Request;
use App\Models\WarningQuantity;
use Illuminate\Support\Facades\Validator;

class MedicalListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalLists = MedicalList::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.medical_lists.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }

        try {
            $customer = new MedicalList;
            $customer->name = $request->name;
            $customer->qty = $request->qty;
            $customer->start_date = $request->start_date;
            $customer->category_id = $request->category_id;
            $customer->price = $request->price;
            $customer->expired_date = $request->expired_date;
            $customer->last_remaining = $request->last_remaining;
            $customer->last_remaining_qty = $request->last_remaining_qty;
            $customer->note = $request->note;
            $customer->save();

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
        $medical_list = MedicalList::find($id);
        $categories = Category::all();
        return view('backend.medical_lists.edit',compact('medical_list','categories'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }

        try {
            if($request->refill_qty)
            {
                $customer = MedicalList::find($id);
                $customer->name = $request->name;
                $customer->qty += $request->refill_qty;
                $customer->start_date = $request->start_date;
                $customer->category_id = $request->category_id;
                $customer->price = $request->price;
                $customer->expired_date = $request->expired_date;
                $customer->note = $request->note;
                $customer->save();

                return redirect()->back()->with('success', 'Refill Successfully!');
            }else{
                $customer = MedicalList::find($id);
                $customer->name = $request->name;
                $customer->qty = $request->qty;
                $customer->start_date = $request->start_date;
                $customer->category_id = $request->category_id;
                $customer->price = $request->price;
                $customer->expired_date = $request->expired_date;
                $customer->last_remaining = $request->last_remaining;
                $customer->last_remaining_qty = $request->last_remaining_qty;
                $customer->note = $request->note;
                $customer->save();

                return redirect()->back()->with('success', 'Updated successfully!');
            }


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
        MedicalList::where('id',$id)->delete();
        return 'success';
    }

    public function refill($id){
        $medical_list = MedicalList::find($id);
        $categories = Category::all();
        return view('backend.medical_lists.refill',compact('medical_list','categories'));
    }
}
