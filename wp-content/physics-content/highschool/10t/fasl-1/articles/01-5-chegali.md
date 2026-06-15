---
title: "چگالی — چرا یخ شناوره ولی سنگ ته می‌ره؟ 🧊🪨"
chapter: "فصل ۱ — فیزیک، دانش بنیادی"
section: "۱-۵ چگالی"
order: 5
slug: "density-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["چگالی", "جرم", "حجم", "شناوری", "ارشمیدس", "تجربی"]
---

# چگالی — چرا یخ شناوره ولی سنگ ته می‌ره؟ 🧊🪨

> یه چیزِ عجیب 💭: یخ از آبِ مایع **سبک‌تر**ـه. واسه همینه که یخ‌چاله‌های قطبی روی اقیانوس شناورن، نه ته می‌رن. ولی اگه چگالیِ یخ بزرگ‌تر از آب می‌بود، اقیانوس‌ها از ته یخ می‌زدن و **هیچ حیاتی** تو زمین شکل نمی‌گرفت. این یه ویژگیِ کوچیک به اسمِ «چگالی» چه قدر تاثیرگذار بوده؟

## فرمول و یکا 📌

**چگالی** ($\rho$) = جرم بر حجم:

$$\rho = \frac{m}{V}$$

- **یکای SI:** کیلوگرم بر مترمکعب ($\text{kg}/\text{m}^3$)
- **یکای متداولِ آزمایشگاهی:** گرم بر سانتی‌مترمکعب ($\text{g}/\text{cm}^3$)
- **تبدیل:** $1\,\text{g}/\text{cm}^3 = 1000\,\text{kg}/\text{m}^3$

## چند چگالیِ کلیدی که خوبه حفظ کنی 💎

| ماده | چگالی (kg/m³) |
|---|---|
| هوا (در فشار جوّ) | ۱٫۲ |
| یخ | ۹۲۰ |
| **آب** (مرجع!) | **۱۰۰۰** |
| آبِ دریا | ۱۰۲۵ |
| خونِ انسان | ۱۰۶۰ |
| بدنِ انسان (میانگین) | ~۱۰۱۰ |
| استخوان | ~۱۹۰۰ |
| آلومینیوم | ۲۷۰۰ |
| آهن | ۷۸۷۰ |
| جیوه | ۱۳۵۹۵ |
| طلا | ۱۹۳۰۰ |
| پلاتین | ۲۱۴۵۰ |
| ستاره‌ی کوتوله‌ی سفید | $\sim 10^{9}$ 😱 |

> 🩺 **برای تجربی‌ها**: چگالیِ خون ≈ ۱۰۶۰ kg/m³ یکی از پارامترهای کلیدی تو دینامیکِ گردشِ خون و آزمایش‌های هماتولوژیه. می‌بینی همه‌چی به فیزیک برمی‌گرده!

## شبیه‌ساز چگالی — جرم و حجم رو عوض کن 🎮

<iframe src="/wp-content/physics-content/highschool/10/widgets/density-interactive.html" width="100%" height="500" style="border:none; border-radius:12px;" loading="lazy" title="شبیه‌ساز چگالی"></iframe>

## مثالِ کاربردی — تعیینِ چگالیِ یه نمونه‌ی ناشناخته 🧪

روشِ کلاسیک:
1. **جرم** رو با ترازوی دیجیتالی اندازه بگیر: $m$
2. یه استوانه‌ی مدرّج پر از آب کن و حجمِ آب رو یادداشت کن: $V_1$
3. نمونه رو با احتیاط داخلِ استوانه فرو کن. سطحِ جدید رو یادداشت کن: $V_2$
4. **حجمِ نمونه** = $V_2 - V_1$
5. $\rho = m/(V_2 - V_1)$

این دقیقاً همون روشی‌ـه که **ارشمیدس** ۲۲۰۰ سال پیش برای فهمیدنِ خلوصِ تاجِ پادشاهِ سیراکوز استفاده کرد — لخت دوید تو خیابون و فریاد زد «**اِوریکا!**» (یافتم! 🛁🏃‍♂️).

## محاسبه با پایتون 🐍

```python
# مثالِ کتاب — مسئله‌ی ۱۸:
# جرم نمونه = ۳۶.۸ گرم
# سطحِ آب از ۱۸.۵ mL به ۲۳.۱ mL رسید
# چگالی برحسب g/cm³ چنده؟

m = 36.8                  # گرم
V_diff = 23.1 - 18.5      # میلی‌لیتر = سانتی‌متر‌مکعب
rho = m / V_diff

print(f"چگالی = {rho:.2f} g/cm³ = {rho*1000:.0f} kg/m³")
# 8.00 g/cm³ ≈ آهن خام / فولاد

# مقایسه‌ی چندتایی با پایتون
materials = {
    "آلومینیوم": 2.70,
    "آهن":       7.87,
    "مس":        8.96,
    "نقره":     10.49,
    "طلا":      19.30,
}
unknown = rho
candidate = min(materials, key=lambda k: abs(materials[k]-unknown))
print(f"ماده‌ی نمونه به‌احتمالِ زیاد: {candidate}")
```

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/10/widgets/chegali-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش و پاسخ چگالی"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [چگالی](https://fa.wikipedia.org/wiki/%DA%86%DA%AF%D8%A7%D9%84%DB%8C)
- Wikipedia EN: [Density](https://en.wikipedia.org/wiki/Density)، [Archimedes principle](https://en.wikipedia.org/wiki/Archimedes%27_principle)، [White dwarf](https://en.wikipedia.org/wiki/White_dwarf)
- [HyperPhysics — Density and Pressure](http://hyperphysics.phy-astr.gsu.edu/hbase/pden.html)
- Khan Academy: [Density and buoyancy](https://www.khanacademy.org/science/physics/fluids/density-and-pressure)

### ویدئو (یوتیوب)
- Veritasium: [Why does ice float?](https://www.youtube.com/results?search_query=veritasium+ice+float)
- SciShow: [Density of stars](https://www.youtube.com/results?search_query=scishow+white+dwarf+density)
- MIT OCW 8.01: [Density, fluids](https://www.youtube.com/results?search_query=walter+lewin+density+fluids)
- Crash Course: [Archimedes principle](https://www.youtube.com/results?search_query=crash+course+archimedes)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: چگالی فیزیک دهم](https://www.aparat.com/result/%DA%86%DA%AF%D8%A7%D9%84%DB%8C_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%87%D9%85)
- [جست‌وجو: ارشمیدس و چگالی](https://www.aparat.com/result/%D8%A7%D8%B1%D8%B4%D9%85%DB%8C%D8%AF%D8%B3_%DA%86%DA%AF%D8%A7%D9%84%DB%8C)

### شبیه‌ساز خارجی
- [PhET — Density (فارسی موجوده)](https://phet.colorado.edu/fa/simulations/density)
- [PhET — Buoyancy](https://phet.colorado.edu/en/simulations/buoyancy)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با تاریخچه‌ی ارشمیدس و چگالی‌های جدول کامل](https://physicsme.ir/articles/chegali/)
- [فصلِ ۲ تجربی: شناوری و اصلِ ارشمیدس (به‌زودی)](#)

---

*همینجا فصلِ ۱ تموم شد 🎉. تو بخشِ بعدی می‌ریم سراغِ حلِ مسائل — همه‌ی پرسش‌های پایانِ فصل، قدم‌به‌قدم.*
