<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBeritaRequest;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;


class BeritaController extends Controller
{
    public function index()
    {
        $search = request('search');

        $beritas = Berita::with('user')
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('judul', 'like', '%' . $search . '%')
                        ->orWhere('ringkasan', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        $totalBerita = Berita::count();

        $totalPublished = Berita::where('status', 'published')->count();

        $totalDraft = Berita::where('status', 'draft')->count();

        return view('admin.berita.index', compact(
            'beritas',
            'totalBerita',
            'totalPublished',
            'totalDraft'
        ));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(StoreBeritaRequest $request)
    {
        $data = $request->validated();

        $data['isi'] = Purifier::clean(
            $data['isi'],
            'berita'
        );

        $data['slug'] = $this->generateUniqueSlug($data['judul']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(StoreBeritaRequest $request, Berita $berita)
    {
        $data = $request->validated();

        $data['isi'] = Purifier::clean(
            $data['isi'],
            'berita'
        );

        if ($data['judul'] !== $berita->judul) {
            $data['slug'] = $this->generateUniqueSlug(
                $data['judul'],
                $berita->id
            );
        }

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Membuat slug unik.
     */
    private function generateUniqueSlug(
        string $judul,
        ?int $ignoreId = null
    ): string {

        $slug = Str::slug($judul);
        $originalSlug = $slug;

        $counter = 1;

        while (
            Berita::where('slug', $slug)
            ->when(
                $ignoreId,
                fn($query) => $query->where('id', '!=', $ignoreId)
            )
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
