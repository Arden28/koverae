<?php

namespace Modules\App\Services\Files;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class FileDownloadService{

    /**
     * Download a file from storage.
     *
     * @param  string  $filePath
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadFile($filePath)
    {
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found.');
        }

        return Storage::disk('public')->download($filePath);
    }

    /**
     * Generate and download a PDF file.
     *
     * @param  string  $fileName
     * @param  \Illuminate\View\View|string  $view
     * @param  array  $data
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadPdf($fileName, $view, $data = [], $size = 'a4')
    {
        try{

            $pdf = Pdf::loadView($view, $data)->setPaper($size);

            $fileName = str_replace('/', '_', $fileName);

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output(); // Echo download contents directly...
            }, $fileName. '.pdf'); //replace / by _

        } catch (\Exception $e) {
            Log::error('Error generating invoice PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }

    }
}