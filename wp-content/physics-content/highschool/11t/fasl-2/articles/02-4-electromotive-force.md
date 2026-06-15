---
title: "نیروی محرکه (emf) — موتورِ مدارهای الکتریکی 🔋"
chapter: "فصل ۲ — جریان الکتریکی و مدارهای جریان مستقیم (تجربی)"
section: "۲-۴ نیروی محرکه الکتریکی و مدارها"
order: 4
slug: "electromotive-force-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["نیروی محرکه", "emf", "ε", "مقاومت داخلی", "پیس‌میکر"]
---

# نیروی محرکه (emf) — موتورِ مدارهای الکتریکی 🔋

> یه واقعیت 🩺: یه پیس‌میکرِ قلبی با باتری ۲.۸ ولت کار می‌کنه و **بیشتر از ۱۰ سال** بدونِ تعویض دوام می‌آره. این یه شاهکار مهندسی-فیزیک‌ـه. ولی این ۲.۸ ولت دقیقاً چیه؟ این بخش، رازِ منبعِ ولتاژ رو روشن می‌کنه.

## نیروی محرکه چیست؟ 📐

**نیروی محرکه** $\varepsilon$ (epsilon) یا emf: انرژی‌ای که یه منبع (مثلِ باتری، سلولِ خورشیدی، ژنراتور) به ازای هر واحدِ بار به مدار می‌ده:

$$\varepsilon = \frac{W}{Q}$$

یکا: **ولت** (همون یکای پتانسیل، چون هر دو انرژی بر بارن).

**هشدار**: «نیروی محرکه» اسم گیج‌کننده‌ست — این **نیرو نیست**، **انرژیه بر بار**.

## مقاومتِ داخلی — منبعِ واقعی نه ایده‌آل ⚙️

هر منبعِ واقعی یه **مقاومتِ داخلی** ($r$) داره. وقتی جریان $I$ از منبع عبور می‌کنه:

$$V_{\text{ترمینال}} = \varepsilon - I \, r$$

یعنی **ولتاژ روی دو سرِ منبع** کمتر از emf می‌شه، چون بخشی از انرژی روی مقاومتِ داخلی مصرف می‌شه (به‌صورتِ گرما).

## رابطه‌ی کاملِ مدار 🔌

اگه مدارِ خارجی مقاومتِ $R$ داشته باشه:

$$I = \frac{\varepsilon}{R + r}$$

این **معادله‌ی کلیدیِ هر مدارِ ساده** است.

## مقادیر معمولِ نیروی محرکه 📌

| منبع | $\varepsilon$ | مقاومتِ داخلی |
|---|---|---|
| باتری AA آلکالین | $1.5\,\text{V}$ | $\sim 0.2\,\Omega$ |
| باتری لیتیوم-یون موبایل | $3.7\,\text{V}$ | $\sim 0.05\,\Omega$ |
| باتری پیس‌میکر (لیتیوم-ید) | $2.8\,\text{V}$ | $\sim 200\,\Omega$ |
| باتری ماشین | $12\,\text{V}$ | $\sim 0.01\,\Omega$ |
| سلولِ سوختی هیدروژنی | $0.7-1.2\,\text{V}$ | متغیر |
| سلول خورشیدی (یک سلول) | $0.5-0.7\,\text{V}$ | متغیر |
| سلول گالوانیکی (آزمایش کلاس) | $\sim 1.1\,\text{V}$ | $\sim 1\,\Omega$ |

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/emf-circuit.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="مدار با emf"></iframe>

## محاسبه‌ی پایتون — عمرِ باتریِ پیس‌میکر 🐍

```python
# پیس‌میکر دائمی - محاسبه‌ی عمر باتری
# باتری: 2.8 V، ظرفیت 1 آمپر-ساعت

epsilon = 2.8       # ولت
capacity = 1.0      # آمپر-ساعت
R_load = 1000       # 1 kΩ مقاومت بار (تخمینی)
r_internal = 200    # اهم مقاومت داخلی

# جریان متوسط (هنگام پالس فعال)
I = epsilon / (R_load + r_internal)
print(f"جریان فعال: {I*1e6:.1f} µA")

# پیس‌میکر معمولاً فقط 0.5 ms از هر 1000 ms پالس می‌زند
duty_cycle = 5e-4 / 1.0
I_avg = I * duty_cycle
print(f"جریان متوسط: {I_avg*1e9:.2f} nA")

# عمر تئوریک
hours = capacity / I_avg
years = hours / (24 * 365)
print(f"عمر باتری: {years:.1f} سال")
# تقریباً 100 سال در تئوری
# در عمل به‌خاطر self-discharge و راندمان ≈ 10 سال
```

## نکته‌ی پزشکی-زیستی 🩺

- **پیس‌میکر** — باتریِ لیتیوم-ید با عمرِ ۸-۱۲ سال، با emf حدود ۲.۸ ولت
- **CRT (Cardiac Resynchronization Therapy)** — همزمان‌سازِ پیشرفته‌ی قلب با سه الکترود
- **بیوباتری (Biofuel cell)** — تولیدِ emf از قند خون برای دستگاه‌های کاشتنی
- **TENS و فیزیوتراپی** — منبع emf قابل تنظیم برای جریانِ درمانی
- **انتقالِ یونی در سلول** — هر سلول یه «باتریِ زیستی» با emf حدودِ ۷۰ میلی‌ولته

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/niru-mohareke-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش نیروی محرکه"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [نیروی محرکه الکتریکی](https://fa.wikipedia.org/wiki/%D9%86%DB%8C%D8%B1%D9%88%DB%8C_%D9%85%D8%AD%D8%B1%DA%A9%D9%87_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)
- Wikipedia EN: [Electromotive force](https://en.wikipedia.org/wiki/Electromotive_force)، [Pacemaker battery](https://en.wikipedia.org/wiki/Artificial_cardiac_pacemaker)
- HyperPhysics: [EMF and internal resistance](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/ohmlaw2.html)

### ویدئو (یوتیوب)
- [Khan Academy — EMF and internal resistance](https://www.youtube.com/results?search_query=khan+academy+emf+internal+resistance)
- [Crash Course — Batteries](https://www.youtube.com/results?search_query=crash+course+batteries)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: نیروی محرکه یازدهم](https://www.aparat.com/result/%D9%86%DB%8C%D8%B1%D9%88%DB%8C_%D9%85%D8%AD%D8%B1%DA%A9%D9%87_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: پیس‌میکر قلب](https://www.aparat.com/result/%D9%BE%DB%8C%D8%B3_%D9%85%DB%8C%DA%A9%D8%B1)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با تحلیلِ جامع](https://physicsme.ir/articles/niru-mohareke/)

---

*در بخش بعدی، می‌بینیم چقدر انرژی در مدار مصرف می‌شه — [توان در مدارهای الکتریکی](https://physicsme.ir/articles/electric-power-tajrobi/) 💡.*
