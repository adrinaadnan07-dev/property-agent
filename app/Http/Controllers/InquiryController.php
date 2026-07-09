<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Project;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'monthly_salary' => 'nullable|numeric|min:0',
            'approval_status' => 'nullable|string',
            'message' => 'nullable|string',
            'appointment_date' => 'nullable|date',
            'budget' => 'nullable|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'inquiry_type' => 'nullable|string|max:50',
        ]);

        $inquiry = Inquiry::create($validated);

        $whatsappNumber = env('AGENT_PHONE', '60123456789');
        $project = $inquiry->project;
        $projectTitle = $project ? $project->title : 'Property';

        $message = "Hi! Saya $inquiry->name ingin tahu lebih lanjut mengenai $projectTitle.\n\n";
        if ($inquiry->monthly_salary) {
            $message .= "Gaji Bulanan: RM" . number_format($inquiry->monthly_salary, 0) . "\n";
        }
        if ($inquiry->budget) {
            $message .= "Budget Rumah: RM" . number_format($inquiry->budget, 0) . "\n";
        }
        if ($inquiry->location) {
            $message .= "Lokasi Pilihan: $inquiry->location\n";
        }
        if ($inquiry->approval_status) {
            $message .= "Status Kelulusan: " . strtoupper($inquiry->approval_status) . "\n\n";
        }
        $message .= "Boleh saya dapatkan maklumat lanjut dan buat temujanji?";

        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . urlencode($message);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'whatsapp_url' => $whatsappUrl,
                'message' => 'Inquiry submitted successfully!',
            ]);
        }

        return redirect($whatsappUrl);
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'salary' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $salary = $request->salary;
        $price = $request->price;

        $loanAmount = $price * 0.9;
        $interestRate = 0.04;
        $loanTenure = 35;
        $monthlyRate = $interestRate / 12;
        $numPayments = $loanTenure * 12;

        $monthlyInstallment = $loanAmount * ($monthlyRate * pow(1 + $monthlyRate, $numPayments)) / (pow(1 + $monthlyRate, $numPayments) - 1);

        $dsr = ($monthlyInstallment / $salary) * 100;
        $maxDsr = 70;
        $isApproved = $dsr <= $maxDsr && $salary >= 2000;

        return response()->json([
            'approved' => $isApproved,
            'monthly_installment' => round($monthlyInstallment, 2),
            'dsr_percentage' => round($dsr, 2),
            'max_dsr' => $maxDsr,
            'loan_amount' => round($loanAmount, 2),
            'salary' => $salary,
        ]);
    }
}
