<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::withCount('entries')->orderByDesc('id')->get();
        return view('admin.registrations.index', compact('registrations'));
    }

    public function create()
    {
        return view('admin.registrations.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'banner' => 'nullable|image|max:2048',
            'open_date' => 'nullable|date',
            'close_date' => 'nullable|date|after_or_equal:open_date',
            'is_active' => 'nullable|boolean',
            'form_fields' => 'required|array|min:1',
            'form_fields.*.name' => 'required|string',
            'form_fields.*.label' => 'required|string',
            'form_fields.*.type' => 'required|in:text,email,number,textarea,select,file',
            'form_fields.*.required' => 'nullable|boolean',
            'form_fields.*.options' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);
        $data['is_active'] = $request->boolean('is_active', true);

        // Clean form_fields
        $data['form_fields'] = collect($data['form_fields'])->map(function ($f) {
            return [
            'name' => Str::slug($f['name'], '_'),
            'label' => $f['label'],
            'type' => $f['type'],
            'required' => !empty($f['required']),
            'options' => !empty($f['options']) ? array_map('trim', explode(',', $f['options'])) : [],
            ];
        })->toArray();

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('registrations', 'public');
        }

        Registration::create($data);

        return redirect()->route('admin.registrations.index')->with('success', 'Pendaftaran berhasil dibuat.');
    }

    public function edit(Registration $registration)
    {
        return view('admin.registrations.form', compact('registration'));
    }

    public function update(Request $request, Registration $registration)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'banner' => 'nullable|image|max:2048',
            'open_date' => 'nullable|date',
            'close_date' => 'nullable|date|after_or_equal:open_date',
            'is_active' => 'nullable|boolean',
            'form_fields' => 'required|array|min:1',
            'form_fields.*.name' => 'required|string',
            'form_fields.*.label' => 'required|string',
            'form_fields.*.type' => 'required|in:text,email,number,textarea,select,file',
            'form_fields.*.required' => 'nullable|boolean',
            'form_fields.*.options' => 'nullable|string',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        $data['form_fields'] = collect($data['form_fields'])->map(function ($f) {
            return [
            'name' => Str::slug($f['name'], '_'),
            'label' => $f['label'],
            'type' => $f['type'],
            'required' => !empty($f['required']),
            'options' => !empty($f['options']) ? array_map('trim', explode(',', $f['options'])) : [],
            ];
        })->toArray();

        if ($request->hasFile('banner')) {
            if ($registration->banner)
                Storage::disk('public')->delete($registration->banner);
            $data['banner'] = $request->file('banner')->store('registrations', 'public');
        }

        $registration->update($data);

        return redirect()->route('admin.registrations.index')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function destroy(Registration $registration)
    {
        if ($registration->banner)
            Storage::disk('public')->delete($registration->banner);
        $registration->delete();

        return redirect()->route('admin.registrations.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    public function entries(Registration $registration)
    {
        $entries = $registration->entries()->latest()->get();
        return view('admin.registrations.entries', compact('registration', 'entries'));
    }
}
