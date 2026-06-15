---
title: "خطوط میدان — نقشه‌ی بصری برای دیدنِ میدان 🗺️"
chapter: "فصل ۱ — الکتریسیتۀ ساکن (تجربی)"
section: "۱-۶ خطوط میدان الکتریکی"
order: 6
slug: "field-lines-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["خطوط میدان", "میدان یکنواخت", "دوقطبی", "بصری‌سازی", "اعصاب"]
---

# خطوط میدان — نقشه‌ی بصری برای دیدنِ میدان 🗺️

> یه ایده‌ی شگفت‌انگیز 💡: مایکل فارادی، یه پسرِ آهنگرِ بدون مدرک رسمی، روشی ابداع کرد که حالا تو هر کتابِ فیزیک هست — **خطوطِ میدان**. این خطوطِ خیالی، یه ابزارِ بصری‌سازِ معجزه‌آسا‌ـن که میدانِ سه‌بعدی و نامرئی رو روی کاغذ قابلِ فهم می‌کنن.

## قواعدِ خطوطِ میدان 📐

1. **شروع** از بارِ مثبت (یا از بی‌نهایت)
2. **پایان** در بارِ منفی (یا در بی‌نهایت)
3. **مماس بر منحنی** = جهتِ میدان در اون نقطه
4. **چگالی خطوط** = شدتِ میدان (هر چی متراکم‌تر، میدان قوی‌تر)
5. **هیچ‌وقت همدیگه رو قطع نمی‌کنن** — چون در هر نقطه فقط یه جهت میدان وجود داره

## انواع پیکره‌بندی‌ها 🎨

| پیکره‌بندی | شکلِ خطوط |
|---|---|
| **یک بارِ مثبت** | شعاعی به سمت بیرون |
| **یک بارِ منفی** | شعاعی به سمت داخل |
| **دو بارِ ناهم‌نام (دوقطبی)** | منحنی‌های هلالی از + به - |
| **دو بارِ هم‌نام مثبت** | به طرفین رانده می‌شن |
| **دو صفحه‌ی موازی با بار مخالف** | خطوطِ موازی و یکنواخت |

## میدان یکنواخت — مهم‌ترین حالت برای پزشکی 🩺

بینِ دو صفحه‌ی موازی با بارهای مخالف، خطوط **موازی و هم‌فاصله** هستن — یعنی میدان در همه‌جا **یکسان** (یکنواخت).

این پیکره‌بندی پایه‌ی این دستگاه‌هاست:
- **اسپکتروسکوپ جرمی پزشکی** (تشخیصِ پروتئین، دارو)
- **سلِ آزمایشِ بیوشیمی** (انتقالِ مولکول‌ها در ژل با میدانِ یکنواخت)
- **اتاقک یونی** برای رادیوتراپی

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/electric-field-point.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="خطوط میدان"></iframe>

## بازنمایی پایتون — رسم خطوطِ یه دوقطبی 🐍

```python
import numpy as np
import matplotlib.pyplot as plt

# تعریف دو بار: +q در (-1,0) و -q در (+1,0)
q = 1e-9
k = 8.99e9
x, y = np.meshgrid(np.linspace(-2, 2, 30), np.linspace(-2, 2, 30))

# میدان از بار مثبت
r1 = np.sqrt((x+1)**2 + y**2) + 1e-9
Ex1 = k * q * (x+1) / r1**3
Ey1 = k * q * y / r1**3

# میدان از بار منفی
r2 = np.sqrt((x-1)**2 + y**2) + 1e-9
Ex2 = -k * q * (x-1) / r2**3
Ey2 = -k * q * y / r2**3

Ex, Ey = Ex1 + Ex2, Ey1 + Ey2
plt.streamplot(x, y, Ex, Ey, density=1.5)
plt.scatter([-1, 1], [0, 0], c=['red', 'blue'], s=200)
plt.title("خطوط میدان دوقطبی الکتریکی")
plt.axis('equal')
plt.show()
# با این مدل دقیقاً نقشه‌ی میدانِ مغزی یا میدانِ ECG رو می‌تونی شبیه‌سازی کنی
```

## نکته‌ی پزشکی-زیستی 🩺

- **مدلِ دوقطبیِ قلب**: کلِ ماهیچه‌ی قلبی رو می‌شه به‌صورتِ یه دوقطبیِ متغیر مدل کرد. خطوطِ میدانش پایه‌ی **ECG vector cardiography** است
- **پنس الکتریکیِ پروستات** و **رادیوتراپی** — هر دو از میدانِ یکنواخت برای انتقالِ انرژی به سلولِ هدف استفاده می‌کنن
- **پاترنِ مغزی**: امواجِ مغزی دلتا، تتا، آلفا، بتا — همگی پیکره‌بندیِ خاصی از خطوطِ میدان دارن که EEG ثبت می‌کنه

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/khotoot-meydan-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش خطوط میدان"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [خط میدان](https://fa.wikipedia.org/wiki/%D8%AE%D8%B7_%D9%85%DB%8C%D8%AF%D8%A7%D9%86)
- Wikipedia EN: [Field line](https://en.wikipedia.org/wiki/Field_line)، [Michael Faraday](https://en.wikipedia.org/wiki/Michael_Faraday)
- HyperPhysics: [Electric field lines](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/elelin.html)

### ویدئو (یوتیوب)
- [Walter Lewin — Field Lines](https://www.youtube.com/results?search_query=walter+lewin+field+lines)
- [3Blue1Brown — Vector fields](https://www.youtube.com/results?search_query=3blue1brown+vector+field)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: خطوط میدان یازدهم](https://www.aparat.com/result/%D8%AE%D8%B7%D9%88%D8%B7_%D9%85%DB%8C%D8%AF%D8%A7%D9%86_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Charges and Fields](https://phet.colorado.edu/en/simulations/charges-and-fields)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با مثال‌های متنوع‌تر](https://physicsme.ir/articles/khotoot-meydan/)

---

*در بخش بعدی، می‌ریم سراغ مفهومی که ECG، EEG، و دفیبریلاتور رو با هم وصل می‌کنه: [انرژی پتانسیل الکتریکی](https://physicsme.ir/articles/electric-potential-energy-tajrobi/) ⚡.*
