<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Refill;
use App\Helpers\Voucher;
use App\Models\Customer;
use App\Models\MedicalList;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\MedicalListPrice;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:medical-order-list', ['only' => ['index']]);
        $this->middleware('permission:order-list', ['only' => ['orderList']]);
        $this->middleware('permission:voucher-list',['only'=>['voucherList']]);
    }

    public function index()
    {
        $medical_lists = MedicalList::where('total_qty','>',0)
                                    ->orderBy('expired_date','ASC')->paginate(9);
        $customers = Customer::latest('id')->get();

        return view('backend.medical_orders.order_lara',compact('medical_lists','customers'));
    }

    public function calIndex()
    {
        $medical_lists = MedicalList::where('total_qty','>',0)
                                    ->orderBy('expired_date','ASC')->paginate(9);
        $customers = Customer::latest('id')->get();

        $order = Order::latest('id')->first();
        // dd($order);

        $order_details = OrderDetail::where('order_id',$order->id)->get();
        $grand_total = OrderDetail::where('order_id',$order->id)->sum('total');

        return view('backend.medical_orders.order_cal',compact('medical_lists','customers','order','order_details','grand_total'));
    }

    public function addSessionCart($id){

        $medical_list = MedicalList::findorFail($id);
        $medical_list_price = MedicalListPrice::where('medical_list_id',$id)->get();
        //dd($medical_list_price);
        $cart = session()->get('cart');
        $cart[$medical_list->id] = array(
            "id" => $medical_list->id,
            "name" => $medical_list->name,
            "prices" => $medical_list_price,
            "expired_date" => $medical_list->expired_date,
            "qty" => 1,
        );
        session()->put('cart', $cart);
        session()->flash('success','Added Successfully!');

        return redirect()->back();
    }

    public function addQty(Request $request,$id)
    {
        dd($request->all());
        $cart = session()->get('cart');
        //dd($cart);
        foreach ($request->all() as $id => $val)
        {
            //dd($val);
            if ($val > 0) {
                $cart[$id]['qty'] += $val;
            } else {
                unset($cart[$id]);
            }
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeSessionCart($id){

        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();

        session()->forget('cart');
        return redirect()->back();

}

    public function orderList()
    {
        $order_details = OrderDetail::with('order','customer')->get();
        // dd($order_lists);
        return view('backend.order_lists.index',compact('order_details'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $medical_lists = MedicalList::where('name','LIKE',$search.'%')->orderBy('expired_date','ASC')->paginate(9);

        return view('backend.medical_orders.order_lara',compact('medical_lists'));
    }

    public function alphaSearch($alpha)
    {
        $medical_lists = MedicalList::where('name','LIKE',$alpha.'%')->orderBy('expired_date','ASC')->paginate(9);

        return view('backend.medical_orders.order_lara',compact('medical_lists'));
    }

    public function calSearch(Request $request)
    {
        $search = $request->search;

        $medical_lists = MedicalList::where('total_qty','>',0)->where('name','LIKE',$search.'%')->orderBy('expired_date','ASC')->paginate(9);

        $customers = Customer::latest('id')->get();

        $order = Order::latest('id')->first();
        // dd($order);

        $order_details = OrderDetail::where('order_id',$order->id)->get();
        $grand_total = OrderDetail::where('order_id',$order->id)->sum('total');

        return view('backend.medical_orders.order_cal',compact('medical_lists','customers','order','order_details','grand_total'));
    }

    public function calAlphaSearch($alpha)
    {
        $medical_lists = MedicalList::where('total_qty','>',0)->where('name','LIKE',$alpha.'%')->orderBy('expired_date','ASC')->paginate(9);

        $customers = Customer::latest('id')->get();

        $order = Order::latest('id')->first();
        // dd($order);

        $order_details = OrderDetail::where('order_id',$order->id)->get();
        $grand_total = OrderDetail::where('order_id',$order->id)->sum('total');
        return view('backend.medical_orders.order_cal',compact('medical_lists','customers','order','order_details','grand_total'));
    }

    public function searchDate(Request $request)
    {

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $endDate = Carbon::parse($endDate)->addDays(1);
        $order_details = OrderDetail::whereBetween('created_at', [$startDate, $endDate])
                    ->get();
        // dd($patient);

        return view('backend.order_lists.index',compact('order_details'));
    }

    public function orderTable()
    {
        $post = $_POST['orders'];
        $items = $post;
        $order_list = [];
        $refill_list = [];
        $order_list_price = [];

        if (is_array($items) || is_object($items)) {
            foreach ($items as $item) {
                $medical_list = MedicalList::where("id", $item)->first();
                // $medical_list->quantity = 1;
                if($medical_list){
                    $refill = Refill::where("medical_list_id",$medical_list->id)->get();
                    $medical_list_price = MedicalListPrice::where("medical_list_id",$medical_list->id)->get();
                    array_push($order_list, $medical_list);
                    array_push($refill_list,$refill);
                    array_push($order_list_price,$medical_list_price);
                    }
            }
        }

        // $products = json_decode(json_encode($order_list));

        // echo json_encode($order_list);
        // exit;

        return response()->json([
            'order_list' => $order_list,
            'refills' => $refill_list,
            'order_list_prices' => $order_list_price
        ]);
    }

    // public function generate_numbers($start, $count, $digits) {

	// 	for ($n = $start; $n < $start+$count; $n++) {

	// 		$result = str_pad($n, $digits, "0", STR_PAD_LEFT);

	// 	}
	// 	return $result;
	// }

    public function payOut()
    {

        $post = $_POST['items'];
        $voucher = $_POST['voucher'];
        $total_amount = $_POST['total_amount'];
        // $show_total = $_POST['showTotal'];
        $qtys = $_POST['qtys'];

        $medical_list_id = $_POST['medical_list_id'];
        // dd($medical_list_id[0]);

        // $medical = implode(" ",$medical_list);

        // $medical_list_id = explode(" ",$medical);

        // dd($medical_list_id);
        // die();
        // $medical_list_intval = array_map('intval', $medical_list);
        // dd($medical_list_intval);

        //$medical_list_id = array_values($medical_list_intval);




        // $medical_count = count($medical_list_id);
        // $medical_list_id = array_slice($medical_list_id,2);

        // $order = serialize($post);

        // $qt = serialize($qtys);

        $order = new Order;
        $order->voucher = $voucher;
        $order->total_amount = $total_amount;
        $order->save();

        if($order)
        {
            foreach($medical_list_id as $key=>$pt){
                //dd($medical_list_id[$key]);
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->medical_list_id = $pt;
                $order_detail->qty = $qtys[$key];
                $order_detail->save();

                $med_list = MedicalList::where('id',$pt)->first();
                $med_list->total_qty = (int)$med_list->total_qty - (int)$qtys[$key];
                $med_list->save();
            }
        }

        return response()->json([
            // 'order' => $post,
            //'voucher' => $voucher,
            //'total_amount' => $total_amount,
            'quantity' => $qtys,
            'medical_list_id' => $medical_list_id,
            // 'show_total' => $show_total,
        ]);

    }

    public function checkout(Request $request)
    {
        dd($request->all());
    }

    public function saveOrder($orders)
    {
        $order = serialize($orders);
        return true;
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
    public function generate_numbers($start, $count, $digits) {

		for ($n = $start; $n < $start+$count; $n++) {

			$result = str_pad($n, $digits, "0", STR_PAD_LEFT);

		}
		return $result;
	}

    public function store(Request $request)
    {
        // dd($request->all());

        $order = new Order;
        $order->voucher = '#'.Voucher::voucherNumber();
        $order->customer_id = $request->customer_id;
        $order->debt_money = $request->debt_money;
        $order->debt = $request->debt;
        $order->pay_money = $request->pay_money;
        $order->status = 0;
        $order->save();

        if($order)
        {
            for($i=0;$i<count($request['medical_id']);$i++)
            {
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->medical_list_id = $request['medical_id'][$i];
                $order_detail->price = $request['price'][$i];
                $order_detail->qty = $request['qty'][$i];
                $order_detail->total = (int)$request['price'][$i] * (int)$request['qty'][$i];
                $order_detail->customer_id = $request->customer_id;
                $order_detail->status = 0;
                $order_detail->save();

                $med_list = MedicalList::where('id',$request['medical_id'][$i])->first();
                $med_list->total_qty = (int)$med_list->total_qty - (int)$request['qty'][$i];
                $med_list->save();
            }
        }
        session()->forget('cart');
        return redirect()->route('order-calculation');
    }

    public function orderUpdate(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->customer_id = $request->customer_id;
        $order->debt_money = $request->debt_money;
        $order->debt = $request->debt;
        $order->pay_money = $request->pay_money;
        $order->save();

        if($order){
            $order_detail = OrderDetail::where('order_id',$id)->latest('id')->first();

            $order_detail->customer_id = $request->customer_id;

            $order_detail->save();
        }

        return redirect()->route('print-page');
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
        //
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
        //dd($request->status);
        $order = Order::findOrFail($id);

        $order->status = 1;
        $order->save();

        $order_details = OrderDetail::where('order_id',$id)->get();
        //dd($order_details);
        foreach($order_details as $order_detail)
        {
            $order_detail->status = 1;
            $order_detail->save();
        }


        return redirect()->back();

        // dd($request->order_id);
        // $order = Order::findOrFail($request->order_id);
        // $order->status = 1;
        // $order->save();

        // $order_details = OrderDetail::where('order_id',$id)->get();

        // foreach($order_details as $order_detail)
        // {
        //     $order_detail->status = 1;
        //     $order_detail->save();
        // }


        // return redirect()->back();
    }

    public function savePermanentUpdate(Request $request, $id)
    {

        //dd($request->status);
        $order = Order::findOrFail($id);

        $order->status = 1;
        $order->save();

        $order_details = OrderDetail::where('order_id',$id)->get();
        //dd($order_details);
        foreach($order_details as $order_detail)
        {
            $order_detail->status = 1;
            $order_detail->save();
        }


        return redirect()->back();
    }

    public function orderUpdating(Request $request, $id)
    {
        //dd($id);
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        $order_details = OrderDetail::where('order_id',$id)->get();
        //dd($order_details);
        foreach($order_details as $order_detail)
        {
            $order_detail->status = $request->status;
            $order_detail->save();
        }


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        OrderDetail::where('order_id',$id)->delete();
        return redirect()->back();

    }

    public function checkedDelete(Request $request)
    {
        if($request->id)
        {
            $id = $request->id;
            foreach($id as $d)
            {
                Order::where('id',$d)->delete();
                OrderDetail::where('order_id',$d)->delete();

            }
        }

        return redirect()->back();
    }

    public function delete()
    {
        // $orders = Order::where('status','!=',1)->where('created_at','<',Carbon::now()->subMonth(1))->get();
        // $order_details = OrderDetail::where('status','!=',1)->where('created_at','<',Carbon::now()->subMonth(1))->get();
        // foreach ($orders as $order) {
        //     $order->delete();
        // }

        // foreach ($order_details as $order_detail) {
        //     $order_detail->delete();
        // }

        $orders = Order::where('status','!=',1)->where('created_at','<',Carbon::now()->subMonth(1))->get();
        $order_details = OrderDetail::where('status','!=',1)->where('created_at','<',Carbon::now()->subMonth(1))->get();
        foreach ($orders as $order) {
            $order->delete();
        }

        foreach ($order_details as $order_detail) {
            $order_detail->delete();
        }

        return redirect()->back();
    }

    public function print()
    {
        $post = $_POST['items'];
        $voucher = $_POST['voucher'];
        $total_amount = $_POST['total_amount'];
        $qtys = $_POST['qtys'];

        $medical_list_id = $_POST['medical_list_id'];

        // foreach($medical_list_id as $key=>$pt){
        //     $med_list = MedicalList::where('id',$pt)->first();
        //     $med_list->total_qty = (int)$med_list->total_qty - (int)$qtys[$key];
        //     $med_list->save();
        // }

        $order = new Order;
        $order->voucher = $voucher;
        $order->total_amount = $total_amount;
        $order->save();

        if($order)
        {
            foreach($medical_list_id as $key=>$pt){
                //dd($medical_list_id[$key]);
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->medical_list_id = $pt;
                $order_detail->qty = $qtys[$key];
                $order_detail->save();

                $med_list = MedicalList::where('id',$pt)->first();
                $med_list->total_qty = (int)$med_list->total_qty - (int)$qtys[$key];
                $med_list->save();
            }
        }

        return response()->json([
            // 'order' => $post,
            //'voucher' => $voucher,
            //'total_amount' => $total_amount,
            'quantity' => $qtys,
            'medical_list_id' => $medical_list_id,
            // 'show_total' => $show_total,
        ]);

        // return view('backend.medical_orders.print',compact('qtys','medical_list_id','voucher','total_amount'));
    }

    public function printPage()
    {
        $order = Order::latest('id')->first();
        // dd($order);

        $order_details = OrderDetail::where('order_id',$order->id)->get();
        $grand_total = OrderDetail::where('order_id',$order->id)->sum('total');
        return view('backend.medical_orders.order_lara_print',compact('order','order_details','grand_total'));
    }

    public function a4PrintPage()
    {
        $order = Order::latest('id')->first();
        // dd($order);

        $order_details = OrderDetail::where('order_id',$order->id)->get();
        $grand_total = OrderDetail::where('order_id',$order->id)->sum('total');
        return view('backend.medical_orders.order_lara_a4print',compact('order','order_details','grand_total'));
    }

    public function voucherList()
    {
        $orders = Order::with('medicalList','customer')->latest('id')->get();
        return view('backend.voucher_lists.index',compact('orders'));
    }

    public function noteList()
    {
        $orders = Order::with('medicalList','customer')
                        ->whereNotNull('debt_money')
                        ->where('debt_money','!=',0)
                        ->latest('id')
                        ->get();
        return view('backend.voucher_lists.debt_money_list',compact('orders'));
    }

    public function debtList()
    {
        $orders = Order::with('medicalList','customer')
                        ->whereNotNull('pay_money')
                        ->latest('id')
                        ->get();
        return view('backend.voucher_lists.pay_money_list',compact('orders'));
    }

    public function orderCalculation()
    {
        $medical_lists = MedicalList::where('total_qty','>',0)
                                    ->orderBy('expired_date','ASC')->paginate(9);
        $customers = Customer::latest('id')->get();

        $order = Order::latest('id')->first();
        // dd($order);

        $order_details = OrderDetail::where('order_id',$order->id)->get();

        $grand_total = OrderDetail::where('order_id',$order->id)->sum('total');

        return view('backend.medical_orders.order_cal',compact('medical_lists','customers','order','order_details','grand_total'));
    }
}
