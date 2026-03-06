<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Employee</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">   
    <!-- Bootstrap Icons (opsional, untuk icon) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Custom styles tambahan jika diperlukan */
        body {
            background-color: #f8f9fa;
        }
        
        .container-custom {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .form-section {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }
        
        th {
            background-color: #0d6efd !important;
            color: white !important;
        }
        
        @media print {
            .no-print {
                display: none !important;
            }
            .print-area {
                display: block !important;
            }
        }
    </style>

</head>
<body>
    <div class="container mt-4 container-custom">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="display-6 fw-bold text-primary">TES WEB PROGRAMMER PHP</h1>
            <h5 class="text-secondary">PT. FTF GLOBALINDO</h5>
        </div>
        
        <!-- Alert Messages -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        
        <!-- Form Section -->
        <div class="card form-section mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>DATA MEMBER</h5>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo site_url('member/simpan'); ?>">
                    <div class="row g-4">
                        <!-- Kolom Kiri -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold">HANDPHONE</label>
                                <input type="text" name="handphone" class="form-control" 
                                    onkeypress="return hanyaAngka(event)" 
                                    placeholder="Masukkan nomor handphone" required>
                                <div class="form-text">Hanya angka yang diperbolehkan</div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">NAMA</label>
                                <input type="text" name="nama" class="form-control" 
                                    placeholder="Masukkan nama lengkap" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">ALAMAT</label>
                                <textarea name="alamat" class="form-control" rows="3" 
                                        placeholder="Masukkan alamat lengkap" required></textarea>
                            </div>
                        </div>
                        
                        <!-- Kolom Tengah -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold">AGAMA</label>
                                <div class="border p-3 rounded bg-light">
                                    <?php 
                                    $agama_list = ['Islam', 'Kristen', 'Hindu', 'Budha'];
                                    foreach($agama_list as $agama): 
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" 
                                            name="agama" value="<?php echo $agama; ?>" 
                                            id="agama_<?php echo strtolower($agama); ?>" required>
                                        <label class="form-check-label" for="agama_<?php echo strtolower($agama); ?>">
                                            <?php echo $agama; ?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">HOBBY</label>
                                <div class="border p-3 rounded bg-light">
                                    <?php 
                                    $hobby_list = ['Musik', 'Olahraga', 'Kesenian', 'Games', 'Otomotif', 'Makan', 'Tidur'];
                                    foreach($hobby_list as $hobby): 
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                            name="hobby[]" value="<?php echo $hobby; ?>" 
                                            id="hobby_<?php echo strtolower($hobby); ?>">
                                        <label class="form-check-label" for="hobby_<?php echo strtolower($hobby); ?>">
                                            <?php echo $hobby; ?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Kolom Kanan -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold">THN LAHIR</label>
                                <select name="thn_lahir" id="thn_lahir" class="form-select" 
                                        onchange="hitungUmur()" required>
                                    <option value="">-- Pilih Tahun Lahir --</option>
                                    <?php for($th = date('Y'); $th >= 1900; $th--): ?>
                                        <option value="<?php echo $th; ?>"><?php echo $th; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">UMUR</label>
                                <div class="input-group">
                                    <input type="text" id="umur" name="umur" class="form-control" 
                                        readonly placeholder="Otomatis terhitung">
                                    <span class="input-group-text">Tahun</span>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-save me-2"></i>SIMPAN DATA
                                </button>
                                <button type="button" class="btn btn-info btn-lg" onclick="cetakData()">
                                    <i class="bi bi-printer me-2"></i>CETAK DATA
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Table Section -->
        <div class="table-section">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-table me-2"></i>DAFTAR DATA MEMBER</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>NO</th>
                                    <th>HANDPHONE</th>
                                    <th>NAMA</th>
                                    <th>ALAMAT</th>
                                    <th>AGAMA</th>
                                    <th>HOBBY</th>
                                    <th>THN LAHIR</th>
                                    <th>UMUR</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($members)): ?>
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-4">
                                            <i class="bi bi-inbox me-2"></i>Belum ada data member
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php $no = 1; ?>
                                    <?php foreach($members as $member): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $member->handphone; ?></td>
                                        <td><?php echo $member->nama; ?></td>
                                        <td><?php echo $member->alamat; ?></td>
                                        <td><?php echo $member->agama; ?></td>
                                        <td><?php echo $member->hobby; ?></td>
                                        <td><?php echo $member->thn_lahir; ?></td>
                                        <td><?php echo $member->umur; ?> Tahun</td>
                                        <td>
                                            <a href="<?php echo site_url('member/hapus/'.$member->id); ?>" 
                                            class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Yakin ingin menghapus data?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function hitungUmur() {
            var tahun = document.getElementById('thn_lahir').value;
            var sekarang = new Date().getFullYear();
            if (tahun) {
                document.getElementById('umur').value = sekarang - tahun;
            } else {
                document.getElementById('umur').value = '';
            }
        }

        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function cetakData() {
            // Tambahkan atribut tanggal ke table-section
            const tableSection = document.querySelector('.table-section');
            if (tableSection) {
                const today = new Date();
                const dateStr = today.toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });
                tableSection.setAttribute('data-print-date', dateStr);
            }
            
            // Tunggu sebentar agar atribut terupdate lalu print
            setTimeout(() => {
                window.print();
            }, 100);
        }

        // Tooltip initialization (Bootstrap 5)
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    
    <!-- Style untuk print -->
    <style media="print">
        /* Sembunyikan semua elemen yang tidak perlu */
        body * {
            visibility: hidden;
            margin: 0;
            padding: 0;
        }
        
        /* Tampilkan hanya tabel dan elemen di dalamnya */
        .table-section, 
        .table-section *,
        .card.mb-4:last-child,
        .card.mb-4:last-child *,
        table, 
        table * {
            visibility: visible !important;
        }
        
        /* Atur posisi tabel agar di tengah dan full width */
        .table-section {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 20px;
            margin: 0 !important;
        }
        
        /* Hapus background card dan border yang tidak perlu */
        .card.mb-4:last-child {
            border: none !important;
            box-shadow: none !important;
            background: transparent !important;
        }
        
        .card.mb-4:last-child .card-header {
            display: none !important; /* Sembunyikan header "DAFTAR DATA MEMBER" */
        }
        
        .card.mb-4:last-child .card-body {
            padding: 0 !important;
            background: transparent !important;
        }
        
        /* Styling tabel untuk print */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000 !important;
            font-size: 12pt;
        }
        
        th {
            background-color: #e0e0e0 !important;
            color: black !important;
            font-weight: bold;
            border: 1px solid #000 !important;
            padding: 8px;
            text-align: center;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        
        td {
            border: 1px solid #000 !important;
            padding: 6px;
        }
        
        /* Sembunyikan kolom AKSI */
        th:last-child,
        td:last-child {
            display: none !important;
        }
        
        /* Sembunyikan elemen-elemen lain */
        .no-print, 
        .btn, 
        form, 
        .alert, 
        .card-header:not(.card.mb-4:last-child .card-header),
        .form-section,
        .text-center.mb-4,
        h1, h5,
        footer,
        .btn-hapus,
        a.btn-danger,
        .input-group,
        select,
        input,
        textarea,
        button {
            display: none !important;
        }
        
        /* Tambahkan judul sederhana untuk print */
        .table-section::before {
            content: "DAFTAR DATA MEMBER";
            display: block;
            text-align: center;
            font-size: 16pt;
            font-weight: bold;
            margin-bottom: 15px;
            visibility: visible !important;
        }
        
        /* Nomor halaman */
        @page {
            margin: 1.5cm;
        }
        
        /* Footer tanggal cetak */
        .table-section::after {
            content: "Dicetak pada: " attr(data-print-date);
            display: block;
            text-align: right;
            font-size: 10pt;
            margin-top: 15px;
            font-style: italic;
            visibility: visible !important;
        }
    </style>
</body>
</html>