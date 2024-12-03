<?php

namespace App\Http\Controllers\User;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Exception\CardException;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Exception\InvalidRequestException;

class StripePaymentController extends Controller
{
    /**
     * Packages
     *
     * @return void
     */
    public function packageList()
    {
        $this->data['packages'] =  Package::get();
        return view('user.payment.package_list', $this->data);
    }

    /**
     * Payment in package wise
     *
     * @return void
     */
    public function paymentForm($package_id)
    {
        $this->data['package'] =  Package::find($package_id);

        return view('user.payment.stripe_payment', $this->data);
    }
    /**
     * Create Stripe Charge
     *
     * @param Request $request
     * @param [type] $package_id
     * @return void
     */
    public function createCharge(Request $request, $package_id)
    {
        $payablePackage =  Package::find($package_id);

        Stripe::setApiKey(config('stripe.sk'));
        try {
            Charge::create([
                "amount" => $payablePackage->amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Blogen Payment"
            ]);

            $user = Auth::user();
            Payment::create([
                "user_id" => $user->id,
                "package_id" =>  $payablePackage->id,
                "amount" => $payablePackage->amount,
                "credits" => $payablePackage->credits,
                "payment_method" => "Card"
            ]);
            $user->balance += $payablePackage->credits;
            $user->expire_date = Carbon::now()->addDays($payablePackage->duration);
            $user->save();

            Session::flash('success', "Payment processed successfully and {$payablePackage->credits} credits has been added.");
            return redirect()->route('user');
        } catch (CardException $e) {
            Session::flash('error', "Payment error! " .  $e->getMessage());
        } catch (InvalidRequestException $e) {
            Session::flash('error', "Invalid request! " .  $e->getMessage());
        } catch (Exception $e) {
            Session::flash('error', "Another problem occurred, maybe unrelated to Stripe." .  $e->getMessage());
        }
        return redirect()->back();
    }

    /**
     *
     * Show Payments in SingeUser
     *
     */
    public function paymentList()
    {
        $this->data['payments'] = Payment::where('user_id', Auth::user()->id)->latest('id')->simplePaginate(15);

        return view('user.payment.payment_list', $this->data);
    }
}
