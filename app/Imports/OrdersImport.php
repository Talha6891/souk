<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Order|null
     */
    public function model(array $row): Model|Order|null
    {
        $user = Auth::user();
        $userId = $user->hasRole('super-admin') ? $row['user_id'] : $user->id;

        return new Order([
            'user_id' => $userId,
            'custom_order_id' => $row['custom_order_id'],
            'customer_name' => $row['customer_name'],
            'email' => $row['email'],
            'contact_no' => $row['contact_no'],
            'city' => $row['city'],
            'shipping_address' => $row['shipping_address'],
            'country_id' => $row['country_id'],
            'quantity' => $row['quantity'],
            'total_price' => $row['total_price'],
            'product_id' => $row['product_id'],
        ]);
    }
}
