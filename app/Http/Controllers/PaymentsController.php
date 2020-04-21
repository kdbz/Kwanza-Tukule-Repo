<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
require  '../vendor/autoload.php'; 
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Payment;
use Auth;
class PaymentsController extends Controller
{
    public function push()
    {
      $billing = DB::table('payments')->where('customer_id',Auth::user()->id)->latest('created_at')->first();
      $username   = "sandbox";
      $apikey     = "150b694a1d2bfa41ea80879397b517103780f4e84cdae5f7cc6e354b0ff6873a";

            // Initialize the SDK
      $AT         = new AfricasTalking($username, $apikey);

      // Get the payments service
      $payments   = $AT->payments();

      // Set the name of your Africa's Talking payment product
      $productName  = "Kwanza Tukule";

      // Set the phone number you want to send to in international format
      $user = User::find(Auth::user()->id);
      $phoneNumber  = "$user->number";

      // Set The 3-Letter ISO currency code and the checkout amount
      $currencyCode = "KES";
      $amount       = $billing->totals;

      // Set any metadata that you would like to send along with this request.
      // This metadata will be included when we send back the final payment notification
      $metadata = [
          "agentId"   => "654",
          "productId" => "321"
      ];

      // Thats it, hit send and we'll take care of the rest.
      try {
          $result = $payments->mobileCheckout([
              "productName"  => $productName,
              "phoneNumber"  => $phoneNumber,
              "currencyCode" => $currencyCode,
              "amount"       => $amount,
              "metadata"     => $metadata
          ]);

          return redirect('/complete')->with('success', 'Payment has Been Sent!');
      } catch(Exception $e) {
          echo "Error: ".$e->getMessage();
          return redirect('/')->with('danger', '$e->getMessage()');
      }
    }



}






    