---
title: "مشخصه‌های موج — طول موج، بسامد، سرعت 📏"
chapter: "فصل ۳ — نوسان و امواج (تجربی)"
section: "۳-۶ مشخصه‌های موج"
order: 6
slug: "wave-properties-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["طول موج", "بسامد", "سرعت موج", "دامنه", "تجربی"]
branches: ["مکانیک"]
---

# مشخصه‌های موج — طول موج، بسامد، سرعت 📏

> یه شهود ساده 🎶: وقتی پیانوی نتِ بالا (مثلاً «دو»ی هشتم) می‌نوازی، **بسامد** نوازش بالا می‌ره و **طولِ موج** هوا کوتاه‌تر می‌شه. ولی **سرعتِ صوت** ثابت می‌مونه چون هوا تغییر نکرده.

## چهار کمیتِ کلیدی 🎯

برای هر موج:

| کمیت | نماد | یکا | تعریف |
|---|---|---|---|
| دامنه | $A$ | متر (یا فشار، یا ولت...) | بیشترین جابه‌جایی از تعادل |
| طول موج | $\lambda$ | متر | فاصله‌ی دو قله‌ی پشتِ سرِ هم |
| بسامد | $f$ | هرتز (Hz) | تعدادِ موجِ عبوری از یک نقطه در ثانیه |
| سرعت | $v$ | m/s | سرعت انتشارِ موج |

## رابطه‌ی طلایی 🥇

$$
\boxed{\,v = \lambda f\,}
$$

این رابطه برای **همه‌ی موج‌ها** صادقه — از موجِ آب تا گاما-ری.

## دوره

$$
T = \frac{1}{f}
$$

## بسامدِ زاویه‌ای و عددِ موج

$$
\omega = 2\pi f, \qquad k = \frac{2\pi}{\lambda}
$$

با این دو، رابطه‌ی طلایی به $v = \omega/k$ تبدیل می‌شه.

## ویجت تعاملی 🎚️

<iframe src="/wp-content/physics-content/highschool/12/fasl-3/widgets/wave-builder.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="مشخصات موج"></iframe>

## مثال — صدای پیانو 🎹

نتِ «لا» در پیانوی استاندارد ۴۴۰ Hz‌ـه. سرعتِ صوت در هوا ≈ ۳۴۳ m/s:

$$
\lambda = \frac{v}{f} = \frac{343}{440} \approx 0.78\,\text{m}
$$

پس موجِ صوتیِ «لا» در هوا، تقریباً هر ۷۸ سانتی‌متر تکرار می‌شه.

## مثال — موج رادیویی FM 📡

ایستگاهِ FM ۹۸ مگاهرتز چه طولِ موجی داره؟

$$
\lambda = \frac{c}{f} = \frac{3\times 10^8}{98\times 10^6} \approx 3.06\,\text{m}
$$

همینه چرا آنتنِ خودرو ~ ۱ متر طول داره (نصف یا یک‌چهارمِ $\lambda$).

## مثال پزشکی — سونوگرافی 🩻

برای دستگاهِ سونوگرافی ۷ MHz در بافت ($v = 1540\,\text{m/s}$):

$$
\lambda = \frac{1540}{7\times 10^6} \approx 220\,\text{μm}
$$

رزولوشنِ تصویر ≈ نصف طول موج ≈ ۱۱۰ میکرومتر — یعنی دیدن یک سلولِ بزرگ.

## محاسبه با پایتون 🐍

```python
# مقایسه‌ی سرعتِ صوت در پزشکی
import numpy as np

# داده‌های بافت‌های مختلف
tissues = {
    "ریه (پر هوا)":   500,
    "چربی":          1450,
    "آب":            1480,
    "بافت نرمِ متوسط":1540,
    "ماهیچه":         1580,
    "استخوان":        4080,
}

# سؤال: یه سونوگرافیِ 5 MHz چه طول‌موجی در هر بافت داره؟
f = 5e6  # Hz
print(f"سونوگرافی {f/1e6:.0f} MHz در بافت‌های مختلف:")
print(f"{'بافت':>20s}  {'v':>10s}  {'λ':>10s}  {'فرکانس صوت می‌بینه':>30s}")
for name, v in tissues.items():
    lam_um = v / f * 1e6
    print(f"{name:>20s}  {v:>10d}  {lam_um:>8.1f} μm  {'بافت ' + name.split()[0]:>30s}")

# نکته:
# اختلافِ سرعتِ صوت بین بافت‌ها همینه دلیلِ ایجادِ بازتاب در سونوگرافی
# (سطحِ مرز بین چربی و ماهیچه → impedance mismatch → echo)
```

## نکته‌ی پزشکی-زیستی 🩺

- **رزولوشن سونوگرافی** ≈ نصف طول موج → بسامدِ بالاتر = جزئیاتِ بیشتر
- **CT-scan** با X-ray با $\lambda \sim 0.01-1\,\text{nm}$ → رزولوشنِ زیر-میکرونی
- **MRI**: امواج رادیویی با $\lambda \sim 5\,\text{m}$ → رزولوشن ~ یک میلی‌متر (به‌خاطر تکنیکِ گرادیان)
- **شنوایی انسانی**: ۲۰ Hz تا ۲۰ kHz → $\lambda$ از ~۱۷ متر تا ~۱.۷ cm
- **EEG**: امواجِ ۰.۵-۱۰۰ Hz → دوره از ۲ ثانیه تا ۱۰ ms

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [طول موج](https://fa.wikipedia.org/wiki/%D8%B7%D9%88%D9%84_%D9%85%D9%88%D8%AC)
- Wikipedia EN: [Wavelength](https://en.wikipedia.org/wiki/Wavelength)
- Wikipedia EN: [Frequency](https://en.wikipedia.org/wiki/Frequency)
- HyperPhysics: [Wave parameters](http://hyperphysics.phy-astr.gsu.edu/hbase/waves/wavpar.html)
- Khan Academy: [Wave properties](https://www.khanacademy.org/science/physics/mechanical-waves-and-sound)

### ویدئو (یوتیوب)
- [Crash Course Physics — Wave equations](https://www.youtube.com/results?search_query=crash+course+wave+equations)
- [3Blue1Brown — Frequency, wavelength](https://www.youtube.com/results?search_query=3blue1brown+wave)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: مشخصات موج دوازدهم](https://www.aparat.com/result/%D9%85%D8%B4%D8%AE%D8%B5%D8%A7%D8%AA_%D9%85%D9%88%D8%AC_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Wave on a String](https://phet.colorado.edu/en/simulations/wave-on-a-string)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-moshakhaseh-mowj/)

---

*در بخشِ بعد می‌ریم سراغ یکی از زیباترین پدیده‌ها — [بازتاب موج](https://physicsme.ir/articles/wave-reflection-tajrobi/) 🪞.*
