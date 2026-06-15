---
title: "ترکیب مقاومت‌ها — سری و موازی 🔗"
chapter: "فصل ۲ — جریان الکتریکی و مدارهای جریان مستقیم (تجربی)"
section: "۲-۶ ترکیب مقاومت‌ها"
order: 6
slug: "resistor-combinations-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["سری", "موازی", "ترکیب مقاومت", "بدن", "بایولوژی"]
---

# ترکیب مقاومت‌ها — سری و موازی 🔗

> یه پرسش 💭: چرا کریسمس‌تری وقتی یه لامپ می‌سوزه، کل ردیف خاموش می‌شه؟ یا برعکس، چرا تو خونه‌ی تو وقتی یه لامپ می‌سوزه فقط اون لامپ خراب می‌شه؟ پاسخش تو **سری vs موازی** بودنشونه. این بخش، تفاوت رو روشن می‌کنه.

## دو نوع ترکیب 🎯

### سری (Series) — مقاومت‌ها پشتِ هم

همه‌ی جریان از همشون رد می‌شه. مقاومتِ معادل:

$$R_{\text{معادل}} = R_1 + R_2 + R_3 + \ldots$$

- **جریان** در همه یکسانه: $I_1 = I_2 = I_3 = I_{\text{کل}}$
- **ولتاژ** بینشون تقسیم می‌شه: $V_{\text{کل}} = V_1 + V_2 + V_3$
- اگه یکی قطع شه، **کل مدار قطع می‌شه** (مثل کریسمس‌تری قدیمی)

### موازی (Parallel) — مقاومت‌ها کنارِ هم

جریان بینشون تقسیم می‌شه. مقاومتِ معادل:

$$\frac{1}{R_{\text{معادل}}} = \frac{1}{R_1} + \frac{1}{R_2} + \frac{1}{R_3} + \ldots$$

- **ولتاژ** روی همشون یکسانه: $V_1 = V_2 = V_3 = V_{\text{کل}}$
- **جریان** بینشون تقسیم می‌شه: $I_{\text{کل}} = I_1 + I_2 + I_3$
- اگه یکی قطع شه، **بقیه به کار ادامه می‌دن** (مثل خونه‌ی تو)

## برای دو مقاومتِ موازی 🎯

$$R_{\text{معادل}} = \frac{R_1 \, R_2}{R_1 + R_2}$$

اگه $n$ تا مقاومتِ **مساویِ** $R$ موازی شن:

$$R_{\text{معادل}} = \frac{R}{n}$$

## ترکیبِ پیچیده 🧩

مدارِ واقعی معمولاً **سری-موازی** ـه. روشِ حل:
1. مقاومت‌های موازی رو با هم ساده کن
2. حالا یه مدار سری داری — جمعشون کن
3. اگه دوباره موازی‌ای پیدا شد، تکرار کن

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/combo-resistors.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="ترکیب مقاومت‌ها"></iframe>

## محاسبه‌ی پایتون — تحلیل مدار 🐍

```python
# مدار: R1=100Ω سری با (R2=200Ω موازی R3=300Ω) سری با R4=50Ω
# منبع: 12V

R1 = 100; R2 = 200; R3 = 300; R4 = 50
V = 12

# گام 1: موازی شدن R2 و R3
R_parallel = (R2 * R3) / (R2 + R3)
print(f"R2 موازی R3 = {R_parallel:.1f} Ω")

# گام 2: مدار سری
R_total = R1 + R_parallel + R4
print(f"مقاومت کل = {R_total:.1f} Ω")

# گام 3: جریان کل
I_total = V / R_total
print(f"جریان کل = {I_total*1000:.1f} mA")

# گام 4: ولتاژ روی هر بخش
V1 = I_total * R1
V_parallel = I_total * R_parallel
V4 = I_total * R4
print(f"V1={V1:.2f}V, V_parallel={V_parallel:.2f}V, V4={V4:.2f}V")

# گام 5: جریان در شاخه‌های موازی
I2 = V_parallel / R2
I3 = V_parallel / R3
print(f"I2={I2*1000:.1f} mA, I3={I3*1000:.1f} mA")
print(f"چک: I2+I3 = {(I2+I3)*1000:.1f} mA (باید برابر I_total باشه)")
```

## نکته‌ی پزشکی-زیستی 🩺

- **مدلِ مدارِ سلولی** — غشای سلول رو می‌شه با مدلِ موازی (خازنِ غشا + مقاومتِ غشا) با مدارِ سری (مقاومتِ سیتوپلاسم) مدل کرد. این پایه‌ی **معادله‌ی هاجکین-هاکسلی** برای شبیه‌سازی نورون
- **ECG ۱۲-لید** — هر کدوم از ۱۲ سرنخ، یه مدارِ متفاوت می‌سازه با ترکیب الکترودها — مثلِ گرفتنِ ولتاژ بینِ نقاطِ مختلف
- **سیستم گردش خون به‌عنوان مدار** — قلب = منبع، رگ‌ها = مقاومت‌ها. سرخرگ‌های اصلی سری‌اند، مویرگ‌ها موازی هستن. کاهشِ مقاومتِ کل با موازی‌سازیِ مویرگ‌ها = پایه‌ی فیزیولوژی گردش
- **EEG چندکاناله** — ۳۲ یا ۶۴ کاناله، یه شبکه از الکترودها که هم سری و هم موازی هستن

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/tarkib-moghavemat-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش ترکیب مقاومت"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [مدار سری و موازی](https://fa.wikipedia.org/wiki/%D9%85%D8%AF%D8%A7%D8%B1_%D8%B3%D8%B1%DB%8C_%D9%88_%D9%85%D9%88%D8%A7%D8%B2%DB%8C)
- Wikipedia EN: [Series and parallel circuits](https://en.wikipedia.org/wiki/Series_and_parallel_circuits)
- HyperPhysics: [Resistor combinations](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/serpar.html)

### ویدئو (یوتیوب)
- [Khan Academy — Series and parallel](https://www.youtube.com/results?search_query=khan+academy+series+parallel)
- [Crash Course — Circuits](https://www.youtube.com/results?search_query=crash+course+circuits)
- [Walter Lewin — Kirchhoff](https://www.youtube.com/results?search_query=walter+lewin+kirchhoff)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: ترکیب مقاومت فیزیک یازدهم](https://www.aparat.com/result/%D8%AA%D8%B1%DA%A9%DB%8C%D8%A8_%D9%85%D9%82%D8%A7%D9%88%D9%85%D8%AA_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: سری و موازی مدار](https://www.aparat.com/result/%D8%B3%D8%B1%DB%8C_%D9%88_%D9%85%D9%88%D8%A7%D8%B2%DB%8C_%D9%85%D8%AF%D8%A7%D8%B1)

### شبیه‌سازی PhET
- [Circuit Construction Kit](https://phet.colorado.edu/en/simulations/circuit-construction-kit-dc)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با مدارهای پیچیده‌تر](https://physicsme.ir/articles/tarkib-moghavemat/)

---

*فصلِ ۲ تموم شد! حالا وقتِ [حل مسائل فصل](https://physicsme.ir/articles/problems-chapter-2-y11-tajrobi/) و [فلش‌کارت‌ها](https://physicsme.ir/articles/flashcards-chapter-2-y11-tajrobi/) ست. در فصل ۳ می‌ریم سراغ **مغناطیس** — بارهای متحرک، میدانِ جدید، و القا — شگفت‌انگیزترین داستان فیزیک 🧲.*
