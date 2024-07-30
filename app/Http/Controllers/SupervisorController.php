<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Warehouse;
use Spatie\QueryBuilder\QueryBuilder;

class SupervisorController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('q');
        $perPage = $request->input('per_page', 10);
        $sort = $request->input('sort', 'created_at');

        $user = $request->user();

        $warehouse = Warehouse::where('user_id', $user->id)->first();

        if ($warehouse) {
            $ordersQuery = QueryBuilder::for(Order::where('warehouse_id', $warehouse->id))
                ->allowedSorts([
                    'order_name', 'status', 'custom_order_id', 'customer_name',
                    'email', 'contact_no', 'city', 'quantity', 'total_price',
                    'country_id'
                ])
                ->where(function ($query) use ($searchQuery) {
                    $query->where('custom_order_id', 'like', "%$searchQuery%")
                        ->orWhere('order_name', 'like', "%$searchQuery%")
                        ->orWhere('customer_name', 'like', "%$searchQuery%")
                        ->orWhere('email', 'like', "%$searchQuery%")
                        ->orWhere('contact_no', 'like', "%$searchQuery%")
                        ->orWhere('city', 'like', "%$searchQuery%")
                        ->orWhere('shipping_address', 'like', "%$searchQuery%");
                })
                ->orderBy($sort, 'desc');

            $orders = $ordersQuery->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $searchQuery, 'sort' => $sort]);

            // Prepare breadcrumbs
            $breadcrumbs = [
                ['url' => route('dashboard'), 'title' => 'Home'],
                ['url' => route('supervisor.index'), 'title' => 'Warehouse'],
            ];

            return view('supervisor-home', compact('breadcrumbs', 'warehouse', 'orders'));
        }

        abort(404, 'Warehouse not found');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'orders.*.status' => 'required|in:pending,processing,delivered,cancelled,refunded,returned',
            'redirect_url' => 'required|url'
        ]);

        foreach ($request->input('orders', []) as $orderId => $status) {
            Order::where('id', $orderId)->update(['status' => $status['status']]);
        }

        return redirect($request->input('redirect_url'))->with('message', 'Order statuses updated successfully.');
    }
}
