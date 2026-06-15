---
title: "نیروی مغناطیسی بر ذره‌ی باردار — قانون لورنتس و حرکت دایره‌ای 🎯"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۳ نیروی مغناطیسی بر ذره‌ی باردار متحرک"
order: 3
slug: "magnetic-force-on-charge-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["لورنتس", "نیروی مغناطیسی", "حرکت دایره‌ای", "سیکلوترون", "اسپکترومتری"]
---

# نیروی مغناطیسی بر ذره‌ی باردار — قانون لورنتس و حرکت دایره‌ای 🎯

> یه واقعیت 🩺: دستگاهِ **اسپکترومترِ جرمی** که در آنالیزِ خون، تشخیصِ پروتئین و کشفِ مارکرهای سرطان استفاده می‌شه، روی یه قانونِ ساده‌ی فیزیکِ یازدهم بنا شده — **نیروی مغناطیسی بر ذره‌ی باردار**. این بخش، اون رابطه‌ی شگفت‌انگیز رو روشن می‌کنه.

## قانون لورنتس 📐

نیروی مغناطیسی بر یه ذره‌ی باردار:

$$F = q \, v \, B \, \sin\theta$$

- $q$: بار (کولن)
- $v$: سرعت
- $B$: میدان
- $\theta$: زاویه‌ی بینِ $\vec{v}$ و $\vec{B}$

**جهت**: با **قاعده‌ی دستِ راست** — انگشتانِ راست رو در جهتِ $\vec{v}$ بگیر، خم کن به طرفِ $\vec{B}$. شستت جهتِ $\vec{F}$ رو نشون می‌ده (برای بارِ مثبت). برای بارِ منفی، جهت معکوسه.

## دو حالتِ خاص ✨

1. **اگه $\vec{v} \parallel \vec{B}$** ($\theta = 0$ یا $180°$) → نیرو **صفر**ـه. ذره با حرکتِ مستقیم به راهش ادامه می‌ده
2. **اگه $\vec{v} \perp \vec{B}$** ($\theta = 90°$) → نیرو **بیشینه**ـه ($F = qvB$). ذره **حرکتِ دایره‌ای** انجام می‌ده

## حرکتِ دایره‌ای — مهم‌ترین حالت 🔄

اگه ذره عمود بر میدان وارد شه:
- نیروی $qvB$ به‌عنوانِ نیروی مرکزگرا ($m v^2 / r$) عمل می‌کنه
- شعاعِ دایره: $\boxed{r = \dfrac{mv}{qB}}$
- دوره‌ی تناوب: $T = \dfrac{2\pi m}{qB}$ — مستقل از سرعت!
- بسامد: $f = \dfrac{qB}{2\pi m}$ — این **بسامدِ سیکلوترون** نام داره

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/charged-particle-circular.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="حرکت دایره‌ای در میدان مغناطیسی"></iframe>

## محاسبه‌ی پایتون — اسپکترومتر جرمی 🐍

```python
# اسپکترومتر جرمی برای تشخیص مولکول
# دو یون با جرم متفاوت در میدان یکسان

import math

q = 1.602e-19           # بار یک یون (یون‌سازی شده)
B = 0.5                 # تسلا (میدان دستگاه)
v = 1e5                 # m/s (پس از شتاب)

# گلوکز: C6H12O6
m_glucose = 180.16 / 6.022e23 * 1e-3   # kg
r_glucose = m_glucose * v / (q * B)
print(f"شعاع گلوکز: {r_glucose*1000:.3f} mm")

# اوره: CH4N2O
m_urea = 60.06 / 6.022e23 * 1e-3
r_urea = m_urea * v / (q * B)
print(f"شعاع اوره: {r_urea*1000:.3f} mm")

# تفاوت در اندازه‌گیری شعاع → تفاوت در جرم → شناسایی
diff_mm = (r_glucose - r_urea) * 1000
print(f"تفاوت قابل تشخیص: {diff_mm:.3f} mm")
# دستگاه با دقت میکرومتر این رو تشخیص می‌ده

# سیکلوترون پزشکی (تولید رادیوایزوتوپ برای PET):
# پروتون با بسامد سیکلوترون 13 MHz
m_proton = 1.67e-27
B_cyclo = 0.85
f_cyclo = q * B_cyclo / (2 * math.pi * m_proton)
print(f"\nبسامد سیکلوترون پزشکی: {f_cyclo/1e6:.1f} MHz")
```

## نکته‌ی پزشکی-زیستی 🩺

- **اسپکترومتر جرمی** — برای تشخیصِ پروتئین در آنالیزِ خون، تشخیصِ سرطان از روی مارکرها، فارماکوکینتیک
- **سیکلوترونِ پزشکی** — تولیدِ ایزوتوپ‌های رادیواکتیو برای PET (مثل $^{18}\text{F}$). ذراتِ باردار رو به دایره می‌اندازه و شتاب می‌ده
- **پروتون‌تراپیِ سرطان** — پروتون‌ها رو شتاب می‌دن (با همین قانون) و به تومور هدایت می‌کنن. مزیتش: تخریبِ کمتر بافتِ سالم نسبت به X-ray
- **هیپرترمیا با ذراتِ مغناطیسی** — ذراتِ آهنی در تومور تزریق می‌شن و با میدانِ متناوب گرم می‌شن، تومور رو می‌سوزونن

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/charged-particle-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش نیرو بر بار"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [نیروی لورنتس](https://fa.wikipedia.org/wiki/%D9%86%DB%8C%D8%B1%D9%88%DB%8C_%D9%84%D9%88%D8%B1%D9%86%D8%AA%D8%B2)
- Wikipedia EN: [Lorentz force](https://en.wikipedia.org/wiki/Lorentz_force)، [Mass spectrometry](https://en.wikipedia.org/wiki/Mass_spectrometry)، [Cyclotron](https://en.wikipedia.org/wiki/Cyclotron)
- HyperPhysics: [Lorentz force](http://hyperphysics.phy-astr.gsu.edu/hbase/magnetic/magfor.html)

### ویدئو (یوتیوب)
- [Walter Lewin — Charged Particle in B](https://www.youtube.com/results?search_query=walter+lewin+charged+particle+magnetic)
- [SciShow — Proton Therapy](https://www.youtube.com/results?search_query=scishow+proton+therapy)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: قانون لورنتس یازدهم](https://www.aparat.com/result/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D9%84%D9%88%D8%B1%D9%86%D8%AA%D8%B2)
- [جست‌وجو: اسپکترومتر جرمی](https://www.aparat.com/result/%D8%A7%D8%B3%D9%BE%DA%A9%D8%AA%D8%B1%D9%88%D9%85%D8%AA%D8%B1_%D8%AC%D8%B1%D9%85%DB%8C)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/magnetic-force-on-charge/)

---

*در بخش بعدی، نیروی مغناطیسی روی سیمِ حاملِ جریان رو می‌بینیم — پایه‌ی **موتورِ الکتریکی** — [نیروی مغناطیسی بر سیم](https://physicsme.ir/articles/force-on-current-wire-tajrobi/) ⚙️.*
