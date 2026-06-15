---
title: "میدان مغناطیسی حاصل از جریان — وقتی سیم آهنربا می‌شود 🔄"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۵ میدان مغناطیسی حاصل از جریان الکتریکی"
order: 5
slug: "magnetic-field-from-current-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["میدان از جریان", "سیم مستقیم", "سیملوله", "سلنوئید", "MRI"]
---

# میدان مغناطیسی حاصل از جریان — وقتی سیم آهنربا می‌شود 🔄

> یه واقعیتِ تاریخی 🧪: سالِ ۱۸۲۰، اورستد در یه کلاسِ درس متوجه شد عقربه‌ی قطب‌نمای کنارِ سیمِ حاملِ جریان **منحرف می‌شه**. این کشفِ تصادفی، **انقلابی** بود — اولین بار ثابت شد الکتریسیته و مغناطیس به هم مربوط‌ـن. حالا تو MRI، موتورها، و میلیون‌ها دستگاه دیگه از همین اصل استفاده می‌کنیم.

## میدانِ سیمِ مستقیم 📐

برای یه سیمِ بلند با جریانِ $I$، در فاصله‌ی $d$ از سیم:

$$B = \frac{\mu_0 I}{2\pi d}$$

- $\mu_0 = 4\pi \times 10^{-7}\,\text{T·m/A}$ — **گذردهی مغناطیسی خلأ**
- خطوطِ میدان: **دایره‌های هم‌مرکز** حولِ سیم

**جهت**: قاعده‌ی دستِ راست — شست در جهت جریان، انگشتان در جهت میدان.

## میدانِ سیم‌لوله (سلنوئید) — مهم‌ترین کاربرد 🌀

سیمِ لوله = سیمی که به شکلِ مارپیچ پیچیده شده. اگه $n$ تعدادِ دور در هر متر باشه:

$$B_{\text{داخل}} = \mu_0 \, n \, I$$

- میدان داخلِ سلنوئید تقریباً **یکنواخت** و **موازی محور** ـه
- خارج از سلنوئید، میدان خیلی ضعیفه
- این پیکره‌بندی، **مهم‌ترین روشِ ساختِ میدانِ یکنواخت قوی** ـه

## میدانِ حلقه‌ی جریان 🔵

برای یه حلقه‌ی دایره‌ای به شعاع $R$ و جریان $I$، در مرکز:

$$B = \frac{\mu_0 \, I}{2R}$$

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/straight-wire-field.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="میدان سیم مستقیم"></iframe>

<iframe src="/wp-content/physics-content/highschool/11/widgets/solenoid-field.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="میدان سلنوئید"></iframe>

## محاسبه‌ی پایتون — طراحی MRI 🐍

```python
# طراحی یک سیم‌پیچ MRI ساده
# هدف: میدان 1.5 T در داخل
import math

B_target = 1.5             # تسلا
mu_0 = 4 * math.pi * 1e-7

# اگه از مس معمولی استفاده کنیم:
# جریان لازم؟
# B = μ₀ · n · I  →  n·I = B/μ₀

nI = B_target / mu_0
print(f"چگالی جریان مورد نیاز: nI = {nI:.0f} A/m")
# تقریباً 1.2 میلیون آمپر-دور بر متر!

# اگه n = 1000 دور/متر:
n = 1000
I_required = nI / n
print(f"جریان لازم با 1000 دور/m: {I_required:.0f} A")
# 1194 آمپر - غیرممکن برای سیم مس معمولی
# به همین دلیل MRI از سیم ابررسانا استفاده می‌کنه!

# اگه ابررسانا (مقاومت صفر، جریان زیاد OK):
# سیم نیوبیوم-تیتانیم می‌تونه 1500 A بکشه

# توان اتلافی در سیم مس معمولی:
# R تقریبی 1 km سیم = 1 Ω
R_total = 1
P_loss = I_required**2 * R_total
print(f"اتلاف توان (سیم مس): {P_loss/1000:.0f} kW")
# 1.4 MW اتلاف! دستگاه ذوب می‌شه

# با ابررسانا: P = 0 - تنها نیاز انرژی خنک‌کاری
```

## نکته‌ی پزشکی-زیستی 🩺

- **MRI** — قلبش یه سلنوئیدِ ابررسانا، با میدانِ ۱.۵-۳ تسلا
- **آهنرباهای الکتریکی پزشکی** — حملِ بیماران در تصادفات (با آهنرباهای فلزی برداشتن)
- **NMR (Nuclear Magnetic Resonance)** — پایه‌ی MRI و آنالیزِ مولکولیِ دارو
- **TMS** — سیم‌پیچ کوچک نزدیک سر، جریانِ پالسی، میدانِ مغناطیسیِ متغیر که در مغز جریانِ القایی ایجاد می‌کنه
- **هیپرترمیای مغناطیسی** — ذراتِ آهنیِ ریز در تومور، با میدانِ متناوب گرم می‌شن

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/field-from-current-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش میدان از جریان"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [قانون آمپر](https://fa.wikipedia.org/wiki/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D8%A2%D9%85%D9%BE%D8%B1)
- Wikipedia EN: [Magnetic field from current](https://en.wikipedia.org/wiki/Biot%E2%80%93Savart_law)، [Solenoid](https://en.wikipedia.org/wiki/Solenoid)
- HyperPhysics: [Magnetic field of wire](http://hyperphysics.phy-astr.gsu.edu/hbase/magnetic/magcur.html)

### ویدئو (یوتیوب)
- [Walter Lewin — Biot-Savart](https://www.youtube.com/results?search_query=walter+lewin+biot+savart)
- [Veritasium — Hans Oersted Discovery](https://www.youtube.com/results?search_query=veritasium+oersted+discovery)
- [SciShow — How MRI Works](https://www.youtube.com/results?search_query=scishow+how+MRI+works)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: میدان از جریان یازدهم](https://www.aparat.com/result/%D9%85%DB%8C%D8%AF%D8%A7%D9%86_%D8%A7%D8%B2_%D8%AC%D8%B1%DB%8C%D8%A7%D9%86_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: سیملوله سلنوئید](https://www.aparat.com/result/%D8%B3%D9%84%D9%86%D9%88%D8%A6%DB%8C%D8%AF)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/magnetic-field-from-current/)

---

*در بخش بعدی، می‌ریم سراغ سؤالِ مهم: چرا برخی مواد مغناطیسی می‌شن و برخی نه؟ — [ویژگی‌های مغناطیسی مواد](https://physicsme.ir/articles/magnetic-properties-tajrobi/) 🔬.*
