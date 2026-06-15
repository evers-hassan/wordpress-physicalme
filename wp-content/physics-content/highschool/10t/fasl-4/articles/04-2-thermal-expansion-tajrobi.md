---
title: "انبساط گرمایی — از دندان‌درد تا پل‌سازی 🦷🌉 (تجربی)"
chapter: "فصل ۴ — دما و گرما (تجربی)"
section: "۴-۲ انبساط گرمایی"
order: 2
slug: "thermal-expansion-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["انبساط گرمایی", "ضریب انبساط", "دندان", "ترکِ پل", "تجربی"]
---

# انبساط گرمایی — از دندان‌درد تا پل‌سازی 🦷🌉

> یه تجربه‌ی روزمره 💭: آیا تا حالا یه چای داغ خوردی و بعد بلافاصله یه آب یخ؟ ممکنه دندونت تیر بکشه! دلیلش انبساطِ گرماییِ ناهماهنگه — **مینای دندان** و **عاجِ زیرش** ضریبِ انبساطِ متفاوتی دارن، با تغییر دما هرکدوم به اندازه‌ی متفاوتی منقبض/منبسط می‌شن و **میکروترک** ایجاد می‌کنن 🩻. این فصل دقیقاً توضیح می‌ده چطوری ماده با دما تغییر اندازه می‌ده.

## ایده‌ی اصلی ⚙️

تقریباً تمامِ موادِ جامد، مایع و گاز با گرما **منبسط** می‌شن (بزرگ‌تر می‌شن). چرا؟ چون مولکول‌های گرم‌تر تندتر می‌جنبن و فاصله‌ی متوسطِ بینشون افزایش پیدا می‌کنه.

## فرمولِ انبساطِ طولی 📏

برای یه میله‌ی نازک:

$$\Delta L = \alpha \cdot L_0 \cdot \Delta T$$

- $\Delta L$: تغییرِ طول
- $L_0$: طولِ اولیه
- $\alpha$: ضریبِ انبساطِ طولی (مختصِ هر ماده، یکا = ۱/K یا /°C)
- $\Delta T$: تغییرِ دما

> **توجه:** چون «تغییرِ دما» در °C و K برابره، $\alpha$ همیشه به یکای ۱/K نوشته می‌شه — اما هر طور حساب کنی، جوابِ مشابه می‌دی.

## ضرایبِ انبساط — یه جدولِ سریع 📊

| ماده | $\alpha$ (×۱۰⁻⁶ /K) |
|------|---|
| آلومینیم | ۲۳ |
| برنج | ۱۹ |
| مس | ۱۷ |
| فولاد | ۱۲ |
| بتُن | ۱۲ |
| شیشهٔ معمولی | ۹ |
| پایرکس | ۳.۲ |
| مینای دندان | ۱۱.۴ |
| عاج دندان | ۸.۳ |

دندان: ببین تفاوتِ مینا (۱۱.۴) و عاج (۸.۳) چقدر زیاده — همین یعنی ترک می‌خوره با گرما/سرما 🦷.

## ویجتِ تعاملی — انبساطِ مواد 🎮

<iframe src="/wp-content/physics-content/highschool/10/widgets/thermal-expansion.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="انبساط گرمایی"></iframe>

## کاربردهای پزشکی-زیستی 🧬

- **دندانپزشکی:** پُرکردگیِ دندان باید ضریبِ انبساطی نزدیک به مینا داشته باشه (~۱۱ × ۱۰⁻⁶/K). اگه نه، با دمای غذای داغ/سرد، ترکِ ریز می‌خوره و حساسیت ایجاد می‌کنه.
- **استنتِ قلبی نیتینول:** آلیاژی که با دمای بدن «به یاد میاره» شکلِ اصلیش رو — کاتتر می‌کنن تو رگ و وقتی به ۳۷ می‌رسه باز می‌شه.
- **استخوان و ایمپلنت:** ایمپلنتِ زانو از تیتانیوم ($\alpha \approx 8.6 \times 10^{-6}/K$) ساخته می‌شه چون نزدیک به استخوانه.
- **شیشه‌ی آزمایشگاه:** پایرکس ($\alpha = 3.2$) خیلی کم‌تر منبسط می‌شه از شیشه‌ی معمولی — به همین دلیل ترک نمی‌خوره وقتی آبِ داغ توش می‌ریزی.
- **انکوباتورِ نوزاد:** سیستمِ گرمایش‌اش از حسگرهای دوفلزه (Bimetallic strip) استفاده می‌کنه که با دما خم می‌شن.

## انبساطِ حجمی برای مایعات 💧

برای حجم، فرمول مشابهه ولی با ضریبِ $\beta$ (که برای جامد ≈ ۳α، برای مایع جداگانه):

$$\Delta V = \beta \cdot V_0 \cdot \Delta T$$

**استثناءِ آب:** آب در دمای **۴°C** کم‌ترین حجم رو داره. زیر ۴ هم منبسط می‌شه! این چرا مهمه؟ چون باعث می‌شه یخ روی آبِ مایع شناور بمونه — حیاتِ آبزی در زمستان بقا داره! 🐟❄️

## کدِ پایتون — محاسبه‌ی انبساطِ ریلِ قطار 🐍

```python
# پلِ بتنیِ ۵۰۰ متری در تفاوتِ دمای زمستان (-۲۰°C) و تابستان (+۵۰°C)
def linear_expansion(L0, alpha, dT):
    return alpha * L0 * dT

L0 = 500            # m
alpha = 12e-6       # /K (بتُن)
dT = 50 - (-20)     # = 70 K
dL = linear_expansion(L0, alpha, dT)
print(f"تغییرِ طولِ پل: {dL*1000:.1f} mm = {dL*100:.1f} cm")
# خروجی: 420.0 mm ≈ ۴۲ سانتی‌متر!

# مقایسه با ایمپلنتِ ران (تیتانیوم) در تب
alpha_Ti = 8.6e-6
L0_implant = 0.15   # 15 cm
dT_fever = 2        # تب ۲°C
dL_implant = linear_expansion(L0_implant, alpha_Ti, dT_fever)
print(f"تغییرِ طولِ ایمپلنت در تب: {dL_implant*1e6:.2f} μm (میکرومتر)")
# خروجی: 2.58 μm — قابلِ چشم‌پوشی برای بافتِ زنده
```

## جمع‌بندی 🎁

مواد با گرما منبسط می‌شن (طول، سطح، حجم). فرمولِ ساده: $\Delta L = \alpha L_0 \Delta T$. هر ماده $\alpha$ متفاوتی داره. در مهندسی (پل، ریل قطار، خط لوله) باید **درزِ انبساط** بذاریم. در دندانپزشکی و ایمپلنت‌سازی، انتخابِ ماده با $\alpha$ سازگار حیاتیه. آب در ۴ کم‌ترین حجم رو داره — بقای زندگی در زمستون به همین وابسته‌ست! 🌊

---

## جالبه که بدونی 💡

برجِ ایفلِ پاریس (~۳۰۰ متر، فولاد) در روزِ گرمِ تابستون **حدود ۱۵ سانتی‌متر بلندتر** از روزِ سردِ زمستونه! 🗼 این نشون می‌ده انبساطِ گرمایی فقط در آزمایشگاه نیست — تو سازه‌های واقعی هم باید بهش توجه کنیم.

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [انبساط گرمایی](https://fa.wikipedia.org/wiki/%D8%A7%D9%86%D8%A8%D8%B3%D8%A7%D8%B7_%DA%AF%D8%B1%D9%85%D8%A7%DB%8C%DB%8C)
- Wikipedia EN: [Thermal expansion](https://en.wikipedia.org/wiki/Thermal_expansion)، [Nitinol](https://en.wikipedia.org/wiki/Nickel_titanium) (آلیاژِ استنتِ قلبی)، [Anomalous expansion of water](https://en.wikipedia.org/wiki/Properties_of_water#Density_of_water_and_ice)
- [HyperPhysics — Thermal expansion](http://hyperphysics.phy-astr.gsu.edu/hbase/thermo/thexp.html)
- مقاله‌ی PubMed: [Thermal expansion of dental restorative materials](https://pubmed.ncbi.nlm.nih.gov/?term=thermal+expansion+dental+restoration)

### ویدئو (یوتیوب)
- [Eiffel Tower height changes](https://www.youtube.com/results?search_query=eiffel+tower+height+thermal)
- [Nitinol Heart Stent demo](https://www.youtube.com/results?search_query=nitinol+stent+shape+memory)
- [PhET Energy Forms & Changes tutorial](https://www.youtube.com/results?search_query=phet+energy+forms+changes+tutorial)

### شبیه‌ساز
- [PhET — Friction (شامل انبساطِ مولکولی)](https://phet.colorado.edu/fa/simulations/friction)
- [States of Matter (PhET)](https://phet.colorado.edu/fa/simulations/states-of-matter)

### آپارات (فارسی)
- [انبساط گرمایی دهم تجربی](https://www.aparat.com/result/%D8%A7%D9%86%D8%A8%D8%B3%D8%A7%D8%B7_%DA%AF%D8%B1%D9%85%D8%A7%DB%8C%DB%8C_%D8%AF%D9%87%D9%85)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با مسائلِ بیشتر](https://physicsme.ir/articles/enbesat-garmayi/)
- [محاسبه‌ی انرژیِ جنبشی (یادآوریِ فصلِ ۳)](https://physicsme.ir/articles/kinetic-energy-tajrobi/)

---

*تو زیرفصلِ بعد سراغِ **گرما** می‌ریم — یعنی همون انرژیِ منتقل‌شده بر اثرِ اختلاف دما 🔥.*
