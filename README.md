\## Panduan Menggunakan Aplikasi Perpustakaan

\#### A.	Cara Menjalankan App

\- Aplikasi menggunakanlaravel, untuk menjalankan aplikasi jalankan terminal, lalu masuk folder aplikasi, ketikan :

\```sh

php artisan serve --post=5000

\```

\- Setelah itu buka browser lalu ketikan 

\```sh

localhost:5000

\```

\- Dalam aplikasi tersebut terdapat login untuk admin dan anggota.

Berikut adalah data email dan password per-level user:.

| Email | Password | Level |

\| ------ | ------ | ------ |

| admin@gmil.com | 12345 | admin |

| zhein@gmail.com | 12345 | anggota |

\- buat database dengan nama perpustakaan, lalu upload Database kedalam localhost/phpmyadmin, file database berada pada folder:

\```sh

database/perpustakaan.sql

\```

\- Penggunaan JQUERY AJAX dalam aplikasi di tempatkan pada:

\```sh

resource/views/Layout/main.blade.php

\```

\- Penggunaan DataTables SERVICE SIDE dalam aplikasi di tempatkan pada:

\```sh

public/server\_side/\*\*\*.php

\```

\#### B.	Keterangan File – File Inti

\##### 1. App Perpustakaan / Peminjaman Buku

Berikut adalah posisi file – file dari App Perpustakaan:

| Kategori File | Jenis File | Folder/File |

\| ------ | ------ | ------ |

| Login	| Views	| resource/views/Login/login.blade.php| 

| Login	| Controller/Proses | 	app/http/LoginController.php | 

| Dashboard	| Views | 	resource/views/Page/Index.blade.php | 

| Menu	| Views |  	resource/views/Layout/main.blade.php | 

| Data Anggota | 	Views | 	resource/views/Page/Anggota/anggota.blade.php | 

| Tambah Anggota |	Views | resource/views/Page/Anggota/add-anggota.blade.php | 

| Edit Anggota |	Views | resource/views/Page/Anggota/edit-anggota.blade.php |

| Anggota |	Controller/Proses | app/http/AnggotaController.php |

| Data Buku | 	Views | 	resource/views/Page/Buku/buku.blade.php | 

| Tambah Buku |	Views | resource/views/Page/Buku/add-buku.blade.php | 

| Edit Buku |	Views | resource/views/Page/Buku/edit-buku.blade.php |

| Buku |	Controller/Proses | app/http/BukuController.php |

| Peminjaman Buku |	Views | resource/views/Page/Peminjaman/peminjaman.blade.php |

| Peminjaman |	Controller/Proses | app/http/PeminjamanController.php |

| Persetujuan Peminjaman |	Views | resource/views/Page/Peminjaman/pengajuan-peminjaman.blade.php |

| Persetujuan Peminjaman |	Controller/Proses | app/http/PeminjamanController.php |

| RESTFULL API |	API | app/http/ApiController.php | 

| Anggota | Model | app/model/Anggota.php | 

| Users | Model | app/model/Users.php | 

| Buku | Model | app/model/Buku.php | 

| Peminjaman | Model | app/model/Peminjaman.php | 

| Logout | Controller/Proses | 	app/http/LoginController.php | 

| All File |	Route | routes/web.php |
