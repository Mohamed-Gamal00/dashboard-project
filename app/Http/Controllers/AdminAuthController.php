<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Profile\ProfileSettingsRepository;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    protected $profileSettingsRepository;

    public function __construct(ProfileSettingsRepository $repo)
    {
        $this->profileSettingsRepository = $repo;
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // Attempt to authenticate the admin
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $admin = Auth::guard('admin')->user();

            // Generate a token (using Laravel Sanctum)
            $token = $admin->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Logged in successfully.',
                'token' => $token,
                'admin' => $admin,
            ], 200)->cookie('auth_token', $token, 60 * 24, null, null, true, true);
        }

        // If authentication fails
        return ApiResponse::sendResponse(401, 'Invalid email or password.');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {

            if ($admin && Hash::check($request->password, $admin->password)) {
                $token = $admin->createToken('auth_token')->plainTextToken;
                $data = [
                    'token' => $token,
                ];

                return ApiResponse::sendResponse(200, 'Login Successfully', $data)->cookie('auth_token', $token, 60 * 24, null, null, true, true);
            }

            return ApiResponse::sendResponse(401, 'Login Failed', []);
        }
    }

    public function logout(Request $request)
    {
        // return $request->user();
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
            return ApiResponse::sendResponse(200, 'Logged out successfully');
        }

        // Handle cases where the user is not authenticated
        return ApiResponse::sendResponse(401, 'No authenticated user found');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6'
        ]);

        $data = $request->only(['old_password', 'new_password']);
        $id = Auth::user()->id;

        $changed = $this->profileSettingsRepository->changePassword($data, $id);


        if (!$changed) {
            return ApiResponse::sendResponse(401, 'الرقم السري الحالي غير صحيح');
        }
        return ApiResponse::sendResponse(200, 'تم تغيير الرقم السري بنجاح');
    }
}
