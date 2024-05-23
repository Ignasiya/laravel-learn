<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class DataLogger
{
    private $start_time;

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->start_time = microtime(true);
        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        if (env('API_DATALOGGER', true)) {
            if (env('API_DATALOGGER_USE_DB', true)) {
                $endTime = microtime(true);
                $log = new Log();
                $log->duration = number_format($endTime = LARAVEL_START, 3);
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save();
            } else {
                $endTime = microtime(true);
                $filename = 'api_datalogger_' . date('d-m-y') . '.log';
                $dataToLog = 'Time: ' . gmdate('F j, Y, g:i m') . PHP_EOL;
                $dataToLog .= 'Duration: ' . number_format($endTime = LARAVEL_START, 3) . PHP_EOL;
                $dataToLog .= 'IP Address: ' . $request->ip() . PHP_EOL;
                $dataToLog .= 'URL: ' . $request->fullUrl() . PHP_EOL;
                $dataToLog .= 'Method: ' . $request->method() . PHP_EOL;
                $dataToLog .= 'Input: ' . $request->getContent() . PHP_EOL;
                File::append(storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog);
            }
        }
    }
}
