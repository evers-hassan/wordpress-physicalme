---
title: "قانون فاراده — emf القایی، فرمولی که جهان را برق‌دار کرد 📐"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۸ قانون القای الکترومغناطیسی فاراده"
order: 8
slug: "faraday-law-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["قانون فاراده", "emf القایی", "ژنراتور", "MRI", "TMS"]
---

# قانون فاراده — emf القایی، فرمولی که جهان را برق‌دار کرد 📐

> یه واقعیت 🩺: همه‌ی برقِ خانگی، بیمارستان و دستگاه‌های پزشکی، در نیروگاهی تولید شدن که از قانونِ فاراده استفاده می‌کنه. حتی **TMS** برای درمانِ افسردگی هم با همین قانون مغز رو تحریک می‌کنه. این بخش، فرمولِ کلیدی رو معرفی می‌کنه.

## قانون فاراده 📐

emf القاشده در یه سیم‌پیچ با $N$ دور:

$$\boxed{\varepsilon = -N \, \frac{\Delta \Phi_B}{\Delta t}}$$

- $\varepsilon$: emf القایی (ولت)
- $N$: تعدادِ دورهای سیم‌پیچ
- $\Delta \Phi_B$: تغییرِ شارِ مغناطیسی
- $\Delta t$: مدتِ تغییر
- **علامتِ منفی** = قانونِ لنز (در بخشِ بعدی)

**معنی**: emf متناسبه با سرعتِ تغییرِ شار. تغییرِ سریع‌تر → emf بزرگ‌تر.

## نتایجِ کلیدی 🎯

1. **تغییرِ شارِ پایدار → emf ثابت**: اگه شار رو با نرخِ ثابت تغییر بدی، emf هم ثابته
2. **شار ثابت → emf صفر**: حتی شارِ زیاد ولی ثابت، جریانی القا نمی‌کنه
3. **تعداد دور تأثیر مستقیم داره**: ۱۰۰ دور = ۱۰۰ برابرِ emf یه دور

## دو روشِ افزایشِ emf 🔝

برای ساختِ emf بزرگ‌تر:
- **افزایشِ $N$** — سیم‌پیچ‌های زیاد (تا چند هزار دور)
- **افزایشِ $\frac{\Delta \Phi}{\Delta t}$** — سریع‌تر کن یا میدانِ قوی‌تر یا سطحِ بزرگ‌تر

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/magnet-coil-emf.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="emf القایی"></iframe>

## محاسبه‌ی پایتون — TMS برای درمان 🐍

```python
# TMS (Transcranial Magnetic Stimulation)
# پالس بسیار سریع برای تحریک مغز
import math

# سیم‌پیچ TMS:
N = 8                       # تعداد دور (محدود تا گرما نگیره)
R_coil = 0.04              # 4 سانتی‌متر شعاع
B_peak = 2.5                # تسلا میدان پیک (خیلی بزرگ)
t_rise = 80e-6              # 80 میکروثانیه زمان افزایش

# سطح
A = math.pi * R_coil**2
print(f"سطح سیم‌پیچ: {A*1e4:.1f} cm²")

# شار پیک
Phi_peak = B_peak * A
print(f"شار پیک: {Phi_peak*1e3:.2f} mWb")

# emf پیک
emf = N * Phi_peak / t_rise
print(f"emf پیک: {emf:.0f} V")
# تقریباً 1000 V!

# میدان الکتریکی القایی در مغز (تقریب)
# فاصله از سیم‌پیچ تا مغز ≈ 1.5 cm
# E ≈ R · dB/dt / 2
dB_dt = B_peak / t_rise
E_brain = R_coil * dB_dt / 2
print(f"میدان الکتریکی در مغز: {E_brain:.0f} V/m")
# تقریباً 600 V/m - کافی برای تحریک نورون
# آستانه تحریک نورون ≈ 100 V/m
```

## نکته‌ی پزشکی-زیستی 🩺

- **TMS** — درمانِ افسردگی، پارکینسون، OCD. تنها روشِ غیرتهاجمیِ تحریکِ مغز
- **dTMS (deep TMS)** — نوعی پیشرفته که نواحیِ عمیق‌تر مغز رو تحریک می‌کنه
- **MRI gradient coils** — emf القاشده در سیم‌پیچ‌های گرادیان، سیگنالِ تصویر رو می‌سازه
- **پیس‌میکرِ شارژشدنیِ بی‌سیم** — emf القایی توسط سیم‌پیچِ کاشتنی، باتری رو شارژ می‌کنه
- **چیدمانِ تصادفی**: همون پدیده در MRI، شُک‌های گذرا بر بافت‌ـ به همین دلیل بیماران با ایمپلنتِ فلزی نمی‌تونن MRI شن (جریانِ القایی → گرمایش → آسیب)

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/shar-faraday-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش قانون فاراده"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [قانون القای فاراده](https://fa.wikipedia.org/wiki/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D8%A7%D9%84%D9%82%D8%A7%DB%8C_%D9%81%D8%A7%D8%B1%D8%A7%D8%AF%D9%87)
- Wikipedia EN: [Faraday's law](https://en.wikipedia.org/wiki/Faraday%27s_law_of_induction)، [TMS](https://en.wikipedia.org/wiki/Transcranial_magnetic_stimulation)
- HyperPhysics: [Faraday's law](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/farlaw.html)

### ویدئو (یوتیوب)
- [Veritasium — Faraday's Greatest Experiment](https://www.youtube.com/results?search_query=veritasium+faraday+greatest+experiment)
- [Walter Lewin — Faraday's Law](https://www.youtube.com/results?search_query=walter+lewin+faraday)
- [SciShow — TMS Treatment](https://www.youtube.com/results?search_query=scishow+TMS+depression)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: قانون فاراده یازدهم](https://www.aparat.com/result/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D9%81%D8%A7%D8%B1%D8%A7%D8%AF%D9%87_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: TMS تحریک مغز](https://www.aparat.com/result/TMS_%D8%AA%D8%AD%D8%B1%DB%8C%DA%A9_%D9%85%D8%BA%D8%B2)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/shar-ghanoon-faraday/)

---

*در بخش بعدی، علامتِ منفیِ فرمولِ فاراده رو روشن می‌کنیم — [قانون لنز](https://physicsme.ir/articles/lenz-law-tajrobi/) 🛡️.*
