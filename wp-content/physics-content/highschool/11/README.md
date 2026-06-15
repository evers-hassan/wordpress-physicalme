# 📚 محتوای فیزیک یازدهم — راهنمای CLI

محتوای آموزشیِ کتابِ فیزیک یازدهم (ریاضی-فیزیک) برای سایتِ **physicsme.ir**.

## ورود به سایت ⚠️
- فقط `.md`های `articles/` پست شوند (frontmatter). `README.md`/`PLACEHOLDERS-TODO.md` وارد نشوند.
- `widgets/` استاتیک سرو شوند (iframe)؛ مسیرِ `/widgets/...` اصلاح شود.
- اجرای دوباره: upsert بر اساسِ `slug`.

## ویجت‌های سفارشی 🎮
- فصل ۱ (۶): balloon-wall، electroscope، coulomb-law، electric-field-point، electric-shield، capacitor-lab.
- فصل ۲ (۶): current-flow (۲-۱)، ohm-law (۲-۲)، resistivity (۲-۳)، emf-circuit (۲-۴)، power-meter (۲-۵)، combo-resistors (۲-۶ سری/موازی).
- کوییزها: ۱-۱ تا ۱-۱۲ و ۲-۱ تا ۲-۶.

## عکس‌های موردنیاز 🖼️
- ۲-۲: مقاومت رنگی، مولتی‌متر | ۲-۳: کابل پرفشار، ابررسانا، نیکروم
- ۲-۴: ماهیِ الکتریکی، باتری | ۲-۵: کنتورِ برق، LED vs رشته‌ای | ۲-۶: ریسه‌ی سری/موازی | ۱-۱: کهربا

## مسائل 📝
آرایه‌ی مسائلِ فصل ۱: `problems-y11-fasl-1-array.js` (جدا).

## وضعیت 📊
- فصل ۱: کامل ✅
- فصل ۲: **هر ۶ زیرفصل آماده ✅** (۲-۱ تا ۲-۶)؛ می‌ماند: مسائلِ پایانِ فصل ۲.

## عکس‌ها 🖼️ (مهم)
عکس‌ها در پوشه‌ی `images/` قرار دارند و در مقاله‌ها با `<img src="/images/NAME.jpg">` صدا زده شده‌اند.
**CLI باید پوشه‌ی `images/` را استاتیک سرو کند و مسیرِ پایه‌ی `/images/` را — دقیقاً مثلِ `/widgets/` — بازنویسی کند.**
اگر مسیر/پیشوندِ دیگری لازم است، فقط `src="/images/..."`ها را در مقاله‌ها جایگزین کنید.
نام فایل‌ها: 01-1-kahroba، 02-2-resistors، 02-2-multimeter، 02-2-ohm-portrait، 02-3-power-lines، 02-3-nichrome، 02-3-superconductor، 02-4-car-battery، 02-4-electric-fish، 02-5-meter، 02-5-led-vs-bulb، 02-6-string-lights (همه .jpg).
