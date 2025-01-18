<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Helper\ApiResponse;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $usersCount = User::count();
        $messagesCount = ContactUs::count();
        $adminsCount = Admin::count();
        $mainCurrency = DB::table('currencies')->select('name_ar')->where('default_currency', true)->first();

        $data = [
            $productsCount,
            $ordersCount,
            $usersCount,
            $messagesCount,
            $adminsCount,
            $mainCurrency
        ];
        return ApiResponse::sendResponse(200, 'Data Retrieved Successfuly', $data);
    }
}
