<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::latest();
        $transactions = $this->filterResults($request, $transactions);
        $transactions = $transactions->paginate(10);
        return view('backend.transaction.index', compact('transactions'));
    }

    protected function filterResults($request, $transactions)
    {
        $request->validate([
            'q' => 'nullable|min:3|max:40'
        ]);

        if ($request !== null && $request->has('status') && $request['status'] == 'initial') {
            $transactions = $transactions->where('status', '=', 'initial');
        } elseif ($request !== null && $request->has('status') && $request['status'] == 'failed') {
            $transactions = $transactions->where('status', '=', 'failed');
        } elseif ($request !== null && $request->has('status') && $request['status'] == 'completed') {
            $transactions = $transactions->where('status', '=', 'completed');
        }
        elseif ($request !== null && $request->has('status') && $request['status'] == 'pending') {
            $transactions = $transactions->where('status', '=', 'pending');
        }
        return $transactions;
    }

    public function show($id)
    {
        $transactions = Transaction::findOrFail($id);
        return view('backend.transaction.show', compact('transactions'));
    }
}
