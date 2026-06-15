# WordPress PhysicalMe — Standalone Repository

یک بسته‌ی کامل از وب‌سایت PhysicalMe شامل تمام محتوای فیزیک، پایگاه داده، و تنظیمات WordPress.

## 📦 محتویات

- **WordPress Core** — آخرین نسخه‌ی WordPress
- **Themes & Plugins** — Hello Elementor، Elementor Pro، و افزونه‌های سفارشی
- **Physics Content** — 440+ مقالات و ویجت‌های تعاملی (دهم، یازدهم، دوازدهم - ریاضی و تجربی)
- **Database Dump** — `physicalme-db.sql` — کامل، آماده برای restore

## 🚀 Installation

### 1. Clone Repository
```bash
git clone <repository-url> wordpress-physicalme
cd wordpress-physicalme
```

### 2. Docker Setup
```bash
docker-compose up -d db
docker-compose up -d physicalme
```

### 3. Restore Database
```bash
docker exec wp-db mariadb -u physics_user -p physicalme < physicalme-db.sql
```

### 4. Update wp-config.php
```php
define('DB_NAME', 'physicalme');
define('DB_USER', 'physics_user');
define('DB_PASSWORD', 'your_password');
define('DB_HOST', 'db');
```

### 5. Verify Installation
- Homepage: `http://localhost:50081/`
- Articles: `http://localhost:50081/article/`
- Admin: `http://localhost:50081/wp-admin/`

## 📚 Content Structure

```
wp-content/
├── physics-content/
│   └── highschool/
│       ├── 10/      — دهم ریاضی
│       ├── 10t/     — دهم تجربی
│       ├── 11/      — یازدهم ریاضی
│       ├── 11t/     — یازدهم تجربی
│       ├── 12/      — دوازدهم ریاضی
│       └── 12t/     — دوازدهم تجربی
├── themes/
│   └── hello-elementor/ — Custom theme
├── plugins/
│   ├── elementor/
│   └── elementor-pro/
└── mu-plugins/
    └── physicalme-homepage.php
```

## 🎨 Features

### Homepage
- Hero section with dual-language wordmark
- Auto-rotating article carousel (6 columns)
- Books grid showing all grade levels

### Article System
- 440+ lessons organized by grade and chapter
- `/article/` archive page
- Proper taxonomy structure

## 🔧 Database

Database dump: `physicalme-db.sql` (7MB)
- Contains all posts, pages, users, settings
- Ready to restore on fresh installation

---

**آخرین بروزرسانی:** 2026-06-15
