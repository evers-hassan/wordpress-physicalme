---
title: "پتانسیل الکتریکی — ولت و معنای آن 🔋"
chapter: "فصل ۱ — الکتریسیتۀ ساکن (تجربی)"
section: "۱-۸ پتانسیل الکتریکی"
order: 8
slug: "electric-potential-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["پتانسیل الکتریکی", "ولت", "اختلاف پتانسیل", "نورون", "پتانسیل عمل"]
---

# پتانسیل الکتریکی — ولت و معنای آن 🔋

> یه نکته‌ی پایه‌ای 🩺: وقتی ECG اندازه می‌گیریم، چی رو می‌سنجیم؟ پاسخ: **اختلافِ پتانسیلِ الکتریکی** بینِ دو نقطه از پوست. ولت، مهم‌ترین یکای الکترودیاگنوستیک‌ـه. این بخش، الفبای ولت‌ـه.

## تعریفِ پتانسیل الکتریکی 📐

پتانسیلِ الکتریکی $V$ در یه نقطه از فضا، **انرژی پتانسیلِ به ازای واحدِ بار** است:

$$V = \frac{U}{q_0}$$

- **یکا**: **ولت** ($\text{V}$) = $\text{J/C}$ = ژول بر کولن
- ولتاژ یه **اسکالر**ـه (نه برداری)
- برای یه بارِ نقطه‌ای $q$ در فاصله‌ی $r$:

$$V = k \frac{q}{r}$$

## اختلافِ پتانسیل (Δ V) 🎯

عملاً همیشه فقط اختلافِ پتانسیل بینِ دو نقطه‌ست که اهمیت داره:

$$\Delta V = V_B - V_A = \frac{W_{\text{بیرونی}}}{q}$$

یعنی **کاری که باید انجام بدی برای جابه‌جاییِ یک واحد بار از A به B**.

### مثال‌های کاربردی

| موقعیت | اختلافِ پتانسیل |
|---|---|
| پتانسیل آرامش نورون | $\sim 70\,\text{mV}$ |
| پتانسیل عمل (پیک) | $\sim 100\,\text{mV}$ |
| ECG سطح پوست | $\sim 1\,\text{mV}$ |
| EEG سطح سر | $\sim 50\,\mu\text{V}$ |
| باتری AA | $1.5\,\text{V}$ |
| پریز خانگی | $220\,\text{V}$ |
| دفیبریلاتور | $\sim 1000\,\text{V}$ |
| رعد و برق | $\sim 10^8\,\text{V}$ |

## معادله‌ی $W = qV$ — قلبِ کارِ الکتریکی 💡

اگه یه بارِ $q$ تو اختلاف پتانسیلِ $V$ حرکت کنه:

$$W = q \, V$$

این رابطه‌ی شگفت‌انگیزِ ساده، **اساسِ کلِ الکتریسیته**ـست. از حرکتِ یون در سلول گرفته تا نیروی موتورِ هیبریدی.

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/potansiel-electriki-quiz.html" width="100%" height="420" style="border:none; border-radius:12px;" loading="lazy" title="پرسش پتانسیل الکتریکی"></iframe>

## محاسبه‌ی پایتون — پتانسیلِ عمل 🐍

```python
# انرژی آزادشده در یک پتانسیل عمل عصبی
import math

V_resting = -0.070     # 70 mV منفی (داخل نسبت به خارج)
V_peak = 0.040         # 40 mV مثبت در پیک
delta_V = V_peak - V_resting   # 110 mV تغییر

# هر پتانسیل عمل تقریباً 10^11 یون Na+ منتقل می‌کند (در یک سلول)
n_Na = 1e11
e = 1.602e-19
Q = n_Na * e

W = Q * delta_V
print(f"بار منتقل‌شده: {Q*1e12:.2f} pC")
print(f"کارِ انجام‌شده: {W:.2e} J = {W*6.24e18:.2e} eV")

# مقایسه با ATP (ارز انرژی سلولی)
ATP_energy = 0.4 * 1.602e-19   # 0.4 eV به ژول
n_ATP = W / ATP_energy
print(f"معادلِ {n_ATP:.2e} مولکول ATP")
# هر پتانسیل عمل ≈ مصرفِ این تعداد ATP

# دفیبریلاتور
V_def = 1500     # ولت
Q_def = 50e-6    # 50 میکرو کولن بار آزاد می‌شود
W_def = Q_def * V_def
print(f"انرژی دفیبریلاتور: {W_def:.2f} J ≈ 200 J استاندارد")
```

## نکته‌ی پزشکی-زیستی 🩺

- **EEG و ECG** هر دو **اختلافِ پتانسیل** اندازه می‌گیرن (نه پتانسیلِ مطلق). دقیقاً به همین دلیل از دو الکترود استفاده می‌شه
- **پاراکوسپ**(کوش‌داری شنوایی) — صدا رو به نوسانِ ولتاژ تبدیل می‌کنه و به عصب می‌رسونه
- **داروی الکترودرمالی (iontophoresis)** — ولتاژِ کم باعث نفوذِ دارو از پوست می‌شه — راهی نوین برای تجویزِ دارو
- **منبعِ ATP و میتوکندری**: گرادیانِ پروتون روی غشای میتوکندریایی ($\Delta V \approx 200\,\text{mV}$) منبعِ ساختِ ATP است — پایه‌ی متابولیسمِ هوازی

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [پتانسیل الکتریکی](https://fa.wikipedia.org/wiki/%D9%BE%D8%AA%D8%A7%D9%86%D8%B3%DB%8C%D9%84_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)
- Wikipedia EN: [Electric potential](https://en.wikipedia.org/wiki/Electric_potential)، [Action potential](https://en.wikipedia.org/wiki/Action_potential)
- HyperPhysics: [Voltage](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/elevol.html)

### ویدئو (یوتیوب)
- [Khan Academy — Electric Potential](https://www.youtube.com/results?search_query=khan+academy+electric+potential)
- [Walter Lewin — Potential](https://www.youtube.com/results?search_query=walter+lewin+electric+potential)
- [Crash Course — Voltage](https://www.youtube.com/results?search_query=crash+course+voltage)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: پتانسیل الکتریکی یازدهم](https://www.aparat.com/result/%D9%BE%D8%AA%D8%A7%D9%86%D8%B3%DB%8C%D9%84_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: پتانسیل عمل نورون](https://www.aparat.com/result/%D9%BE%D8%AA%D8%A7%D9%86%D8%B3%DB%8C%D9%84_%D8%B9%D9%85%D9%84_%D9%86%D9%88%D8%B1%D9%88%D9%86)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با محاسباتِ بیشتر](https://physicsme.ir/articles/potansiel-electriki/)

---

*در بخش بعدی، یه پدیده‌ی شگفت‌انگیز رو می‌بینیم: چرا بارِ روی یه رسانا فقط روی **سطحِ** اون می‌نشینه — [توزیعِ بار در رساناها](https://physicsme.ir/articles/charge-on-conductors-tajrobi/) 🛡️.*
