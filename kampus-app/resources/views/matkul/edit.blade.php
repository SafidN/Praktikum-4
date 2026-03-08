<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Matkul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-graduation-cap fa-3x text-primary mb-3"></i>
                            <h4 class="fw-bold">Edit Data Matkul</h4>
                        </div>
                        
                        <form action="{{ isset($matkul) ? '/matkul/'.$matkul->id : '/matkul' }}" method="POST">
                            @csrf
                            @if(isset($matkul)) @method('PUT') @endif

                            <div class="form-floating mb-3">
                                <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode" value="{{ $matkul->kode ?? '' }}" required>
                                <label for="kode">Kode Mata Kuliah</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="{{ $matkul->nama ?? '' }}" required>
                                <label for="nama">Nama Mata Kuliah</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan" value="{{ $matkul->jurusan ?? '' }}" required>
                                <label for="jurusan">Jurusan</label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                    <i class="fas fa-save me-2"></i> {{ isset($matkul) ? 'Update Perubahan' : 'Simpan Data Baru' }}
                                </button>
                                <a href="/matkul" class="btn btn-link text-muted">Kembali ke Daftar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>