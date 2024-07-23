<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Country;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\QueryBuilder\QueryBuilder;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('orders.index'), 'title' => 'Orders'],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $orders = QueryBuilder::for(Order::class)
            ->allowedSorts(['order_name','custom_order_id', 'customer_name', 'email', 'contact_no', 'city', 'quantity', 'total_price', 'country_id'])
            ->where(function ($query) use ($q) {
                $query->where('custom_order_id', 'like', "%$q%")
                    ->orWhere('order_name', 'like', "%$q%")
                    ->orWhere('customer_name', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhere('contact_no', 'like', "%$q%")
                    ->orWhere('city', 'like', "%$q%")
                    ->orWhere('shipping_address', 'like', "%$q%");
            })
            ->with('country')
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('orders.index', compact('orders', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('orders.index'), 'title' => 'Orders Create'],
        ];

        $countries = Country::all();
        $users = Auth::user()->hasRole('super-admin') ? User::all() : Auth::user();

        return view('orders.create', compact('breadcrumbs', 'countries', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)  : RedirectResponse
    {
        Order::create($request->validated());

        return to_route('orders.index')->with('message', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order) : View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('orders.index'), 'title' => 'Order Show'],
        ];
        $order->load('country','user');
        return view('orders.show', compact('breadcrumbs','order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order) : RedirectResponse
    {
        $order->delete();

        return to_route('orders.index')->with('message', 'Order deleted successfully.');
    }
}
