---
title: "طیفِ خطی — اثرِ انگشت اتم‌ها 🌈"
chapter: "فصل ۴ — فیزیک اتمی و هسته‌ای (تجربی)"
section: "۴-۲ طیف خطی"
order: 2
slug: "line-spectrum-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["طیف خطی", "بالمر", "هیدروژن", "طیف نشری", "تجربی"]
branches: ["کوانتوم"]
---

# طیفِ خطی — اثرِ انگشت اتم‌ها 🌈

> یه واقعیتِ جالب 🔬: نورِ سدیم (تیرِ کوچه) **زرد** ‌ـه، نورِ نئون **قرمز-نارنجی**. این رنگ‌ها تصادفی نیستن — هر اتم یه «اثرِ انگشتِ نوریِ» منحصربه‌فرد داره. این فصل، الفبای طیف‌سنجی‌ـه.

## دو نوع طیف 🎯

### طیفِ پیوسته (continuous)
از جسمِ داغ (فیلامنتِ لامپ، خورشید) ⇒ همه‌ی طول‌موج‌ها پوشیده می‌شن (رنگین‌کمان).

### طیفِ خطی (line)
از گازِ رقیقِ گرم ⇒ فقط چند طول‌موجِ خاص (خط‌های روشن).

## چرا خطیه؟ 📐

اتم‌ها فقط در **تراز‌های انرژیِ خاص** قرار می‌گیرن (یه اصلِ کوانتومی). وقتی الکترون از ترازِ بالاتر به پایین‌تر می‌افته، فوتونی با انرژیِ دقیقاً برابر اختلافِ تراز ساطع می‌کنه:

$$
hf = E_\text{بالا} - E_\text{پایین}
$$

## فرمول بالمر — اولین فرمولِ موفق 🎯

برای هیدروژن، اولین موفقیت رو بالمر (۱۸۸۵) داشت:

$$
\frac{1}{\lambda} = R_H\left(\frac{1}{n_1^2} - \frac{1}{n_2^2}\right)
$$

که $R_H = 1.097 \times 10^7\,\text{m}^{-1}$ ثابتِ ریدبرگ ‌ـه.

## سری‌های هیدروژن

| سری | $n_1$ | محدوده | کاربرد |
|---|---|---|---|
| لایمن | 1 | UV | ستاره‌شناسی |
| **بالمر** | 2 | **مرئی** | شناختِ هیدروژن |
| پاشن | 3 | IR | ستاره‌شناسی |

<iframe src="/wp-content/physics-content/highschool/12/fasl-5/widgets/emission-spectrum.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="طیف نشری اتم‌ها"></iframe>

## کاربردهای پزشکی-زیستی 🩺

### ۱) طیف‌سنج جذبی برای خونی
هموگلوبینِ اکسیژن‌دار و بدون‌اکسیژن در طول‌موج‌های متفاوت جذب دارن. این پایه‌ی **پلسِ اکسیمتر** (SpO2) ‌ـه — ۶۶۰ nm و ۹۴۰ nm.

### ۲) فلوئورسانس میکروسکوپی
ماده‌ی فلوئورسانت با نور UV تحریک می‌شه → فوتونِ مرئی پخش می‌کنه. کاربرد: نشانه‌گذاریِ ژنِ خاص، DAPI رنگ‌آمیزیِ DNA.

### ۳) طیف‌سنجی توده‌ای (Mass Spectrometry)
شناختِ مولکول‌های دارویی، پروتیینِ بیماری. هر مولکول یه «طیفِ توده‌ای» منحصربه‌فرد داره.

### ۴) MRI و طیفِ NMR
آب، چربی و متابولیت‌های مختلف در طیفِ NMR قله‌های متفاوتی دارن. کاربرد: MRS برای تشخیصِ تومور.

### ۵) آشکارسازِ گاما (طیفِ هسته‌ای)
تکنسیوم-۹۹m: ۱۴۰ keV، ید-۱۳۱: ۳۶۴ keV. هر رادیودارو طیفِ گامای منحصربه‌فردی داره.

## مثال — خطِ آلفای هیدروژن

محاسبه: انتقالی از $n=3$ به $n=2$:

$$
\frac{1}{\lambda} = 1.097\times 10^7\left(\frac{1}{4} - \frac{1}{9}\right) = 1.097\times 10^7 \times 0.139 \approx 1.524\times 10^6
$$

$\lambda \approx 656\,\text{nm}$ — نورِ **قرمز** ‌ـه. این همون «H-alpha» معروف‌ـه که در دیدنِ خورشید و کهکشان‌ها استفاده می‌شه.

## محاسبه با پایتون 🐍

```python
# محاسبه‌ی سری‌های هیدروژن
import numpy as np

R_H = 1.097e7  # m^-1
sequences = {
    "لایمن (n1=1)": 1,
    "بالمر (n1=2)": 2,
    "پاشن (n1=3)": 3,
}

print(f"{'سری':>15s}  {'انتقال':>12s}  {'طول‌موج (nm)':>15s}  {'نوع نور':>15s}")
for name, n1 in sequences.items():
    for n2 in range(n1+1, n1+5):
        inv_lambda = R_H * (1/n1**2 - 1/n2**2)
        lam_nm = 1 / inv_lambda * 1e9
        # تعیین نوع نور
        if lam_nm < 380:        nl = "UV"
        elif lam_nm < 750:      nl = "مرئی"
        else:                   nl = "IR"
        print(f"{name:>15s}  {n2:>4d}→{n1:>2d}     {lam_nm:>10.0f}        {nl:>10s}")

# نتایج کلیدی:
# H-alpha (n=3→2): 656 nm = قرمز
# H-beta  (n=4→2): 486 nm = آبی-سبز
# H-gamma (n=5→2): 434 nm = بنفش
```

## نکته‌ی پزشکی-زیستی 🩺

- **پلس اکسیمتر**: استفاده از تفاوتِ طیفِ جذبیِ HbO2 و Hb
- **فلوئورسانس in vivo**: GFP در سلول‌های ترانس‌ژنیک
- **PET F-18-FDG**: تشخیصِ تومورِ متابولیک
- **اسپکترومترِ ادرار**: تشخیصِ بیماری‌های متابولیک
- **MRS** (Magnetic Resonance Spectroscopy): تشخیصِ متابولیت‌های تومور مغزی

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [طیف نشری](https://fa.wikipedia.org/wiki/%D8%B7%DB%8C%D9%81_%D9%86%D8%B4%D8%B1%DB%8C)
- Wikipedia EN: [Emission spectrum](https://en.wikipedia.org/wiki/Emission_spectrum)
- Wikipedia EN: [Balmer series](https://en.wikipedia.org/wiki/Balmer_series)
- HyperPhysics: [Hydrogen spectrum](http://hyperphysics.phy-astr.gsu.edu/hbase/hyde.html)
- Khan Academy: [Atomic spectra](https://www.khanacademy.org/science/physics/quantum-physics)

### ویدئو (یوتیوب)
- [Veritasium — The most important spectrum](https://www.youtube.com/results?search_query=veritasium+spectrum)
- [PBS Space Time — Spectral lines](https://www.youtube.com/results?search_query=pbs+space+time+spectral+lines)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: طیف نشری هیدروژن](https://www.aparat.com/result/%D8%B7%DB%8C%D9%81_%D9%86%D8%B4%D8%B1%DB%8C_%D9%87%DB%8C%D8%AF%D8%B1%D9%88%DA%98%D9%86)
- [جست‌وجو: بالمر دوازدهم](https://www.aparat.com/result/%D8%A8%D8%A7%D9%84%D9%85%D8%B1_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Hydrogen Atom](https://phet.colorado.edu/en/simulations/hydrogen-atom)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-tayf-khatti/)

---

*در بخشِ بعد می‌ریم سراغ تاریخِ کشفِ مدلِ اتمی — [رادرفورد، بور و طلوعِ کوانتوم](https://physicsme.ir/articles/rutherford-bohr-tajrobi/) ⚛️.*
