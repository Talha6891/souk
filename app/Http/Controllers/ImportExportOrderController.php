<?php

namespace App\Http\Controllers;

use App\Imports\OrdersImport;
use App\Models\Order;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Exceptions\LaravelExcelException;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class ImportExportOrderController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function show(): View
    {
        $this->authorize('importFile', Order::class);
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('orders.import'), 'title' => 'Import Orders'],
        ];

        return view('order_import_or_export.import-orders', compact('breadcrumbs'));
    }

    /**
     * @throws AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('importFile', Order::class);

        // Validate file
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx|max:10240',
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new OrdersImport, $file);

            return redirect()->route('orders.import')
                ->with('message', 'Orders imported successfully.');
        } catch (ValidationException $e) {
            // Handle validation exceptions
            $failures = $e->failures();
            $errorMessages = [];

            foreach ($failures as $failure) {
                foreach ($failure->errors() as $error) {
                    $errorMessages[] = "Row {$failure->row()}: " . $error;
                }
            }

            return redirect()->route('orders.import')
                ->with('message', 'Validation failed for some rows.')
                ->with('errorDetails', $errorMessages);
        } catch (LaravelExcelException $e) {
            // Handle Excel specific exceptions
            return redirect()->route('orders.import')
                ->with('message', 'An error occurred while importing the file: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle general exceptions
            return redirect()->route('orders.import')
                ->with('message', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
