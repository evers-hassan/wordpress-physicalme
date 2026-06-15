---
title: "میدان یک ذره‌ی باردار — ساده‌ترین حالت میدان 🎯"
chapter: "فصل ۱ — الکتریسیتۀ ساکن (تجربی)"
section: "۱-۵ میدان حاصل از یک ذره‌ی باردار"
order: 5
slug: "field-from-point-charge-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["میدان", "بار نقطه‌ای", "Coulomb", "مغز", "EEG", "دوقطبی"]
---

# میدان یک ذره‌ی باردار — ساده‌ترین حالت میدان 🎯

> یه نکته‌ی شگفت‌انگیز 🧠: مغزِ تو در هر لحظه میلیاردها نورون داره که هر کدوم مثلِ یه دوقطبی کوچک رفتار می‌کنن. مجموعِ میدان‌های اون‌ها از پوستِ سرت گذر می‌کنه و دستگاهِ **EEG** اون رو ثبت می‌کنه. درکِ میدانِ یک بارِ نقطه‌ای، اولین قدم به فهمِ این پدیده‌ست.

## فرمولِ میدانِ بارِ نقطه‌ای ⚡

برای یه بارِ نقطه‌ای $q$ که در فضا قرار داره، میدانِ الکتریکی در فاصله‌ی $r$ از آن:

$$E = k \frac{|q|}{r^2}$$

- **اندازه** کوچک‌تر می‌شه با مربعِ فاصله
- **جهت** برای بارِ مثبت **شعاعی به سمتِ بیرون**، برای بارِ منفی **به سمتِ مرکز**

## معنیِ شهودی 💡

اگه بارِ $q$ یه «خورشید» باشه، میدانش مثلِ نورِ خورشیده — هرچی دورتر، ضعیف‌تر. فقط با مربعِ فاصله، نه با خود فاصله.

**چرا با مربعِ فاصله؟** چون میدان از سطحِ کره‌ای پخش می‌شه و سطحِ کره با $r^2$ زیاد می‌شه — این یعنی شدتِ میدان (تعدادِ خطوط در واحدِ سطح) با $r^2$ کم می‌شه.

## برهم‌نهیِ میدان‌ها 🧩

اگه چند بار داشته باشی، میدانِ کل در یه نقطه = **جمعِ برداریِ** میدانِ تک‌تکِ بارها:

$$\vec{E}_{\text{کل}} = \vec{E}_1 + \vec{E}_2 + \vec{E}_3 + ...$$

این اصلِ ساده، اساسِ تحلیلِ همه‌ی سیستم‌های پیچیده‌ست — از یه مولکولِ آب گرفته تا کلِ موجِ ECG.

## ویجتِ تعاملی — میدان بار نقطه‌ای 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/electric-field-point.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="میدان بار نقطه‌ای"></iframe>

## محاسبه‌ی پایتون — میدانِ دوقطبیِ مغزی 🐍

```python
# مدلِ ساده‌ی نورون به‌عنوان دوقطبی:
# دو بار مثبت و منفی به فاصله 2a از هم
# نقطه محاسبه: روی محور عمود بر دوقطبی، فاصله r از مرکز

import math
k = 8.99e9

q = 1e-12         # بار: 1 پیکوکولن (تخمینی برای یک نورون)
a = 1e-3          # نیم‌فاصله دوقطبی: 1 میلی‌متر
r = 0.05          # فاصله از پوست سر: 5 سانتی‌متر

# روی محور عمود وسطی (تقریب دوقطبی):
# E ≈ (k * 2qa) / r^3  (روی محور عمود)
p = 2 * q * a              # تعریفِ گشتاور دوقطبی
E_perp = k * p / r**3
print(f"میدان از یک دوقطبی نورون روی پوست: {E_perp:.2e} V/m")

# اگه 10^11 نورون در مغز با هم همگام شن (نظریه EEG)
N = 1e11
E_total = N * E_perp / 1e6      # 10^-6 ضریب برای تصادفی بودن جهت‌ها
print(f"میدان کل EEG روی پوست: {E_total:.2e} V/m")
```

## نکته‌ی پزشکی-زیستی 🩺

- **EEG** هزاران میکروولت روی پوست سر ثبت می‌کنه که حاصل **برهم‌نهیِ میدانِ میلیاردها نورون** است
- **MRI** از این مفهوم برعکس استفاده می‌کنه: یه میدانِ خارجی قوی اعمال می‌شه و واکنشِ هسته‌های هیدروژن (در آب) ثبت می‌شه
- **آنتن گیرنده‌ی موبایل**: ضعیف‌ترین سیگنالی که موبایل می‌گیره، حاصل میدانِ ضعیفه. تو هم یه آنتنی هستی — مغزت موجِ مغزی رو احساس می‌کنه

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/meydan-zarre-bardar-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش میدان بار نقطه‌ای"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [میدان الکتریکی](https://fa.wikipedia.org/wiki/%D9%85%DB%8C%D8%AF%D8%A7%D9%86_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)
- Wikipedia EN: [Point particle field](https://en.wikipedia.org/wiki/Electric_field#Point_charge)، [EEG](https://en.wikipedia.org/wiki/Electroencephalography)
- HyperPhysics: [Field from point charge](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/elefie.html#c2)

### ویدئو (یوتیوب)
- [Walter Lewin — Electric Field of Point Charge](https://www.youtube.com/results?search_query=walter+lewin+point+charge+field)
- [Veritasium — Where do magnetic fields come from?](https://www.youtube.com/results?search_query=veritasium+magnetic+field)
- [Crash Course — Electric Fields](https://www.youtube.com/results?search_query=crash+course+electric+fields)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: میدان بار نقطه‌ای یازدهم](https://www.aparat.com/result/%D9%85%DB%8C%D8%AF%D8%A7%D9%86_%D8%A8%D8%A7%D8%B1_%D9%86%D9%82%D8%B7%D9%87_%D8%A7%DB%8C_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: EEG فیزیک مغز](https://www.aparat.com/result/EEG_%D9%85%D8%BA%D8%B2_%D8%A7%D9%86%D8%B3%D8%A7%D9%86)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با محاسباتِ بُرداری](https://physicsme.ir/articles/meydan-zarre-bardar/)

---

*در بخش بعدی، روشِ بصریِ نمایشِ میدان رو می‌بینیم — [خطوط میدان](https://physicsme.ir/articles/field-lines-tajrobi/) 🗺️.*
