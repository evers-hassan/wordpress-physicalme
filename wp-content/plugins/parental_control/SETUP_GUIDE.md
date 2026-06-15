# راهنمای نصب و تنظیم / Setup & Installation Guide

---

## 📋 پیش‌نیازهای / Prerequisites

```
✓ WordPress 5.0+
✓ PHP 7.4+
✓ حساب مدیریت سایت
  Admin account
✓ دسترسی FTP یا File Manager
  FTP or File Manager access
```

---

## 🔧 نصب پلاگین / Installing the Plugin

### روش ۱: آپلود از داشبورد / Method 1: Dashboard Upload

```
۱. وارد داشبورد WordPress شوید
   Go to WordPress dashboard

۲. به Plugins > Add New برید
   Go to Plugins > Add New

۳. روی "Upload Plugin" کلیک کنید
   Click "Upload Plugin"

۴. فایل .zip پلاگین را انتخاب کنید
   Select plugin .zip file

۵. روی "Install Now" کلیک کنید
   Click "Install Now"

۶. روی "Activate Plugin" کلیک کنید
   Click "Activate Plugin"
```

### روش ۲: آپلود FTP / Method 2: FTP Upload

```
۱. فایل پلاگین را استخراج کنید
   Extract plugin files

۲. فایل‌ها را به این مسیر کپی کنید:
   Upload to this directory:
   /wp-content/plugins/parental_control/

۳. وارد WordPress داشبورد شوید
   Go to WordPress dashboard

۴. به Plugins > Installed Plugins برید
   Go to Plugins > Installed Plugins

۵. پلاگین "Parental Control" را فعال کنید
   Activate "Parental Control" plugin
```

---

## ⚙️ تنظیمات اولیه / Initial Configuration

### مرحله ۱: ورود به تنظیمات / Step 1: Access Settings

```
داشبورد > Settings > Parental Control
Dashboard > Settings > Parental Control
```

### مرحله ۲: تنظیم گزینه‌ها / Step 2: Configure Options

#### الف) حداکثر فرزندان / Max Children Per Parent
```
تعداد فرزندانی که هر والدین می‌تواند ایجاد کند
Number of children each parent can create

پیشنهاد / Recommended: 3-5
```

#### ب) URL صفحه والدین / Parent Login Redirect
```
صفحه‌ای که والدین بعد از ورود می‌روند
Page where parents go after login

مثال / Example: /parent-profile/
```

#### ج) URL صفحه فرزند / Child Login Redirect
```
صفحه‌ای که فرزندان بعد از ورود می‌روند
Page where children go after login

مثال / Example: /
```

#### د) URL‌های صفحات اضافی / Additional Page URLs
```
- Child Profile Page / صفحه پروفایل فرزند
- Child Change Password / صفحه تغییر رمز فرزند
- Parent Profile Page / صفحه پروفایل والدین
```

### مرحله ۳: ایجاد صفحات پلاگین / Step 3: Create Plugin Pages

```
در صفحه تنظیمات:
In Settings page:

روی "Quick Fill" کلیک کنید
Click "Quick Fill" button

سیستم خودکار صفحات لازم را ایجاد می‌کند
System automatically creates required pages
```

---

## 📂 تنظیم دسته‌بندی محتوا / Organizing Content Categories

### مرحله ۱: ایجاد گروه‌های سنی / Step 1: Create Age Groups

```
Settings > PCPC Tags > Manage Age Groups

به صورت خودکار این گروه‌ها ایجاد شده‌اند:
These groups are created automatically:

🟢 3+   - برای ۳ سال به بالا
         For 3 years and up

🟢 5+   - برای ۵ سال به بالا
         For 5 years and up

🟡 13+  - برای ۱۳ سال به بالا
         For 13 years and up

🔴 18+  - برای ۱۸ سال به بالا
         For 18 years and up

اگر نیاز داشتید می‌توانید نام آنها را تغییر دهید
You can modify them if needed
```

### مرحله ۲: ایجاد ژانرها / Step 2: Create Genres

```
Settings > PCPC Tags > Manage Genres

گزینه‌های پیشفرض / Default options:

- آموزشی / Educational
- علمی‌تخیلی / Science Fiction
- ترسناک / Horror
- کمدی / Comedy
- درام / Drama
- ماجراجویی / Adventure
- مستند / Documentary
- انیمیشن / Animation
```

### مرحله ۳: ایجاد هشدارهای محتوا / Step 3: Create Content Warnings

```
Settings > PCPC Tags > Manage Warnings

گزینه‌های پیشفرض / Default options:

- خشونت / Violence
- زبان نامناسب / Inappropriate Language
- محتوای جنسی / Sexual Content
- مواد مخدر / Drug References
- صحنه‌های ترسناک / Scary/Intense Scenes
```

---

## 👥 ایجاد کاربران والد و فرزند / Creating Parent & Child Users

### ایجاد کاربر والد / Creating Parent User

```
۱. داشبورد > Users > Add New
   Dashboard > Users > Add New

۲. اطلاعات والدین را وارد کنید:
   Enter parent information:
   
   - نام کاربری: parent_name
     Username: parent_name
   
   - ایمیل: parent@example.com
     Email: parent@example.com
   
   - رمز عبور: Strong password
     Password: Strong password

۳. در "Role" گزینه "Parent" را انتخاب کنید
   Select "Parent" role

۴. روی "Create User" کلیک کنید
   Click "Create User"
```

### ایجاد کاربر فرزند / Creating Child User

**بهتر است والد درخواست کند**
**Better to let parent create child through their dashboard**

یا / Or manually:

```
۱. داشبورد > Users > Add New
   Dashboard > Users > Add New

۲. اطلاعات فرزند را وارد کنید:
   Enter child information:
   
   - نام کاربری: child_name
   - رمز عبور: Strong password

۳. در "Role" گزینه "Child" را انتخاب کنید
   Select "Child" role

۴. روی "Create User" کلیک کنید
   Click "Create User"

۵. در "User Meta" این فیلد را اضافه کنید:
   Add this in User Meta:
   
   Key: parent_id
   Value: [ID والد] (مثل: 5)
```

---

## 📝 برچسب‌گذاری محتوا / Content Tagging

### هنگام ایجاد پست / When Creating Posts

```
۱. Posts > Add New
   یا > Edit

۲. مطلب خود را بنویسید
   Write your post content

۳. سمت راست صفحه فیلترهای محتوا را ببینید:
   On the right side, you'll see:

   ✓ Age Group      - سن مناسب
   ✓ Genre          - نوع محتوا
   ✓ Content Warning - هشدارهای محتوا

۴. برچسب‌های مناسب را انتخاب کنید:
   Select appropriate tags:
   
   مثال: پوست برای کودکان
   Example: Post for children
   
   ✓ Age Group: 5+
   ✓ Genre: Educational, Animation
   ✓ Warnings: (None)

۵. پست را منتشر کنید
   Publish the post
```

### مثال: محتوای ترسناک / Example: Horror Content

```
پوست: "بررسی فیلم‌های ترسناک"
Post: "Horror Movie Review"

برچسب‌ها:
Tags:

Age Group:     18+ (فقط بزرگسالان)
Genre:         Horror, Drama
Warnings:      Violence, Scary Scenes

نتیجه:
Result: فقط کسانی که 18+ می‌باشند و Horror 
        و Drama انتخاب کرده‌اند و Violence 
        و Scary Scenes را مسدود نکرده‌اند می‌توانند ببینند

Only those 18+, with Horror/Drama, 
without blocking Violence/Scary can see
```

---

## 🖥️ مدیریت داشبورد / Dashboard Management

### دسترسی به داشبورد / Accessing Dashboard

```
Admin Dashboard:
/wp-admin/?page=pcpc_dashboard

نمایش:
Shows:

📊 آمار سریع / Quick Statistics
   - تعداد والدین
   - تعداد فرزندان
   - تعداد محتوا
   - تعداد فرزندان تنظیم شده

⚡ اقدامات سریع / Quick Actions
   - مدیریت گروه‌های سنی
   - مدیریت ژانرها
   - مدیریت هشدارها
   - تنظیمات پلاگین

👥 فعالیت اخیر / Recent Activity
   - آخرین والدین
   - آخرین فرزندان

✅ وضعیت سیستم / System Status
   - بررسی نقش‌های سیستم
   - بررسی دسته‌بندی‌ها
```

---

## 🔍 بررسی سیستم / System Check

### چک کردن نصب صحیح / Checking Proper Installation

داشبورد پلاگین را باز کنید، بخش "System Status" را ببینید:

```
سبز (✓) = کار می‌کند
Green (✓) = Working

قرمز (✗) = مشکل دارد
Red (✗) = Problem

✓ Parent Role     - نقش والد فعال است
✓ Child Role      - نقش فرزند فعال است
✓ Age Group Tax   - دسته‌بندی گروه‌های سنی
✓ Genre Tax       - دسته‌بندی ژانرها
✓ Warning Tax     - دسته‌بندی هشدارها

اگر هر کدام قرمز است، نصب درست انجام نشده است
If any are red, installation wasn't completed properly
```

---

## 📊 ایجاد محتوای تست / Creating Test Content

### اجرای اسکریپت تست / Running Test Script

```
وارد WordPress شوید
Log in to WordPress

مسیر درخواست کنید:
Access this path:

/create-parental-control-test-data.php

صفحه ۷ محتوای تست را ایجاد می‌کند
The page creates 7 test posts

نتایج:
Results:

✓ Learning ABC (3+, Educational)
✓ Space Adventure (5+, Sci-Fi)
✓ Mystery (13+, Drama, Scary)
✓ Horror Review (18+, Horror, Violence)
✓ Documentary (13+, Documentary)
✓ Comedy (18+, Comedy, Language)
✓ Animation (All ages, Animation)
```

---

## 🧪 تست کامل / Complete Testing

### سناریوی تست / Test Scenario

```
۱. والد تست: testparent
   Test Parent: testparent

۲. فرزند تست: testchild
   Test Child: testchild

۳. اجازه‌ها:
   Permissions:
   - Age: 5+
   - Genre: Educational
   - Warnings: None blocked

۴. نتیجه انتظار:
   Expected Result:
   
   ✓ Learning ABC       - دیده می‌شود (5+ Education)
   ✓ Space Adventure    - دیده می‌شود (5+ Sci-Fi... نه!)
   
   Wait! Space Adventure is 5+ Sci-Fi,
   but child only allows Educational
   
   ✓ Learning ABC       - VISIBLE
   ✗ Space Adventure    - HIDDEN (need Sci-Fi)
```

---

## 🚨 حل مشکلات / Troubleshooting

### مشکل: والد نمی‌تواند فرزند ایجاد کند
Problem: Parent can't create child

```
حل:
Solution:

۱. بررسی کنید والد role صحیح دارد
   Check parent has "Parent" role

۲. بررسی کنید JavaScript فعال است
   Check JavaScript is enabled

۳. بررسی کنید فرزند نقل نکرده
   Check not reaching max children

۴. صفحه را جدید کنید (F5)
   Refresh page
```

### مشکل: فرزند همه محتوا را می‌بیند
Problem: Child sees all content

```
حل:
Solution:

۱. بررسی کنید اجازه‌ها ذخیره شده‌اند
   Check permissions were saved

۲. بررسی کنید پست‌ها برچسب دارند
   Check posts have tags

۳. صفحه فرزند را refresh کنید
   Refresh child's page

۴. cache را خالی کنید
   Clear cache
```

### مشکل: رمز عبور کار نمی‌کند
Problem: Password doesn't work

```
حل:
Solution:

۱. رمز را دوباره تنظیم کنید
   Reset password from parent dashboard

۲. از کاراکتر‌های خاص استفاده نکنید
   Avoid special characters

۳. حروف بزرگ/کوچک را بررسی کنید
   Check uppercase/lowercase
```

---

## 📞 پشتیبانی / Support

اگر مشکل حل نشد:
If problem persists:

- با مدیر سایت تماس بگیرید
  Contact site administrator
- صفحه plugin را مجدداً فعال/غیرفعال کنید
  Deactivate and reactivate plugin
- به GitHub issues بروید
  Check GitHub issues

**GitHub:** github.com/hbagheri/parental_control

---

**نسخه / Version:** 1.0  
**آخرین به‌روزرسانی / Last Updated:** June 2026
