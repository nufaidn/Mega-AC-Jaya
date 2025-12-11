# Update Alur Booking dan Pembayaran

## Perubahan yang Dilakukan

### 1. Database Changes
- Menambahkan kolom `payment_type` (enum: 'dp', 'full') untuk membedakan jenis pembayaran
- Menambahkan kolom `dp_amount` (decimal) untuk menyimpan jumlah DP yang dibayar
- Mengupdate enum `status` dengan nilai baru: 'baru dp' dan 'lunas'

### 2. Alur Booking Baru

#### Sebelumnya:
1. User mengisi form booking
2. Langsung redirect ke pembayaran Xendit
3. Status booking: pending → completed

#### Sekarang:
1. User mengisi form booking
2. Booking tersimpan dengan status 'pending' dan payment_status 'unpaid'
3. User diarahkan ke halaman pilihan pembayaran
4. User memilih:
   - **DP (30%)**: Bayar 30% dari total harga → Status: 'baru dp'
   - **Bayar Sekarang**: Bayar 100% dari total harga → Status: 'lunas'

### 3. Status Booking Baru

| Status | Keterangan |
|--------|------------|
| `pending` | Booking baru dibuat, belum ada pembayaran |
| `baru dp` | User sudah bayar DP 30%, sisa 70% dibayar saat service selesai |
| `lunas` | User sudah bayar penuh 100% |
| `cancelled` | Booking dibatalkan |

### 4. File yang Diubah

#### Controllers:
- `app/Http/Controllers/BookingController.php`
  - Method `store()`: Tidak langsung redirect ke pembayaran
  - Method `paymentChoice()`: Menampilkan halaman pilihan pembayaran
  - Method `processPayment()`: Memproses pembayaran berdasarkan jenis (DP/Full)
  - Method `paymentCallback()`: Update status berdasarkan payment_type
  - Method `checkPaymentStatus()`: Update status berdasarkan payment_type
  - Method `verifyPayment()`: Update status berdasarkan payment_type

#### Models:
- `app/Models/Booking.php`: Menambahkan `payment_type` dan `dp_amount` ke fillable

#### Views:
- `resources/views/bookings/payment-choice.blade.php`: Halaman pilihan pembayaran baru
- `resources/views/bookings/index.blade.php`: Update tampilan status dan tombol
- `resources/views/admin/bookings/index.blade.php`: Update tampilan status untuk admin

#### Routes:
- `routes/web.php`: Menambahkan route untuk payment-choice dan process-payment

#### Migrations:
- `database/migrations/2025_12_11_035303_add_payment_type_to_bookings_table.php`
- `database/migrations/2025_12_11_035929_update_booking_status_enum.php`

### 5. Fitur Baru

1. **Halaman Pilihan Pembayaran**: User dapat memilih antara DP atau bayar penuh
2. **Status yang Lebih Jelas**: 
   - "Baru DP" untuk yang sudah bayar DP
   - "Lunas" untuk yang sudah bayar penuh
3. **Informasi DP**: Menampilkan jumlah DP yang sudah dibayar
4. **Tombol Pilih Pembayaran**: Untuk booking yang belum dibayar

### 6. Cara Penggunaan

1. User melakukan booking seperti biasa
2. Setelah submit form, user akan diarahkan ke halaman pilihan pembayaran
3. User memilih salah satu:
   - **DP (30%)**: Untuk pembayaran bertahap
   - **Bayar Sekarang**: Untuk pembayaran penuh
4. User diarahkan ke Xendit untuk melakukan pembayaran
5. Setelah pembayaran berhasil, status booking akan berubah sesuai jenis pembayaran

### 7. Tampilan di Dashboard

#### User Dashboard (My Bookings):
- Status "Baru DP" dengan badge biru
- Status "Lunas" dengan badge hijau
- Informasi jumlah DP yang sudah dibayar
- Tombol "Pilih Pembayaran" untuk booking yang belum dibayar

#### Admin Dashboard:
- Dapat melihat semua booking dengan status yang jelas
- Informasi DP amount untuk booking dengan payment_type 'dp'
- Tombol verify payment tetap berfungsi

## Testing

Untuk menguji fitur ini:
1. Login sebagai user
2. Buat booking baru
3. Pilih jenis pembayaran (DP atau Bayar Sekarang)
4. Lakukan pembayaran di Xendit
5. Cek status di My Bookings
6. Login sebagai admin untuk melihat di dashboard admin