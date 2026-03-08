<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Matkul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; border-radius: 15px; }
        .table thead { background-color: #4e73df; color: white; }
        .btn-add { background-color: #4e73df; border: none; }
        .btn-add:hover { background-color: #2e59d9; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="fw-bold text-primary"><i class="fas fa-book-open me-2"></i>Daftar Mata Kuliah</h2>
                <p class="text-muted">Manajemen data kurikulum kampus kamu</p>
            </div>
            <div class="col-md-6 text-md-end shadow-sm p-3 bg-white rounded">
                <form action="/matkul" method="GET" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" placeholder="Cari Kode atau Nama Matkul...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h5 class="mb-0 fw-semibold">Data Perkuliahan</h5>
                    <a href="/matkul/create" class="btn btn-add text-white px-4">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Matkul
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">KODE</th>
                                <th>MATA KULIAH</th>
                                <th>JURUSAN</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($matkul as $mk)
                            <tr>
                                <td class="ps-4 fw-bold text-dark">{{ $mk->kode }}</td>
                                <td>{{ $mk->nama }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $mk->jurusan }}</span></td>
                                <td class="text-center">
                                    <div class="btn-group shadow-sm">
                                        <a href="/matkul/{{ $mk->id }}/edit" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="/matkul/{{ $mk->id }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5 text-muted">Data tidak ditemukan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>