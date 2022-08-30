<?php

namespace App\Http\Controllers;

use Image;
use Exception;
use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Group;
use App\Models\Refill;
use App\Models\Category;
use App\Models\MedicalList;
use Illuminate\Http\Request;
use App\Models\WarningQuantity;
use App\Models\MedicalListPrice;
use App\Exports\MedicalListsExport;
use App\Imports\MedicalListsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class MedicalListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:medical-list|medical-list-create|medical-list-edit|medical-list-delete', ['only' => ['index','show']]);
         $this->middleware('permission:medical-list', ['only' => ['index']]);
         $this->middleware('permission:medical-list-create', ['only' => ['create','store']]);
         $this->middleware('permission:medical-list-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:medical-list-delete', ['only' => ['destroy']]);
         $this->middleware('permission:medical-list-excel-export', ['only' => ['export']]);
         $this->middleware('permission:medical-list-excel-import', ['only' => ['import']]);
         $this->middleware('permission:medical-list-refill', ['only' => ['refill']]);
         $this->middleware('permission:medical-list-expire',['only'=>['expiredList']]);
         $this->middleware('permission:medical-list-quantity',['only'=>['qtyList']]);
    }

    public function index(Request $request)
    {
        if($request->choose)
        {
            //dd($request->choose);
            $medicalLists = MedicalList::with('Category','refills')
                                ->where('category_id','LIKE',$request->choose.'%')
                                ->get();
            $categories = Category::all();
            $groups = Group::all();
            $warning_quantity = WarningQuantity::latest('id')->first();
        }

        elseif($request->choose_group)
        {
            //dd($request->choose);
            $medicalLists = MedicalList::with('Category','refills')
                                ->where('group_id','LIKE',$request->choose_group.'%')
                                ->get();
            $categories = Category::all();
            $groups = Group::all();
            $warning_quantity = WarningQuantity::latest('id')->first();
        }
        else{
            $medicalLists = MedicalList::all();
            $categories = Category::all();
            $groups = Group::all();
            $warning_quantity = WarningQuantity::latest('id')->first();
        }
        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function sortByNameAsc(){
        $medicalList = MedicalList::all();
        $medicalLists = $medicalList->sortBy('name');
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function sortByNameDesc(){
        $medicalList = MedicalList::all();
        $medicalLists = $medicalList->sortByDesc('name');
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function sortByQtyAsc(){
        $medicalList = MedicalList::all();
        $medicalLists = $medicalList->sortBy('total_qty');
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function sortByQtyDesc(){
        $medicalList = MedicalList::all();
        $medicalLists = $medicalList->sortByDesc('total_qty');
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function sortByPriceAsc(){
        $medicalList = MedicalList::all();
        $medicalLists = $medicalList->sortBy('price');
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function sortByPriceDesc(){
        $medicalList = MedicalList::all();
        $medicalLists = $medicalList->sortByDesc('price');
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function sortByExpAsc(){
        $medicalList = MedicalList::all();
        $medicalLists = $medicalList->sortBy('expired_date');
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function sortByExpDesc(){
        $medicalList = MedicalList::all();
        $medicalLists = $medicalList->sortByDesc('expired_date');
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        $groups = Group::all();
        return view('backend.medical_lists.create',compact('categories','units','groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }

        try {
            $medical_list = new MedicalList;
            if($request->file("photo")){
                $file = $request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path = public_path('icons/stock_photos');
                $file->move($path, $filename);

                $medical_list->photo = $filename;
                // $img = Image::make($file->path());
                // $img->resize(300, 300, function ($const) {
                // $const->aspectRatio();
                // })->save($path.'/'.$filename);
                // $file->move($path,$filename);

                // $medical_list->photo = $filename;
            }
            $medical_list->name = $request->name;
            $medical_list->qty = $request->qty;
            $medical_list->total_qty = $request->qty;
            $medical_list->start_date = $request->start_date;
            $medical_list->category_id = $request->category_id;
            $medical_list->group_id = $request->group_id;
            $medical_list->original_price = $request->original_price;
            // $medical_list->price = $request->price;
            $medical_list->expired_date = $request->expired_date;
            $medical_list->last_remaining = $request->last_remaining;
            $medical_list->last_remaining_qty = $request->last_remaining_qty;
            $medical_list->note = $request->note;
            $medical_list->save();

            if($medical_list)
            {
                for($i=0;$i<count($request['price']);$i++)
                {
                    $medical_list_price = new MedicalListPrice;
                    $medical_list_price->medical_list_id = $medical_list->id;
                    $medical_list_price->price = $request['price'][$i];
                    // $medical_list_price->unit = $request['unit_id'][$i];
                    $medical_list_price->save();
                }
            }

            return redirect()->route('medical-lists.index')
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
        $groups = Group::all();
        $medical_list_prices = MedicalListPrice::where('medical_list_id',$id)->get();
        // dd($medical_list_prices);
        return view('backend.medical_lists.edit',compact('medical_list','categories','medical_list_prices','groups'));
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
                $medical_list = MedicalList::find($id);
                $medical_list->name = $request->name;
                $medical_list->total_qty = $request->qty >= 0 ? $request->qty + (int)$medical_list->total_qty + $request->refill_qty : $medical_list->total_qty + $request->refill_qty;
                $medical_list->start_date = $request->start_date;
                $medical_list->category_id = $request->category_id;
                $medical_list->group_id = $request->group_id;
                $medical_list->expired_date = $request->expired_date;
                $medical_list->note = $request->note;
                $medical_list->save();

                $refill = new Refill;
                $refill->medical_list_id = $id;
                $refill->refill_qty = $request->refill_qty;
                $refill->refill_exp = $request->refill_exp;
                $refill->save();

                return redirect()->back()->with('success', 'Refill Successfully!');
            }else{
                $medical_list = MedicalList::find($id);
                // dd($request->file('photo'));
                if($medical_list->photo != null && $request->file('photo')){
                    if(file_exists(public_path('icons/stock_photos/'.$medical_list->photo))){

                        unlink('icons/stock_photos/'.$medical_list->photo);

                    }
                }

                if($request->file("photo")){
                    $file = $request->file("photo");
                    $filename = time().'_'.$file->getClientOriginalName();
                    $path = public_path('icons/stock_photos');
                    $file->move($path, $filename);

                    $medical_list->photo = $filename;
                    // $img = Image::make($file->path());
                    // $img->resize(300, 300, function ($const) {
                    // $const->aspectRatio();
                    // })->save($path.'/'.$filename);
                    // $file->move($path,$filename);

                    // $medical_list->photo = $filename;
                }

                $medical_list->name = $request->name;
                // $medical_list->qty = $request->qty;
                $medical_list->total_qty = $request->total_qty;
                $medical_list->start_date = $request->start_date;
                $medical_list->category_id = $request->category_id;
                $medical_list->group_id = $request->group_id;
                $medical_list->original_price = $request->original_price;
                $medical_list->price = $request->price;
                $medical_list->expired_date = $request->expired_date;
                $medical_list->last_remaining = $request->last_remaining;
                $medical_list->last_remaining_qty = $request->last_remaining_qty;
                $medical_list->note = $request->note;
                $medical_list->save();

                if(isset($request['price'])){
                    if(count($request['price'])>0){
                        for($i=0;$i<count($request['price']);$i++){
                            if(isset($request['medical_list_priceid'][$i])){
                                $additional['price'] = $request['price'][$i];
                                // $additional['unit'] = $request['unit_id'][$i];

                                $update_additional = MedicalListPrice::where('id',$request['medical_list_priceid'][$i])->update($additional);
                            }
                        }
                    }
                }

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
        $medical_list = MedicalList::find($id);
        if($medical_list->photo != null){
            if(file_exists(public_path('icons/stock_photos/'.$medical_list->photo))){

                unlink('icons/stock_photos/'.$medical_list->photo);

            }
        }

        MedicalList::where('id',$id)->delete();
        return redirect()->back();
    }

    public function refill(Request $request,$id){
        if($request->from_date && $request->to_date)
        {
            $medical_list = MedicalList::find($id);
            $categories = Category::all();

            $from_date = $request->from_date;
            $to_date = $request->to_date;

            $to_date = Carbon::parse($to_date)->addDays(1);
            $refills = Refill::where('medical_list_id',$id)
                        ->whereBetween('refill_exp', [$from_date, $to_date])
                        ->get();
        }else{
            $medical_list = MedicalList::find($id);
            $categories = Category::all();

            $refills = Refill::where('medical_list_id',$id)->get();

        }

        return view('backend.medical_lists.refill',compact('medical_list','categories','refills'));
    }

    // public function searchRefillDate(Request $request,$id){

    //     if($request->from_date && $request->to_date)
    //     {
    //         $medical_list = MedicalList::find($id);
    //         $categories = Category::all();

    //         $from_date = $request->from_date;
    //         $to_date = $request->to_date;

    //         $to_date = Carbon::parse($to_date)->addDays(1);
    //         $refills = Refill::where('medical_list_id',$id)
    //                     ->whereBetween('created_at', [$from_date, $to_date])
    //                     ->get();
    //     }else{
    //         $medical_list = MedicalList::find($id);
    //         $categories = Category::all();

    //         $refills = Refill::where('medical_list_id',$id)->get();

    //     return view('backend.medical_lists.refill',compact('medical_list','categories','refills'));
    //     }

    // }

    public function export()
    {
        return Excel::download(new MedicalListsExport, 'medical_list.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file;
        Excel::import(new MedicalListsImport,$file);
        return redirect()->back();
    }

    public function unitPlus(){
        $units = Unit::latest('id')->select('unit as id','unit as text')->get();
        return response()->json([
            'status' => 'success',
            'units' => $units,
        ]);
    }

    public function expiredList(){
        // dd(now()->format('Y-m-d'));

        $expired_lists = MedicalList::where('expired_date','<=',now())
                                        ->orwhere('expired_date','<=',Carbon::now()->addDays(10))
                                        ->get();
        $groups = Group::all();

        return view('backend.expired_medical_lists.expired',compact('expired_lists','groups'));
    }

    public function sortByExpListAsc(){
        $medical_lists = MedicalList::where('expired_date','<=',now())
                                        ->orwhere('expired_date','<=',Carbon::now()->addDays(10))
                                        ->get();

        $expired_lists = $medical_lists->sortBy('expired_date');
        $groups = Group::all();

        return view('backend.expired_medical_lists.expired',compact('expired_lists','groups'));
    }

    public function sortByExpListDesc(){
        $medical_lists = MedicalList::where('expired_date','<=',now())
                                        ->orwhere('expired_date','<=',Carbon::now()->addDays(10))
                                        ->get();

        $expired_lists = $medical_lists->sortByDesc('expired_date');
        $groups = Group::all();

        return view('backend.expired_medical_lists.expired',compact('expired_lists','groups'));
    }

    public function qtyList()
    {

        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $qty_lists = MedicalList::where('total_qty','<=',(int)$warning_quantity->yellow_warning)
                                    ->get();
        $groups = Group::all();

        return view('backend.qty_medical_lists.qty',compact('qty_lists','categories','warning_quantity','groups'));
    }

    public function sortByQtyListAsc(){

        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $medical_lists = MedicalList::where('total_qty','<=',(int)$warning_quantity->yellow_warning)
                                    ->get();

        $qty_lists = $medical_lists->sortBy('total_qty');
        $groups = Group::all();

        return view('backend.qty_medical_lists.qty',compact('qty_lists','categories','warning_quantity','groups'));
    }

    public function sortByQtyListDesc(){
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $medical_lists = MedicalList::where('total_qty','<=',(int)$warning_quantity->yellow_warning)
                                    ->get();

        $qty_lists = $medical_lists->sortByDesc('total_qty');
        $groups = Group::all();


        return view('backend.qty_medical_lists.qty',compact('qty_lists','categories','warning_quantity','groups'));
    }

    public function searchDate(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $medicalLists = MedicalList::whereBetween('start_date', [$from_date, $to_date])->get();
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function todaySearch()
    {
        $today = Carbon::now();
        $medicalLists = MedicalList::whereDate('start_date', $today)->get();
        $categories = Category::all();
        $groups = Group::all();
        $warning_quantity = WarningQuantity::latest('id')->first();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));
    }

    public function dateSearch(Request $request)
    {
        $date = $request->date;
        $medicalLists = MedicalList::whereDate('start_date', $date)->get();
        $categories = Category::all();
        $warning_quantity = WarningQuantity::latest('id')->first();
        $groups = Group::all();

        return view('backend.medical_lists.index',compact('medicalLists','warning_quantity','categories','groups'));

    }
}
