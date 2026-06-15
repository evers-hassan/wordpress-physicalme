---
title: "حرکت هماهنگ ساده (SHM) — ساده‌ترین نوسان 〰️"
chapter: "فصل ۳ — نوسان و امواج (تجربی)"
section: "۳-۲ حرکت هماهنگ ساده"
order: 2
slug: "simple-harmonic-motion-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۸ دقیقه"
keywords: ["SHM", "آونگ", "فنر", "نوسان", "نیروی بازگرداننده", "تجربی"]
branches: ["مکانیک"]
---

# حرکت هماهنگ ساده (SHM) — ساده‌ترین نوسان 〰️

> یه شهود ساده 🪀: یه فنر رو فشار بدی یا بکشی، **همیشه می‌خواد به حالتِ تعادل برگرده**. این میلِ بازگشت + اینرسی، باعثِ نوسان می‌شه. وقتی این میل **خطی** باشه (یعنی $F = -kx$)، اسمشو می‌ذاریم «حرکت هماهنگ ساده» — قشنگ‌ترین نوسانِ دنیا.

## تعریفِ SHM 🎯

**SHM**: نوسانی که نیرویِ بازگرداننده‌اش با جابه‌جایی از تعادل **متناسبِ خطی** باشه:

$$
F = -k\,x
$$

که علامتِ منفی نشون‌دهنده‌ی **بازگردانندگی** ‌ـه.

## معادله‌ی حرکت — سینوسی! 〰️

اگه ابتدا جسم از حالتِ تعادل با دامنه‌ی $A$ کشیده بشه و رها بشه:

$$
x(t) = A\cos(\omega t)
$$

- $\omega = \sqrt{k/m}$ — بسامدِ زاویه‌ای (rad/s)
- $T = 2\pi/\omega = 2\pi\sqrt{m/k}$ — دوره
- $f = 1/T$ — بسامد (Hz)

## سرعت و شتاب در SHM

با مشتق‌گیری:

$$
v(t) = -A\omega\sin(\omega t), \qquad a(t) = -\omega^2 x(t)
$$

نکته‌ی زیبا: شتابِ SHM همیشه **متناسب با $-x$** ‌ـه. هر چی از تعادل دورتر، شتابِ بازگشت بیشتر.

## دو مثالِ مهم 🎯

### ۱) آونگِ ساده ⏰

برای زاویه‌های کوچک ($\theta < 10°$)، آونگ به طولِ $L$ یک SHM ‌ـه:

$$
T = 2\pi\sqrt{\frac{L}{g}}
$$

نکته‌ی شگفت: **دوره به جرم بستگی نداره**. این کشفِ گالیله بود.

<iframe src="/wp-content/physics-content/highschool/12/fasl-3/widgets/shm-pendulum.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="آونگ ساده"></iframe>

### ۲) فنرِ جرم-قطار 🪀

اگه به سرِ فنرِ ثابتِ $k$، جرمی $m$ ببندیم:

$$
T = 2\pi\sqrt{\frac{m}{k}}
$$

## مثال — نوسانِ غشاء حلزون 👂

غشای پایه‌ای (Basilar membrane) در گوشِ داخلی هر نقطه‌اش به یک بسامدِ خاص حساسه — یه ساختارِ شگفت‌انگیز که هر نقطه مثلِ یک فنر-جرم با $k$ متفاوته. جایی که $\sqrt{k/m}$ با بسامدِ صوت تطبیق پیدا کنه، نوسان بیشینه می‌شه. این پایه‌ی تشخیصِ بسامد در گوشه.

## مثال — تاب‌خوردن در بازتاب MRI 🧲

پروتون‌های هیدروژن در میدانِ مغناطیسیِ ۱.۵T مثلِ آونگ‌های ریز نوسان می‌کنن. بسامدِ نوسان (لارمور) دقیقاً متناسب با $B$ ‌ـه و حدودِ ۶۳ MHz. سیگنالِ MRI همینه.

## محاسبه با پایتون 🐍

```python
# طولِ آونگ متروم — مرجعِ تاریخیِ ثانیه
import numpy as np
import matplotlib.pyplot as plt

g = 9.8

# سؤال: چقدر طول لازمه که دوره‌ی آونگ دقیقاً 2 ثانیه باشه؟
# (یعنی هر نوسان نصف، 1 ثانیه - این پایه‌ی ساعت‌های قدیمی بود)
T_target = 2.0  # ثانیه
L = (T_target / (2 * np.pi))**2 * g
print(f"طولِ آونگِ ثانیه: {L:.3f} m  (تقریباً {L*100:.0f} cm)")
# خروجی: ≈ 0.993 m  (تقریباً 99 cm)

# مدلِ نوسانِ غشای حلزون:
# هر نقطه از غشا مثلِ یه فنر-جرم. بسامدِ تشخیصی f = (1/2π)√(k/m)
# تنظیم: k و m تغییر می‌کنن طوری که f از 20Hz تا 20kHz پوشیده بشه
print()
print("توزیعِ بسامد در طول 35mm غشای حلزون:")
positions_mm = np.array([5, 10, 15, 20, 25, 30, 35])
freq_hz = 165.4 * (10**(2.1 * (1 - positions_mm/35)) - 0.88)  # تقریب Greenwood
for p, f in zip(positions_mm, freq_hz):
    print(f"  {p:2.0f} mm از پایه → {f:7.0f} Hz")
```

## نکته‌ی پزشکی-زیستی 🩺

- **شنوایی**: غشای حلزون = آرایه‌ای از SHM با بسامدهای مختلف
- **MRI**: تشدید مغناطیسی هسته‌ای — یه SHM در مقیاسِ هسته
- **پرسش از پرتوزایی (PET-CT)**: بازترکیب الکترون-پوزیترون → فوتون با بسامدِ مشخص
- **whiplash**: گردن یه SHM مکانیکیه با $T \approx 0.5\,\text{s}$
- **نوسانِ مردمک**: SHM در پاسخ به نور — تشخیصِ آسیب‌های اعصابی

## خودتو بسنج 📝

- آونگِ ۲۵ cm چه دوره‌ای داره روی زمین؟ ($T = 2\pi\sqrt{0.25/9.8} \approx 1\,\text{s}$)
- روی ماه ($g = 1.62$)، دوره چقدر می‌شه؟ ($\approx 2.47\,\text{s}$ — تقریباً ۲.۵ برابر)

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [حرکت هماهنگ ساده](https://fa.wikipedia.org/wiki/%D8%AD%D8%B1%DA%A9%D8%AA_%D9%87%D9%85%D8%A7%D9%87%D9%86%DA%AF_%D8%B3%D8%A7%D8%AF%D9%87)
- Wikipedia EN: [Simple harmonic motion](https://en.wikipedia.org/wiki/Simple_harmonic_motion)
- Wikipedia EN: [Basilar membrane](https://en.wikipedia.org/wiki/Basilar_membrane)
- HyperPhysics: [Simple harmonic motion](http://hyperphysics.phy-astr.gsu.edu/hbase/shm.html)
- Khan Academy: [SHM intro](https://www.khanacademy.org/science/physics/mechanical-waves-and-sound)

### ویدئو (یوتیوب)
- [Veritasium — Why are pendulums so accurate?](https://www.youtube.com/results?search_query=veritasium+pendulum+accurate)
- [3Blue1Brown — Differential equations for SHM](https://www.youtube.com/results?search_query=3blue1brown+simple+harmonic)
- [SmarterEveryDay — Pendulum waves](https://www.youtube.com/results?search_query=smarter+every+day+pendulum)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: حرکت هماهنگ ساده دوازدهم](https://www.aparat.com/result/%D8%AD%D8%B1%DA%A9%D8%AA_%D9%87%D9%85%D8%A7%D9%87%D9%86%DA%AF_%D8%B3%D8%A7%D8%AF%D9%87_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Pendulum Lab](https://phet.colorado.edu/en/simulations/pendulum-lab)
- [Masses and Springs](https://phet.colorado.edu/en/simulations/masses-and-springs)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با عمقِ بیشتر](https://physicsme.ir/articles/y12-harekat-hamahang-sadeh/)

---

*در بخشِ بعد می‌ریم سراغِ انرژیِ نوسان — [انرژیِ جنبشی و پتانسیلِ کشسانی](https://physicsme.ir/articles/shm-energy-tajrobi/) ⚡.*
