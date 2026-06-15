---
title: "میدان مغناطیسی — B، تسلا، و خطوطِ میدان 🌐"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۲ میدان مغناطیسی"
order: 2
slug: "magnetic-field-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["میدان مغناطیسی", "B", "تسلا", "گاوس", "MRI", "خطوط میدان"]
---

# میدان مغناطیسی — B، تسلا، و خطوطِ میدان 🌐

> یه واقعیت 🩺: یه دستگاهِ **MRI** کلینیکی، میدانِ مغناطیسیِ ۱.۵ تا ۳ تسلا تولید می‌کنه. این مقدار، **۶۰،۰۰۰ برابرِ** میدانِ زمینه. به همین دلیل هر شیءِ فلزی باید قبلِ ورود به اتاق برداشته شه — خطرِ پرتاب‌شدنِ کلیپس یا حتی صندلیِ چرخدار به دستگاه واقعی‌ـه.

## تعریفِ میدان مغناطیسی 📐

**میدان مغناطیسی** $\vec{B}$ یه کمیتِ **برداری** ـه که در هر نقطه از فضا تعریف می‌شه. اگه یه ذره‌ی بارداری با سرعتِ $\vec{v}$ در این میدان حرکت کنه، نیروی روی اون:

$$\vec{F} = q \vec{v} \times \vec{B}$$

**یکا**: **تسلا** ($\text{T}$) = $\text{N}/(\text{A·m})$

یه واحدِ قدیمی‌تر: **گاوس** ($\text{G}$). $1\,\text{T} = 10^4\,\text{G}$.

## مقادیرِ معمولِ میدان 📌

| محل/دستگاه | $B$ (تقریبی) |
|---|---|
| میدانِ مغزی (موج آلفا) | $\sim 10^{-13}\,\text{T}$ |
| میدانِ قلبی (روی پوست) | $\sim 10^{-10}\,\text{T}$ |
| فاصله ۱ متری از موبایلِ روشن | $\sim 10^{-7}\,\text{T}$ |
| **میدان مغناطیسی زمین** | $\sim 50\,\mu\text{T}$ |
| یخچال (آهنربای روش) | $\sim 5\,\text{mT}$ |
| آهنربای حلقه | $\sim 0.1\,\text{T}$ |
| MRI کلینیکی | $1.5\,\text{T}$ |
| MRI تحقیقاتی | $7-11.7\,\text{T}$ |
| قوی‌ترین آهنربای پایدار | $\sim 45\,\text{T}$ |
| ستاره‌ی نوترونی (نوترون‌سرا) | $\sim 10^{10}\,\text{T}$ |

## خطوطِ میدانِ مغناطیسی 🗺️

مثلِ خطوطِ میدانِ الکتریکی:
- **شروع** از قطبِ N به قطبِ S (خارج از آهنربا)
- **در داخلِ آهنربا** از S به N می‌رن (حلقه‌های بسته)
- **چگالی خطوط** = شدتِ میدان

**نکته‌ی مهم**: برخلافِ خطوطِ الکتریکی که از + می‌رن و به - ختم می‌شن (خطوطِ باز)، **خطوطِ مغناطیسی همیشه بسته‌اند** — چون قطبِ منفردِ مغناطیسی وجود نداره.

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/magnetic-field-explorer.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="کاوشگر میدان مغناطیسی"></iframe>

## محاسبه‌ی پایتون — مقیاس‌های MRI 🐍

```python
# مقایسه میدان MRI با چیزهای دیگر
fields = {
    "مغز (آلفا)": 1e-13,
    "قلب (روی پوست)": 1e-10,
    "زمین": 50e-6,
    "آهنربای یخچال": 5e-3,
    "MRI 1.5T": 1.5,
    "MRI 3T": 3,
    "MRI 7T تحقیقاتی": 7,
}

ref = fields["MRI 1.5T"]
print(f"{'محل':<20} {'B (T)':<12} {'نسبت به MRI 1.5T':<25}")
print("-" * 60)
for name, B in fields.items():
    ratio = B / ref
    print(f"{name:<20} {B:<12.3e} {ratio:<25.2e}")

# انرژی ذرات در MRI
# پروتون با گشتاور مغناطیسی μ = 1.4e-26 J/T
mu_proton = 1.4e-26
E_split = 2 * mu_proton * 1.5    # شکاف ترازهای انرژی
print(f"\nشکاف انرژی پروتون در MRI 1.5T: {E_split:.2e} J")
# این انرژیِ ریز، با امواج رادیویی ۶۴ MHz رزونانس می‌کنه — اساس NMR!
```

## نکته‌ی پزشکی-زیستی 🩺

- **MRI** — هسته‌های هیدروژن (در آب و چربی بدن) با میدانِ قوی هم‌جهت می‌شن. یه پالسِ رادیویی اون‌ها رو تحریک می‌کنه و سیگنالی که برمی‌گرده، **تصویرِ سه‌بعدی** می‌سازه
- **fMRI** — مغز رو می‌بینه: تغییرِ جریانِ خون در نواحیِ فعال، تغییرِ سیگنال MRI می‌ده
- **MEG** — اندازه‌گیری میدانِ مغناطیسی مغز با SQUID، روشِ خیلی حسّاس
- **شِفای مغناطیسی** — درمان‌های شبه‌علمی با آهنربای ضعیف **هیچ پایه‌ی علمی ندارن**. فقط TMS و MRI کاربردِ پزشکیِ تأیید شده هستن

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/magnetic-field-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش میدان مغناطیسی"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [میدان مغناطیسی](https://fa.wikipedia.org/wiki/%D9%85%DB%8C%D8%AF%D8%A7%D9%86_%D9%85%D8%BA%D9%86%D8%A7%D8%B7%DB%8C%D8%B3%DB%8C)
- Wikipedia EN: [Magnetic field](https://en.wikipedia.org/wiki/Magnetic_field)، [MRI](https://en.wikipedia.org/wiki/Magnetic_resonance_imaging)
- HyperPhysics: [Magnetic field](http://hyperphysics.phy-astr.gsu.edu/hbase/magnetic/magfie.html)

### ویدئو (یوتیوب)
- [Veritasium — How does MRI work?](https://www.youtube.com/results?search_query=veritasium+MRI)
- [SciShow — Magnetism Explained](https://www.youtube.com/results?search_query=scishow+magnetism)
- [Walter Lewin MIT — Magnetism](https://www.youtube.com/results?search_query=walter+lewin+magnetism)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: میدان مغناطیسی یازدهم](https://www.aparat.com/result/%D9%85%DB%8C%D8%AF%D8%A7%D9%86_%D9%85%D8%BA%D9%86%D8%A7%D8%B7%DB%8C%D8%B3%DB%8C_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: MRI چطور کار می‌کند](https://www.aparat.com/result/MRI_%DA%86%D8%B7%D9%88%D8%B1_%DA%A9%D8%A7%D8%B1_%D9%85%DB%8C_%DA%A9%D9%86%D8%AF)

### شبیه‌سازی PhET
- [Magnet and Compass](https://phet.colorado.edu/en/simulations/magnet-and-compass)
- [Faraday's Law](https://phet.colorado.edu/en/simulations/faradays-law)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با جزئیات بیشتر](https://physicsme.ir/articles/magnetic-field/)

---

*در بخش بعدی، می‌ریم سراغِ نیرویی که میدان بر **بارهای متحرک** وارد می‌کنه — [نیروی مغناطیسی بر ذره‌ی باردار](https://physicsme.ir/articles/magnetic-force-on-charge-tajrobi/) 🎯.*
