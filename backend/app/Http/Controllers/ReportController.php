<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{
    public function generateEmployeeTicketReport(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $tickets = Ticket::whereBetween('delivery_date', [$startDate, $endDate])
            ->select('employee_id', DB::raw('count(*) as total_tickets'))
            ->groupBy('employee_id')
            ->with('employee')
            ->get();

        $totalTickets = $tickets->sum('total_tickets');

        return response()->json([
            'tickets_by_employee' => $tickets,
            'total_tickets' => $totalTickets,
        ]);
    }
}
