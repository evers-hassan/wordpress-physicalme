---
title: "قانون لنز — جهتِ جریان القایی و ترمزِ مغناطیسی 🛡️"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۹ قانون لنز"
order: 9
slug: "lenz-law-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["قانون لنز", "جهت جریان القایی", "ترمز مغناطیسی", "اجاق القایی"]
---

# قانون لنز — جهتِ جریان القایی و ترمزِ مغناطیسی 🛡️

> یه واقعیتِ شگفت‌انگیز 🍳: اجاقِ القاییِ آشپزخانه‌ت روی همین قانون کار می‌کنه — جریانِ القایی در قابلمه‌ی فلزی **می‌چرخه** و قابلمه رو **داغ می‌کنه**. این بخش، چرایی رو روشن می‌کنه.

## بیانِ قانون لنز 📐

> **جریانِ القایی همیشه در جهتی‌ـه که با تغییرِ شار، مخالفت کنه**.

به‌صورتِ ریاضی، همون علامتِ منفی در قانونِ فاراده:

$$\varepsilon = -N \, \frac{\Delta \Phi_B}{\Delta t}$$

## معنیِ شهودی 💡

طبیعت در برابرِ **تغییر** مقاومت می‌کنه. اگه شار **زیاد می‌شه**، جریانِ القایی میدانی می‌سازه که اون شار رو **کم کنه**. اگه شار **کم می‌شه**، جریان میدانی می‌سازه که شار رو **زیاد** کنه.

## مثالِ کلاسیک — آهنربا روی سیم‌پیچ 🧲

- **آهنربا نزدیک می‌شود** (شار $B$ زیاد می‌شه) → جریان القایی **در جهت دفع آهنربا**
- **آهنربا دور می‌شود** (شار کم می‌شه) → جریان القایی **در جهت جذب آهنربا**

این یعنی: همیشه باید **کار کنی** تا آهنربا رو حرکت بدی، چون نیروی القایی **مقاومت می‌کنه**. این کار به انرژیِ الکتریکی تبدیل می‌شه. **این پایه‌ی پایستگیِ انرژی** است.

## ترمزِ مغناطیسی (Eddy Current Brake) 🚂

اگه یه ورقه‌ی فلزی از میدانِ مغناطیسی عبور کنه، در داخلش **جریان‌های گرداب** (eddy currents) القا می‌شن که با حرکت **مخالفت** می‌کنن — ترمزِ بدون تماس!

### کاربردها

- ترمزِ قطارِ سریع‌السیر (TGV، شینکانسن)
- ترمزِ ماشینِ سواری برقی (regenerative braking)
- ترمزِ هایپرلوپ
- اجاقِ القاییِ آشپزخانه (همین eddy current ولی برای گرمایش)

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/lenz-law-sim.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="شبیه‌سازی قانون لنز"></iframe>

## محاسبه‌ی پایتون — اجاق القایی 🐍

```python
# اجاق القایی آشپزخانه
# سیم‌پیچ زیر صفحه ۲۰ kHz جریان متناوب
# قابلمه فلزی روی صفحه - جریان گرداب در قابلمه

import math
mu_0 = 4 * math.pi * 1e-7

# پارامترهای اجاق
N = 30                  # دور سیم‌پیچ
I = 25                  # آمپر RMS
f = 20e3                # 20 kHz
omega = 2 * math.pi * f
R_coil = 0.10           # 10 سانتی‌متر شعاع

# میدان زیر قابلمه (تقریب مرکز سیم‌پیچ)
B_peak = mu_0 * N * I * math.sqrt(2) / (2 * R_coil)
print(f"میدان پیک زیر قابلمه: {B_peak*1000:.1f} mT")

# نرخ تغییر شار (سینوسی با ω)
dB_dt = B_peak * omega
print(f"نرخ تغییر میدان: {dB_dt:.2e} T/s")

# مقاومت سطحی قابلمه ~ 0.01 Ω
R_pot = 0.01
A_pot = math.pi * 0.08**2     # 8 سانتی‌متر شعاع کف قابلمه

# emf القایی
emf = dB_dt * A_pot
I_eddy_rms = emf / R_pot / math.sqrt(2)
print(f"جریان گرداب: {I_eddy_rms:.0f} A RMS")

# توان گرمایی
P = I_eddy_rms**2 * R_pot
print(f"توان گرمایی: {P:.0f} W")
# تقریباً 1.5 kW - مثل اجاق معمولی
# همه‌ی این انرژی در قابلمه می‌مونه - صفحه سرد می‌مونه!
```

## نکته‌ی پزشکی-زیستی 🩺

- **هایپرترمیای مغناطیسی برای سرطان** — همون اصل اجاقِ القایی. ذراتِ آهنیِ ریز در تومور تزریق می‌شن و میدانِ متناوب اون‌ها رو گرم می‌کنه → تومور می‌سوزه
- **MRI safety و گرمایشِ ایمپلنت** — هر فلزی در بدن (پلاکِ جراحی، ایمپلنتِ دندانی) در میدانِ متغیرِ MRI گرم می‌شه. به همین دلیل MRI با ایمپلنتِ بد طراحی‌شده ممنوع
- **القاگرِ پزشکی هوشمند** — سنسورهای کاشتنی که با میدانِ خارجی energy harvesting می‌کنن
- **ترمزِ غیرتماسیِ تجهیزات حساس** — برای جلوگیری از ارتعاش در ربات‌های جراحی

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/lenz-law-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش قانون لنز"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [قانون لنز](https://fa.wikipedia.org/wiki/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D9%84%D9%86%D8%B2)
- Wikipedia EN: [Lenz's law](https://en.wikipedia.org/wiki/Lenz%27s_law)، [Eddy current](https://en.wikipedia.org/wiki/Eddy_current)
- HyperPhysics: [Lenz's law](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/lenzlaw.html)

### ویدئو (یوتیوب)
- [Veritasium — Magnetic Braking](https://www.youtube.com/results?search_query=veritasium+magnetic+braking)
- [SmarterEveryDay — Eddy Currents](https://www.youtube.com/results?search_query=smarter+every+day+eddy+currents)
- [Practical Engineering — Induction Cooking](https://www.youtube.com/results?search_query=practical+engineering+induction+cooking)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: قانون لنز یازدهم](https://www.aparat.com/result/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D9%84%D9%86%D8%B2_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: اجاق القایی](https://www.aparat.com/result/%D8%A7%D8%AC%D8%A7%D9%82_%D8%A7%D9%84%D9%82%D8%A7%DB%8C%DB%8C)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/ghanoon-lenz/)

---

*در بخش بعدی، می‌ریم سراغ قطعه‌ای که در همه‌ی منابع تغذیه و دفیبریلاتورها استفاده می‌شه — [القاگرها](https://physicsme.ir/articles/inductors-tajrobi/) 🌀.*
