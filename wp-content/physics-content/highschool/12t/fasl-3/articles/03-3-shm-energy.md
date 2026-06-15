---
title: "انرژی در SHM — رقصِ جنبشی و کشسانی ⚡"
chapter: "فصل ۳ — نوسان و امواج (تجربی)"
section: "۳-۳ انرژی در نوسان"
order: 3
slug: "shm-energy-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["انرژی", "SHM", "جنبشی", "کشسانی", "پایستگی", "تجربی"]
branches: ["مکانیک"]
---

# انرژی در SHM — رقصِ جنبشی و کشسانی ⚡

> یه شهود زیبا 🪀: تو نوسانِ یه فنر، **انرژی از یک شکل به شکلِ دیگه‌ای تبدیل می‌شه** ولی مجموعش همیشه ثابته. تو دو نقطه‌ی انتهایی، همه‌ش پتانسیله. تو وسط، همه‌ش جنبشی. این رقص، اساسِ همه‌ی نوسانگرهاست.

## دو نوع انرژی در SHM 🔋

### انرژی جنبشی

$$
K = \tfrac{1}{2}mv^2 = \tfrac{1}{2}m\omega^2(A^2 - x^2)
$$

- در $x=0$ (تعادل) بیشینه: $K_\text{max} = \tfrac{1}{2}m\omega^2 A^2$
- در $x=\pm A$ (انتها) صفر

### انرژی پتانسیل کشسانی

$$
U = \tfrac{1}{2}k x^2
$$

- در $x=\pm A$ بیشینه: $U_\text{max} = \tfrac{1}{2}k A^2$
- در $x=0$ صفر

## انرژی کل ثابته 🛡️

$$
E_\text{کل} = K + U = \tfrac{1}{2}k A^2 = \text{ثابت}
$$

این یعنی **انرژیِ یه نوسانگر، با مربعِ دامنه متناسبه**. دامنه‌ی دو برابر ⇒ انرژی چهار برابر.

<iframe src="/wp-content/physics-content/highschool/12/fasl-3/widgets/shm-energy.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="انرژی در SHM"></iframe>

## مثال — انرژی موجِ صوتی 👂

شدّتِ موجِ صوتی متناسبِ مربعِ دامنه‌ی نوسانِ مولکول‌های هواست:

$$
I \propto A^2
$$

دامنه‌ی دو برابر ⇒ شدّت ۴ برابر ⇒ تفاوتِ ۶ dB. همینه چرا کم کردنِ صدا با دو برابر کردن فاصله، فقط ۶ dB کم می‌کنه.

## مثال — دزیپاسیون انرژی در بافتِ نرم 🩻

سونوگرافی دامنه‌ی موج اولیه‌اش ~۱ MPa ‌ـه. هر چه عمیق‌تر می‌ره، دامنه (و در نتیجه انرژی) به‌خاطر جذب در بافت کم می‌شه. تخمینِ تجربی: ۰.۵ dB/cm/MHz.

## محاسبه با پایتون 🐍

```python
# مدلِ ساده‌ی توزیعِ انرژی در SHM در طولِ یک دوره
import numpy as np

m = 0.1     # kg — جرم آونگ
k = 4       # N/m — ثابت فنر
A = 0.2     # m — دامنه
omega = np.sqrt(k/m)

# انرژی کل
E_total = 0.5 * k * A**2
print(f"انرژی کل: {E_total:.4f} J")

# توزیعِ K و U در طولِ یک دوره
phases = np.linspace(0, 2*np.pi, 9)
print()
print(f"{'φ (rad)':>10s}  {'x (m)':>10s}  {'K (J)':>10s}  {'U (J)':>10s}  {'K+U':>10s}")
for phi in phases:
    x = A * np.cos(phi)
    v = -A * omega * np.sin(phi)
    K = 0.5 * m * v**2
    U = 0.5 * k * x**2
    print(f"{phi:10.3f}  {x:10.4f}  {K:10.5f}  {U:10.5f}  {K+U:10.5f}")

# مشاهده: K+U در همه‌جا ثابته (پایستگی انرژی!)
# همینه چرا یه آونگِ بدون اصطکاک «هرگز» متوقف نمی‌شه.
```

## نکته‌ی پزشکی-زیستی 🩺

- **سنسورِ ارتوپدی فعال**: انرژیِ ذخیره‌شده در فنرِ تجدیدشدنی → برداشتِ کاتترِ خود-حرکت
- **شنوایی**: انرژیِ موجِ صوتی، انرژیِ نوسانِ غشا، نهایتاً انرژیِ تحریکِ سلولِ مویی
- **سرفه**: انرژی پتانسیلیِ ریه ⇒ انرژی جنبشی هوا با سرعت تا 500 km/h
- **HIFU** (High-Intensity Focused Ultrasound): تمرکزِ انرژیِ صوتی برای از بین بردنِ تومور

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [انرژی نوسان](https://fa.wikipedia.org/wiki/%D8%AD%D8%B1%DA%A9%D8%AA_%D9%87%D9%85%D8%A7%D9%87%D9%86%DA%AF_%D8%B3%D8%A7%D8%AF%D9%87)
- Wikipedia EN: [Energy in SHM](https://en.wikipedia.org/wiki/Simple_harmonic_motion#Energy)
- HyperPhysics: [SHM energy](http://hyperphysics.phy-astr.gsu.edu/hbase/shm2.html)
- Khan Academy: [Energy in SHM](https://www.khanacademy.org/science/physics/mechanical-waves-and-sound)

### ویدئو (یوتیوب)
- [Veritasium — Conservation of energy](https://www.youtube.com/results?search_query=veritasium+conservation+energy)
- [PhysicsHigh — SHM energy graphs](https://www.youtube.com/results?search_query=physics+SHM+energy)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: انرژی نوسان دوازدهم](https://www.aparat.com/result/%D8%A7%D9%86%D8%B1%DA%98%DB%8C_%D9%86%D9%88%D8%B3%D8%A7%D9%86_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Masses and Springs: Energy](https://phet.colorado.edu/en/simulations/masses-and-springs)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-energy-shm/)

---

*در بخشِ بعد می‌ریم سراغِ یکی از قشنگ‌ترین پدیده‌ها — [تشدید](https://physicsme.ir/articles/resonance-tajrobi/) 📢.*
