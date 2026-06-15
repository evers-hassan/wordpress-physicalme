---
title: "میدان الکتریکی — اثر نامرئی بارها بر فضا ✨"
chapter: "فصل ۱ — الکتریسیتۀ ساکن (تجربی)"
section: "۱-۴ میدان الکتریکی"
order: 4
slug: "electric-field-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["میدان الکتریکی", "بار آزمون", "E", "نیرو بر بار", "ECG"]
---

# میدان الکتریکی — اثر نامرئی بارها بر فضا ✨

> یه سؤالِ خوب 💭: قلبِ تو هر ثانیه یه موجِ الکتریکی تولید می‌کنه — اون موج به پوستِ تو هم می‌رسه و **ECG** اون رو ثبت می‌کنه. ولی چی بینِ قلب و پوست هست که این پیام رو منتقل می‌کنه؟ هیچی! فقط **میدانِ الکتریکی**. مفهومِ میدان، یکی از انقلابی‌ترین ایده‌های فیزیکه.

## تعریفِ میدان الکتریکی 🌐

میدانِ الکتریکی $\vec{E}$ در یه نقطه از فضا، نیرویی‌ـه که اون نقطه می‌تونه بر یه واحدِ بارِ مثبت وارد کنه:

$$\vec{E} = \frac{\vec{F}}{q_0}$$

- **یکا**: نیوتن بر کولن ($\text{N/C}$) — معادل **ولت بر متر** ($\text{V/m}$)
- $q_0$: یه **بارِ آزمون** — به‌قدری کوچک که میدانِ موجود رو خراب نکنه
- $\vec{E}$ یه کمیتِ **برداری**ـه — هم اندازه داره، هم جهت

## معنیِ شهودی 💡

یه بارِ منبع، اطرافش رو «تغییر می‌ده». یه بارِ آزمونِ ثانوی که میذاری تو این فضا، نیرو حس می‌کنه. خودِ بارِ آزمون مهم نیست — اون فقط داره میدان رو **آشکار** می‌کنه.

**قاعده‌ی جهت**: جهتِ $\vec{E}$ هم‌جهتِ نیرویی‌ـه که بر **بارِ مثبت** وارد می‌شه. برای بارِ منفی، نیرو در جهت **مخالف** میدانه.

## نیرو از روی میدان 🎯

اگه میدان رو در یه نقطه بدونی، نیروی واردبر هر باری در اون نقطه:

$$\vec{F} = q \, \vec{E}$$

- بارِ مثبت → نیرو هم‌جهتِ میدان
- بارِ منفی → نیرو خلافِ میدان

## ویجتِ تعاملی — میدانِ یه بارِ نقطه‌ای 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/electric-field-point.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="میدان بار نقطه‌ای"></iframe>

## محاسبه‌ی پایتون — میدانِ ECG 🐍

```python
# تقریب ساده: قلب رو یه دوقطبی الکتریکی فرض کن
# میدانش روی پوست (در فاصله 15 سانتی‌متر) چقدر است؟

import math
k = 8.99e9
q = 1e-7        # بار سطحی متوسط ≈ 100 نانوکولن
r = 0.15        # متر

E = k * q / r**2
print(f"میدان قلب روی پوست: E ≈ {E:.2f} V/m")
# تقریباً 40 V/m — موجِ ECG با همین حد بزرگی روی الکترود ثبت می‌شه

# اگه نیروی وارد بر یه یون Cl- در همین میدان رو بخوای:
e = 1.602e-19
F_ion = e * E
print(f"نیروی بر یون: {F_ion:.2e} N")
# عددی بسیار کوچک ولی کافی برای مهاجرتِ یون در غشای پیراست
```

## نکته‌ی پزشکی-زیستی 🩺

- **ECG و EEG** — هر دو دقیقاً اندازه‌گیریِ میدانِ الکتریکیِ تولیدشده توسط سلول‌های قلبی و عصبی هستن
- **پتانسیلِ غشای سلولی** — میدانِ داخلِ غشای سلولی حدودِ $10^7\,\text{V/m}$ ـه. این میدانِ خیلی قویه ولی به‌دلیل ضخامتِ ۸ نانومتری غشا، ولتاژش فقط ۷۰ میلی‌ولت می‌شه
- **TMS (Transcranial Magnetic Stimulation)** — تحریکِ نورون با میدانِ القاشده، در روان‌پزشکی برای افسردگی استفاده می‌شه
- **پاکسازیِ هوا با میدان** — دستگاه‌های فیلترِ HEPA با میدانِ الکتریکی ذراتِ گرد و غبار رو جذب می‌کنن

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/meydan-electriki-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش میدان الکتریکی"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [میدان الکتریکی](https://fa.wikipedia.org/wiki/%D9%85%DB%8C%D8%AF%D8%A7%D9%86_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)
- Wikipedia EN: [Electric field](https://en.wikipedia.org/wiki/Electric_field)
- HyperPhysics: [Electric field](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/elefie.html)
- Khan Academy: [Electric fields](https://www.khanacademy.org/science/physics/electric-charge-electric-force-and-voltage)

### ویدئو (یوتیوب)
- [MIT 8.02 Walter Lewin — Electric Fields](https://www.youtube.com/results?search_query=walter+lewin+electric+fields)
- [Crash Course — Electric Fields](https://www.youtube.com/results?search_query=crash+course+electric+fields)
- [3Blue1Brown — Visualizing Fields](https://www.youtube.com/results?search_query=3blue1brown+vector+field)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: میدان الکتریکی یازدهم](https://www.aparat.com/result/%D9%85%DB%8C%D8%AF%D8%A7%D9%86_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: ECG فیزیک قلب](https://www.aparat.com/result/ECG_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D9%82%D9%84%D8%A8)

### شبیه‌سازی PhET
- [Charges and Fields](https://phet.colorado.edu/en/simulations/charges-and-fields)
- [Electric Field of Dreams](https://phet.colorado.edu/en/simulations/electric-field-of-dreams)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با مشتق‌گیری بُرداری](https://physicsme.ir/articles/meydan-electriki/)

---

*در بخش بعدی محاسبه می‌کنیم میدانِ ساخته‌شده توسطِ یه بارِ نقطه‌ای رو دقیق — [میدانِ یک ذره‌ی باردار](https://physicsme.ir/articles/field-from-point-charge-tajrobi/) 🎯.*
