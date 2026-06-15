---
title: "کمیت‌های نرده‌ای و برداری — وقتی فقط 'عدد' کافی نیست 🧭"
chapter: "فصل ۱ — فیزیک، دانش بنیادی"
section: "۱-۲ اندازه‌گیری و کمیت‌های فیزیکی"
order: 2
slug: "scalars-and-vectors-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["کمیت نرده‌ای", "کمیت برداری", "بردار", "نیرو", "جابه‌جایی"]
---

# کمیت‌های نرده‌ای و برداری — وقتی فقط 'عدد' کافی نیست 🧭

> یه سؤالِ ساده 💭: اگه به دوستت بگی «خونه‌مون ۲ کیلومتر اون‌وره»، آیا اطلاعاتِ کافی بهش دادی؟ نه! چون نگفتی «اون‌ور یعنی کدوم طرف؟ شمال؟ غرب؟». این فرق یعنی: بعضی کمیت‌ها فقط با **عدد** کاملن (مثلِ جرم)، بعضی دیگه هم به **جهت** نیاز دارن (مثلِ جابه‌جایی). اولی نرده‌ای، دومی برداری.

## خلاصه‌ی مفهومی 📌

**کمیتِ نرده‌ای (Scalar):** فقط با یه عدد و یکا کاملاً مشخص می‌شه.
- مثال: جرم (m)، زمان (t)، دما (T)، طول، تندی، چگالی، انرژی

**کمیتِ برداری (Vector):** علاوه بر اندازه و یکا، **جهت** هم لازم داره. با یه فلش نشونش می‌دیم.
- مثال: جابه‌جایی، سرعت، شتاب، نیرو، میدانِ الکتریکی، میدانِ مغناطیسی

**نمایش:** بردارها رو با حرفی که بالاش فلش داره می‌نویسیم — مثلِ $\vec{F}$، $\vec{v}$، $\vec{a}$. اندازه‌ی همون بردارو با $F$، $v$ یا $|\vec{F}|$ نشون می‌دیم.

## مثال‌های تجربی 🩺🧪

تو رشته‌ی تجربی این تمایز بدجور به‌کارت میاد:
- **فشارِ خون:** عدد ۱۲۰/۸۰ یه کمیتِ نرده‌ایه (mmHg). ولی **جریانِ خون** که از قلب میره به اندام‌ها، برداریه (سرعت + جهت).
- **میدانِ مغناطیسیِ MRI** برداریه — جهتش مهمه که چطوری اسپینِ هیدروژن‌ها رو هم‌راستا کنه.
- **نیروی برخوردِ توپ تنیس** به دستِ بازیکن: یه برداره. اگه فقط بگی «۵۰ نیوتون»، کسی نمی‌فهمه که از چه زاویه‌ای خورده.

## بازی با بردار 🎮

نوکِ بردارو بکش و ببین اندازه و مولفه‌ها چطور عوض می‌شن:

<iframe src="/wp-content/physics-content/highschool/10/widgets/vector-interactive.html" width="100%" height="500" style="border:none; border-radius:12px;" loading="lazy" title="بردار تعاملی"></iframe>

## دیاگرامِ نمادگذاریِ بردار 📐

<iframe src="/wp-content/physics-content/highschool/10/widgets/vector-notation.svg" width="100%" height="280" style="border:none; border-radius:12px;" loading="lazy" title="نمادگذاری بردار"></iframe>

## محاسبه‌ی برداری در پایتون 🐍

```python
import numpy as np

# دو نیرو، هرکدوم با اندازه و زاویه (نسبت به محور x)
F1 = 30 * np.array([np.cos(np.deg2rad(45)), np.sin(np.deg2rad(45))])
F2 = 20 * np.array([np.cos(np.deg2rad(120)), np.sin(np.deg2rad(120))])

F_total = F1 + F2
magnitude = np.linalg.norm(F_total)
angle = np.rad2deg(np.arctan2(F_total[1], F_total[0]))

print(f"بردارِ برآیند: {F_total}")
print(f"اندازه: {magnitude:.2f} N، زاویه: {angle:.1f}°")
```

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/10/widgets/kamiyat-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش و پاسخ کمیت‌ها"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [بردار](https://fa.wikipedia.org/wiki/%D8%A8%D8%B1%D8%AF%D8%A7%D8%B1)، [کمیت نرده‌ای](https://fa.wikipedia.org/wiki/%DA%A9%D9%85%DB%8C%D8%AA_%D9%86%D8%B1%D8%AF%D9%87%E2%80%8C%D8%A7%DB%8C)
- Wikipedia EN: [Euclidean vector](https://en.wikipedia.org/wiki/Euclidean_vector)، [Scalar vs vector](https://en.wikipedia.org/wiki/Scalar_(physics))
- [HyperPhysics — Vector Algebra](http://hyperphysics.phy-astr.gsu.edu/hbase/vect.html)
- Khan Academy: [Vectors fundamentals](https://www.khanacademy.org/math/precalculus/x9e81a4f98389efdf:vectors)

### ویدئو (یوتیوب)
- 3Blue1Brown — [Essence of Linear Algebra Ep.1 (vectors)](https://www.youtube.com/watch?v=fNk_zzaMoSs)
- MIT OCW 8.01 Walter Lewin — [Lecture 3: Vectors](https://www.youtube.com/results?search_query=walter+lewin+lecture+3+vectors)
- Veritasium: [What is a vector?](https://www.youtube.com/results?search_query=veritasium+vectors)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: بردار فیزیک دهم](https://www.aparat.com/result/%D8%A8%D8%B1%D8%AF%D8%A7%D8%B1_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%87%D9%85)
- [جست‌وجو: کمیت برداری و نرده‌ای](https://www.aparat.com/result/%DA%A9%D9%85%DB%8C%D8%AA_%D8%A8%D8%B1%D8%AF%D8%A7%D8%B1%DB%8C_%D9%88_%D9%86%D8%B1%D8%AF%D9%87_%D8%A7%DB%8C)

### شبیه‌ساز خارجی
- [PhET — Vector Addition (فارسی)](https://phet.colorado.edu/fa/simulations/vector-addition)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با تجزیه‌ی برداری و مثال‌های نیروسنجی](https://physicsme.ir/articles/kamiyat-nardei-va-bordari/)
- [بخشِ ریاضی: ضربِ بردارها (نقطه‌ای و برداری)](https://physicsme.ir/category/math/) (در حالِ ساخت)

---

*تو بخشِ بعدی می‌ریم سراغِ یکاها — اون چیزی که هیچ‌وقت نباید فراموشش کنی موقعِ نوشتنِ جواب 📏.*
