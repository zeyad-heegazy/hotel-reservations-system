<?php

namespace App\Http\Controllers;

use App\Logging\ActivityLogger;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class LogsController extends Controller
{
    public function __construct(
        private readonly ActivityLogger $activityLogger
    )
    {
    }

    public function index(): View
    {
        $logs = $this->activityLogger->getAllLogs();

        return view('logs.index', compact('logs'));
    }
}
