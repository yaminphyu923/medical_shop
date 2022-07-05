<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Refill;
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
    }

    public function index()
    {
        $medical_lists = MedicalList::orderBy('expired_date','ASC')->paginate(9);
        // dd($medical_lists);
        return view('backend.medical_orders.order',compact('medical_lists'));
    }

    public function orderList()
    {
        $order_details = OrderDetail::all();
        // dd($order_lists);
        return view('backend.order_lists.index',compact('order_details'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $medical_lists = MedicalList::where('name','LIKE','%'.$search.'%')->orderBy('expired_date','ASC')->paginate(9);

        return view('backend.medical_orders.order',compact('medical_lists'));
    }

    public function alphaSearch($alpha)
    {
        $medical_lists = MedicalList::where('name','LIKE','%'.$alpha.'%')->orderBy('expired_date','ASC')->paginate(9);

        return view('backend.medical_orders.order',compact('medical_lists'));
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
