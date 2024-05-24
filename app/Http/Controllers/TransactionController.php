<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EmPresaleIco;

class TransactionController extends Controller
{
    public function handleTransaction(Request $request)
    {
        // Validation des données d'entrée
        $validatedData = $request->validate([
            'transaction_id' => 'required|string|max:255',
            'walletid' => 'required|string|max:255',
            'usdvalue' => 'required|numeric',
            'typecrypto' => 'required|string|in:BNB,ETH,USDT,MATIC,CARD',
            'tokensquantity' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        // Insertion des données dans la base de données
        EmPresaleIco::create([
            'transaction_id' => $validatedData['transaction_id'],
            'wallet_id' => $validatedData['walletid'],
            'usdvalue' => $validatedData['usdvalue'],
            'tokensquantity' => $validatedData['tokensquantity'],
            'amoutbought' => $validatedData['amount'],
            'typecrypto' => $validatedData['typecrypto'],
        ]);

        return response()->json(['message' => 'Transaction recorded successfully'], 200);
    }

    public function handleEmail(Request $request)
    {
        // Validation des données d'entrée
        $validatedData = $request->validate([
            'transaction_id' => 'required|string|max:255',
            'walletid' => 'required|string|max:255',
            'email' => 'required|email|max:120',
        ]);

        // Insertion ou mise à jour des données dans la base de données
        EmPresaleIco::updateOrCreate(
            ['transaction_id' => $validatedData['transaction_id']],
            [
                'wallet_id' => $validatedData['walletid'],
                'email' => $validatedData['email'],
            ]
        );

        return response()->json(['message' => 'Email recorded successfully'], 200);
    }
}
