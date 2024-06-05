<?php

namespace Modules\App\Services\LinkService;

use Illuminate\Support\Facades\Crypt;

class LinkGenerationService{

    // Generate payment link
    public function generatePaymentLink($token, $amount, $invoiceId)
    {
        // Encrypt the invoice_id
        $encryptedInvoiceId = Crypt::encryptString($invoiceId);

        // Payment link
        $paymentUrl = '';
        // $paymentUrl = env('APP_URL');
        $subdomain = current_company()->domain_name;

        // Base URL of the payment gateway
        $baseUrl = $this->prependSubdomainToUrl($subdomain, env('APP_URL').'/payment/pay');

        // Build query parameters
        $params = http_build_query([
            'token' => $token,
            'amount' => $amount,
            'invoice_id' => $encryptedInvoiceId
        ]);

        // Generate the full URL
        $paymentUrl = $baseUrl . '?' . $params;

        // Display the link
        return $paymentUrl;
    }

    // Apply the subdomain to the url
    private function prependSubdomainToUrl($subdomain, $url) {
        $parsedUrl = parse_url($url);

        if (!isset($parsedUrl['host'])) {
            return $url;
        }

        $newHost = $subdomain . '.' . $parsedUrl['host'];
        $newUrl = $parsedUrl['scheme'] . '://' . $newHost;

        if (isset($parsedUrl['port'])) {
            $newUrl .= ':' . $parsedUrl['port'];
        }

        if (isset($parsedUrl['path'])) {
            $newUrl .= $parsedUrl['path'];
        }

        if (isset($parsedUrl['query'])) {
            $newUrl .= '?' . $parsedUrl['query'];
        }

        if (isset($parsedUrl['fragment'])) {
            $newUrl .= '#' . $parsedUrl['fragment'];
        }

        return $newUrl;
    }

    // Decrypt the invoice_id
    public function decryptInvoiceId($encryptedInvoiceId)
    {
        try {
            $invoiceId = Crypt::decryptString($encryptedInvoiceId);
            return $invoiceId;
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return null;
        }
    }
}