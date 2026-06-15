---
title: "القاگرها — ذخیره‌سازِ انرژی در میدانِ مغناطیسی 🌀"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۱۰ القاگرها"
order: 10
slug: "inductors-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["القاگر", "خود-القا", "هانری", "ذخیره انرژی", "دفیبریلاتور"]
---

# القاگرها — ذخیره‌سازِ انرژی در میدانِ مغناطیسی 🌀

> یه واقعیت 🩺: تو دفیبریلاتورِ پیشرفته، یه **القاگر** هست که شکلِ موجِ شُک رو **بهینه** می‌کنه — به‌جای موجِ صفِ تیز که قلب رو آسیب می‌زنه، یه موجِ نرمِ دوقطبیِ مفید می‌سازه. این بخش، رازِ القاگر رو فاش می‌کنه.

## القاگر چیست؟ 📐

**القاگر** = یه سیم‌پیچ که در برابرِ تغییرِ جریان **مقاومت** نشون می‌ده. وقتی جریان تغییر می‌کنه، در سیم‌پیچ emf القایی ایجاد می‌شه که با تغییر مخالفت می‌کنه (قانون لنز).

**ضریبِ خودالقا** (یا اندوکتانس) $L$:

$$\varepsilon_{\text{خود-القا}} = -L \, \frac{\Delta I}{\Delta t}$$

- $L$: ضریب القا (یکا: **هانری**، $\text{H} = \text{V·s/A}$)
- جریان سریع‌تر تغییر کنه → emf بزرگ‌تر

## انرژی ذخیره در القاگر ⚡

وقتی جریان از القاگر عبور می‌کنه، در میدانِ مغناطیسیِ اطرافش انرژی ذخیره می‌شه:

$$U_L = \frac{1}{2} L \, I^2$$

این شبیهِ فرمولِ خازنه ($U_C = \frac{1}{2} C V^2$) — ولی **القاگر، جریان** رو ذخیره می‌کنه (یعنی انرژی در میدانِ مغناطیسی)، **خازن، بار** (انرژی در میدانِ الکتریکی).

## مقادیرِ معمولِ القا 📌

| قطعه/کاربرد | $L$ |
|---|---|
| القاگرِ فیلتر در گوشی | $\sim 1\,\mu\text{H}$ |
| القاگرِ منبعِ تغذیه | $\sim 100\,\mu\text{H}$ تا $\text{mH}$ |
| القاگرِ دفیبریلاتور | $\sim 10\,\text{mH}$ |
| سیم‌پیچ MRI | $\sim 1-10\,\text{H}$ |
| رِله‌ی الکترومغناطیسی | $\sim 0.1\,\text{H}$ |

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/self-induction.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="خود-القا"></iframe>

## محاسبه‌ی پایتون — دفیبریلاتور بایفازی 🐍

```python
# دفیبریلاتور بایفازی (biphasic):
# مدار RLC: خازن + القاگر + بدن (مقاومت)

import math

# پارامترهای استاندارد
C = 100e-6      # 100 µF خازن
L = 10e-3       # 10 mH القاگر
R = 50          # 50 Ω مقاومت بدن (متوسط)
V0 = 2000       # 2 kV ولتاژ اولیه خازن

# انرژی اولیه در خازن
U_C0 = 0.5 * C * V0**2
print(f"انرژی اولیه: {U_C0:.0f} J")

# جریان پیک (تقریب RLC):
# اگه میرایی متوسط (under-damped):
omega_0 = 1 / math.sqrt(L * C)
alpha = R / (2 * L)
print(f"ω₀ = {omega_0:.0f} rad/s")
print(f"α = {alpha:.0f} 1/s")

# میرایی شدید (over-damped) برای جلوگیری از نوسان
# جریان پیک ≈ V0 / R (در مدار RC ساده)
I_peak = V0 / R
print(f"جریان پیک: {I_peak:.0f} A")

# انرژی ذخیره در القاگر در پیک جریان
U_L_peak = 0.5 * L * I_peak**2
print(f"انرژی پیک در القاگر: {U_L_peak:.0f} J")

# مدتِ پالس (تقریباً RC و RL)
tau_RC = R * C
tau_RL = L / R
print(f"τ_RC = {tau_RC*1000:.1f} ms")
print(f"τ_RL = {tau_RL*1000:.2f} ms")
# پالس بایفازی 5-10 ms - بهترین برای ضربان قلب
```

## نکته‌ی پزشکی-زیستی 🩺

- **دفیبریلاتورِ بایفازی** — استفاده از القاگر برای ساختنِ شکلِ موجی که **هم آستانه‌ی شُک کمتر** باشه هم **آسیبِ کمتر** بزنه. این طراحی، نرخِ بقا رو تو AED بهبود داده
- **MRI gradient coils** — القاگرهای بزرگ که تغییرِ سریع جریان رو می‌خوان. به همین دلیل صدای بلندِ MRI شنیده می‌شه (نیروی $F = BIL$ روی این القاگرها بزرگه)
- **رِله‌های پزشکی** — برای کنترلِ ولتاژ بالا با سیگنالِ ضعیف
- **ولتاژِ بازگشتی (kickback)** — وقتی جریانِ القاگر قطع می‌شه ولتاژِ بسیار بزرگی ایجاد می‌شه (می‌تونه تجهیزات حسّاس رو خراب کنه — به همین دلیل دیودهای محافظ موازی با القاگر می‌ذارن)

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/elghagarha-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش القاگر"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [القاگر](https://fa.wikipedia.org/wiki/%D8%A7%D9%84%D9%82%D8%A7%DA%AF%D8%B1)
- Wikipedia EN: [Inductor](https://en.wikipedia.org/wiki/Inductor)، [Defibrillator waveform](https://en.wikipedia.org/wiki/Defibrillation#Waveform)
- HyperPhysics: [Inductor](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/induct.html)

### ویدئو (یوتیوب)
- [Walter Lewin — Inductors](https://www.youtube.com/results?search_query=walter+lewin+inductor)
- [Veritasium — How Defibrillators Work](https://www.youtube.com/results?search_query=veritasium+defibrillator)
- [EEVblog — Inductors Explained](https://www.youtube.com/results?search_query=eevblog+inductors)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: القاگر یازدهم](https://www.aparat.com/result/%D8%A7%D9%84%D9%82%D8%A7%DA%AF%D8%B1_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/elghagarha-khod-elgha/)

---

*در آخرین بخشِ فصل، می‌ریم سراغ جریانی که از پریز خانه میاد — [جریان متناوب (AC)](https://physicsme.ir/articles/alternating-current-tajrobi/) 🔌.*
