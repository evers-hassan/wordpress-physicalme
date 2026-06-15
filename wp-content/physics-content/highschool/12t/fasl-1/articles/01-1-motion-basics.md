---
title: "شناخت حرکت — مسافت، جابه‌جایی، تندی و سرعت 🏃‍♂️📏"
chapter: "فصل ۱ — حرکت بر خط راست (تجربی)"
section: "۱-۱ شناخت حرکت"
order: 1
slug: "motion-basics-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۸ دقیقه"
keywords: ["مسافت", "جابه‌جایی", "تندی", "سرعت", "سینماتیک", "تجربی"]
branches: ["مکانیک"]
---

# شناخت حرکت — مسافت، جابه‌جایی، تندی و سرعت 🏃‍♂️

> یه سوالِ شهودی 🚶: تو پارکِ نزدیکِ خونه‌ی شما، یه پیستِ دایره‌ای ۴۰۰ متری هست. می‌دوی، دور می‌زنی، برمی‌گردی به نقطه‌ی شروع. **مسافت** که طی کردی ۴۰۰ متره. ولی **جابه‌جایی**ـت **صفره**! چطور؟ همینه فرقِ این دو 💡.

## دو جفت مفهومِ کلیدی

| نرده‌ای (scalar) | برداری (vector) |
|---|---|
| **مسافت** ($s$) — طولِ کلِ مسیر | **جابه‌جایی** ($\Delta x$) — مکان نهایی منهای اولیه |
| **تندی** ($v$) — فقط بزرگی | **سرعت** ($\vec{v}$) — بزرگی + جهت |

### مسافت در برابر جابه‌جایی 🎯

اگه از $A$ تا $B$ روی خط ۵۰ متر بری، بعد ۳۰ متر برگردی به $C$:
- مسافت $= 50 + 30 = 80\,\text{m}$
- جابه‌جایی $= +50 - 30 = +20\,\text{m}$ (به سمتِ جلو)

### تندی متوسط در برابر سرعت متوسط ⏱️

$$
v_\text{متوسط} = \frac{\Delta x}{\Delta t}, \qquad |v|_\text{متوسط} = \frac{s}{\Delta t}
$$

اگه یه دونده دور پیست رو در ۶۰ ثانیه می‌دوه:
- تندی متوسط $= 400/60 = 6.67\,\text{m/s}$
- سرعت متوسط $= 0$ (چون به نقطه‌ی شروع برگشته)

## نمودارِ x-t — قلبِ سینماتیک 📊

نمودارِ مکان-زمان (position-time) بهت هم سرعت رو نشون می‌ده هم جابه‌جایی. **شیبِ نمودارِ x-t = سرعت**.

<iframe src="/wp-content/physics-content/highschool/12/fasl-1/widgets/kinematics-graphs.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="نمودار x-t و v-t تعاملی"></iframe>

## تندی لحظه‌ای ⚡

تندی متوسط می‌گه «در کلِ این بازه چقدر سریع بودی». تندی لحظه‌ای می‌گه «همین الان چقدر سریعی». اگه نمودارِ x-t رو خیلی بزرگ کنی، شیبِ نقطه‌ی الانت رو می‌گیری — همینه تندی لحظه‌ای.

$$
v_\text{لحظه‌ای} = \lim_{\Delta t \to 0} \frac{\Delta x}{\Delta t}
$$

## محاسبه با پایتون 🐍

```python
# سرعتِ پیامِ عصبی در آکسونِ میلین‌دار در برابر بدون-میلین
# یه نمونه‌ی پزشکیِ خیلی واقعی

import numpy as np

# طولِ آکسون (از نخاع تا انگشتِ پا)
L = 1.0  # متر

# سرعتِ عصب — دو نوع فیبر
v_myelinated = 120     # m/s  (فیبر A-alpha، حسِ لمس و حرکت)
v_unmyelinated = 1     # m/s  (فیبر C، درد مزمن)

# زمان پیام تا برسه
t_myelin = L / v_myelinated
t_unmyelin = L / v_unmyelinated

print(f"فیبرِ میلین‌دار:     {t_myelin*1000:.2f} میلی‌ثانیه")
print(f"فیبرِ بدون-میلین:    {t_unmyelin*1000:.2f} میلی‌ثانیه")
# خروجی:
# فیبر میلین‌دار:    8.33 میلی‌ثانیه
# فیبر بدون-میلین:   1000.00 میلی‌ثانیه (= 1 ثانیه!)

# نکته‌ی کلینیکی: در MS غلافِ میلین تخریب می‌شه، سرعت
# پیام به شدت کم می‌شه — همینه دلیلِ تأخیر در پاسخِ حرکتی
```

## نکته‌ی پزشکی-زیستی 🩺

- **سرعتِ پیامِ عصبی** متفاوته در فیبرهای مختلف — همینه کاربردِ EMG برای تشخیصِ نوروپاتی
- **سرعتِ خون** در شریانِ اصلی ($\approx 40\,\text{cm/s}$) و در موینه‌رگ‌ها ($\approx 0.5\,\text{mm/s}$) — تشخیصِ تنگی با داپلر
- **سرعتِ موجِ کاروتید** ($\approx 5\,\text{m/s}$) برای تشخیصِ سختیِ شریان (سن عروقی)

## خودتو بسنج 📝

ویدئوی شبیه‌سازِ زیر رو امتحان کن — یه ماشین رو روی محورِ x ببر و نمودارِ x-t و v-t همزمان ببین:

<iframe src="/wp-content/physics-content/highschool/12/fasl-1/widgets/motion-grapher.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="رسامِ حرکت"></iframe>

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [سینماتیک](https://fa.wikipedia.org/wiki/%D8%B3%DB%8C%D9%86%D9%85%D8%A7%D8%AA%DB%8C%DA%A9)
- Wikipedia EN: [Kinematics](https://en.wikipedia.org/wiki/Kinematics)
- HyperPhysics: [Motion concepts](http://hyperphysics.phy-astr.gsu.edu/hbase/mot.html)
- Khan Academy: [One-dimensional motion](https://www.khanacademy.org/science/physics/one-dimensional-motion)

### ویدئو (یوتیوب)
- [جست‌وجو: kinematics khan academy](https://www.youtube.com/results?search_query=khan+academy+kinematics+intro)
- [جست‌وجو: speed vs velocity Veritasium](https://www.youtube.com/results?search_query=veritasium+speed+velocity)
- [Crash Course Physics #1 — Motion in a Straight Line](https://www.youtube.com/results?search_query=crash+course+physics+motion+straight+line)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: سینماتیک فیزیک دوازدهم](https://www.aparat.com/result/%D8%B3%DB%8C%D9%86%D9%85%D8%A7%D8%AA%DB%8C%DA%A9_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: مسافت و جابه‌جایی](https://www.aparat.com/result/%D9%85%D8%B3%D8%A7%D9%81%D8%AA_%D8%AC%D8%A7%D8%A8%D9%87_%D8%AC%D8%A7%DB%8C%DB%8C)

### شبیه‌سازی PhET
- [Moving Man](https://phet.colorado.edu/en/simulations/moving-man)
- [Forces and Motion: Basics](https://phet.colorado.edu/en/simulations/forces-and-motion-basics)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با عمقِ ریاضی بیشتر](https://physicsme.ir/articles/y12-shenakht-harekat/)

---

*در بخشِ بعدی می‌ریم سراغِ ساده‌ترین حالت: [حرکت با سرعت ثابت](https://physicsme.ir/articles/uniform-motion-tajrobi/) — وقتی سرعت تغییر نمی‌کنه ⏰.*
