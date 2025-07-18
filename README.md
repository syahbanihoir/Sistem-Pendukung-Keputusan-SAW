# Sistem_Pendukung_Keputusan_SAW

Website Analisis Data untuk Sistem Pendukung Keputusan Penerima Bantuan DBD Menggunakan Metode Simple Additive Weighting (SAW). Sistem dikembangkan menggunakan PHP dan SQL Server, dan menghasilkan output berupa nilai perhitungan sebagai dasar pengambilan keputusan.

Berikut Tampilan dari sistem yang telah dibuat:
1.	Tampilan Layar Form Login
   Sebelum dapat mengakses Menu Utama, pengguna diharuskan untuk mengisi username dan password yang dimiliki. 
   ![image](https://github.com/user-attachments/assets/b18e2814-3b3e-4ade-aae7-fb70977753a9)
  	
3.	Tampilan Layar Menu Utama
   Pada Tampilan Layar Menu Utama terdapat side menu, Menu yang didalam Side Menu adalah Menu Dashboard, Menu kriteria (Dengan sub Menu lihat kriteria dan Menu Sub kriteria), Menu Penilaian (Dengan sub Menu lihat Data Warga, Menu Normalisasi dan Menu Nilai Evaluasi), Menu Laporan.
  	![image](https://github.com/user-attachments/assets/d20b7e2f-4b85-4467-b372-132924f8f49a)

5.	Tampilan Layar Menu Lihat Kriteria
   Pada Tampilan Layar Menu Lihat Kriteria menampilkan tabel berisi Daftar Kriteria dari Nama Kriteria, Sifat Kriteria (Benefit dan Cost) dan bobot kriteria  penerima bantuan demam berdarah, aksi untuk edit. Apa yang di input di Edit Data Bobot Kriteria akan masuk kedalam table Daftar Nama, Sifat, bobot dan Kriteria yang berada di tampilan layar Menu Lihat Kriteria.
  	![image](https://github.com/user-attachments/assets/6f6f9d29-6063-47a0-95f0-9d153df3f2fd)

7.	Tampilan Layar Menu Form Edit Kriteria
   Menu form edit kriteria, admin harus mengisi Bobot Kriteria lalu klik edit untuk memperbarui data.
  	![image](https://github.com/user-attachments/assets/f6fabea8-e0be-4bc1-8306-acf7fba221fb)

5.	Tampilan Menu Lihat Sub-Kriteria
   Pada Tampilan Layar Menu Lihat Kriteria menampilkan tabel berisi daftar Sub Kriteria dan nilai Sub Kriteria penerima bantuan demam berdarah, aksi untuk edit. Apa yang di input di Edit Data Sub Kriteria dan Nilai Sub Kriteria akan masuk kedalam table Daftar Sub Kriteria, dan Nilai Sub Kriteria yang berada di tampilan layar Menu Lihat Sub Kriteria.
  	![image](https://github.com/user-attachments/assets/59215755-e604-4858-ae3e-4064cf570e3a)

7.	Tampilan Layar Menu Form Edit Sub Kriteria
   Pada Menu form edit Sub Kriteria, admin harus mengisi Nama Sub Kriteria dan Nilai lalu klik edit untuk memperbarui data.
  	![image](https://github.com/user-attachments/assets/5f3f7b34-21c5-4c3f-8fde-a1c06023b366)

10.	Tampilan Menu Lihat Warga
    Pada Tampilan Layar Menu Lihat Warga menampilkan tabel berisi NIK Warga, Nama Warga, Kelurahan Warga, Kecamatan Warga, Tahun Warga yang terkena demam berdarah, jumlah anggota keluarga dalam 1 (satu) rumah, pendidikan kepala keluarga, jumlah anggota keluarga masih sekolah, pengeluaran satu jiwa dalam keluarga, penghasilan satu jiwa dalam keluarga per bulan, status kepemilikan rumah, Sumber air bersih dan transportasi penerima bantuan demam berdarah, Pada halaman ini terdapat fitur untuk tambah, edit, hapus data warga.
   	![image](https://github.com/user-attachments/assets/d4dc0ca3-825b-4e1f-a1d7-ff9770d4030f)

12.	Tampilan Menu Form Data Warga
    Pada Menu Form Input Data Warga, admin harus mengisi Kecamatan, Kelurahan, NIK Warga, Nama Warga, Tahun Warga Terkena Demam Berdarah, jumlah anggota keluarga dalam 1 (satu) rumah, pendidikan kepala keluarga, jumlah anggota keluarga masih sekolah, pengeluaran satu jiwa dalam keluarga, penghasilan satu jiwa dalam keluarga per bulan, status kepemilikan rumah, Sumber air bersih dan transportasi penerima bantuan demam berdarah lalu klik Simpan.
   	![image](https://github.com/user-attachments/assets/6ecb6e35-9e45-4838-a22a-d7177026e3ea)

25.	Tampilan layar untuk mengubah data warga yang sudah di input apabila ada perubahan.
    ![image](https://github.com/user-attachments/assets/66f07618-c1f9-472f-bdc5-e517a2432eb7)

28.	Tampilan Menu Normalisasi
    Pada Tampilan Layar Menu Normalisasi menampilkan tabel berisi Halaman Hasil Normalisasi. Halaman hasil Normalisasi merupakan hasil Normalisasi penerima bantuan demam berdarah yang didalamnya terdapat hasil perhitungan metode SAW. halaman ini memaparkan hasil sub-kriteria yang sudah di-pilih sebelumnya pada halaman seleksi oleh admin.
   	![image](https://github.com/user-attachments/assets/e0470259-c97d-4055-ab57-051cae03b0d8)

30.	Tampilan Menu Nilai Evaluasi
	Pada Tampilan Layar Menu Nilai Evaluasi menampilkan table berisi  hasil perkalian normalisasi dengan bobot kriteria.
    ![image](https://github.com/user-attachments/assets/f7a798cd-8667-4861-9588-827f3bf21cd3)

33.	Tampilan Menu Laporan
    Pada Tampilan Layar Menu Laporan menampilkan akhir penyeleksian yang dihitung dengan menggunakan rumus SAW. Nilai yang didapat kemudian di ranking dan diurutkan dari nilai tertinggi ke rendah. Hasil seleksi dapat dicetak dengan format pdf dan juga dapat di print.
    ![image](https://github.com/user-attachments/assets/dd701657-3f42-405f-827d-1a535fb382a5)

37.	Tampilan Layar Cetak Laporan
    ![image](https://github.com/user-attachments/assets/f8bf33d3-64e3-4be5-8fe6-de0507068716)

