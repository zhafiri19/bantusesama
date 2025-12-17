<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;

class DonationController extends Controller
{

    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function index()
    {
        $donations = Donation::orderBy('id', 'ASC')->paginate(7);
        return view('welcome', compact('donations'));
    }

    public function create()
    {
        return view('donation');
    }

    public function store(Request $request)
    {
        $response = DB::transaction(function () use ($request) {
            // Save donation to database
            $donation = Donation::create([
                'donation_code' => 'SANDBOX-' . uniqid(),
                'donor_name' => $request->input('donor_name'),
                'donor_email' => $request->input('donor_email'),
                'donation_type' => $request->input('donation_type'),
                'amount' => floatval($request->input('amount')),
                'note' => $request->input('note'),
            ]);

            // Create transaction parameters
            $payLoad = [
                'transaction_details' => [
                    'order_id' => $donation->donation_code,
                    'gross_amount' => $donation->amount,
                ],
                'customer_details' => [
                    'first_name' => $donation->donor_name,
                    'email' => $donation->donor_email,
                ],
                'item_details' => [
                    [
                        'id' => $donation->donation_type,
                        'price' => $donation->amount,
                        'quantity' => 1,
                        'name' => ucwords(str_replace('_', ' ', $donation->donation_type))
                    ]
                ]
            ];

            // Get Snap token
            $snapToken = \Midtrans\Snap::getSnapToken($payLoad);
            $donation->update([
                'snap_token' => $snapToken,
            ]);
            return [
                'snap_token' => $snapToken,
            ];
        });
        return response()->json($response);
    }

    public function notification(Request $request)
    {
        try {
            $notif = new \Midtrans\Notification();

            DB::transaction(function () use ($notif) {

                $orderId = $notif->order_id;

                $donation = Donation::where('donation_code', $orderId)->first();

                if (!$donation) {
                    Log::warning('Donation not found', ['order_id' => $orderId]);
                    return;
                }

                switch ($notif->transaction_status) {
                    case 'capture':
                        if ($notif->payment_type === 'credit_card') {
                            if ($notif->fraud_status === 'challenge') {
                                $donation->setStatusPending();
                            } else {
                                $donation->setStatusSuccess();
                            }
                        }
                        break;

                    case 'settlement':
                        $donation->setStatusSuccess();
                        break;

                    case 'pending':
                        $donation->setStatusPending();
                        break;

                    case 'deny':
                    case 'cancel':
                        $donation->setStatusFailed();
                        break;

                    case 'expire':
                        $donation->setStatusExpired();
                        break;
                }
            });

            return response()->json(['status' => 'ok']);
        } catch (\Throwable $e) {
            Log::error('Midtrans Notification Error', [
                'message' => $e->getMessage()
            ]);

            return response()->json(['status' => 'error'], 500);
        }
    }
}
