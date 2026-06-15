---
title: "فشار در شاره‌ها — همون چیزی که دستگاهِ فشارسنج اندازه می‌گیره 🩺"
chapter: "فصل ۲ — ویژگی‌های فیزیکی مواد (تجربی)"
section: "۲-۳ فشار در شاره‌ها"
order: 3
slug: "fluid-pressure-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["فشار", "شاره", "هیدرواستاتیک", "فشار خون", "اصل پاسکال", "تجربی"]
---

# فشار در شاره‌ها — همون چیزی که دستگاهِ فشارسنج اندازه می‌گیره 🩺

> یه چیزِ شگفت‌انگیز 🤿: اگه با کفِ پاهات روی زمین بایستی، فشاری که زیرِ پاهات وارد می‌کنی حدود **۲ kPa**ـه. اگه روی یه نوکِ سوزن بایستی (فرضی!)، همون وزن، فشاری حدود **۱۰۰ هزار kPa** ایجاد می‌کنه! 🪡😱 یعنی فشار = نیرو / سطح. تو این درس می‌فهمیم چرا غواص هرچی عمیق‌تر می‌ره، گوشش بدجور می‌فهمه — و چرا فشارِ خون این‌قدر مهمه.

## تعریف 📌

**فشار** = نیرو تقسیم بر سطح:

$$P = \frac{F}{A}$$

- **یکای SI:** پاسکال (Pa) = N/m²
- **یکای پزشکی:** میلی‌متر جیوه (mmHg)
- **تبدیل:** ۱ atm = ۱۰۱.۳ kPa = ۷۶۰ mmHg = ۷۶ cmHg

## فرمولِ کلیدی: فشار در عمقِ شاره ⬇️

تو هر شاره‌ی ساکن، فشار با عمق به‌صورتِ **خطی** زیاد می‌شه:

$$P = P_0 + \rho \cdot g \cdot h$$

- $P_0$: فشارِ سطح (مثلاً فشار جوّ)
- $\rho$: چگالی شاره
- $g$: شتاب گرانش
- $h$: عمق

## شبیه‌ساز فشار در عمق 🌊

کاوشگرِ قرمز رو بکش پایین یا بالا — می‌بینی چطور فشار با عمق زیاد می‌شه:

<iframe src="/wp-content/physics-content/highschool/10/widgets/hydrostatic-pressure.html" width="100%" height="640" style="border:none; border-radius:12px;" loading="lazy" title="فشار در شاره"></iframe>

## نکته‌ی ظریف: فشار به **شکلِ ظرف** ربط نداره 🫙

اگه دو ظرفِ متفاوت (یکی استوانه، یکی قیف) یک ارتفاعِ یکسان از همون شاره داشته باشن، **فشار در ته هر دو یکی‌ست!** این جالبه — اسمش [**اَبَر-غلطکِ هیدروستاتیکی**](https://en.wikipedia.org/wiki/Hydrostatic_paradox) ـه.

## فشارِ خون — یه کاربردِ مستقیم 🩸

دستگاهِ فشارسنج (اِسفیگمومانومتر) چی اندازه می‌گیره؟ **اختلافِ فشار** بین جریانِ خون و فشارِ جوّ، به‌صورتِ ارتفاعِ ستونِ جیوه!

- **۱۲۰/۸۰ mmHg** یعنی: سیستولی ۱۲۰ میلی‌متر جیوه (موقعِ انقباضِ قلب) و دیاستولی ۸۰ (موقعِ استراحت).
- اگه به Pa تبدیل کنی: ۱۶ kPa / ۱۱ kPa.

و یه نکته‌ی فیزیکی: فشار خونِ پای آدم **بزرگ‌تر** از فشارِ خونِ مغزه — چون پاها پایین‌ترن و باید ارتفاعِ $\rho g h$ از ستونِ خون رو تحمل کنن. به همین دلیل وقتی یه‌هو از حالتِ خوابیده بلند می‌شی، یه لحظه «گیج» می‌شی — فشارِ مغز افتاده! 🧠

## اصل پاسکال — کاربردِ صنعتی و پزشکی 🔧

> **هر تغییری در فشارِ یه شاره‌ی محصور، به همه‌ی نقاطِ شاره و دیواره‌ها به‌طورِ کامل و یکسان منتقل می‌شه.**

این اصل، پایه‌ی:
- **جکِ هیدرولیکی** (با نیروی کم، وزنِ زیاد بلند کن)
- **ترمزِ هیدرولیکی ماشین**
- **سرنگِ تزریقِ پزشکی** — وقتی پیستون رو فشار می‌دی، فشار تو کلِ سرنگ یکسان می‌شه و مایع از سرسوزن میاد بیرون
- **پمپ‌های انفوزیون** (سرم درمانی)

## یه کدِ پایتون — فشارِ غواصی 🐍

```python
# سؤال: یه غواص تو عمقِ 30 متر زیر سطحِ دریا
# فشار کل چقدره؟

rho = 1025      # kg/m³ آبِ دریا
g = 9.8
h = 30          # m
P0 = 101_325    # Pa فشارِ جوّ سطح

P = P0 + rho * g * h
print(f"فشار در عمق {h} m: {P/1000:.1f} kPa")
print(f"  معادلِ {P/101325:.2f} اتمسفر")
# خروجی: حدود 402 kPa = حدود 4 اتمسفر
# یعنی هر سانتی‌متر مربع پوست، 4 برابرِ سطح زمین فشار می‌خوره
```

این محاسبه چرا مهمه؟ چون اگه ناگهان از این عمق بالا بیای، گازهای حل‌شده تو خونت (مثلِ نیتروژن) **حباب می‌سازن** — اسمش بیماریِ **decompression sickness**ـه و خطرناکه.

---

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [فشار](https://fa.wikipedia.org/wiki/%D9%81%D8%B4%D8%A7%D8%B1)، [اصل پاسکال](https://fa.wikipedia.org/wiki/%D8%A7%D8%B5%D9%84_%D9%BE%D8%A7%D8%B3%DA%A9%D8%A7%D9%84)، [فشار خون](https://fa.wikipedia.org/wiki/%D9%81%D8%B4%D8%A7%D8%B1_%D8%AE%D9%88%D9%86)
- Wikipedia EN: [Pressure](https://en.wikipedia.org/wiki/Pressure)، [Hydrostatics](https://en.wikipedia.org/wiki/Hydrostatics)، [Pascal's law](https://en.wikipedia.org/wiki/Pascal%27s_law)، [Sphygmomanometer](https://en.wikipedia.org/wiki/Sphygmomanometer)
- [HyperPhysics — Fluid pressure](http://hyperphysics.phy-astr.gsu.edu/hbase/pflu.html)
- Khan Academy: [Fluids — pressure](https://www.khanacademy.org/science/physics/fluids/density-and-pressure)

### ویدئو (یوتیوب)
- Veritasium: [Why the diver feels pressure](https://www.youtube.com/results?search_query=veritasium+diver+pressure)
- MIT OCW 8.01 Walter Lewin: [Fluids lecture](https://www.youtube.com/results?search_query=walter+lewin+fluids+lecture)
- TED-Ed: [How does blood pressure work?](https://www.youtube.com/results?search_query=ted+ed+blood+pressure)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: فشار شاره فیزیک دهم](https://www.aparat.com/result/%D9%81%D8%B4%D8%A7%D8%B1_%D8%B4%D8%A7%D8%B1%D9%87_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%87%D9%85)
- [جست‌وجو: فشار خون پزشکی](https://www.aparat.com/result/%D9%81%D8%B4%D8%A7%D8%B1_%D8%AE%D9%88%D9%86_%D9%BE%D8%B2%D8%B4%DA%A9%DB%8C)

### شبیه‌ساز خارجی
- [PhET — Under Pressure](https://phet.colorado.edu/en/simulations/under-pressure)
- [PhET — Fluid Pressure and Flow](https://phet.colorado.edu/en/simulations/fluid-pressure-and-flow)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با اثبات‌های ریاضی + اصلِ پاسکال + جک هیدرولیکی](https://physicsme.ir/articles/feshar-dar-shareha/)

---

*تو زیرفصل بعد، اصلِ ارشمیدس — رازِ شناورِ کشتی‌های فولادی! 🚢*
