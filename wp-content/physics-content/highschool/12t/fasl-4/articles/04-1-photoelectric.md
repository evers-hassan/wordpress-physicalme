---
title: "اثر فوتوالکتریک — نور به‌مثلِ ذره ⚡"
chapter: "فصل ۴ — فیزیک اتمی و هسته‌ای (تجربی)"
section: "۴-۱ اثر فوتوالکتریک"
order: 1
slug: "photoelectric-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["فوتوالکتریک", "فوتون", "انیشتین", "تابع کار", "پلانک", "تجربی"]
branches: ["کوانتوم", "فیزیک مدرن"]
---

# اثر فوتوالکتریک — نور به‌مثلِ ذره ⚡

> یه پدیده‌ی شگفت 🌞: نور رو روی فلز بتابون — اگه بسامد به‌قدر کافی بالا باشه، الکترون از فلز بیرون می‌پره. شدت نور رو زیاد کنی، **تعدادِ** الکترون‌ها بیشتر می‌شه ولی **انرژیشون** تغییر نمی‌کنه. این کشف توسطِ انیشتین (۱۹۰۵)، فیزیک رو وارد عصرِ کوانتوم کرد.

## پدیده 🎯

نور با بسامدِ $f$ به سطحِ فلزی برخورد می‌کنه:

- اگه $f < f_0$ (بسامدِ آستانه) → هیچ الکترونی بیرون نمی‌اد، **هرچقدر هم شدتِ نور زیاد باشه**
- اگه $f \ge f_0$ → الکترون‌ها بیرون می‌پرن (فوتوالکترون‌ها)
- شدت نور بیشتر → **تعدادِ** الکترون‌های بیشتر (نه انرژیشون!)

این رفتار، با موجی بودنِ نور **سازگار نیست**.

## فرضِ انیشتین — فوتون 💡

انیشتین گفت نور **بسته‌بسته** (کوانتیده) می‌اد. هر بسته یه «فوتون» با انرژیِ:

$$
E_\text{فوتون} = hf
$$

که $h = 6.626 \times 10^{-34}\,\text{J·s}$ ثابتِ پلانک ‌ـه.

## معادله‌ی فوتوالکتریک 📐

$$
\boxed{\,K_\text{max} = hf - W\,}
$$

که:
- $K_\text{max}$ بیشترین انرژیِ جنبشیِ فوتوالکترون
- $hf$ انرژیِ فوتون
- $W$ **تابع کار** — حداقل انرژیِ لازم برای جدا کردنِ الکترون از فلز

## بسامدِ آستانه

$f_0 = W/h$ → بسامدی که در آن $K_\text{max} = 0$.

| فلز | $W$ (eV) | $f_0$ (Hz) | $\lambda_0$ (nm) |
|---|---|---|---|
| سزیم | 2.1 | 5.1e14 | 590 (زرد) |
| پتاسیم | 2.3 | 5.6e14 | 540 (سبز) |
| روی | 4.3 | 1.04e15 | 290 (UV) |
| طلا | 5.1 | 1.23e15 | 244 (UV عمیق) |

<iframe src="/wp-content/physics-content/highschool/12/fasl-5/widgets/photoelectric-effect.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="اثر فوتوالکتریک تعاملی"></iframe>

## مثال — فلزِ روی و نورِ UV ☀️

اگه روی نورِ UV با طول‌موجِ ۲۰۰ nm بتابی، الکترون با چه انرژیِ جنبشی بیرون می‌پره؟

$$
E_\text{فوتون} = \frac{hc}{\lambda} = \frac{(6.626\times 10^{-34})(3\times 10^8)}{200\times 10^{-9}} \approx 9.94\times 10^{-19}\,\text{J} \approx 6.2\,\text{eV}
$$

$$
K_\text{max} = 6.2 - 4.3 = 1.9\,\text{eV}
$$

## کاربردهای پزشکی-زیستی 🩺

### ۱) رادیولوژی X-ray
پرتو X با $E > 10\,\text{keV}$ فتو-الکترون از اتم‌های بافت تولید می‌کنه. این فرآیند، **علتِ اصلیِ جذب** پرتو در بافت‌های مختلف (همینه چرا استخوان نور رو می‌خوره ولی بافتِ نرم رد می‌کنه).

### ۲) PET scan
F-18 می‌پاشه پوزیترون → برخورد با الکترون → ۲ فوتونِ ۵۱۱ keV → آشکارسازِ PET با اثرِ فوتوالکتریک می‌بینه‌شون.

### ۳) آشکارسازِ تشعشع — فوتومولتیپلایر
PMT (Photomultiplier Tube) بر اساسِ اثرِ فوتوالکتریک کار می‌کنه. یه فوتون → یه الکترون → تقویتِ ضربی → سیگنال مشاهده‌پذیر.

### ۴) فعال‌سازیِ مولکول‌های دارویی
بعضی داروها (مثل ۸-MOP در PUVA-therapy) با نور UV-A فعال می‌شن — اثرِ فوتوشیمیایی.

### ۵) سنسورهای نوریِ پلسِ اکسیمتر
استفاده از تابش-جذب-فوتو-تبدیل در دیودِ نوری برای اندازه‌گیریِ SpO2.

## محاسبه با پایتون 🐍

```python
# تحلیل اثر فوتوالکتریک
import numpy as np

h = 6.626e-34       # J·s
c = 3.0e8           # m/s
eV = 1.602e-19      # J → eV

# داده‌های فلزات
metals = {
    "سزیم":  (2.1, "زرد UV"),
    "پتاسیم": (2.3, "سبز-UV"),
    "روی":   (4.3, "UV"),
    "طلا":   (5.1, "UV عمیق"),
}

# طول‌موج‌های مهمِ پزشکی
wavelengths = {
    "نور سبز (~530nm)":   530e-9,
    "UV-A (~365nm)":       365e-9,
    "UV-B (~290nm)":       290e-9,
    "UV-C (~250nm)":       250e-9,
    "X-ray (~0.05nm)":     0.05e-9,
}

print(f"{'فلز':>10s}  {'طول‌موج':>22s}  {'E_فوتون':>12s}  {'K_max':>12s}")
for metal, (W_eV, _) in metals.items():
    W_J = W_eV * eV
    for wl_name, wl in wavelengths.items():
        E_photon = h * c / wl
        K_max = E_photon - W_J
        if K_max > 0:
            print(f"{metal:>10s}  {wl_name:>22s}  {E_photon/eV:>9.2f} eV  {K_max/eV:>9.2f} eV")
        # اگه K_max < 0 → الکترونی بیرون نمی‌اد

# نتیجه:
# نور سبز هیچ الکترونی از روی بیرون نمی‌کشه (نیاز به UV)
# X-ray به‌قدری انرژی داره که از هر فلزی الکترون می‌کنه!
```

## نکته‌ی پزشکی-زیستی 🩺

- **CT-scan** بر پایه‌ی جذبِ X-ray در بافت — جذب از فتو-الکتریک
- **PET F-18**: کشفِ پوزیترون با اثرِ فوتوالکتریک در آشکارساز
- **PUVA-therapy**: نورِ UV-A + ۸-متوکسی‌پسورالن برای درمانِ پسوریازیس
- **پلسِ اکسیمتر**: ۶۶۰ nm + ۹۴۰ nm برای محاسبه SpO2
- **سنسورِ EEG**: استفاده از فتو-دیود در آرایه‌های اپتوژنتیک
- **عدسیِ چشم**: ضدّ UV طبیعی — جذبِ فوتوالکتریک

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [اثر فوتوالکتریک](https://fa.wikipedia.org/wiki/%D8%A7%D8%AB%D8%B1_%D9%81%D9%88%D8%AA%D9%88%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9)
- Wikipedia EN: [Photoelectric effect](https://en.wikipedia.org/wiki/Photoelectric_effect)
- HyperPhysics: [Photoelectric effect](http://hyperphysics.phy-astr.gsu.edu/hbase/quantum/photoelec.html)
- Khan Academy: [Photoelectric effect](https://www.khanacademy.org/science/physics/quantum-physics)
- Einstein 1905: [On a heuristic point of view](https://en.wikisource.org/wiki/On_a_Heuristic_Point_of_View_about_the_Creation_and_Conversion_of_Light)

### ویدئو (یوتیوب)
- [Veritasium — The strange story of Planck's constant](https://www.youtube.com/results?search_query=veritasium+planck+constant)
- [PBS Space Time — Photoelectric effect](https://www.youtube.com/results?search_query=pbs+space+time+photoelectric)
- [Crash Course Physics — Quantum mechanics](https://www.youtube.com/results?search_query=crash+course+physics+quantum)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: اثر فوتوالکتریک دوازدهم](https://www.aparat.com/result/%D8%A7%D8%AB%D8%B1_%D9%81%D9%88%D8%AA%D9%88%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: فوتون انیشتین](https://www.aparat.com/result/%D9%81%D9%88%D8%AA%D9%88%D9%86_%D8%A7%D9%86%DB%8C%D8%B4%D8%AA%DB%8C%D9%86)

### شبیه‌سازی PhET
- [Photoelectric Effect](https://phet.colorado.edu/en/simulations/photoelectric)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-photoelectric/)

---

*در بخشِ بعد می‌ریم سراغ یکی از قشنگ‌ترین کشف‌ها — [طیفِ خطی، اثرِ انگشت اتم‌ها](https://physicsme.ir/articles/line-spectrum-tajrobi/) 🌈.*
