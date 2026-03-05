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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        
        .form-section {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 30px;
        }
        
        .form-section h2 {
            margin-bottom: 20px;
            color: #444;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .form-group textarea {
            height: 80px;
            resize: vertical;
        }
        
        .radio-group, .checkbox-group {
            margin-top: 5px;
        }
        
        .radio-item, .checkbox-item {
            margin: 5px 0;
        }
        
        .radio-item input, .checkbox-item input {
            margin-right: 5px;
        }
        
        .table-section {
            margin-top: 30px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-top: 20px;
        }
        
        table, th, td {
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
        }
        
        td {
            padding: 10px;
            text-align: left;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
        }
        
        .btn-simpan {
            background-color: #4CAF50;
            color: white;
        }
        
        .btn-cetak {
            background-color: #2196F3;
            color: white;
        }
        
        .btn-hapus {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            text-decoration: none;
            border-radius: 3px;
        }
        
        .btn-simpan:hover, .btn-cetak:hover, .btn-hapus:hover {
            opacity: 0.9;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .validation-error {
            color: #f44336;
            font-size: 12px;
            margin-top: 5px;
        }
        
        .action-buttons {
            margin-top: 20px;
            text-align: center;
        }
    </style>
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
            window.print();
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>TES WEB PROGRAMMER PHP</h1>
        <div class="subtitle">PT. FTF GLOBALINDO</div>
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-error"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        
        <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
        
        <div class="form-section">
            <h2>DATA MEMBER</h2>
            
            <form method="post" action="<?php echo site_url('member/simpan'); ?>">
                <div class="grid-container">
                    <!-- Kolom Kiri -->
                    <div class="form-group">
                        <label>HANDPHONE</label>
                        <input type="text" name="handphone" onkeypress="return hanyaAngka(event)" required>
                    </div>
                    
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama" required>
                    </div>
                    
                    <div class="form-group">
                        <label>ALAMAT</label>
                        <textarea name="alamat" required></textarea>
                    </div>
                    
                    <!-- Kolom Tengah -->
                    <div class="form-group">
                        <label>AGAMA</label>
                        <div class="radio-group">
                            <div class="radio-item">
                                <input type="radio" name="agama" value="Islam" required> Islam
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="agama" value="Kristen"> Kristen
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="agama" value="Hindu"> Hindu
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="agama" value="Budha"> Budha
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>HOBBY</label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" name="hobby[]" value="Musik"> Musik
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="hobby[]" value="Olahraga"> Olahraga
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="hobby[]" value="Kesenian"> Kesenian
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="hobby[]" value="Games"> Games
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="hobby[]" value="Otomotif"> Otomotif
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="hobby[]" value="Makan"> Makan
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="hobby[]" value="Tidur"> Tidur
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kolom Kanan -->
                    <div>
                        <div class="form-group">
                            <label>THN LAHIR</label>
                            <select name="thn_lahir" id="thn_lahir" onchange="hitungUmur()" required>
                                <option value="">Pilih Tahun</option>
                                <?php foreach($tahun as $th): ?>
                                    <option value="<?php echo $th; ?>"><?php echo $th; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>UMUR</label>
                            <input type="text" id="umur" name="umur" readonly>
                        </div>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <button type="submit" class="btn btn-simpan">SIMPAN DATA</button>
                    <button type="button" class="btn btn-cetak" onclick="cetakData()">CETAK DATA</button>
                </div>
            </form>
        </div>
        
        <div class="table-section">
            <h2>DAFTAR DATA MEMBER</h2>
            <table>
                <thead>
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
                            <td colspan="9" style="text-align: center;">Belum ada data member</td>
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
                            <td><?php echo $member->umur; ?></td>
                            <td>
                                <a href="<?php echo site_url('member/hapus/'.$member->id); ?>" 
                                   class="btn-hapus" 
                                   onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Style untuk print -->
    <style media="print">
        .btn, form, .alert, .btn-hapus {
            display: none !important;
        }
        
        table {
            border: 1px solid #000;
        }
        
        th {
            background-color: #ccc !important;
            color: #000 !important;
        }
    </style>
</body>
</html>