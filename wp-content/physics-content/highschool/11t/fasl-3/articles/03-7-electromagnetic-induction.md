---
title: "پدیده‌ی القای الکترومغناطیسی — کشفی که جهان را برق‌رسانی کرد ⚡"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۷ پدیده‌ی القای الکترومغناطیسی"
order: 7
slug: "electromagnetic-induction-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["القا", "فاراده", "شار مغناطیسی", "ژنراتور", "wireless charging"]
---

# پدیده‌ی القای الکترومغناطیسی — کشفی که جهان را برق‌رسانی کرد ⚡

> یه واقعیتِ شگفت‌انگیز 🔋: گوشیِ تو رو **بدونِ سیم** شارژ می‌کنی، MRI تصویرِ مغزتو می‌گیره، ژنراتورِ نیروگاهی برقِ تو رو می‌سازه — همه با همین پدیده. مایکل فارادی در ۱۸۳۱ این پدیده رو کشف کرد و **انقلاب صنعتیِ الکتریکی** شکل گرفت.

## کشفِ تاریخیِ فارادی 🧪

فارادی متوجه شد: اگه یه آهنربا رو نزدیک به سیم‌پیچ **حرکت** بدی، در سیم‌پیچ **جریانِ الکتریکی القا می‌شه**. ولی اگه آهنربا ساکن باشه، جریان نداری.

**نکته‌ی کلیدی**: فقط **تغییرِ** میدان، جریان القا می‌کنه. میدانِ ثابت → بی‌اثر.

## شارِ مغناطیسی 📐

برای فهمِ القا، نیاز به مفهومِ **شارِ مغناطیسی** داریم — مثلِ «جریانِ میدان» از یه سطح:

$$\Phi_B = B \cdot A \cdot \cos\theta$$

- $\Phi_B$: شار مغناطیسی (یکا: **وبر**، $\text{Wb}$ = $\text{T·m}^2$)
- $A$: سطح
- $\theta$: زاویه‌ی $\vec{B}$ با عمود بر سطح

**شار** = چقدر خطوطِ میدان از سطح رد می‌شن.

## ۳ راه برای تغییرِ شار (= القای جریان) 🎯

1. **تغییرِ $B$** — آهنربا رو نزدیک یا دور کن، یا میدان رو قوی-ضعیف کن
2. **تغییرِ $A$** — سیم‌پیچ رو فشرده یا کشیده کن
3. **تغییرِ $\theta$** — سیم‌پیچ رو بچرخون نسبت به میدان (پایه‌ی ژنراتور!)

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/magnet-coil-emf.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="آهنربا و سیم‌پیچ — emf القایی"></iframe>

<iframe src="/wp-content/physics-content/highschool/11/widgets/magnetic-flux-explorer.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="کاوشگر شار مغناطیسی"></iframe>

## محاسبه‌ی پایتون — شارژِ بی‌سیمِ گوشی 🐍

```python
# شارژر بی‌سیم Qi (استاندارد) برای موبایل
# سیم‌پیچ شارژر و گوشی روی هم قرار می‌گیرند
# فرکانس کاری: 100-200 kHz

import math
mu_0 = 4 * math.pi * 1e-7

# سیم‌پیچ شارژر:
N_tx = 30                # تعداد دور
R_tx = 0.03              # شعاع 3 سانتی‌متر
I_tx = 1.0               # 1 آمپر متناوب
f = 150e3                # 150 kHz
omega = 2 * math.pi * f

# میدان مغناطیسی در فاصله 5mm (روی گوشی)
d = 5e-3
A_tx = math.pi * R_tx**2

# تقریب میدان روی محور:
B = (mu_0 * N_tx * I_tx * R_tx**2) / (2 * (R_tx**2 + d**2)**1.5)
print(f"میدان روی گوشی: {B*1e6:.1f} µT")

# شار مغناطیسی روی سیم‌پیچ گوشی:
N_rx = 20
R_rx = 0.025
A_rx = math.pi * R_rx**2
Phi = B * A_rx
print(f"شار مغناطیسی: {Phi*1e9:.1f} nWb")

# emf القایی (با تغییر سینوسی)
emf = N_rx * omega * Phi
print(f"emf القایی RMS: {emf:.2f} V")
# تقریباً 5 V - دقیقاً ولتاژ شارژر استاندارد!
```

## نکته‌ی پزشکی-زیستی 🩺

- **شارژرِ بی‌سیمِ پیس‌میکر** — بیماران دیگه نیاز به جراحی برای تعویض باتری ندارن. شارژرِ خارجی پشتِ پوست، شارژ می‌کنه
- **القا در ایمپلنت‌های کاشتنی (cochlear implant)** — منبعِ انرژی و سیگنالِ صوتی هر دو با القا منتقل می‌شن
- **MRI gradient coils** — تغییرِ سریعِ میدان (= جریانِ القایی) صدای کوبشِ MRI رو ایجاد می‌کنه
- **تحریکِ مغزِ ترانس‌کرانیال (TMS)** — پالسِ مغناطیسی → جریانِ القایی در مغز → فعالیتِ نورونی
- **همیشه برعکس**: حرکتِ شما در میدانِ MRI، جریانِ القایی در بدن می‌سازه — به همین دلیل بیمار باید بی‌حرکت باشه

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/padide-elgha-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش القای الکترومغناطیسی"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [القای الکترومغناطیسی](https://fa.wikipedia.org/wiki/%D8%A7%D9%84%D9%82%D8%A7%DB%8C_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%D9%88%D9%85%D8%BA%D9%86%D8%A7%D8%B7%DB%8C%D8%B3%DB%8C)
- Wikipedia EN: [Electromagnetic induction](https://en.wikipedia.org/wiki/Electromagnetic_induction)، [Wireless power transfer](https://en.wikipedia.org/wiki/Wireless_power_transfer)
- HyperPhysics: [Induction](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/farlaw.html)

### ویدئو (یوتیوب)
- [Veritasium — How Wireless Charging Works](https://www.youtube.com/results?search_query=veritasium+wireless+charging)
- [Walter Lewin — Faraday's Discovery](https://www.youtube.com/results?search_query=walter+lewin+faraday+induction)
- [Practical Engineering — Induction](https://www.youtube.com/results?search_query=practical+engineering+induction)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: القای الکترومغناطیسی یازدهم](https://www.aparat.com/result/%D8%A7%D9%84%D9%82%D8%A7%DB%8C_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%D9%88%D9%85%D8%BA%D9%86%D8%A7%D8%B7%DB%8C%D8%B3%DB%8C_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Faraday's Law](https://phet.colorado.edu/en/simulations/faradays-law)
- [Generator](https://phet.colorado.edu/en/simulations/generator)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/padide-elgha/)

---

*در بخش بعدی، فرمولِ ریاضی این کشف رو می‌بینیم — [قانون فاراده](https://physicsme.ir/articles/faraday-law-tajrobi/) 📐.*
