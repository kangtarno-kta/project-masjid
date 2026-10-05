<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeritaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check()
            && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'ringkasan' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'isi' => [
                'required',
                'string',
                'min:1',
            ],

            'gambar' => [
                'nullable',
                'file',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul berita wajib diisi.',
            'judul.max' => 'Judul berita maksimal 255 karakter.',

            'ringkasan.max' => 'Ringkasan maksimal 1000 karakter.',

            'isi.required' => 'Isi berita wajib diisi.',

            'gambar.file' => 'File gambar tidak valid.',
            'gambar.image' => 'File yang diupload harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',

            'status.required' => 'Status berita wajib dipilih.',
            'status.in' => 'Status berita tidak valid.',
        ];
    }
}
