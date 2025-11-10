# TP7DPBO2425C1
Project ini merupakan tugas praktikum yang mengimplementasikan konsep **Object-Oriented Programming (OOP)** dalam **Website berbasis PHP dengan GUI Web**.  
Aplikasi ini menampilkan sistem sederhana untuk **mengelola data hotel, kamar, dan reservasi** dengan fitur **CRUD (Create, Read, Update, Delete)** serta relasi antar tabel menggunakan **MySQL Database**.

 ## 🙏🏻 Janji
Saya Iqbal Rizky Maulana dengan NIM 2408622 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## 📘 Fitur Utama

### 🏠 1. Manajemen Kamar (Rooms)
- Melihat daftar kamar beserta tipe, harga, dan status (Available/Booked).
- Menambah, mengubah, dan menghapus data kamar.
- Status kamar otomatis berubah menjadi *Booked* saat dipesan, dan kembali *Available* saat reservasi selesai.

### 👤 2. Manajemen Tamu (Guests)
- Menampilkan daftar tamu yang sudah terdaftar.
- Menambah data tamu baru.
- Mengedit dan menghapus data tamu dari sistem.

### 📅 3. Manajemen Reservasi (Reservations)
- Membuat reservasi dengan memilih tamu dan kamar.
- Menampilkan daftar reservasi aktif dan histori.
- Menghapus atau mengedit data reservasi yang sudah ada.
- Menggunakan **relasi antar tabel** (`guest_id` dan `room_id` sebagai *foreign key*).

## 🗄️ Struktur Direktori Project
```
TP7DPBO2425C1/
│ index.php # Halaman utama (navigasi antar view)
│ style.css # Styling GUI web
│
├───class
│ Room.php # Class untuk entitas Room
│ Guest.php # Class untuk entitas Guest
│ Reservation.php # Class untuk entitas Reservation
│
├───config
│ db.php # File koneksi database menggunakan PDO + Prepared Statement
│
├───database
│ db_hotel.sql # Skema dan data awal database
│
├───view
│ rooms.php # Tampilan dan CRUD Room
│ guests.php # Tampilan dan CRUD Guest
│ reservations.php # Tampilan & CRUD Reservasi
│ header.php # Header halaman
│ footer.php # Footer halaman
```
## 🧠 Konsep OOP yang Diterapkan

- **Encapsulation** → Setiap entitas (Room, Guest, Reservation) diatur dalam class tersendiri, menjaga data tetap terstruktur.
- **Abstraction** → Detail koneksi database disembunyikan dalam `config/db.php`.
- **Composition** → Class `Reservation` menggunakan objek dari `Room` dan `Guest`.
- **Prepared Statement** → Semua query database menggunakan prepared statement untuk mencegah SQL Injection dan meningkatkan keamanan.

## 💾 Struktur Database (`db_hotel.sql`)

Terdiri dari **3 tabel utama** dengan **2 relasi** antar entitas.

### 🏠 Table: `rooms`
| Field | Type | Keterangan |
|-------|------|------------|
| id | INT (PK) | ID unik kamar |
| room_number | VARCHAR(10) | Nomor kamar |
| type | VARCHAR(50) | Jenis kamar (Deluxe, Suite, Standard, dll) |
| price | DOUBLE | Harga per malam |
| status | ENUM('Available', 'Booked') | Status ketersediaan kamar |

---

### 👤 Table: `guests`
| Field | Type | Keterangan |
|-------|------|------------|
| id | INT (PK) | ID unik tamu |
| name | VARCHAR(100) | Nama tamu |
| email | VARCHAR(100) | Email tamu |
| phone | VARCHAR(20) | Nomor telepon |

---

### 📅 Table: `reservations`
| Field | Type | Keterangan |
|-------|------|------------|
| id | INT (PK) | ID unik reservasi |
| guest_id | INT (FK → guests.id) | Relasi ke tamu yang memesan |
| room_id | INT (FK → rooms.id) | Relasi ke kamar yang dipesan |
| checkin_date | DATE | Tanggal check-in |
| checkout_date | DATE | Tanggal check-out |

## ⚙️ Flow Program
- index.php → Entry point aplikasi dan pengatur navigasi halaman (rooms, guests, reservations).
- config/db.php → Mengatur koneksi database menggunakan PDO.
- class/ → Berisi logika utama:
  - Room.php → CRUD data kamar.
  - Guest.php → CRUD data tamu.
  - Reservation.php → CRUD data reservasi (JOIN antar tabel).
- view/ → Menyediakan tampilan GUI web (HTML + PHP) untuk menampilkan tabel data dan form input.
- Semua query database menggunakan Prepared Statement untuk keamanan (mencegah SQL Injection).
- Data hasil manipulasi (insert, update, delete) otomatis ditampilkan kembali di tabel halaman web.

## 📸 Dokumentasi 

1. Tampilan Website

<img width="1365" height="653" alt="image" src="https://github.com/user-attachments/assets/41c55557-1070-4c26-a439-a6bf03fac354" />

<img width="1365" height="608" alt="image" src="https://github.com/user-attachments/assets/e78997a2-7b4a-4095-9859-5c3be07df02c" />

<img width="1365" height="624" alt="image" src="https://github.com/user-attachments/assets/5afa79ca-797e-4909-8689-0875d0226060" />
   
2. CRUD

https://github.com/user-attachments/assets/81c8373c-41bf-428d-a931-64b7a1a87be9


