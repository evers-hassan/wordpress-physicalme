---
title: "بار الکتریکی — کوچک‌ترین چیزی که می‌تونه قلبت رو نجات بده 🔋💓"
chapter: "فصل ۱ — الکتریسیتۀ ساکن (تجربی)"
section: "۱-۱ بار الکتریکی"
order: 1
slug: "electric-charge-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["بار الکتریکی", "الکترون", "پروتون", "بار بنیادی", "کولن", "الکترسکوپ"]
---

# بار الکتریکی — کوچک‌ترین چیزی که می‌تونه قلبت رو نجات بده 🔋

> یه تصویرِ ساده 🧪: شونه‌ت رو با پارچه‌ی خشک بمال، بعد نزدیکِ کاغذِ ریز بِبَر. کاغذها می‌چسبن! این پدیده‌ی ساده، همون پایه‌ی فیزیکیِ پتانسیلِ نورون، پتانسیلِ قلب و دفیبریلاتورهای بیمارستانه. بریم سراغِ کوچک‌ترین واحدِ این داستان: **بارِ الکتریکی**.

## دو نوع بار — مثبت و منفی ⚡

اگه دو میله‌ی شیشه‌ای رو با پارچه‌ی ابریشم بمالی، **همدیگه رو می‌رانن**. اگه یه میله‌ی شیشه‌ای و یه میله‌ی پلاستیکی (مالیده) رو نزدیک کنی، **همدیگه رو می‌کشن**. این یعنی دو نوع بار هست:

- **بار مثبت** ($+$) — مثلِ پروتون‌ها در هسته‌ی اتم
- **بار منفی** ($-$) — مثلِ الکترون‌های دورِ هسته

قانونِ ساده: **هم‌نام دفع، ناهم‌نام جذب** (مثلِ آهنرباها).

## بار از کجا میاد؟ مالش، جریان، القا 🤚

اتم‌ها در حالتِ عادی **خنثی**ـن (تعدادِ پروتون = تعدادِ الکترون). برای ایجادِ بار باید الکترون‌ها رو جابه‌جا کنیم. سه روش:

1. **مالش (تماس)** — وقتی دو جسم بمالن، الکترون‌ها از یکی به اون یکی منتقل می‌شن. مثل شونه و مو
2. **رسانش (تماسِ مستقیم)** — یه جسمِ باردار به جسمِ خنثی برخورد می‌کنه، بار توزیع می‌شه
3. **القا (بدون تماس)** — جسمِ باردار رو نزدیکِ جسمِ خنثی می‌بریم، باعثِ جابه‌جاییِ بار در داخلش می‌شه

> 🩺 **در پزشکی**: دفیبریلاتور به وسیله‌ی **القا** (بدون تماسِ مستقیم با قلب) موجِ الکتریکی به ماهیچه‌ی قلبی می‌رسونه. الکترودها روی پوست‌ـن، ولی میدان به عمقِ قلب می‌رسه.

## ساختار اتمی — کوچک ولی پُرماجرا 🔬

| ذره | بار | جرم نسبی | جای آن |
|---|---|---|---|
| پروتون | $+e = +1.6\times 10^{-19}\,\text{C}$ | ۱ | هسته |
| نوترون | صفر | ۱ | هسته |
| الکترون | $-e = -1.6\times 10^{-19}\,\text{C}$ | ۱/۱۸۳۶ | اطرافِ هسته |

**یکای بار**: **کولن** ($\text{C}$). یک کولن یعنی $1/e \approx 6.24\times 10^{18}$ تا الکترون.

## الکتروسکوپ — وقتی برگه‌ها از هم باز می‌شن 📐

الکتروسکوپ یه ابزارِ ساده‌ست که اگه بهش بار بدی، دو برگه‌ی نازکِ داخلش (که هم‌نام شدن) همدیگه رو می‌رانن و باز می‌شن. هر چی بار بیشتر باشه، زاویه بازتر.

<iframe src="/wp-content/physics-content/highschool/11/widgets/electroscope.html" width="100%" height="520" style="border:none; border-radius:12px;" loading="lazy" title="الکتروسکوپ تعاملی"></iframe>

## بادکنک و دیوار — مثالِ کلاسیک 🎈

یه بادکنک رو با موی سرت بمال، بعد بچسبون به دیوار. می‌چسبه! چرا؟ بادکنک بارِ منفی گرفته، تو دیوار **القا** ایجاد می‌کنه (بارهای مثبتِ سطحی به طرفِ بادکنک کشیده می‌شن)، و جذبِ ناهم‌نام بادکنک رو نگه می‌داره.

<iframe src="/wp-content/physics-content/highschool/11/widgets/balloon-wall.html" width="100%" height="520" style="border:none; border-radius:12px;" loading="lazy" title="بادکنک و دیوار"></iframe>

## محاسبه‌ی تعدادِ الکترون با پایتون 🐍

```python
# اگه جسمی بارِ -2 میکروکولن داشته باشه، چند الکترون اضافه گرفته؟
e = 1.6e-19          # کولن، بارِ بنیادی
Q = -2e-6            # کولن (منفی یعنی الکترونِ اضافه)

n_electrons = abs(Q) / e
print(f"تعداد الکترونِ اضافه: {n_electrons:.3e}")
# خروجی: 1.25e+13

# تطبیق با مقیاس بدن:
# هر سلولِ نورونی حدود 10^8 یون Na+ در هر پتانسیلِ عمل جابه‌جا می‌کنه
# پس 10^13 الکترون ≈ بارِ ۱۰۰ هزار پتانسیلِ عمل
```

## نکته‌ی پزشکی-زیستی 🩺

- **پتانسیلِ آرامشِ نورون** = $-70\,\text{mV}$ — یعنی داخلِ سلول حدود ۷۰ میلی‌ولت منفی‌تر از بیرونه
- این اختلاف به‌خاطر **توزیعِ ناهم‌سانِ بار** ($\text{Na}^+$ بیرون، $\text{K}^+$ داخل) ایجاد می‌شه
- دفیبریلاتورِ AED حدودِ ۲۰۰ ژول انرژی در ۵ میلی‌ثانیه آزاد می‌کنه — کافی برای **ری‌ست** کلِ توزیعِ بارِ ماهیچه‌ی قلبی

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/bar-electriki-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش و پاسخ بار الکتریکی"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [بار الکتریکی](https://fa.wikipedia.org/wiki/%D8%A8%D8%A7%D8%B1_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)
- Wikipedia EN: [Electric charge](https://en.wikipedia.org/wiki/Electric_charge)
- HyperPhysics: [Coulomb's law and charge](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/elefor.html)
- Khan Academy: [Triboelectric effect & charge](https://www.khanacademy.org/science/physics/electric-charge-electric-force-and-voltage)

### ویدئو (یوتیوب)
- [جست‌وجو: Walter Lewin electrostatics lecture](https://www.youtube.com/results?search_query=walter+lewin+electrostatics)
- [Veritasium: triboelectric series](https://www.youtube.com/results?search_query=veritasium+triboelectric)
- [Crash Course Physics — Electric Charge](https://www.youtube.com/results?search_query=crash+course+physics+electric+charge)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: بار الکتریکی فیزیک یازدهم](https://www.aparat.com/result/%D8%A8%D8%A7%D8%B1_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: الکتروسکوپ آزمایش](https://www.aparat.com/result/%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%D9%88%D8%B3%DA%A9%D9%88%D9%BE_%D8%A2%D8%B2%D9%85%D8%A7%DB%8C%D8%B4)

### شبیه‌سازی PhET
- [Balloons and Static Electricity](https://phet.colorado.edu/en/simulations/balloons-and-static-electricity)
- [John Travoltage](https://phet.colorado.edu/en/simulations/john-travoltage)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با عمقِ ریاضی بیشتر](https://physicsme.ir/articles/bar-electriki/)

---

*در بخشِ بعدی می‌ریم سراغِ یکی از زیباترین قوانینِ فیزیک: [پایستگی و کوانتیده بودن بار](https://physicsme.ir/articles/charge-conservation-tajrobi/) — قانونی که هرگز نقض نمی‌شه ⚛️.*
