# EEPIS News — Portal Berita Kampus PENS

EEPIS News adalah platform portal berita digital yang dirancang khusus untuk memenuhi kebutuhan informasi di lingkungan Politeknik Elektronika Negeri Surabaya (PENS). Proyek ini dibangun sebagai solusi teknis untuk manajemen konten berita yang efisien, transparan, dan mudah digunakan bagi berbagai peran pengguna.

---

## 🚀 Fitur Utama

### 1. Sistem Autentikasi & Otorisasi
- **Multi-role Access**: Mendukung peran **Admin** dan **Penulis**.
- **Secure Login & Register**: Proteksi middleware untuk area dashboard.
- **Session Management**: Logout aman dan integrasi data user saat ini.

### 2. Manajemen Konten (CMS)
- **Rich Text Editor**: Integrasi CKEditor 5 Super Build untuk pembuatan berita yang fleksibel (gambar inline, embed video, tabel, format teks kompleks).
- **Media Management**: Fitur upload thumbnail berita dan sistem upload gambar terintegrasi di dalam konten.
- **Ownership Control**: Penulis hanya dapat melihat, mengedit, dan menghapus berita miliknya sendiri. Admin memiliki kontrol penuh atas semua konten.

### 3. Manajemen Kategori
- CRUD kategori untuk pengelompokan berita yang terstruktur.
- Relasi dinamis antara kategori dan berita.

### 4. Halaman Publik (Premium UI/UX)
- **Typography-Driven Design**: Desain yang berfokus pada kenyamanan membaca (premium feel).
- **Filter & Search**: Pencarian berita dan filter berdasarkan kategori yang responsif.
- **Responsive Layout**: Optimal untuk perangkat mobile, tablet, dan desktop.

### 5. Dashboard Statistik
- Menampilkan ringkasan data berita dan kategori sesuai dengan hak akses masing-masing role.

---

## 🛠️ Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Blade Engine, Tailwind CSS (Styling), Alpine.js (Interactivity)
- **Database**: MySQL
- **Rich Editor**: CKEditor 5 Super Build
- **Icons**: Lucide Icons & Heroicons

---

## 📊 Desain Sistem

### 1. ERD (Entity Relationship Diagram)
Struktur database dirancang untuk memastikan integritas data dan kemudahan skalabilitas.

```mermaid
erDiagram
    USERS ||--o{ POSTS : writes
    CATEGORIES ||--o{ POSTS : classifies
    
    USERS {
        int id PK
        string name
        string email
        string password
        string role "admin | penulis"
        timestamp created_at
    }
    
    CATEGORIES {
        int id PK
        string name
        string slug
        timestamp created_at
    }
    
    POSTS {
        int id PK
        int user_id FK "Author"
        int category_id FK "Category"
        string title
        string slug
        text content
        string thumbnail
        string video "YouTube URL"
        timestamp created_at
    }
