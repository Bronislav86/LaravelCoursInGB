<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class DataLogger
{
    private $start_time;

    public function handle(Request $request, Closure $next): Response
    {
        $this->start_time = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response)
    {

        if (env('API_DATALOGGER', true)) {
            $duration = microtime(true) - LARAVEL_START;

            if (env('API_DATALOGGER_USE_DB', true)) {
                $log = new Log();
                $log->time = now();
                $log->duration = $duration;
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save();
            } else {
                $filename = 'api_datalogger_' . date('d-m-Y') . '.log';
                $dataToLog = 'Time: ' . now()->toDateTimeString() . "\n";
                $dataToLog .= "Duration: " . number_format($duration, 3) . "\n";
                $dataToLog .= "IP Address: " . $request->ip() . "\n";
                $dataToLog .= "URL: " . $request->fullUrl() . "\n";
                $dataToLog .= "Method: " . $request->method() . "\n";
                $dataToLog .= "Input: " . $request->getContent() . "\n";

                File::append(
                    storage_path('logs' . DIRECTORY_SEPARATOR . $filename),
                    $dataToLog . "\n" . str_repeat("*", 20) . "\n\n"
                );
            }
        }
    }
}
