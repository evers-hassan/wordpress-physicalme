---
title: "شکست موج — وقتی موج وارد محیط جدید می‌شه 🌈"
chapter: "فصل ۳ — نوسان و امواج (تجربی)"
section: "۳-۸ شکست موج"
order: 8
slug: "wave-refraction-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["شکست", "Snell", "ضریب شکست", "عدسی چشم", "فیبر نوری", "تجربی"]
branches: ["اپتیک"]
---

# شکست موج — وقتی موج وارد محیط جدید می‌شه 🌈

> یه واقعیتِ زیبا 👁️: عدسیِ چشمت نور رو با **شکست** روی شبکیه متمرکز می‌کنه. اگه قدرتِ شکستی کم باشه، تصویر پشتِ شبکیه می‌افته (دور-بین). زیاد باشه، جلوی شبکیه (نزدیک-بین). این فصل، الفبای اپتیکِ پزشکی‌ـه.

## شکست چیه؟ 🎯

وقتی موجی از یه محیط به محیطِ دیگه می‌ره و سرعتش تغییر می‌کنه، **جهتِ موج هم تغییر می‌کنه** — این پدیده‌ی شکسته.

## قانون اسنل (Snell) 📐

$$
\boxed{\,n_1 \sin\theta_1 = n_2 \sin\theta_2\,}
$$

که $n$ ضریبِ شکستِ محیط‌ـه (نسبتِ سرعتِ نور در خلأ به سرعت در محیط).

| محیط | $n$ |
|---|---|
| خلأ | 1.000 |
| هوا | 1.0003 |
| آب | 1.33 |
| قرنیه | 1.376 |
| لنزِ چشم | 1.40-1.42 |
| شیشه | 1.50 |
| الماس | 2.42 |

## ضریبِ شکست و سرعت

$$
n = \frac{c}{v}
$$

با $c \approx 3\times 10^8\,\text{m/s}$ سرعت نور در خلأ. هرچه $n$ بیشتر، سرعتِ نور در اون محیط کمتر و خمش بیشتر.

<iframe src="/wp-content/physics-content/highschool/12/fasl-4/widgets/wave-refraction.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="شکست موج تعاملی"></iframe>

## زاویه‌ی حد و بازتابِ کلی 🌟

اگه از محیطِ متراکم‌تر به رقیق‌تر بری (مثلاً آب به هوا)، زاویه‌ی شکست بزرگ‌تر از تابشه. در زاویه‌ای خاص (**زاویه‌ی حد**)، زاویه‌ی شکست به ۹۰° می‌رسه. در زاویه‌های بالاتر، نور دیگه بیرون نمی‌ره و کاملاً برمی‌گرده — **بازتابِ کلیِ داخلی** (Total Internal Reflection).

$$
\sin\theta_c = \frac{n_2}{n_1}
$$

برای مرزِ آب/هوا: $\theta_c \approx 48.6°$.

## مثال‌های پزشکی-زیستی 🩺

### ۱) عدسی چشم — کانون روی شبکیه 👁️

نور وارد قرنیه ⇒ شکست ⇒ وارد عدسی ⇒ شکست بیشتر ⇒ کانون روی شبکیه. اگه عدسی قوی‌تر از حد باشه (نزدیک‌بینی)، تصویر جلویِ شبکیه. عینکِ منفی این رو اصلاح می‌کنه.

### ۲) فیبر نوری در آندوسکوپی 🩻

فیبر نوری از بازتابِ کلیِ داخلی استفاده می‌کنه. نور وارد فیبر می‌شه و بدون فرارِ بیرونی، تا انتها می‌رسه. آندوسکوپی، فیبروسکپ، حتی کاتترِ نوری.

### ۳) لیزرِ چشم‌پزشکی (LASIK) 🎯

لیزر اکسایمر با تغییرِ شکلِ قرنیه، ضریبِ شکست رو تنظیم می‌کنه. در نتیجه نقطه‌ی کانونِ نور دقیقاً روی شبکیه می‌افته.

### ۴) اولتراساوندِ تشخیصی — شکست در بافت 🩺

موجِ صوتی هم در مرزِ بافت‌ها شکست می‌خوره. سرعتِ صوت در چربی ۱۴۵۰، در ماهیچه ۱۵۸۰ m/s ⇒ اختلافِ ضریبِ شکستِ صوتی → خمشِ موج.

### ۵) سرابِ صحرا یا آب 🏜️

شکست در لایه‌های هوای داغ-سرد → شبیه‌سازیِ سطحِ آب. در پزشکی، شکستِ نور در لیوانِ آب → دیدنِ ساختار درون ادرار-تست.

## محاسبه با پایتون 🐍

```python
# مدلِ ساده‌ی عدسیِ چشم
import numpy as np

# ضرایبِ شکست
n_air = 1.0003
n_cornea = 1.376
n_lens = 1.40
n_aqueous = 1.336

# نمونه: نور با زاویه‌ی 30 درجه از هوا به قرنیه
theta1_deg = 30
theta1 = np.radians(theta1_deg)

# مرحله 1: هوا → قرنیه
theta2 = np.arcsin(n_air * np.sin(theta1) / n_cornea)
print(f"هوا → قرنیه: {theta1_deg}° → {np.degrees(theta2):.2f}°")

# مرحله 2: قرنیه → مایع آبیِ پیش‌چشمی
theta3 = np.arcsin(n_cornea * np.sin(theta2) / n_aqueous)
print(f"قرنیه → آبی: {np.degrees(theta2):.2f}° → {np.degrees(theta3):.2f}°")

# مرحله 3: آبی → عدسی
theta4 = np.arcsin(n_aqueous * np.sin(theta3) / n_lens)
print(f"آبی → عدسی: {np.degrees(theta3):.2f}° → {np.degrees(theta4):.2f}°")

# مجموع زاویه‌ی شکست
print(f"\nزاویه نهایی: {np.degrees(theta4):.2f}°")
print(f"خمشِ کل: {theta1_deg - np.degrees(theta4):.2f}°")

# تفسیر:
# عدسیِ چشم نور رو از 30° به ~21° می‌خمونه
# همینه چرا تصویرِ شبکیه فشرده می‌شه و خوب می‌بینیم
```

## نکته‌ی پزشکی-زیستی 🩺

- **آستیگماتیسم**: شکلِ نامتقارن قرنیه ⇒ شکستِ غیریکنواخت ⇒ تاریِ دید
- **آب‌مروارید**: ابریِ عدسی ⇒ پخشِ نور به‌جای شکستِ تمیز
- **میکروسکوپ ابری-فاز**: استفاده از تفاوتِ ضریبِ شکست در سلول‌های زنده برای تصویربرداری بدون رنگ‌آمیزی
- **OCT (Optical Coherence Tomography)**: تصویربرداری از شبکیه با بازتاب‌های نوری
- **LASIK**: شکل‌دهیِ مجدد قرنیه با لیزر — اصلاحِ نزدیک‌بینی، آستیگماتیسم

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [شکست نور](https://fa.wikipedia.org/wiki/%D8%B4%DA%A9%D8%B3%D8%AA_%D9%86%D9%88%D8%B1)
- ویکی‌پدیای فارسی: [قانون اسنل](https://fa.wikipedia.org/wiki/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D8%A7%D8%B3%D9%86%D9%84)
- Wikipedia EN: [Refraction](https://en.wikipedia.org/wiki/Refraction)
- Wikipedia EN: [Total internal reflection](https://en.wikipedia.org/wiki/Total_internal_reflection)
- HyperPhysics: [Refraction](http://hyperphysics.phy-astr.gsu.edu/hbase/geoopt/refr.html)
- Khan Academy: [Refraction & Snell's law](https://www.khanacademy.org/science/physics/geometric-optics)

### ویدئو (یوتیوب)
- [SmarterEveryDay — How a fiber optic cable works](https://www.youtube.com/results?search_query=smarter+every+day+fiber+optic)
- [Veritasium — Why light slows down in glass](https://www.youtube.com/results?search_query=veritasium+light+glass)
- [The Action Lab — Total internal reflection demo](https://www.youtube.com/results?search_query=action+lab+total+internal+reflection)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: شکست نور دوازدهم](https://www.aparat.com/result/%D8%B4%DA%A9%D8%B3%D8%AA_%D9%86%D9%88%D8%B1_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: قانون اسنل آزمایش](https://www.aparat.com/result/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D8%A7%D8%B3%D9%86%D9%84_%D8%A2%D8%B2%D9%85%D8%A7%DB%8C%D8%B4)

### شبیه‌سازی PhET
- [Bending Light](https://phet.colorado.edu/en/simulations/bending-light)
- [Geometric Optics](https://phet.colorado.edu/en/simulations/geometric-optics)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-shekast-mowj/)

---

*فصلِ ۳ تموم شد! حالا بریم تمرین — [مسائلِ فصل ۳](https://physicsme.ir/articles/problems-chapter-3-y12-tajrobi/) و [فلش‌کارت‌ها](https://physicsme.ir/articles/flashcards-chapter-3-y12-tajrobi/) 📝.*
