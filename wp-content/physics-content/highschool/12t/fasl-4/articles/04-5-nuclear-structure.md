---
title: "ساختار هسته — پروتون، نوترون، انرژیِ بستگی ⚛️"
chapter: "فصل ۴ — فیزیک اتمی و هسته‌ای (تجربی)"
section: "۴-۵ ساختار هسته"
order: 5
slug: "nuclear-structure-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["هسته اتم", "پروتون", "نوترون", "ایزوتوپ", "انرژی بستگی", "تجربی"]
branches: ["فیزیک هسته‌ای"]
---

# ساختار هسته — پروتون، نوترون، انرژیِ بستگی ⚛️

> یه واقعیتِ شگفت 🔬: هسته‌ی اتم در حدِ $10^{-15}\,\text{m}$ (یک فمتومتر)‌ـه — یعنی ۱۰،۰۰۰ بار کوچک‌تر از اتم. ولی ۹۹.۹۸٪ جرمِ اتم در همین فضای ریز جمع شده. چگالیِ هسته ~ $10^{17}\,\text{kg/m}^3$ — یعنی یک قاشقِ هسته = جرمِ کوهِ هیمالیا!

## دو ذره‌ی هسته 🧱

- **پروتون** ($p$): بارِ $+e$، جرم $\approx 1.67\times 10^{-27}\,\text{kg}$
- **نوترون** ($n$): بارِ صفر، جرم تقریباً برابر پروتون

به‌طورِ کلی به این دو می‌گن **نوکلئون**.

## نمایش هسته 📐

$$
{}^A_Z X
$$

- $X$: نمادِ شیمیایی
- $Z$: عددِ اتمی = تعدادِ پروتون
- $A$: عددِ جرمی = $Z + N$ (تعدادِ کلِ نوکلئون)
- $N = A - Z$: تعدادِ نوترون

## ایزوتوپ‌ها 🔄

اتم‌هایی که **همان عددِ اتمی** ($Z$) ولی **عددِ جرمیِ متفاوت** ($A$) دارن — یعنی پروتون‌هاشون مساوی ولی نوترون‌هاشون متفاوته.

| ایزوتوپ | $Z$ | $N$ | کاربرد پزشکی |
|---|---|---|---|
| H-1 (پروتیوم) | 1 | 0 | معمولی |
| H-2 (دوتریوم) | 1 | 1 | مدل‌سازیِ MRI |
| H-3 (تریتیوم) | 1 | 2 | ردیاب رادیویی |
| C-12 | 6 | 6 | معمولی |
| C-14 | 6 | 8 | عمر‌سنجیِ آرکیولوژی |
| **F-18** | 9 | 9 | **PET scan** |
| I-127 | 53 | 74 | معمولی (تیروئید) |
| **I-131** | 53 | 78 | **درمان هیپرتیروئیدی** |
| **Tc-99m** | 43 | 56 | **تصویربرداریِ قلب/استخوان** |

## نیرویِ هسته‌ای 💪

چرا پروتون‌ها در هسته از هم نمی‌پاشن (با وجودِ دفعِ الکتریکی)? چون یه نیرویِ دیگه هست:

**نیروی قوی هسته‌ای** (Strong Nuclear Force):
- خیلی قوی (~ ۱۰۰ برابر الکترومغناطیس)
- خیلی کوتاه‌برد (~ ۱-۲ fm)
- بین همه‌ی نوکلئون‌ها — جذبیه
- بدونِ تمایز بارِ الکتریکی (بین p-p، n-n، p-n یکسانه)

## نقصِ جرم و انرژیِ بستگی 🔋

اگه جرمِ نوکلئون‌های جدا رو با جرمِ هسته‌ی شکل‌گرفته مقایسه کنیم:

$$
\Delta m = (Z m_p + N m_n) - M_\text{هسته}
$$

این **نقصِ جرم**، تبدیل شده به **انرژیِ بستگی** (از $E = mc^2$ انیشتین):

$$
E_b = \Delta m \cdot c^2
$$

این انرژیِ بستگی، **انرژیِ لازم برای جدا کردنِ کلِ هسته** ‌ـه.

## انرژیِ بستگیِ هر نوکلئون 📊

تقسیمش به تعدادِ نوکلئون → $E_b/A$. نمودارش شکل **زنگ-معکوس** داره:
- بیشینه: حدودِ $A = 56$ (آهن، Fe) با ~۸.۸ MeV/nucleon
- این یعنی هسته‌ی آهن **پایدارترین** ‌ـه

<iframe src="/wp-content/physics-content/highschool/12/fasl-6/widgets/nuclear-binding-energy.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="انرژی بستگی هسته"></iframe>

## مثال — انرژیِ بستگیِ هلیوم-۴ 🎯

داده‌ها:
- $m_p = 1.007276\,u$
- $m_n = 1.008665\,u$
- $M(\text{He-4}) = 4.001506\,u$

$$
\Delta m = 2(1.007276) + 2(1.008665) - 4.001506 = 0.030376\,u
$$

با $1\,u\cdot c^2 = 931.5\,\text{MeV}$:

$$
E_b = 0.030376 \times 931.5 \approx 28.3\,\text{MeV}
$$

نوکلئون‌بر-نوکلئون: $28.3/4 \approx 7.07\,\text{MeV}$.

## محاسبه با پایتون 🐍

```python
# انرژی بستگی هسته‌ها
import numpy as np

# جرم‌های اتمی (در یکای u)
masses = {
    "H-1":  1.007825,
    "He-4": 4.002602,
    "C-12": 12.000000,
    "O-16": 15.994915,
    "Fe-56": 55.934936,
    "U-235": 235.043930,
    "U-238": 238.050788,
}

m_p_atomic = 1.007825  # H-1 اتمی (پروتون + الکترون)
m_n = 1.008665

def binding_energy(name, mass, Z, A):
    delta_m = Z*m_p_atomic + (A-Z)*m_n - mass
    E_b_MeV = delta_m * 931.5
    return E_b_MeV, E_b_MeV / A

# Z values
Z = {"H-1": 1, "He-4": 2, "C-12": 6, "O-16": 8, "Fe-56": 26, "U-235": 92, "U-238": 92}
A = {"H-1": 1, "He-4": 4, "C-12": 12, "O-16": 16, "Fe-56": 56, "U-235": 235, "U-238": 238}

print(f"{'هسته':>10s}  {'A':>5s}  {'Z':>5s}  {'E_b (MeV)':>12s}  {'E_b/A (MeV)':>14s}")
for name, m in masses.items():
    Eb, EbA = binding_energy(name, m, Z[name], A[name])
    print(f"{name:>10s}  {A[name]:>5d}  {Z[name]:>5d}  {Eb:>12.1f}  {EbA:>14.2f}")

# مشاهده: Fe-56 با ~8.79 MeV/nucleon پایدارترین هسته‌ست
# هسته‌های سبک (H, He) با ادغام (گداخت) انرژی آزاد می‌کنن
# هسته‌های سنگین (U) با شکست انرژی آزاد می‌کنن
# (هر دو فرآیند به نفعِ نزدیک شدن به Fe-56 ‌ـه)
```

## نکته‌ی پزشکی-زیستی 🩺

- **F-18 (PET)**: ۹ پروتون، ۹ نوترون — ناپایدار، عمر کوتاه (۱۱۰ دقیقه)
- **Tc-99m**: ۴۳ پروتون، ۵۶ نوترون — ناپایدار، عمر کوتاه (۶ ساعت)
- **MRI**: تشدیدِ پروتون‌های آب (H-1) در میدانِ مغناطیسی — فیزیکِ هسته‌ای در سطحِ بنیادی
- **رادیوداروی سرطان**: I-131 (تیروئید)، Sm-153 (متاستازِ استخوانی)، Ra-223 (پروستات)
- **عمرسنجی کربن-۱۴**: شناختِ بقایای انسانی، مومیایی، آرکیولوژی

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [هسته اتم](https://fa.wikipedia.org/wiki/%D9%87%D8%B3%D8%AA%D9%87_%D8%A7%D8%AA%D9%85)
- Wikipedia EN: [Atomic nucleus](https://en.wikipedia.org/wiki/Atomic_nucleus)
- Wikipedia EN: [Nuclear binding energy](https://en.wikipedia.org/wiki/Nuclear_binding_energy)
- HyperPhysics: [Nuclear binding](http://hyperphysics.phy-astr.gsu.edu/hbase/nucene/nucbin.html)
- Khan Academy: [Nuclear physics](https://www.khanacademy.org/science/physics/quantum-physics)

### ویدئو (یوتیوب)
- [Veritasium — The most powerful force in the universe](https://www.youtube.com/results?search_query=veritasium+strong+force)
- [PBS Space Time — Nuclear physics basics](https://www.youtube.com/results?search_query=pbs+space+time+nuclear)
- [Real Engineering — How radioisotopes work](https://www.youtube.com/results?search_query=real+engineering+radioisotopes)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: ساختار هسته اتم](https://www.aparat.com/result/%D8%B3%D8%A7%D8%AE%D8%AA%D8%A7%D8%B1_%D9%87%D8%B3%D8%AA%D9%87_%D8%A7%D8%AA%D9%85)
- [جست‌وجو: انرژی بستگی هسته](https://www.aparat.com/result/%D8%A7%D9%86%D8%B1%DA%98%DB%8C_%D8%A8%D8%B3%D8%AA%DA%AF%DB%8C_%D9%87%D8%B3%D8%AA%D9%87)

### شبیه‌سازی PhET
- [Build a Nucleus](https://phet.colorado.edu/en/simulations/build-a-nucleus)
- [Nuclear Physics](https://phet.colorado.edu/en/simulations/nuclear-fission)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-sakhtar-haste/)

---

*در بخشِ بعدی می‌ریم سراغ پدیده‌ی پرتوزایی و نیمه‌عمر — [I-131، Tc-99m و دیگر رادیوداروها](https://physicsme.ir/articles/radioactivity-half-life-tajrobi/) ☢️.*
