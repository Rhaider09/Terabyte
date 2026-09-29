<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    public function sendMessage(
        string $phone,
        string $message
    ): bool {

        // Remove spaces, +, -, brackets etc.
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Convert Pakistani number:
        // 03001234567
        // to:
        // 923001234567

        if (str_starts_with($phone, '0')) {
            $phone = '92' . substr($phone, 1);
        }

        $token = config('services.whatsapp.access_token');

        $phoneNumberId = config(
            'services.whatsapp.phone_number_id'
        );

        $version = config(
            'services.whatsapp.api_version',
            'v23.0'
        );

        // Check configuration
        if (!$token || !$phoneNumberId) {

            Log::error(
                'WhatsApp configuration is missing.'
            );

            return false;
        }

        // Meta WhatsApp Cloud API URL
        $url =
            "https://graph.facebook.com/"
            . $version
            . "/"
            . $phoneNumberId
            . "/messages";


        try {

            $response = Http::withToken($token)
                ->acceptJson()
                ->post($url, [

                    'messaging_product' => 'whatsapp',

                    'to' => $phone,

                    'type' => 'text',

                    'text' => [

                        'preview_url' => false,

                        'body' => $message,

                    ],

                ]);


            // Success
            if ($response->successful()) {

                Log::info(
                    'WhatsApp message sent successfully.',
                    [
                        'phone' => $phone,
                    ]
                );

                return true;
            }


            // API error
            Log::error(
                'WhatsApp API Error',
                [
                    'phone' => $phone,

                    'status' =>
                    $response->status(),

                    'response' =>
                    $response->json(),
                ]
            );

            return false;
        } catch (\Throwable $e) {

            Log::error(
                'WhatsApp Exception',
                [
                    'phone' => $phone,

                    'error' =>
                    $e->getMessage(),
                ]
            );

            return false;
        }
    }
}
