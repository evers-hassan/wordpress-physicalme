---
title: "مقاومت الکتریکی و قانون اهم — رابطه‌ای که هر مدار رو می‌چرخونه 📏"
chapter: "فصل ۲ — جریان الکتریکی و مدارهای جریان مستقیم (تجربی)"
section: "۲-۲ مقاومت الکتریکی و قانون اهم"
order: 2
slug: "resistance-ohm-law-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["مقاومت", "اهم", "V=RI", "بایوامپدانس", "بدن"]
---

# مقاومت الکتریکی و قانون اهم — رابطه‌ای که هر مدار رو می‌چرخونه 📏

> یه واقعیت 🩺: مقاومتِ پوستِ خشکِ تو بینِ **۱۰۰ کیلواهم تا ۱ مگااهم**ـه. ولی پوست خیس فقط **۱ کیلواهم**! این فرق ۱۰۰۰ برابری دلیلِ ایمنی نیست — یعنی شُک الکتریکی روی پوستِ خیس **۱۰۰۰ برابر خطرناک‌تر**. حالا فهمیدی چرا حمام رو از پریز دور می‌دارن!

## قانون اهم — ساده ولی پُربار 📐

برای بسیاری از رساناها (ولی نه همه!):

$$V = R \, I \quad \Leftrightarrow \quad I = \frac{V}{R} \quad \Leftrightarrow \quad R = \frac{V}{I}$$

- $V$: ولتاژ (ولت)
- $I$: جریان (آمپر)
- $R$: مقاومت (**اهم**، نماد $\Omega$)

**یک اهم** = ولتاژی که جریانِ یک آمپر تولید می‌کنه.

## معنیِ مقاومت 🛡️

مقاومت یعنی: «چقدر بار سختی می‌کشه از این جسم رد بشه؟»

- مقاومتِ کم → جریانِ زیاد به‌ازای ولتاژِ کم → خوب‌ـه برای سیم‌کشی
- مقاومتِ زیاد → جریانِ کم به‌ازای ولتاژِ زیاد → خوب‌ـه برای المنتِ گرما، لامپ

## آیا همه‌ی مواد اهمی هستند؟ 🤔

**نه!** قانون اهم فقط برای **مواد اهمی** (فلزات معمولی در محدوده‌ی دمای ثابت) برقراره. این مواد **اهمی نیستن**:

- نیمه‌رساناها (دیود، ترانزیستور)
- لامپ تنگستن (داغ که می‌شه، مقاومتش زیاد می‌شه)
- بدن انسان (پیچیده‌ست — پوست، عضله، خون فرق دارن)
- پلاسما گاز (مثل رعد)

## مقاومت‌های معمول 📌

| جسم | مقاومت (تقریبی) |
|---|---|
| سیم مس ۱ متر | $\sim 0.02\,\Omega$ |
| لامپ LED ۵ ولتی | $\sim 250\,\Omega$ |
| المنت گرمایی | $\sim 50\,\Omega$ |
| پوست خشک (دست به دست) | $\sim 100\,\text{k}\Omega$ |
| پوست خیس | $\sim 1\,\text{k}\Omega$ |
| بافت داخلی (عضله) | $\sim 100\,\Omega$ |
| یک نورون منفرد | $\sim 100\,\text{M}\Omega$ |
| عایقِ شیشه | $> 10^{12}\,\Omega$ |

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/ohm-law.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="قانون اهم"></iframe>

## محاسبه‌ی پایتون — ایمنیِ الکتریکی 🐍

```python
# آیا گرفتن پریز خانگی با دست خیس کشنده است؟

V_outlet = 220   # ولت (ایران)

# پوست خشک
R_dry = 100_000  # 100 kΩ
I_dry = V_outlet / R_dry
print(f"دست خشک: I = {I_dry*1000:.2f} mA")

# پوست خیس
R_wet = 1_000    # 1 kΩ
I_wet = V_outlet / R_wet
print(f"دست خیس: I = {I_wet*1000:.0f} mA")

# آستانه‌های ایمنی (تخمینی)
# 1 mA: احساس
# 10 mA: عضله جذب می‌شه
# 100 mA: فیبریلاسیون قلب (مرگ احتمالی)
print("\nآستانه‌ها:")
print("1 mA → احساس")
print("10 mA → نمی‌توانی دست بکشی")
print("100 mA → خطر مرگ")
# دست خیس → 220 mA → فوق‌العاده خطرناک
```

## نکته‌ی پزشکی-زیستی 🩺

- **بایوامپدانس (bioimpedance)** — اندازه‌گیریِ مقاومتِ بافت برای تشخیص:
  - **چربیِ بدن** (روش BIA در باشگاه‌ها)
  - **ادم و التهاب** (مقاومتِ بافتِ متورم کمتر می‌شه)
  - **سرطان (تومور)** — بافتِ سرطانی مقاومتش با بافتِ سالم فرق داره
- **EIT (Electrical Impedance Tomography)** — یه نوع تصویربرداریِ پزشکی که از تغییرِ مقاومتِ بافت در حالات مختلف برای ساختن تصویرِ ریه و قلب استفاده می‌کنه
- **شُکِ الکتریکی** — مرگ از شُک معمولاً به‌خاطرِ فیبریلاسیونِ قلبی‌ـه (جریانِ ۱۰۰-۲۰۰ میلی‌آمپر)، نه سوختگی

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/moghavemat-ohm-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش قانون اهم"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [قانون اهم](https://fa.wikipedia.org/wiki/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D8%A7%D9%87%D9%85)
- Wikipedia EN: [Ohm's law](https://en.wikipedia.org/wiki/Ohm%27s_law)، [Bioimpedance](https://en.wikipedia.org/wiki/Bioelectrical_impedance_analysis)
- HyperPhysics: [Ohm's law](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/ohmlaw.html)

### ویدئو (یوتیوب)
- [Khan Academy — Ohm's Law](https://www.youtube.com/results?search_query=khan+academy+ohm+law)
- [Veritasium — The Big Misconception About Electricity](https://www.youtube.com/results?search_query=veritasium+misconception+electricity)
- [Crash Course — Resistance](https://www.youtube.com/results?search_query=crash+course+ohm+law)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: قانون اهم یازدهم](https://www.aparat.com/result/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D8%A7%D9%87%D9%85_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: ایمنی الکتریکی](https://www.aparat.com/result/%D8%A7%DB%8C%D9%85%D9%86%DB%8C_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با مدلِ درود](https://physicsme.ir/articles/moghavemat-ohm/)

---

*در بخش بعدی، می‌بینیم چرا مقاومت سیم به جنس، طول و قطر بستگی داره — [مقاومتِ ویژه](https://physicsme.ir/articles/resistivity-tajrobi/) 🔬.*
