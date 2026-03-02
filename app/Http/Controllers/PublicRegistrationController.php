<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationEntry;
use Illuminate\Http\Request;

class PublicRegistrationController extends Controller
{
    public function show(Registration $registration)
    {
        if (!$registration->isOpen()) {
            abort(404, 'Pendaftaran tidak tersedia.');
        }

        return view('registrations.show', compact('registration'));
    }

    public function store(Request $request, Registration $registration)
    {
        if (!$registration->isOpen()) {
            abort(404, 'Pendaftaran sudah ditutup.');
        }

        // Build validation rules from form_fields
        $rules = [];
        foreach ($registration->form_fields as $field) {
            $fieldRules = [];
            if (!empty($field['required'])) {
                $fieldRules[] = 'required';
            }
            else {
                $fieldRules[] = 'nullable';
            }

            switch ($field['type']) {
                case 'email':
                    $fieldRules[] = 'email';
                    break;
                case 'number':
                    $fieldRules[] = 'numeric';
                    break;
                case 'file':
                    $fieldRules[] = 'file';
                    $fieldRules[] = 'max:4096';
                    break;
                case 'select':
                    if (!empty($field['options'])) {
                        $fieldRules[] = 'in:' . implode(',', $field['options']);
                    }
                    break;
                default:
                    $fieldRules[] = 'string';
                    $fieldRules[] = 'max:1000';
            }

            $rules['fields.' . $field['name']] = $fieldRules;
        }

        $validated = $request->validate($rules);

        // Handle file uploads
        $data = $validated['fields'] ?? [];
        foreach ($registration->form_fields as $field) {
            if ($field['type'] === 'file' && $request->hasFile('fields.' . $field['name'])) {
                $data[$field['name']] = $request->file('fields.' . $field['name'])
                    ->store('registration-files', 'public');
            }
        }

        RegistrationEntry::create([
            'registration_id' => $registration->id,
            'data' => $data,
        ]);

        return redirect()->route('registrations.show', $registration)
            ->with('success', 'Pendaftaran berhasil dikirim! Terima kasih.');
    }
}
