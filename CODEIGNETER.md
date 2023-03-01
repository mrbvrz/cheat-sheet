# Codeigneter Codespace

Kumpulan potongan code yang digunakan pada saat membuat aplikasi dengan Codeigneter, dan dirasa perlu untuk disimpan dan didokumentasikan.

## Option select selected value

```html
<div class="form-group col-md-6">
        <label for="inputState">Status Pengajuan</label>
        <select id="inputState" class="form-control" name="status">
                <option selected value="">Semua</option>
                <option value="Pengajuan" <?php if($status == "Pengajuan") {?> selected="selected" <?php } ?>>Pengajuan Baru</option>
                <option value="Validasi" <?php if($status == "Validasi") {?> selected="selected" <?php } ?>>Pengajuan Diproses</option>
                <option value="Kesalahan Pada Berkas" <?php if($status == "Kesalahan Pada Berkas") {?> selected="selected" <?php } ?>>Pengajuan Ditolak</option>
                <option value="Surat Selesai" <?php if($status == "Surat Selesai") {?> selected="selected" <?php } ?>>Pengajuan Selesai</option>
        </select>
</div>
```

## Multiple filter from request (form)

Untuk filter bisa menggunakan code dibawah ini untuk filter, dapat diletakkan di `Model`. filter yang digunakan adalah `where`, `like` dan `wherebetween` pada tanggal.

```php
function datalayanan($jenis, $status, $startdate, $enddate){
        $layanan = $this->db->select('*');
        $layanan = $this->db->from($table1);
        $layanan = $this->db->join($table2, 'surat.id_user = user.id', 'LEFT');
        $layanan = $this->DataModel->getalljoin('surat', 'user');

        if ($jenis != NULL) {
            $layanan = $this->db->like('nama_surat', $jenis);
        }

        if ($status != NULL) {
            $layanan = $this->db->where('keterangan', $status);
        }

        if ($startdate != NULL and $enddate != NULL){
            $a = date('Y-m-d', strtotime($startdate));
            $b = date('Y-m-d', strtotime($enddate));
            $layanan = $this->db->where('tgl >=', $a);
            $layanan = $this->db->where('tgl <=', $b);
        }

        $query = $this->db->get();
        return $query->result();
}
```

## Menghitung jumlah array

Menghitung jumlah pada data dengan bentuk `array`

```php
<?php echo count($layanan); ?>
```

## Menggunakan tenary operator

```php
<?= count($layanan) == 0 ? "Tidak ada data" : count($layanan) ?>
```
