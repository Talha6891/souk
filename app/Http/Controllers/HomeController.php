<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }

        $user = auth()->user();

        // Handle user roles
        if ($user->hasRole('client')) {
            $breadcrumbs = [
                ['url' => route('dashboard'), 'title' => 'Home'],
            ];
            $users  = auth()->user();
            $orders = Order::where('user_id', $user->id)->paginate(10);
            return view('client-home', compact('breadcrumbs', 'orders','users'));

        }
         elseif ($user->hasRole('supervisor')) {
            $breadcrumbs = [
                ['url' => route('dashboard'), 'title' => 'Home'],
            ];

            $warehouse = Warehouse::where('user_id', $user->id)->first();

            if ($warehouse) {
                $orders = Order::where('warehouse_id', $warehouse->id)->paginate(10);
                return view('supervisor-home', compact('breadcrumbs', 'warehouse', 'orders'));
            }

            return abort(404);
        }

        return view('index');
    }
}
