<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MedicalList;
use Illuminate\Http\Request;
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
        $medical_lists = MedicalList::latest('id')->paginate(9);
        // dd($medical_lists);
        return view('backend.medical_orders.order',compact('medical_lists'));
    }

    public function orderList()
    {
        $order_lists = Order::all();
        // dd($order_lists);
        return view('backend.order_lists.index',compact('order_lists'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $medical_lists = MedicalList::where('name','LIKE','%'.$search.'%')->latest('id')->paginate(9);

        return view('backend.medical_orders.order',compact('medical_lists'));
    }

    public function alphaSearch($alpha)
    {
        $medical_lists = MedicalList::where('name','LIKE','%'.$alpha.'%')->latest('id')->paginate(9);

        return view('backend.medical_orders.order',compact('medical_lists'));
    }

    public function orderTable()
    {
        $post = $_POST['orders'];
        $items = $post;
        $order_list = [];

        if (is_array($items) || is_object($items)) {
            foreach ($items as $item) {
                $medical_list = MedicalList::where("id", $item)->first();
                array_push($order_list, $medical_list);
            }
        }

        // $products = json_decode(json_encode($order_list));

        echo json_encode($order_list);
        exit;
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
        $order = serialize($post);

        Order::create([
            'order' => $order,
            // 'voucher' => "NEO" . '-' . date("Y").date("m").date("d").date("h").date("i").date("s"),
            "voucher" => $voucher,
        ]);

        echo json_encode($order);
        exit;
        // if($this->saveOrder($post))
        // {
        //     echo "Success";
        //     exit;
        // }else{
        //     echo "Fail";
        //     exit;
        // }

    }

    // $student->student_ref_no = "UM2-S" . $this->generate_numbers((int)$student->id,1,7) . "-" . date("Y");

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
