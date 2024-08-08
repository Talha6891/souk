<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class SampleFormatExport implements FromArray
{
    /**
    * @return array
    */
    public function array(): array
    {
        return [
            ['order_name', 'user_id', 'custom_order_id', 'customer_name', 'email', 'contact_no', 'city', 'shipping_address', 'country_id', 'quantity', 'total_price', 'product_id', 'warehouse_id'],
            ['Order 1', 2, 'ORD001', 'Jane Smith', 'jane.smith@example.com', '1234567890', 'Los Angeles', '123 Maple St', 1, 5, 100.00, 101, 1],
            ['Order 2', 3, 'ORD002', 'John Doe', 'john.doe@example.com', '9876543210', 'New York', '456 Oak Ave', 2, 3, 75.00, 102, 2],
            ['Order 3', 2, 'ORD003', 'Emily Johnson', 'emily.johnson@example.com', '1122334455', 'Chicago', '789 Pine Rd', 1, 10, 200.00, 103, 3],
            ['Order 4', 3, 'ORD004', 'Michael Brown', 'michael.brown@example.com', '6677889900', 'Houston', '321 Cedar Dr', 2, 2, 50.00, 104, 1],
            ['Order 5', 2, 'ORD005', 'Alice Davis', 'alice.davis@example.com', '3344556677', 'San Francisco', '654 Elm St', 3, 7, 140.00, 105, 2],
        ];
    }
}
