---
title: "نوسان دوره‌ای — تکرار، دوره و بسامد 🔄⏱️"
chapter: "فصل ۳ — نوسان و امواج (تجربی)"
section: "۳-۱ نوسان دوره‌ای"
order: 1
slug: "periodic-oscillation-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["نوسان", "دوره", "بسامد", "تکرار", "ضربان قلب", "تجربی"]
branches: ["مکانیک"]
---

# نوسان دوره‌ای — تکرار، دوره و بسامد 🔄

> یه واقعیتِ ساده ولی شگفت 🫀: قلبت در هر دقیقه ۷۰ بار می‌زنه. این یعنی **بسامدِ قلبی** ≈ 1.17 Hz و **دوره** ≈ 0.86 ثانیه. هر بیماریِ قلبی، در نهایت یه بیماریِ «نوسان» ‌ـه.

## تعریف ⏰

**نوسان دوره‌ای**: حرکتی که در زمان‌های مساوی تکرار می‌شه. سه کمیت کلیدی:

- **دوره** ($T$): زمانِ یک تکرارِ کامل، یکا: ثانیه
- **بسامد** ($f$): تعدادِ تکرار در ثانیه، یکا: هرتز (Hz)
- **دامنه** ($A$): بیشترین فاصله از وضعیتِ تعادل

رابطه: $f = 1/T$.

## مثال‌های دور و بر

| پدیده | $T$ | $f$ |
|---|---|---|
| ضربانِ قلب در آرامش | ~0.86 s | ~70 bpm = 1.17 Hz |
| تنفس | ~3-5 s | 0.2-0.3 Hz |
| نوسانِ مردمکِ چشم | ~0.4 s | ~2.5 Hz |
| موجِ آلفای مغز | ~0.1 s | ~10 Hz |
| موجِ صوتی شنوایی | 0.05 ms - 50 ms | 20-20,000 Hz |

## نمودارِ موقعیت-زمان نوسان 📊

اگه یه نوسانگر رو روی محورِ زمان بکشی، نمودارش تکرار می‌شه. هر «قله» یک دوره فاصله از قلهِ بعدیه.

<iframe src="/wp-content/physics-content/highschool/12/fasl-3/widgets/shm-pendulum.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="آونگ ساده — نوسان دوره‌ای"></iframe>

## نمونه‌ی پزشکی — تاکیکاردی و برادیکاردی 💓

- **بسامدِ نرمال**: 60-100 bpm (1-1.67 Hz)
- **برادیکاردی**: < 60 bpm — قلب کندتر می‌زنه (می‌تونه نشانه‌ی فعالیتِ پاراسمپاتیک یا بیماری باشه)
- **تاکیکاردی**: > 100 bpm — قلب تندتر می‌زنه (تب، اضطراب، نارسایی)
- **فیبریلاسیون بطنی**: ~300 bpm — نوسانِ هرج و مرج، مرگبار اگه دفیبریله نشه

## محاسبه با پایتون 🐍

```python
# تحلیلِ ECG: شناختِ ریتمِ سینوسیِ نرمال
import numpy as np

# داده‌های فرضی R-R interval (در میلی‌ثانیه)
RR = np.array([850, 870, 845, 880, 860, 855, 875])  # ms

# دوره و بسامد متوسط
T_avg = np.mean(RR) / 1000  # ثانیه
f_avg = 1 / T_avg
bpm = f_avg * 60

print(f"دوره‌ی متوسط:        {T_avg*1000:.1f} ms")
print(f"بسامد:               {f_avg:.2f} Hz")
print(f"ضربانِ قلب:           {bpm:.0f} bpm")

# تنوعِ ضربانِ قلب (HRV) — یه شاخصِ مهمِ سلامت
HRV = np.std(RR)
print(f"HRV (SDNN):           {HRV:.1f} ms")

# تفسیر:
# HRV > 50 ms → عالی، سیستم اعصاب خودکار سالم
# HRV < 20 ms → خطرِ ابتلا به بیماری قلبی
# (در دونده‌های حرفه‌ای، HRV می‌تونه > 100 ms باشه!)
```

## نکته‌ی پزشکی-زیستی 🩺

- **HRV** (Heart Rate Variability) شاخصِ سلامتِ سیستم اعصابِ خودکار
- **ریتم سرکادین** ~24h: یه نوسانِ پایدارِ روزانه‌ی هورمونی
- **پروتکلِ EEG**: امواجِ مغز در محدوده‌های مختلف بسامدی (دلتا 0.5-4 Hz، تتا 4-8 Hz، آلفا 8-13 Hz، بتا 13-30 Hz، گاما > 30 Hz)
- **سرسام و dementia**: کاهشِ بسامدِ متوسطِ EEG
- **بسامدِ تنفس**: > 30 یا < 10 در دقیقه ⇒ نارسایی

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [نوسان](https://fa.wikipedia.org/wiki/%D9%86%D9%88%D8%B3%D8%A7%D9%86)
- Wikipedia EN: [Oscillation](https://en.wikipedia.org/wiki/Oscillation)
- Wikipedia EN: [Frequency](https://en.wikipedia.org/wiki/Frequency)
- HyperPhysics: [Periodic motion](http://hyperphysics.phy-astr.gsu.edu/hbase/permot.html)
- Khan Academy: [Periodic motion intro](https://www.khanacademy.org/science/physics/mechanical-waves-and-sound)

### ویدئو (یوتیوب)
- [Veritasium — Why pendulums are special](https://www.youtube.com/results?search_query=veritasium+pendulum)
- [3Blue1Brown — Vibrations and waves](https://www.youtube.com/results?search_query=3blue1brown+oscillation)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: نوسان دوره‌ای دوازدهم](https://www.aparat.com/result/%D9%86%D9%88%D8%B3%D8%A7%D9%86_%D8%AF%D9%88%D8%B1%D9%87_%D8%A7%DB%8C_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Pendulum Lab](https://phet.colorado.edu/en/simulations/pendulum-lab)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-nosan-dorei/)

---

*در بخشِ بعد می‌ریم سراغِ ساده‌ترین نوسان — [حرکت هماهنگ ساده SHM](https://physicsme.ir/articles/simple-harmonic-motion-tajrobi/) 〰️.*
