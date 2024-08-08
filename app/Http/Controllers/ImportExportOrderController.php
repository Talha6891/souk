<?php

namespace App\Http\Controllers;

use App\Exports\SampleFormatExport;
use App\Imports\OrdersImport;
use App\Models\Order;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            'file' => 'required|file|mimes:csv,xlsx,xls|max:10240',
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new OrdersImport, $file);

            return redirect()->route('orders.import')
                ->with('message', 'Orders imported successfully.');
        } catch (ValidationException $e) {
            // Handle validation exceptions
            return redirect()->route('orders.import')
                ->with('error', 'Validation failed for some rows.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle SQL exceptions
            if ($e->getCode() === '23000') {
                $errorMessage = 'A duplicate entry was found. Please check your file for duplicate order IDs.';
            } else {
                $errorMessage = 'An unexpected database error occurred.';
            }

            return redirect()->route('orders.import')
                ->with('error', $errorMessage);
        } catch (LaravelExcelException $e) {
            // Handle Excel specific exceptions
            return redirect()->route('orders.import')
                ->with('error', 'An error occurred while importing the file: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle general exceptions
            return redirect()->route('orders.import')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }



        // download sample format
        public function downloadSample()
        {
            return Excel::download(new SampleFormatExport, 'sample-format.xlsx');
        }

}
