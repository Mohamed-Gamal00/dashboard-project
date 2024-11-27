<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        return 'test';
    }

 public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'ادخل العنوان',
            'description.required' => 'ادخل المحتوي',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        $url = 'https://fcm.googleapis.com/v1/projects/masar-2738d/messages:send';
        $FcmToken = [
            'eguVR6r6RSaVwZOsM99FPr:APA91bGCompo8PqReZ6sZo_iQPppf-u7ltcVdwsx4DYO3qPjFKiwMNak0IIoPMTjfKx9jzX4q4NvfL7d67TH9EhqNsS3duGvEniBixuG52YQIaqHAsYj08886NELCBYxbFomjlfhKfBE'
        ];

        $data = [
            "message" => [
                "token" => $FcmToken[0],
                "notification" => [
                    "title" => $request->title,
                    "body" => $request->description,
                ],
            ]
        ];

        $credentialsFilePath = public_path('json/masar-2738d-firebase-adminsdk-62o3v-9f7f60f563.json');
        if (!file_exists($credentialsFilePath)) {
            return response()->json(['error' => 'Firebase credentials file not found'], 404);
        }

        $client = new GoogleClient();
        $client->setAuthConfig($credentialsFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        try {
            $client->refreshTokenWithAssertion();
            $token = $client->getAccessToken();

            if (!isset($token['access_token'])) {
                return response()->json(['error' => 'Failed to retrieve access token'], 500);
            }

            $access_token = $token['access_token'];
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $headers = [
            "Authorization: Bearer $access_token",
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $result = curl_exec($ch);
        if ($result === FALSE) {
            return response()->json(['error' => 'Curl failed: ' . curl_error($ch)], 500);
        }

        $response = json_decode($result, true);
        curl_close($ch);

        if (isset($response['error'])) {
            return response()->json(['error' => $response], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Notification sent successfully',
            'response' => $response,
        ]);
    }
}
