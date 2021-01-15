<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{
    public function index(){

    	$amount = rand(10,999);
    	\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    	$intent = \Stripe\PaymentIntent::create([
    		'amount'=>($amount)*100,
    		'currency'=>'INR',
    		'metadata'=>['integration_check'=>'accept_a_payment']
    	]);

    	$data = array(
    			'name'=>'Bukchod Programmer',
    			'email'=>'bukchodprogrammer@gmail.com',
    			'amount'=>$amount,
    			'client_secret'=>$intent->client_secret,
    			);
    	return view('stripe',['data'=>$data]);
    }

    public function success(){
    	return view('success');
    }
}
