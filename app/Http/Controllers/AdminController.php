<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Potensi;
use App\Models\Statistik;
use App\Models\Profil;
use App\Models\Kontak;
use App\Models\Wilayah;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }

    // Potensi CRUD
    public function potensi()
    {
        $potensi = Potensi::all();
        return view('admin.potensi', compact('potensi'));
    }

    public function potensiCreate()
    {
        return view('admin.potensi-create');
    }

    public function potensiStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|string|in:pertanian,peternakan,kerajinan,lainnya',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $gambarPath = str_replace('images/', '', $gambarPath);
        }

        Potensi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.potensi')->with('success', 'Potensi berhasil ditambahkan');
    }

    public function potensiEdit($id)
    {
        $potensi = Potensi::findOrFail($id);
        return view('admin.potensi-edit', compact('potensi'));
    }

    public function potensiUpdate(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|string|in:pertanian,peternakan,kerajinan,lainnya',
        ]);

        $potensi = Potensi::findOrFail($id);

        $gambarPath = $potensi->gambar; // Keep existing image if no new one uploaded
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $gambarPath = str_replace('images/', '', $gambarPath);
        }

        $potensi->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.potensi')->with('success', 'Potensi berhasil diperbarui');
    }

    public function potensiDestroy($id)
    {
        $potensi = Potensi::findOrFail($id);
        $potensi->delete();

        return redirect()->route('admin.potensi')->with('success', 'Potensi berhasil dihapus');
    }

    // Statistik CRUD
    public function statistik()
    {
        $statistik = Statistik::first();
        return view('admin.statistik', compact('statistik'));
    }

    public function statistikUpdate(Request $request)
    {
        $request->validate([
            'jumlah_penduduk' => 'required|integer',
            'jenis_kelamin' => 'required|array',
            'pekerjaan' => 'required|array',
            'kelompok_umur' => 'required|array',
            'populasi_dusun' => 'required|array',
        ]);

        $statistik = Statistik::first();
        if ($statistik) {
            $statistik->update($request->all());
        } else {
            Statistik::create($request->all());
        }

        return redirect()->route('admin.statistik')->with('success', 'Statistik berhasil diperbarui');
    }

    // Profil CRUD
    public function profil()
    {
        $profil = Profil::first();
        return view('admin.profil', compact('profil'));
    }

    public function profilUpdate(Request $request)
    {
        $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $profil = Profil::first();
        if ($profil) {
            $profil->update($request->all());
        } else {
            Profil::create($request->all());
        }

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui');
    }

    // Kontak CRUD
    public function kontak()
    {
        $kontak = Kontak::first();
        return view('admin.kontak', compact('kontak'));
    }

    public function kontakUpdate(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'email' => 'required|email',
        ]);

        $kontak = Kontak::first();
        if ($kontak) {
            $kontak->update($request->all());
        } else {
            Kontak::create($request->all());
        }

        return redirect()->route('admin.kontak')->with('success', 'Kontak berhasil diperbarui');
    }

    // Wilayah CRUD
    public function wilayah()
    {
        $wilayah = Wilayah::first();
        return view('admin.wilayah', compact('wilayah'));
    }

    public function wilayahUpdate(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_gmaps' => 'nullable|url',
        ]);

        $wilayah = Wilayah::first();

        $gambarPath = $wilayah ? $wilayah->gambar : null; // Keep existing image if no new one uploaded
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $gambarPath = str_replace('images/', '', $gambarPath);
        }

        $data = [
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'link_gmaps' => $request->link_gmaps,
        ];

        if ($wilayah) {
            $wilayah->update($data);
        } else {
            Wilayah::create($data);
        }

        return redirect()->route('admin.wilayah')->with('success', 'Wilayah berhasil diperbarui');
    }

    // Struktur Organisasi CRUD
    public function struktur()
    {
        $struktur = StrukturOrganisasi::with('atasan')->get();
        return view('admin.struktur', compact('struktur'));
    }

    public function strukturCreate()
    {
        $struktur = StrukturOrganisasi::all();
        return view('admin.struktur-create', compact('struktur'));
    }

    public function strukturStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'atasan_id' => 'nullable|exists:struktur_organisasi,id',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('images', 'public');
            $fotoPath = str_replace('images/', '', $fotoPath);
        }

        StrukturOrganisasi::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath,
            'atasan_id' => $request->atasan_id,
        ]);

        return redirect()->route('admin.struktur')->with('success', 'Anggota struktur organisasi berhasil ditambahkan');
    }

    public function strukturEdit($id)
    {
        $anggota = StrukturOrganisasi::findOrFail($id);
        $struktur = StrukturOrganisasi::where('id', '!=', $id)->get();
        return view('admin.struktur-edit', compact('anggota', 'struktur'));
    }

    public function strukturUpdate(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'atasan_id' => 'nullable|exists:struktur_organisasi,id',
        ]);

        $anggota = StrukturOrganisasi::findOrFail($id);

        $fotoPath = $anggota->foto; // Keep existing photo if no new one uploaded
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('images', 'public');
            $fotoPath = str_replace('images/', '', $fotoPath);
        }

        $anggota->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath,
            'atasan_id' => $request->atasan_id,
        ]);

        return redirect()->route('admin.struktur')->with('success', 'Anggota struktur organisasi berhasil diperbarui');
    }

    public function strukturDestroy($id)
    {
        $anggota = StrukturOrganisasi::findOrFail($id);
        $anggota->delete();

        return redirect()->route('admin.struktur')->with('success', 'Anggota struktur organisasi berhasil dihapus');
    }

    // Profile Admin
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'current_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check current password if changing password
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini salah.']);
            }
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('new_password') ? Hash::make($request->new_password) : $user->password,
        ]);

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
