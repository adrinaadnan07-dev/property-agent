<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::with('project')->latest()->paginate(20);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,appointment_set,closed',
            'notes' => 'nullable|string',
        ]);

        $inquiry->update($validated);

        return redirect()->back()->with('success', 'Inquiry updated successfully.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry deleted successfully.');
    }
}
