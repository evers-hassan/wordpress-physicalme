# چک‌لیست تست جامع / Comprehensive Testing Checklist

**تاریخ تست / Testing Date:** June 12, 2026  
**محیط / Environment:** ayimi WordPress Sandbox  
**نسخه / Version:** 1.0  

---

## ✅ تست‌های نصب / Installation Tests

### ۱. فعال‌سازی پلاگین / Plugin Activation

```
[ ] پلاگین در لیست فعال دیده می‌شود
    Plugin appears in active plugins list

[ ] هیچ error یا warning نشان نمی‌دهد
    No errors or warnings displayed

[ ] نقش‌های سیستم ایجاد شده‌اند
    System roles created:
    - [ ] Parent role exists
    - [ ] Child role exists

[ ] دسته‌بندی‌های سیستم ایجاد شده‌اند
    Taxonomies created:
    - [ ] Age Groups: 3+, 5+, 13+, 18+
    - [ ] Genres: 8 items
    - [ ] Warnings: 5 items

[ ] صفحات سیستم ایجاد شده‌اند
    System pages created:
    - [ ] Parent Profile
    - [ ] Child Profile
    - [ ] Child Change Password
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های تنظیمات / Settings Tests

### ۲. دسترسی به تنظیمات / Settings Access

```
[ ] تنظیمات در منو دیده می‌شود
    Settings visible in admin menu:
    Settings > Parental Control

[ ] صفحه تنظیمات بدون error باز می‌شود
    Settings page opens without errors

[ ] تمام فیلدها دیده می‌شود
    All fields visible:
    - [ ] Max Children
    - [ ] Parent Redirect
    - [ ] Child Redirect
    - [ ] Page URLs
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۳. ذخیره‌سازی تنظیمات / Saving Settings

```
[ ] تنظیمات ذخیره می‌شوند
    Settings save successfully

[ ] پیام موفقیت نشان داده می‌شود
    Success message appears

[ ] تنظیمات بعد از جدید‌کردن صفحه باقی می‌مانند
    Settings persist after page refresh

[ ] تنظیمات غیر درست ریجکت می‌شود
    Invalid settings are rejected
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های داشبورد / Dashboard Tests

### ۴. دسترسی به داشبورد / Dashboard Access

```
[ ] داشبورد در منو دیده می‌شود
    Dashboard appears in admin menu

[ ] داشبورد بدون error باز می‌شود
    Dashboard opens without errors

[ ] صفحه بطور کامل بارگذاری می‌شود
    Page loads completely
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۵. نمایش آمار / Statistics Display

```
[ ] کارت والدین نشان داده می‌شود
    Parent card displays correctly

[ ] کارت فرزندان نشان داده می‌شود
    Children card displays correctly

[ ] کارت پست‌ها نشان داده می‌شود
    Posts card displays correctly

[ ] کارت فرزندان تنظیم شده نشان داده می‌شود
    Configured children card displays

[ ] اعداد صحیح هستند
    Numbers are correct
    - [ ] Parent count matches Users with parent role
    - [ ] Child count matches Users with child role
    - [ ] Post count matches published posts
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۶. دکمه‌های اقدام سریع / Quick Action Buttons

```
[ ] دکمه‌ها دیده می‌شوند
    Buttons are visible

[ ] لینک‌های دکمه‌ها صحیح هستند
    Button links work:
    - [ ] Manage Age Groups → Correct page
    - [ ] Manage Genres → Correct page
    - [ ] Manage Warnings → Correct page
    - [ ] Plugin Settings → Correct page
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۷. جداول فعالیت / Activity Tables

```
[ ] جدول والدین نشان داده می‌شود
    Recent parents table displays

[ ] جدول فرزندان نشان داده می‌شود
    Recent children table displays

[ ] اطلاعات صحیح نشان داده می‌شود
    Data is correct:
    - [ ] Parent names correct
    - [ ] Child names correct
    - [ ] Configuration status correct
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۸. جدول وضعیت سیستم / System Status Table

```
[ ] جدول دیده می‌شود
    Table is visible

[ ] وضعیت نقش‌ها صحیح است
    Role status is correct:
    - [ ] Parent role: ✓ Active
    - [ ] Child role: ✓ Active

[ ] وضعیت دسته‌بندی‌ها صحیح است
    Taxonomy status is correct:
    - [ ] Age Group: ✓ Active
    - [ ] Genre: ✓ Active
    - [ ] Warnings: ✓ Active
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های کاربران / User Tests

### ۹. ایجاد کاربر والد / Creating Parent User

```
[ ] والد می‌تواند ایجاد شود
    Parent user can be created

[ ] نقش والد اختصاص داده می‌شود
    Parent role is assigned

[ ] والد می‌تواند وارد شود
    Parent can login

[ ] والد به صفحه والدین منتقل می‌شود
    Parent redirects to parent page
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۱۰. ایجاد کاربر فرزند / Creating Child User

```
[ ] فرزند می‌تواند ایجاد شود (توسط والد)
    Child can be created by parent

[ ] نقش فرزند اختصاص داده می‌شود
    Child role is assigned

[ ] parent_id ذخیره می‌شود
    parent_id metadata is saved

[ ] فرزند می‌تواند وارد شود
    Child can login

[ ] فرزند به صفحه اصلی منتقل می‌شود
    Child redirects to home page
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های اجازه‌دهی / Permission Tests

### ۱۱. UI مدیریت اجازه‌ها / Permission Management UI

```
[ ] رابط کاربری اجازه‌ها دیده می‌شود
    Permission UI is visible

[ ] تمام دسته‌بندی‌ها دیده می‌شود
    All categories visible:
    - [ ] Age Groups
    - [ ] Genres
    - [ ] Content Warnings

[ ] Checkbox‌ها کار می‌کنند
    Checkboxes work correctly

[ ] دکمه Save Permissions دیده می‌شود
    Save Permissions button visible
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۱۲. ذخیره‌سازی اجازه‌ها / Saving Permissions

```
[ ] اجازه‌ها ذخیره می‌شوند
    Permissions save successfully

[ ] پیام موفقیت نشان داده می‌شود
    Success message appears

[ ] اجازه‌ها در user metadata ذخیره می‌شود
    Permissions saved in metadata:
    - [ ] pcpc_allowed_age_groups
    - [ ] pcpc_allowed_genres
    - [ ] pcpc_blocked_warnings
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های محتوا / Content Tests

### ۱۳. ایجاد محتوای تست / Creating Test Content

```
[ ] اسکریپت تست اجرا می‌شود
    Test script runs without errors

[ ] تمام ۷ پوست ایجاد می‌شود
    All 7 test posts created

[ ] تمام برچسب‌ها اختصاص داده می‌شود
    All tags assigned:
    - [ ] Age groups
    - [ ] Genres
    - [ ] Warnings
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۱۴. برچسب‌گذاری محتوا / Content Tagging

```
[ ] پست‌های جدید را می‌توان برچسب‌گذاری کرد
    New posts can be tagged

[ ] برچسب‌های گروه سنی کار می‌کنند
    Age group tags work

[ ] برچسب‌های ژانر کار می‌کنند
    Genre tags work

[ ] برچسب‌های هشدار کار می‌کنند
    Warning tags work
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های فیلتر محتوا / Content Filtering Tests

### ۱۵. فیلتر محتوا برای فرزند / Content Filtering for Child

```
حالا با اجازه‌های زیر لاگین کنید:
Login as child with these permissions:
- Age Groups: 5+
- Genres: Educational, Animation
- Warnings: None blocked

[ ] می‌تواند "Learning ABC" را ببیند
    Can see "Learning ABC" ✓
    (3+ and 5+, Educational, no warnings)

[ ] می‌تواند "Space Adventure" را ببیند
    CAN SEE? ✗ (Should NOT - Sci-Fi not allowed)
    Expected: HIDDEN

[ ] می‌تواند "Animated Film" را ببیند
    Can see "Animated Film" ✓
    (All ages, Animation, no warnings)

[ ] نمی‌تواند "Horror Review" را ببیند
    Cannot see "Horror Review" ✓
    (18+ only, not 5+)

[ ] نمی‌تواند "Mystery" را ببیند
    Cannot see "Mystery" ✓
    (Has Scary warning)
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۱۶. فیلتر محتوا برای والد / Content Filtering for Parent

```
والد باید همه محتوا را ببیند
Parent should see all content:

[ ] والد می‌تواند همه پست‌ها را ببیند
    Parent can see all posts

[ ] محتوا محدود نمی‌شود
    No content is restricted
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۱۷. تغییر اجازه‌ها و بروزرسانی فیلتر / Changing Permissions

```
اجازه‌های فرزند را تغییر دهید:
Change child permissions to:
- Age Groups: 13+
- Genres: All
- Warnings: Block Violence, Scary

[ ] اجازه‌های جدید ذخیره می‌شود
    New permissions save

[ ] فرزند اکنون می‌تواند "Mystery" را ببیند
    Child can now see "Mystery" ✓

[ ] فرزند نمی‌تواند "Horror Review" را ببیند
    Child cannot see "Horror Review" ✓
    (Has Violence warning)

[ ] تغییرات فوری هستند
    Changes are immediate
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های امنیتی / Security Tests

### ۱۸. حمایت CSRF / CSRF Protection

```
[ ] تمام فرم‌های AJAX نonce دارند
    All AJAX forms have nonces

[ ] Nonce‌ها درست بررسی می‌شود
    Nonces are verified correctly

[ ] درخواست بدون nonce رد می‌شود
    Requests without nonce fail
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۱۹. اعتبار کاربر / User Authorization

```
[ ] فرزند نمی‌تواند والد شود
    Child cannot become parent

[ ] والد می‌تواند فرزندان دیگران را ویرایش کند
    Parent cannot edit other's children

[ ] والد می‌تواند فقط اجازه‌های خود را تغییر دهد
    Parent can only change own permissions
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۲۰. تمیز‌سازی ورودی / Input Sanitization

```
[ ] HTML/Script در ورودی پاک می‌شود
    HTML/Script in input is stripped

[ ] ایمیل‌های نامعتبر رد می‌شود
    Invalid emails are rejected

[ ] نام‌های کاربری خطرناک رد می‌شود
    Dangerous usernames are rejected
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های کارکردی / Functional Tests

### ۲۱. تغییر رمز عبور / Changing Password

```
[ ] والد می‌تواند رمز فرزند را تغییر دهد
    Parent can change child's password

[ ] رمز جدید کار می‌کند
    New password works

[ ] رمز قدیمی کار نمی‌کند
    Old password doesn't work
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۲۲. غیرفعال کردن/فعال کردن فرزند / Enabling/Disabling Child

```
[ ] والد می‌تواند فرزند را غیرفعال کند
    Parent can disable child

[ ] فرزند غیرفعال نمی‌تواند وارد شود
    Disabled child cannot login

[ ] والد می‌تواند فرزند را دوباره فعال کند
    Parent can enable child again

[ ] فرزند دوباره می‌تواند وارد شود
    Child can login again
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۲۳. حذف فرزند / Deleting Child

```
[ ] والد می‌تواند فرزند را حذف کند
    Parent can delete child

[ ] فرزند حذف شده نمی‌تواند وارد شود
    Deleted child cannot login

[ ] تمام اطلاعات فرزند حذف می‌شود
    All child data is deleted
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های سازگاری / Compatibility Tests

### ۲۴. مرورگرهای مختلف / Different Browsers

```
[ ] Chrome/Chromium - کار می‌کند
    Works correctly

[ ] Firefox - کار می‌کند
    Works correctly

[ ] Safari - کار می‌کند
    Works correctly

[ ] Edge - کار می‌کند
    Works correctly
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۲۵. دستگاه‌های مختلف / Different Devices

```
[ ] Desktop - کار می‌کند
    Works on desktop

[ ] Tablet - کار می‌کند
    Works on tablet

[ ] Mobile - کار می‌کند
    Works on mobile
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## ✅ تست‌های عملکرد / Performance Tests

### ۲۶. سرعت بارگذاری / Loading Speed

```
[ ] داشبورد سریع بارگذاری می‌شود
    Dashboard loads quickly

[ ] صفحات فرزند سریع بارگذاری می‌شود
    Child pages load quickly

[ ] هیچ تاخیری نیست
    No noticeable lag
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

### ۲۷. پرسوی‌های بانک اطلاعات / Database Queries

```
[ ] کوئری‌های بیش از حد نیست
    No excessive queries

[ ] پرسوی‌های بهینه شده‌اند
    Queries are optimized

[ ] هیچ query خطا نیست
    No query errors
```

**نتیجه / Result:** ✓ PASS / ✗ FAIL

---

## 📊 خلاصه نتایج / Results Summary

### تعداد تست‌ها / Total Tests

```
کل تست‌های طراحی شده: 27
Total Designed Tests: 27

✓ تست‌های موفق: ___
  Passed: ___

✗ تست‌های ناموفق: ___
  Failed: ___

⚠️ تست‌های نیاز به تصحیح: ___
  Need Fixes: ___
```

### درصد موفقیت / Success Rate

```
(✓ Passed / Total) × 100 = ____%
```

### نتیجه نهایی / Final Result

```
[ ] ✓ همه تست‌ها موفق - پلاگین آماده است
    ALL TESTS PASSED - Plugin is ready

[ ] ⚠️ برخی تست‌ها ناموفق - تصحیح لازم است
    SOME TESTS FAILED - Fixes needed

[ ] ✗ بیشتر تست‌ها ناموفق - توسعه بیشتر لازم
    MOST TESTS FAILED - More development needed
```

---

## 📝 یادداشت‌های تستر / Tester Notes

```
نکات و مشاهدات:
Notes and Observations:

_________________________________
_________________________________
_________________________________
_________________________________

مشکلات پیدا شده:
Issues Found:

_________________________________
_________________________________
_________________________________

پیشنهادهای بهبود:
Improvement Suggestions:

_________________________________
_________________________________
```

---

**تاریخ تکمیل / Completion Date:** ___________  
**تستر / Tester:** ___________  
**امضا / Signature:** ___________  

---

**نسخه / Version:** 1.0  
**تاریخ: June 12, 2026**
