---
title: "پرتوزایی و نیمه‌عمر — از Tc-99m تا I-131 ☢️"
chapter: "فصل ۴ — فیزیک اتمی و هسته‌ای (تجربی)"
section: "۴-۶ پرتوزایی و نیمه‌عمر"
order: 6
slug: "radioactivity-half-life-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۹ دقیقه"
keywords: ["پرتوزایی", "آلفا", "بتا", "گاما", "نیمه‌عمر", "رادیودارو", "تجربی"]
branches: ["فیزیک هسته‌ای"]
---

# پرتوزایی و نیمه‌عمر — از Tc-99m تا I-131 ☢️

> یه واقعیتِ پزشکی 🩻: هر ساله ~۴۰ میلیون پروسیجرِ تصویربرداریِ هسته‌ای در دنیا انجام می‌شه. ~۸۰٪ این‌ها با **تکنسیوم-۹۹m** (Tc-99m)‌ـه — یه ایزوتوپ که در ۶ ساعت نصف می‌شه. این فصل، الفبای پزشکیِ هسته‌ای‌ـه.

## پرتوزایی چیه؟ 🎯

**پرتوزایی** (Radioactivity): فرآیندی که هسته‌ی ناپایدار خودبه‌خود به هسته‌ی پایدارتری تبدیل می‌شه و **ذره یا فوتون** ساطع می‌کنه. کشف توسطِ بکرل (۱۸۹۶) و کوری‌ها.

## سه نوع پوسانش 🎯

### ۱) آلفا ($\alpha$): هسته‌ی هلیوم
$$
{}^A_Z X \to {}^{A-4}_{Z-2} Y + {}^4_2 \alpha
$$
- جرم بزرگ، بارِ +۲
- نفوذِ کم — کاغذ هم متوقفش می‌کنه
- ولی **خیلی خطرناک** اگه وارد بدن بشه (تنفس، خوراکی)

### ۲) بتا منفی ($\beta^-$): الکترون
$$
{}^A_Z X \to {}^A_{Z+1} Y + e^- + \bar{\nu}_e
$$
- جرمِ کم، بارِ -۱
- نفوذِ متوسط — لباس و پلاستیک متوقفش می‌کنه

### ۳) گاما ($\gamma$): فوتون پر-انرژی
- بدون جرم و بار
- نفوذِ خیلی زیاد — سرب و بتون لازمه
- **اساسِ تصویربرداری PET و SPECT**

<iframe src="/wp-content/physics-content/highschool/12/fasl-6/widgets/alpha-beta-gamma.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="پرتوهای آلفا، بتا، گاما"></iframe>

## قانون پوسانش — نمایی 📉

تعدادِ هسته‌های باقی‌مونده در زمانِ $t$:

$$
N(t) = N_0\,e^{-\lambda t}
$$

که $\lambda$ ثابتِ پوسانش‌ـه.

## نیمه‌عمر ($T_{1/2}$) ⏰

زمانی که در آن نصفِ هسته‌ها پاسیده شدن:

$$
T_{1/2} = \frac{\ln 2}{\lambda} = \frac{0.693}{\lambda}
$$

بعد از هر نیمه‌عمر، تعدادِ هسته‌ها نصف می‌شه:

| بعد از | باقی‌مانده |
|---|---|
| 1 نیمه‌عمر | 50% |
| 2 نیمه‌عمر | 25% |
| 3 نیمه‌عمر | 12.5% |
| 7 نیمه‌عمر | < 1% (مرز ایمنی) |

<iframe src="/wp-content/physics-content/highschool/12/fasl-6/widgets/radioactive-decay.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="پوسانش پرتوزا"></iframe>

## نیمه‌عمر در رادیوداروها 🩺

| رادیودارو | پرتو | $T_{1/2}$ | کاربرد |
|---|---|---|---|
| **Tc-99m** | γ (140 keV) | **6 h** | تصویربرداریِ قلب، استخوان، تیروئید |
| **F-18** | β+ (511 keV گاما) | **110 min** | PET scan |
| **I-131** | β+γ | **8 d** | درمان هیپرتیروئیدی |
| I-123 | γ (159 keV) | 13.2 h | تشخیصِ تیروئید |
| Ga-67 | γ | 78 h | تومور و عفونت |
| Sm-153 | β | 47 h | درمانِ متاستازِ استخوان |
| Lu-177 | β | 6.7 d | درمانِ تومورهای نورواندوکرین |
| Ra-223 | α | 11.4 d | درمانِ سرطانِ پروستات |

## فعالیت (Activity) 🎯

تعدادِ پوسانش در ثانیه:

$$
A = \lambda\,N
$$

یکا: **بکرل** (Bq) = یک پوسانش در ثانیه. یکای قدیمی: **کوری** (Ci) = $3.7\times 10^{10}\,\text{Bq}$.

دوزِ معمول PET: ~۵ mCi = ۱۸۵ MBq.

## مثال — تخمیه‌ی I-131 برای تیروئید 💉

بیماری هیپرتیروئیدی دوزِ ۱۵۰ MBq دریافت می‌کنه. بعد از ۸ روز:

$$
A(8\,\text{روز}) = 150 \times e^{-\ln 2 \times 8/8} = 150 \times 0.5 = 75\,\text{MBq}
$$

بعد از ۲۴ روز (۳ نیمه‌عمر): ~۱۹ MBq. بعد از ۵۶ روز (۷ نیمه‌عمر): < ۱.۲ MBq — تقریباً بی‌خطر.

## محاسبه با پایتون 🐍

```python
# تخمیه‌ی فعالیتِ رادیوداروها در زمان
import numpy as np

# داده‌ی رادیوداروها
radiopharm = {
    "Tc-99m":  6 / 24,        # روز (6h = 0.25 d)
    "F-18":    110 / (60*24), # روز (110 min ≈ 0.076 d)
    "I-131":   8.0,           # روز
    "Lu-177":  6.7,           # روز
    "Ra-223":  11.4,          # روز
}

# تخمیه در زمان‌های مختلف
times_d = [0, 0.25, 1, 7, 30]

print(f"{'دارو':>10s}  {'T_1/2':>10s}", end="")
for t in times_d:
    print(f"  {f't={t}d':>10s}", end="")
print()

for name, T_half in radiopharm.items():
    print(f"{name:>10s}  {T_half:>10.3f}", end="")
    for t in times_d:
        ratio = (0.5)**(t/T_half)
        print(f"  {ratio*100:>9.1f}%", end="")
    print()

# تفسیر:
# F-18: تو 1 روز تقریباً صفر می‌شه — استفاده فوریه
# Tc-99m: تو 1 روز فقط 6% باقی می‌مونه — ایمنیِ بیمار
# Lu-177: 1 ماه فعالیتِ قابل توجه داره — درمانِ تدریجی
# Ra-223: درمانِ بلندمدتِ متاستازِ استخوان
```

## دوز و اثرِ بیولوژیکی 🩺

- **خاکستری** (Gy): مقدارِ انرژیِ جذب‌شده در بافت (J/kg)
- **سیورت** (Sv): مقدارِ معادلِ بیولوژیکی — با ضریبِ کیفیت ($Q$) ضرب می‌شه
  - $Q = 1$ برای X-ray، گاما، بتا
  - $Q = 20$ برای آلفا (به‌خاطر شدتِ یونیزاسیون)

**دوزِ سالانه‌ی طبیعی** (پس‌زمینه): ~2-3 mSv
**حدِ مجاز اضافی برای کارمندان**: 20 mSv/year
**CT-scan شکم**: ~10 mSv
**ماموگرافی**: ~0.4 mSv

## نکته‌ی پزشکی-زیستی 🩺

- **Tc-99m generator**: یه کارخانه‌ی محلیِ Tc-99m در بیمارستان — هر روز از Mo-99 (نیمه‌عمر 66 h) تولید می‌شه
- **PET-CT**: ترکیب تصویرِ متابولیکِ F-18-FDG با CT آناتومیک
- **رادیوتراپی Brachytherapy**: کاشتِ موضعی Pd-103 یا I-125 برای پروستات
- **سن‌سنجیِ کربن-۱۴**: $T_{1/2} = 5730$ سال — کشفِ بقایای انسانی
- **رادون در خونه**: محصولِ پوسانشِ U-238، باعثِ ۱۰٪ سرطانِ ریه

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [پرتوزایی](https://fa.wikipedia.org/wiki/%D9%BE%D8%B1%D8%AA%D9%88%D8%B2%D8%A7%DB%8C%DB%8C)
- ویکی‌پدیای فارسی: [نیمه‌عمر](https://fa.wikipedia.org/wiki/%D9%86%DB%8C%D9%85%D9%87_%D8%B9%D9%85%D8%B1)
- Wikipedia EN: [Radioactive decay](https://en.wikipedia.org/wiki/Radioactive_decay)
- Wikipedia EN: [Technetium-99m](https://en.wikipedia.org/wiki/Technetium-99m)
- Wikipedia EN: [Iodine-131](https://en.wikipedia.org/wiki/Iodine-131)
- HyperPhysics: [Radioactivity](http://hyperphysics.phy-astr.gsu.edu/hbase/nuclear/radact.html)
- Khan Academy: [Radioactive decay](https://www.khanacademy.org/science/physics/quantum-physics)

### ویدئو (یوتیوب)
- [Veritasium — Radioactive decay](https://www.youtube.com/results?search_query=veritasium+radioactive+decay)
- [Real Engineering — How nuclear medicine works](https://www.youtube.com/results?search_query=real+engineering+nuclear+medicine)
- [Kurzgesagt — Is radiation dangerous?](https://www.youtube.com/results?search_query=kurzgesagt+radiation)
- [Crash Course Physics — Radioactivity](https://www.youtube.com/results?search_query=crash+course+physics+radioactivity)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: پرتوزایی فیزیک دوازدهم](https://www.aparat.com/result/%D9%BE%D8%B1%D8%AA%D9%88%D8%B2%D8%A7%DB%8C%DB%8C_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: نیمه عمر هسته](https://www.aparat.com/result/%D9%86%DB%8C%D9%85%D9%87_%D8%B9%D9%85%D8%B1_%D9%87%D8%B3%D8%AA%D9%87)

### شبیه‌سازی PhET
- [Alpha Decay](https://phet.colorado.edu/en/simulations/alpha-decay)
- [Beta Decay](https://phet.colorado.edu/en/simulations/beta-decay)
- [Radioactive Dating Game](https://phet.colorado.edu/en/simulations/radioactive-dating-game)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-partozayi-nimeomr/)

---

*فصلِ ۴ تموم شد! و کلِ کتابِ تجربی هم! 🎉 حالا بریم تمرین — [مسائل فصل ۴](https://physicsme.ir/articles/problems-chapter-4-y12-tajrobi/) و [فلش‌کارت](https://physicsme.ir/articles/flashcards-chapter-4-y12-tajrobi/) 📝.*
