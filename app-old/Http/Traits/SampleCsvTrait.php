<?php

namespace App\Http\Traits;


trait SampleCsvTrait
{

    public function downloadCsv($filename, $header, $dummyrow)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $output = fopen('php://output', 'w');

        fputcsv($output, $header);
        fputcsv($output, $dummyrow);

        return response()->stream(
            function () use ($output) {
                fclose($output);
            },
            200,
            $headers
        )->send();
    }
}
