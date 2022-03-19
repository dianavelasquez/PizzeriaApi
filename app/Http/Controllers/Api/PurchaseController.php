<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Http\Resources\PurchasesCollection;
use App\Http\Resources\PurchaseResource;
use Illuminate\Http\JsonResponse;
use App\Models\PurchaseDetail;
use App\Models\User;
use App\Models\Pizza;
use App\Models\Blend;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!is_null($user)){
            $purchases = Purchase::where('state',0)->where('user_id',$user->id)->get();
            return $purchases;
        }else{
            return "Cliente no encontrado";
        }
        
    }

    public function complete(Request $request){
       $request->validate([
            'email' =>'required',
        ]); 
       $user = User::updateOrCreate(['email' => $request->email], [
            'name' => $request->name,
        ]);

       if(!is_null($user)){
            $purchase = Purchase::where('user_id',$user->id)->where('state',1)->first();
            if(!is_null($purchase)){
                $purchase->state=0;
                $purchase->save();
                return $purchase;
            }else{
                return "No tiene pendientes";
            }


       }else{
        return 'No existe';
       }
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' =>'required',
            'pizza_id' => 'required',
            'amount' => 'required',
        ]);

        $user = User::updateOrCreate(['email' => $request->email], [
            'name' => $request->name,
            'user_type' => 2,
            'state' => 1,
        ]);
        if(!is_null($user))
        {
            $purchase = Purchase::where('user_id',$user->id)->where('state',1)->first();
            if(is_null($purchase)){
                $purchase = Purchase::create([
                    "user_id" => $user->id,
                    "total" => 0,
                    'state'=>1,
                    "order_num" => Purchase::count() + 1
                ]);
            }/*else{
                $purchase->total = $purchase->total+
            }*/
            if($request->type == 1){
                $pizza = Pizza::find($request->pizza_id);

                if(!is_null($pizza))
                {
                    $amount = $request->amount*$pizza->price;
                    $total = $purchase->total;
                    $purchase->total = $amount+$total;
                    $purchase->save();
                    $detail = PurchaseDetail::create([
                        "pizza_id" => $pizza->id,
                        "purchase_id" => $purchase->id,
                        "amount" => $request->amount,
                        "type" => 1,
                    ]);
                }
            }
            else{
                $pizza = Blend::find($request->pizza_id);

                if(!is_null($pizza))
                {
                    $amount = $request->amount*$pizza->price;
                    $total = $purchase->total;
                    $purchase->total = $amount+$total;
                    $purchase->save();
                    $detail = PurchaseDetail::create([
                        "pizza_id" => $pizza->id,
                        "purchase_id" => $purchase->id,
                        "amount" => $request->amount,
                        "type" => 2,
                    ]);
                }
            }
        }
        return $purchase;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
