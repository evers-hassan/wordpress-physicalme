---
title: "موج و انواع آن — صوت، نور، مکانیکی، EM 🌊"
chapter: "فصل ۳ — نوسان و امواج (تجربی)"
section: "۳-۵ موج و انواع آن"
order: 5
slug: "wave-types-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["موج", "موج عرضی", "موج طولی", "موج مکانیکی", "EM", "تجربی"]
branches: ["مکانیک", "اپتیک"]
---

# موج و انواع آن — صوت، نور، مکانیکی، EM 🌊

> یه واقعیتِ جالب 🎵: وقتی به یه آهنگ گوش می‌دی، فاصله‌ی هر مولکولِ هوا حدود ~۱۰ نانومتره — کمتر از یک‌هزارمِ تارِ مو. ولی همین جابه‌جاییِ ریز، یه **موج** ‌ـه که از یه ساز به گوشِ تو می‌رسه.

## موج چیه؟ 🎯

**موج**: انتشارِ اختلال در محیط بدونِ انتقالِ خودِ ماده. وقتی یه سنگ توی برکه می‌اندازی، آب جابه‌جا نمی‌شه — فقط نوسانِ آب از یه نقطه به نقطه‌ی دیگه می‌رسه.

## دسته‌بندیِ موج‌ها 📋

### بر اساسِ جهتِ نوسانِ ذرات

| نوع | جهتِ نوسان | جهتِ انتشار | مثال |
|---|---|---|---|
| **عرضی** | عمود بر انتشار | افقی (یا هر جهتی) | موج روی طناب، نور |
| **طولی** | موازیِ انتشار | افقی | موج صوتی |

### بر اساسِ نیازِ به محیط

- **مکانیکی** — نیاز به محیط داره (صوت، آب، طناب)
- **الکترومغناطیسی (EM)** — در خلأ هم منتشر می‌شه (نور، رادیو، X-ray)

## ویجتِ تعاملی — ساختِ موج 🛠️

<iframe src="/wp-content/physics-content/highschool/12/fasl-3/widgets/wave-builder.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="ساخت موج تعاملی"></iframe>

## مثال‌های پزشکی-زیستی 🩺

### ۱) موج صوتی (طولی) — سونوگرافی

موجِ صوتی فشردگی و انبساطِ متناوبِ هواست. در سونوگرافی، موجِ صوتیِ ۲-۱۸ MHz بدنی رو می‌سکنه و **اکوهای بازتاب‌یافته** رو ضبط می‌کنه.

### ۲) موجِ EM — رادیولوژی

نور، رادیو، X-ray همه EM ‌ـن. تنها فرقشون بسامد (و طول موجه). در رادیولوژی X-ray با $\lambda \sim 0.01-10\,\text{nm}$ از بافتِ نرم رد می‌شه ولی نه از استخوان.

### ۳) موجِ ECG — انتشار در ماهیچه‌ی قلب

پتانسیلِ عمل در ماهیچه‌ی قلب با سرعتِ ~1 m/s منتشر می‌شه. هر «ضربان» در ECG یعنی یه موجِ الکتریکی از گرهِ سینوسی به بطن‌ها رفته.

### ۴) موجِ MEG (مغناطیس‌انسفالوگرافی)

نوسانِ خیلی-کندِ مغناطیسی در مغز که با SQUID اندازه گیری می‌شه — بسامد ~ 1-100 Hz.

## ویژگی‌های مهم موج 🎯

- **سرعت** ($v$): ثابت در محیطِ همگن
- **طول موج** ($\lambda$): فاصله‌ی دو قله‌ی پشتِ سرِ هم
- **بسامد** ($f$): تعدادِ موج در ثانیه
- **رابطه‌ی طلایی**: $v = \lambda f$

## محاسبه با پایتون 🐍

```python
# مقایسه‌ی سرعتِ صوت در محیط‌های پزشکی مختلف
import numpy as np

# داده‌های تجربی
media = {
    "هوا":              343,
    "آب":              1480,
    "بافت نرم":         1540,
    "ماهیچه":           1580,
    "خون":              1570,
    "استخوان":          4080,
}

# سونوگرافی 5 MHz — طول موج در هر محیط
f = 5e6  # 5 MHz
print(f"سونوگرافی بسامد {f/1e6:.0f} MHz — طولِ موج در محیط‌های مختلف:")
print(f"{'محیط':>15s}  {'v (m/s)':>10s}  {'λ (μm)':>10s}  {'حد تفکیک':>15s}")
for name, v in media.items():
    wavelength = v / f
    resolution = wavelength * 1e6 / 2  # رزولوشن تقریباً نصفِ طول موج
    print(f"{name:>15s}  {v:>10d}  {wavelength*1e6:>10.1f}  ~{resolution:>10.1f} μm")

# نتیجه: در بافت نرم با 5 MHz می‌تونیم جزئیاتِ
# سلولی-بافتی در حد 150 میکرومتر ببینیم!
```

## نکته‌ی پزشکی-زیستی 🩺

- **سونوگرافی**: بسامدِ بالا = رزولوشنِ بهتر ولی عمقِ نفوذ کمتر
- **EEG / MEG**: امواجِ مغز در بسامدهای دلتا/تتا/آلفا/بتا/گاما
- **ECG**: موج‌های P، QRS، T — هر کدوم یه فعالیتِ الکتریکیِ خاص
- **رادیولوژی**: X-ray با طول‌موجِ ۰.۱-۱۰ nm
- **MRI**: امواج رادیویی ۶۳ MHz (در 1.5T) — کاملاً بی‌آسیب

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [موج](https://fa.wikipedia.org/wiki/%D9%85%D9%88%D8%AC)
- Wikipedia EN: [Wave](https://en.wikipedia.org/wiki/Wave)
- Wikipedia EN: [Medical ultrasound](https://en.wikipedia.org/wiki/Medical_ultrasound)
- HyperPhysics: [Waves](http://hyperphysics.phy-astr.gsu.edu/hbase/Waves/wavecon.html)
- Khan Academy: [Mechanical waves and sound](https://www.khanacademy.org/science/physics/mechanical-waves-and-sound)

### ویدئو (یوتیوب)
- [Veritasium — Visualizing sound waves](https://www.youtube.com/results?search_query=veritasium+sound+waves)
- [MinutePhysics — EM spectrum](https://www.youtube.com/results?search_query=minute+physics+electromagnetic+spectrum)
- [Crash Course Physics — Wave properties](https://www.youtube.com/results?search_query=crash+course+wave+properties)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: موج فیزیک دوازدهم](https://www.aparat.com/result/%D9%85%D9%88%D8%AC_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Wave on a String](https://phet.colorado.edu/en/simulations/wave-on-a-string)
- [Sound Waves](https://phet.colorado.edu/en/simulations/sound-waves)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-mowj-va-anvae-an/)

---

*در بخشِ بعد می‌ریم سراغ مشخصه‌های موج — [طول موج، بسامد، سرعت](https://physicsme.ir/articles/wave-properties-tajrobi/) 📏.*
