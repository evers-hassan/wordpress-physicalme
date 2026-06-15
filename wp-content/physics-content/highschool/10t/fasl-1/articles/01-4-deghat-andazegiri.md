---
title: "دقت در اندازه‌گیری — هیچ اندازه‌ای کاملاً بی‌خطا نیست 📐⚠️"
chapter: "فصل ۱ — فیزیک، دانش بنیادی"
section: "۱-۴ اندازه‌گیری و دقت وسیله‌های اندازه‌گیری"
order: 4
slug: "measurement-accuracy-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["دقت", "درستی", "خطا", "ابزار اندازه‌گیری", "آزمایش", "اختلاف منظر"]
---

# دقت در اندازه‌گیری — هیچ اندازه‌ای کاملاً بی‌خطا نیست 📐⚠️

> یه نکته‌ی شوک‌آور 💭: اگه با یه ترازوی آزمایشگاهیِ پزشکی، جرمِ یه نمونه‌ی خونی رو ۱۰ بار وزن کنی، احتمالاً ۱۰ تا عددِ یه‌کم متفاوت می‌گیری! این به‌معنی خرابیِ ترازو نیست — این یعنی **هیچ ابزاری کاملاً دقیق نیست**. وظیفه‌ی ما اینه که بفهمیم اون «نادقتی» چقدره و چطوری گزارشش کنیم.

## دقت در مقابلِ درستی — مهم‌ترین تمایز 📌

این دو تا مفهوم شبیه‌اند ولی **یکی نیستن**:

- **درستی (Accuracy):** نزدیکیِ مقدارِ اندازه‌گیری‌شده به مقدارِ **واقعی**.
- **دقت (Precision):** اینکه چقدر اندازه‌گیری‌های پشت‌سرهم نزدیک به **همدیگه** هستن (تکرارپذیری).

می‌شه دقیق باشی ولی غلط (همه‌ی تیرها به یه نقطه ولی دور از وسط)، یا درست باشی ولی نه‌چندان دقیق (پراکنده ولی میانگین درست). **سیبلِ دارت** بهترین مثاله:

<iframe src="/wp-content/physics-content/highschool/10/widgets/dartboard-accuracy.html" width="100%" height="420" style="border:none; border-radius:12px;" loading="lazy" title="دقت در مقابل درستی"></iframe>

## دقتِ ابزار 📏

دقتِ هر ابزارِ اندازه‌گیری معمولاً **نصفِ کوچک‌ترین درجه‌بندیِ ابزار**ـه:
- خط‌کشِ معمولی (هر mm یه خط) → دقت = ۰٫۵ mm
- ترازوی آشپزخانه (هر g یه خط) → دقت = ۰٫۵ g
- ترازوی دیجیتالیِ آزمایشگاهی که اعشارِ سوم رو نشون می‌ده → دقت ≈ ۰٫۰۰۰۵ g
- کولیسِ مدرّج → معمولاً ۰٫۰۲ mm
- ریزسنجِ مدرّج → معمولاً ۰٫۰۱ mm

> 🩺 **برای تجربی‌ها:** دقتِ پایپتی که تو آزمایشگاهِ شیمیِ پایه‌ی پزشکی استفاده می‌کنی، روی خودش حک شده (مثلاً `±0.05 mL`). همیشه قبلِ گزارشِ نتیجه بهش نگاه کن.

## خطای اختلافِ منظر — اشتباهی که همه می‌کنن 👁️

اگه از کنار به یه استوانه‌ی مدرّج نگاه کنی، عددِ اشتباه می‌خونی! این **خطای اختلافِ منظر (parallax)** ـه. باید چشمت **رو‌به‌رو و عمود** به مقیاس باشه.

<iframe src="/wp-content/physics-content/highschool/10/widgets/parallax-error.svg" width="100%" height="320" style="border:none; border-radius:12px;" loading="lazy" title="خطای اختلاف منظر"></iframe>

## محاسبه‌ی خطا با پایتون 🐍

اگه ۱۰ بار یه نمونه رو وزن کردی، چطوری «بهترین مقدار» رو گزارش کنی؟ **میانگین ± انحرافِ معیار**:

```python
import numpy as np

# مثال: ۱۰ اندازه‌گیریِ pH یه محلول
ph = [7.41, 7.39, 7.42, 7.40, 7.43, 7.38, 7.41, 7.40, 7.42, 7.39]

mean = np.mean(ph)
std = np.std(ph, ddof=1)        # انحراف معیار نمونه
sem = std / np.sqrt(len(ph))    # خطای استاندارد میانگین

print(f"میانگین: {mean:.3f}")
print(f"انحرافِ معیار: {std:.3f}")
print(f"گزارش: pH = {mean:.2f} ± {sem:.3f}")
```

این فرمول دقیقاً همون چیزیه که تو مقاله‌های پزشکی موقعِ گزارشِ نتیجه‌ی آزمایش می‌بینی.

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/10/widgets/deghat-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش و پاسخ دقت"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [دقت و درستی](https://fa.wikipedia.org/wiki/%D8%AF%D8%B1%D8%B3%D8%AA%DB%8C_%D9%88_%D8%AF%D9%82%D8%AA)
- Wikipedia EN: [Accuracy and precision](https://en.wikipedia.org/wiki/Accuracy_and_precision)، [Measurement uncertainty](https://en.wikipedia.org/wiki/Measurement_uncertainty)، [Significant figures](https://en.wikipedia.org/wiki/Significant_figures)
- [NIST — Uncertainty of Measurement Results](https://physics.nist.gov/cuu/Uncertainty/)
- [HyperPhysics — Error Analysis](http://hyperphysics.phy-astr.gsu.edu/hbase/lerr.html)

### ویدئو (یوتیوب)
- Veritasium: [The most precise measurement ever made](https://www.youtube.com/results?search_query=veritasium+precise+measurement)
- MIT OCW: [Statistical mechanics — error analysis](https://www.youtube.com/results?search_query=mit+ocw+error+analysis)
- Khan Academy: [Significant figures](https://www.youtube.com/results?search_query=khan+academy+significant+figures)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: دقت و درستی فیزیک دهم](https://www.aparat.com/result/%D8%AF%D9%82%D8%AA_%D9%88_%D8%AF%D8%B1%D8%B3%D8%AA%DB%8C_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%87%D9%85)
- [جست‌وجو: ارقام بامعنا](https://www.aparat.com/result/%D8%A7%D8%B1%D9%82%D8%A7%D9%85_%D8%A8%D8%A7%D9%85%D8%B9%D9%86%D8%A7)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با مثال‌های کولیس، ریزسنج، ارقام بامعنا](https://physicsme.ir/articles/deghat-dar-andazegiri/)

---

*تو بخشِ بعدی می‌ریم سراغِ آخرین مفهومِ فصلِ ۱ — چگالی. چرا یخ شناوره ولی سنگ ته می‌ره؟ 🧊*
