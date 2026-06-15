---
title: "انرژی خازن — چطور یک قطعه قلب را احیا می‌کند 💓"
chapter: "فصل ۱ — الکتریسیتۀ ساکن (تجربی)"
section: "۱-۱۱ انرژی خازن"
order: 11
slug: "capacitor-energy-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["انرژی خازن", "دفیبریلاتور", "AED", "پایداری قلب", "ژول"]
---

# انرژی خازن — چطور یک قطعه قلب را احیا می‌کند 💓

> یه واقعیت تکان‌دهنده 🩺: هر سال در ایران، حدود **۱۰۰ هزار نفر** از ایست قلبی فوت می‌کنن. اگه در ۵ دقیقه‌ی اول یه AED در دسترس باشه، نرخِ بقا از ۱۰٪ به ۷۰٪ می‌رسه. تنها چیزی که فرق ایجاد می‌کنه؟ **انرژیِ ذخیره‌شده در یه خازن**.

## فرمولِ انرژی خازن ⚡

سه فرمولِ معادلِ هم برای انرژیِ ذخیره در خازن:

$$U = \frac{1}{2} \, C \, V^2 \quad = \quad \frac{1}{2} \, Q \, V \quad = \quad \frac{Q^2}{2C}$$

- $U$: انرژی به ژول
- $C$: ظرفیت
- $V$: ولتاژ
- $Q$: بار

**کلیدی‌ترین فرمول**: $U = \frac{1}{2} C V^2$ — می‌بینی که با مربعِ ولتاژ بزرگ می‌شه. اگه ولتاژ رو دو برابر کنی، انرژی **چهار برابر** می‌شه.

## چرا $\frac{1}{2}$؟ 🤔

وقتی شارژ می‌کنی، اولِ کار ولتاژ صفره (بار آسون می‌ره). آخرِ کار ولتاژ بیشینه‌ست (بار سخت می‌ره). میانگین = $\frac{1}{2}V$. پس کل کار = $Q \cdot \frac{1}{2}V = \frac{1}{2}QV$.

## مثال‌های کاربردی 📌

| دستگاه | $C$ | $V$ | $U = \frac{1}{2}CV^2$ |
|---|---|---|---|
| فلش گوشی | $100\,\mu\text{F}$ | $5\,\text{V}$ | $1.25\,\text{mJ}$ |
| فلاش دوربین | $1000\,\mu\text{F}$ | $300\,\text{V}$ | $45\,\text{J}$ |
| AED قلب | $50\,\mu\text{F}$ | $2000\,\text{V}$ | $100\,\text{J}$ |
| دفیبریلاتور پیشرفته | $32\,\mu\text{F}$ | $5000\,\text{V}$ | $400\,\text{J}$ |
| ابر-خازنِ خودرو هیبرید | $3000\,\text{F}$ | $2.7\,\text{V}$ | $10.9\,\text{kJ}$ |

## دفیبریلاتور — لحظه‌ای که جانی نجات می‌یابد 🚑

ایست قلبی به‌خاطر **فیبریلاسیون بطنی** اتفاق می‌افته — ماهیچه‌ی قلبی به‌جای ضربانِ هماهنگ، می‌لرزه. AED با شُکِ ۱۵۰-۲۰۰ ژول کلِ سلول‌های قلب رو **همزمان قطبی** می‌کنه و اجازه می‌ده ضربانِ منظم از سر گرفته بشه.

**زمان‌بندی AED**:
1. شارژ: ۵-۱۰ ثانیه به ۲۰۰۰ ولت
2. تخلیه: ۵-۲۰ میلی‌ثانیه
3. توانِ لحظه‌ای: $200\,\text{J} / 0.01\,\text{s} = 20\,\text{kW}$ — معادلِ یه پمپِ آبِ صنعتی!

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/energy-khazen-quiz.html" width="100%" height="420" style="border:none; border-radius:12px;" loading="lazy" title="پرسش انرژی خازن"></iframe>

## محاسبه‌ی پایتون — مدلِ کاملِ AED 🐍

```python
import math

# پارامترهای AED استاندارد
C = 50e-6        # 50 µF
V_target = 2000  # ولت
R_charge = 100   # اهم: مقاومت شارژ
R_body = 50      # اهم: مقاومت بدن (پوست + بافت)

# انرژی ذخیره‌شده در خازن
U_stored = 0.5 * C * V_target**2
print(f"انرژی ذخیره در خازن: {U_stored:.1f} J")

# زمان شارژ (تقریب RC)
tau_charge = R_charge * C
t_charge_99 = 5 * tau_charge   # ~99% در 5τ
print(f"زمان شارژ (~99%): {t_charge_99*1000:.1f} ms")

# زمان تخلیه روی بدن
tau_discharge = R_body * C
t_discharge_99 = 5 * tau_discharge
print(f"زمان تخلیه روی بدن: {t_discharge_99*1000:.1f} ms")

# توان لحظه‌ای (در تخلیه)
P_peak = V_target**2 / R_body
print(f"توان لحظه‌ای: {P_peak/1000:.1f} kW")

# انرژی واقعاً انتقال‌داده‌شده به قلب
# تقریب: 60% انرژی صرف بدن، 40% صرف پوست
fraction_to_heart = 0.6
U_to_heart = U_stored * fraction_to_heart
print(f"انرژی واقعی به قلب: {U_to_heart:.1f} J")
```

## نکته‌ی پزشکی-زیستی 🩺

- **AED برای کودکان** — معمولاً ۵۰-۷۵ ژول (نه ۲۰۰)، چون قفسه‌ی سینه نازک‌تره
- **ICD (Implantable Cardioverter-Defibrillator)** — یه دفیبریلاتورِ کارگذاشتنی، خازنش حدود ۱۰۰ µF با ولتاژِ ۷۰۰ ولت = ۲۵ ژول
- **CPR و AED با هم** — CPR گردشِ خون رو حفظ می‌کنه، AED سلول‌های قلبی رو احیا می‌کنه. هر دو لازم
- **عضلاتِ تنفسی هم خازنی‌ـن** — تحریکِ دیافراگم با خازنِ ریز در بیماران ALS (روشی نوین)

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [انرژی خازن](https://fa.wikipedia.org/wiki/%D8%AE%D8%A7%D8%B2%D9%86)، [دفیبریلاتور](https://fa.wikipedia.org/wiki/%D8%AF%D9%81%DB%8C%D8%A8%D8%B1%DB%8C%D9%84%D8%A7%D8%AA%D9%88%D8%B1)
- Wikipedia EN: [Capacitor energy](https://en.wikipedia.org/wiki/Capacitor#Energy_stored_in_capacitors)، [Automated external defibrillator](https://en.wikipedia.org/wiki/Automated_external_defibrillator)
- HyperPhysics: [Energy stored on capacitor](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/capeng.html)

### ویدئو (یوتیوب)
- [Walter Lewin — Energy in Capacitors](https://www.youtube.com/results?search_query=walter+lewin+capacitor+energy)
- [Veritasium — How a Defibrillator Works](https://www.youtube.com/results?search_query=veritasium+defibrillator)
- [SciShow — AED Demo](https://www.youtube.com/results?search_query=scishow+AED+demo)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: انرژی خازن یازدهم](https://www.aparat.com/result/%D8%A7%D9%86%D8%B1%DA%98%DB%8C_%D8%AE%D8%A7%D8%B2%D9%86_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: عملکرد دفیبریلاتور](https://www.aparat.com/result/%D8%B9%D9%85%D9%84%DA%A9%D8%B1%D8%AF_%D8%AF%D9%81%DB%8C%D8%A8%D8%B1%DB%8C%D9%84%D8%A7%D8%AA%D9%88%D8%B1)

### شبیه‌سازی PhET
- [Capacitor Lab](https://phet.colorado.edu/en/simulations/capacitor-lab-basics)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با محاسباتِ بیشتر](https://physicsme.ir/articles/energy-khazen/)

---

*فصلِ ۱ تموم شد! حالا وقتِ [حل مسائل فصل](https://physicsme.ir/articles/problems-chapter-1-y11-tajrobi/) و [فلش‌کارت‌های مرور](https://physicsme.ir/articles/flashcards-chapter-1-y11-tajrobi/) ست. در فصلِ ۲ می‌ریم سراغ **جریانِ الکتریکی** — حالا بار حرکت می‌کنه! ⚡*
