---
title: "پراش موج 🎭 — وقتی موج از شکاف رد می‌شه"
chapter: "فصل ۴ — برهم‌کنش‌های موج"
section: "۴-۳ پراش موج"
order: 3
slug: "y12-f4-parash-mowj"
level: "دوازدهم ریاضی و فیزیک"
reading_time: "حدود ۱۱ دقیقه"
keywords: ["پراش", "diffraction", "موج", "شکاف", "اصل هویگنس", "آکوستیک", "میکروسکوپ"]
---

# پراش موج 🎭 — وقتی موج از شکاف رد می‌شه

> 💭 **یه آزمایش که هر روز انجام می‌دی:** درِ اتاقت رو می‌بندی. ولی صدای حرفِ مامانتو از تو آشپزخونه می‌شنوی! 👂 چطور موج صوتی از یه شکافِ کوچیک (مثلاً درز در) بیرون می‌آد و **به همه طرف پخش می‌شه**؟ این پدیده — که اسمش **پراش** ـه — هم رازِ شنواییت تو اتاق دربسته‌ست، هم رازِ محدودیت قدرتِ میکروسکوپ‌های اپتیکی.

## پراش چیه؟ 🌊

وقتی موج به یه **مانع** یا **شکاف** برخورد می‌کنه، **خم می‌شه** و تو ناحیه‌ای که از دید هندسیِ ساده «سایه» باید باشه، پخش می‌شه. به این پدیده می‌گیم **پراش (Diffraction)**.

پراش نتیجه‌ی مستقیمِ **اصل هویگنس**‌ـه: هر نقطه از جبهه‌ی موج، خودش یه چشمه‌ی موج جدیده. پس وقتی موجِ تختی به یه شکاف می‌رسه، نقاطِ داخل شکاف خودشون منبعِ موج‌های دایره‌ای می‌شن — این موج‌های دایره‌ای به همه طرف منتشر می‌شن.

<!-- INTERACTIVE: ویجت diffraction-grating — تغییر پهنای شکاف و طول موج، ببین پراش چجوری تغییر می‌کنه -->

<iframe src="/widgets/diffraction-grating.html" width="100%" height="540" 
        style="border:none; border-radius:12px;" loading="lazy" 
        title="پراش از شکاف و توری"></iframe>

## شرطِ اصلی: شکاف کوچک، پراش زیاد 📏

این یه قاعده‌ی **حیاتی**ه:

- اگه **عرضِ شکاف $w$** خیلی **بزرگ‌تر از طول موج $\lambda$** باشه: پراش خیلی کم — موج تقریباً بدون خم شدن از شکاف می‌گذره.
- اگه $w \sim \lambda$ یا $w < \lambda$ باشه: پراش **خیلی شدید** — موج به همه طرف پخش می‌شه.

> 🔑 **درسِ کلیدی:** پراش وقتی محسوس می‌شه که اندازه‌ی شکاف یا مانع با طول موج **مقایسه‌پذیر** باشه.

### چرا صدا رو از پشت دیوار می‌شنوی ولی نور رو نمی‌بینی؟

- **طول موج صوتِ شنیداری:** $۰٫۰۲$ m (صدای زیر) تا $۱۷$ m (صدای بَم) — تو همین مرتبه‌ی فاصله‌ی درها و دیوارهاست.
- **طول موج نورِ مرئی:** $۴۰۰$ nm تا $۷۰۰$ nm = $۰٫۰۰۰۰۰۰۴$ تا $۰٫۰۰۰۰۰۰۷$ متر.

پس برای نور، **همه‌ی** شکاف‌های عادی مثل «در» خیلی بزرگ‌اند → پراش ناچیز → نور بدون خم رد می‌شه. ولی برای صدا، در و پنجره هم اندازه‌ی طول موج‌اند → پراش زیاد → صدا به همه طرف پخش می‌شه.

اگه می‌خوای پراشِ نور رو ببینی، باید شکاف رو **خیلی** کوچیک کنی — حدود میکرومتر. آزمایش‌های یانگ و فرسنل دقیقاً همین کارو می‌کردن.

## فرمولِ شکاف تنها (Single Slit) ✏️

برای یه شکاف به عرض $a$ (که موجی با طول موج $\lambda$ از روش می‌گذره)، اولین **کمینه‌ی** الگوی پراش روی پرده تو زاویه‌ی $\theta$ ایجاد می‌شه که:

$$ \sin\theta = \frac{\lambda}{a} $$

برای کمینه‌های بعدی:
$$ a \sin\theta = m\lambda \quad (m = ۱, ۲, ۳, \ldots) $$

این فرمول می‌گه:
- اگه $\lambda/a$ کوچک باشه (شکاف بزرگ): $\theta$ خیلی کوچک → پراش ضعیف
- اگه $\lambda/a$ نزدیک ۱ باشه (شکاف هم‌اندازه‌ی $\lambda$): $\theta ≈ ۹۰°$ → پراش کامل

### مثال عددی:

پرتوی لیزرِ قرمز ($\lambda = ۶۵۰$ nm) از شکافی به عرضِ $a = ۰٫۱$ mm می‌گذره. زاویه‌ی اولین کمینه؟

$$ \sin\theta = \frac{۶۵۰ \times ۱۰^{-۹}}{۱۰^{-۴}} = ۶٫۵ \times ۱۰^{-۳} \Rightarrow \theta ≈ ۰٫۳۷° $$

اگه پرده $L = ۲$ متر دور باشه، فاصله‌ی نوار روشنِ مرکزی تا اولین تاریکی روی پرده:
$$ y = L \tan\theta ≈ L \sin\theta = ۲ \times ۶٫۵ \times ۱۰^{-۳} = ۱٫۳ $$ cm

## توریِ پراش (Diffraction Grating) — جدا کردن رنگ‌ها 🌈

یه **توریِ پراش** هزاران شکاف ریز کنار همه. وقتی نور سفید بهش بخوره، چون هر طول موج به‌جای متفاوتی منحرف می‌شه، می‌بینی **اسپکترومتر** ساخته‌ای — رنگ‌ها از هم جدا می‌شن.

برای توری با فاصله‌ی شکاف $d$:
$$ d \sin\theta = m\lambda $$

این همون فرمولیه که توی **اسپکترومترهای ستاره‌شناسی** (که ترکیبِ شیمیاییِ ستاره‌ها رو می‌فهمن) استفاده می‌شه!

> 🌟 **عددِ جذاب:** اسپکترومترهای حرفه‌ای می‌تونن هزاران شکاف در هر میلی‌متر داشته باشن. این جداسازی به دقتِ $\Delta\lambda \sim ۰٫۰۱$ nm می‌رسه.

## محدودیتِ بنیادینِ میکروسکوپ‌ها 🔬

اگه قراره با موجی به طولِ $\lambda$ به جسمی نگاه کنی، **نمی‌تونی** جزئیاتِ کوچک‌تر از $\lambda$ رو ببینی! این به‌خاطر پراشه: موج، خودش رو دور جزئیاتی که از طول موج کوچک‌ترن، می‌پیچه و تصویر تار می‌شه.

به این می‌گیم **حدِّ پراشی** (Diffraction Limit). به همین خاطر:
- میکروسکوپ‌های نوریِ معمولی نمی‌تونن چیزی کوچک‌تر از $۲۰۰$ nm رو نشون بدن (نصفِ کوتاه‌ترین طول موج مرئی).
- برای دیدنِ ویروس‌ها و مولکول‌ها از **میکروسکوپ الکترونی** استفاده می‌کنیم — چون طول موجِ ذرات الکترون خیلی کوچک‌تره (پیکومتر).
- در سال ۲۰۱۴ نوبل شیمی به سه نفر تعلق گرفت که راه‌هایی برای **شکستن حدِّ پراشی** پیدا کردن (super-resolution microscopy).

## آکوستیک سالن‌ها 🎭

طراحانِ سالن‌های موسیقی (مثلِ تالار وحدت یا سالن میلاد) از پراش بهره می‌برن. اگه ستون‌ها و دیوارها صاف و بدون درز باشن، صدا تو سالن یکنواخت پخش نمی‌شه. ولی با گذاشتنِ پنل‌های پراشنده، صدا به همه‌ی نقاط می‌رسه — حتی بالکن طبقه‌ی بالا.

## رادیو در شهر 📻

موج‌های رادیویی (طول موج چند متر) از پراش زیادی برخوردارن — به همین خاطر تو شهرِ پر از ساختمون هم می‌تونی رادیو بگیری، حتی اگه آنتن مستقیم نباشه. سیگنال‌های موبایل (طول موج سانتی‌متر) هم همین رو دارن ولی به اندازه‌ی FM نه.

## جمع‌بندیِ خودمونی 🎁

- پراش = پخش شدنِ موج بعد از عبور از شکاف یا برخورد به مانع.
- شرطِ مهم: $w \sim \lambda$ یا کوچک‌تر.
- فرمولِ شکاف تنها: $a \sin\theta = m\lambda$.
- پراش حدِّ بنیادی برای میکروسکوپ‌ها می‌گذاره.
- نتیجه‌ی مستقیمِ اصلِ هویگنس.

---

## جعبه‌ی «جالبه که بدونی» 💡

### چرا CD رنگین‌کمونه؟ 💿

سطحِ یه CD یا DVD رو که جلوی نور بگیری، یه رنگین‌کمونِ زیبا می‌بینی. این به‌خاطر **توری پراش** ـه! روی سطحِ CD، هزاران شیار میکروسکوپیِ موازی هست (که داده‌ها رو ذخیره می‌کنن). این شیارها مثل یه توری پراش عمل می‌کنن و نور رو رنگین‌کمونی می‌کنن.

می‌تونی این رو با Blu-ray هم امتحان کنی — چون شیارهاش ریزترن (به‌خاطر طول موج آبی)، رنگ‌ها فشرده‌ترن.

### نقطه‌ی پواسون 🎯

تو سال ۱۸۱۸، ریاضی‌دان فرانسوی **سیمئون پواسون** نظریه‌ی موجیِ نور رو رد کرد. گفت: «اگه نور موج باشه، باید پشتِ یه دیسکِ گرد یه **نقطه‌ی روشن** تو مرکزِ سایه باشه. ولی این پوچه!» 

ولی **فرسنل و آراگو آزمایش رو کردن** — و نقطه‌ی پواسون **واقعاً** وجود داشت! این آزمایش، شکستِ بزرگِ نظریه‌ی ذره‌ایِ نور بود. حالا به این نقطه می‌گن «نقطه‌ی فرسنل-آراگو-پواسون» — به اسم اون کسی که می‌خواست نظریه رو رد کنه!

---

## 🔗 منابع و لینک‌های بیشتر

### 📚 مراجع علمی و دانشگاهی

- 📚 **ویکی‌پدیا (فارسی):** [پراش](https://fa.wikipedia.org/wiki/%D9%BE%D8%B1%D8%A7%D8%B4) — تعریف و انواع
- 📚 **ویکی‌پدیا:** [Diffraction](https://en.wikipedia.org/wiki/Diffraction) — مرجع کامل
- 📚 **ویکی‌پدیا:** [توری پراش](https://fa.wikipedia.org/wiki/%D8%AA%D9%88%D8%B1%DB%8C_%D9%BE%D8%B1%D8%A7%D8%B4)
- 📚 **ویکی‌پدیا:** [Arago spot / Poisson spot](https://en.wikipedia.org/wiki/Arago_spot) — نقطه‌ی پواسون
- 📚 **ویکی‌پدیا:** [Super-resolution microscopy](https://en.wikipedia.org/wiki/Super-resolution_microscopy) — نوبل ۲۰۱۴
- 🎓 **MIT OCW — 8.03 Lecture 19: Single & Double Slit Diffraction:** [ویدئوی درس](https://ocw.mit.edu/courses/8-03sc-physics-iii-vibrations-and-waves-fall-2016/) — استاد یِن لی
- 🎓 **MIT OCW — 6.013 Electromagnetics and Applications:** [دوره](https://ocw.mit.edu/courses/6-013-electromagnetics-and-applications-spring-2009/)
- 📖 **HyperPhysics — Single Slit Diffraction:** [مرجع](http://hyperphysics.phy-astr.gsu.edu/hbase/phyopt/sinslit.html)
- 📖 **HyperPhysics — Diffraction Grating:** [مرجع](http://hyperphysics.phy-astr.gsu.edu/hbase/phyopt/grating.html)
- 🏛 **NASA — Spectroscopy in Astronomy:** [imagine.gsfc.nasa.gov](https://imagine.gsfc.nasa.gov/science/toolbox/spectroscopy1.html) — کاربردِ توریِ پراش تو ستاره‌شناسی
- 🏛 **Caltech — Diffraction Limit:** [دانشگاه کلتک](https://www.caltech.edu/) — مقالات تخصصی

### 🎥 ویدئو — یوتیوب و آپارات

- 🎥 **یوتیوب:** [Veritasium — How does a diffraction grating work?](https://www.youtube.com/results?search_query=veritasium+diffraction)
- 🎥 **یوتیوب:** [3Blue1Brown — Diffraction of light](https://www.youtube.com/results?search_query=3blue1brown+light+wave)
- 🎥 **یوتیوب:** [Walter Lewin — MIT 8.03 Diffraction](https://www.youtube.com/results?search_query=walter+lewin+diffraction)
- 🎥 **یوتیوب:** [Sixty Symbols — Diffraction explained](https://www.youtube.com/results?search_query=sixty+symbols+diffraction)
- 🎬 **آپارات:** [پراش نور — جستجو](https://www.aparat.com/result/%D9%BE%D8%B1%D8%A7%D8%B4_%D9%86%D9%88%D8%B1)
- 🎬 **آپارات:** [توری پراش — جستجو](https://www.aparat.com/result/%D8%AA%D9%88%D8%B1%DB%8C_%D9%BE%D8%B1%D8%A7%D8%B4)
- 🎬 **آپارات:** [آزمایش پراش لیزر — جستجو](https://www.aparat.com/result/%D8%A2%D8%B2%D9%85%D8%A7%DB%8C%D8%B4_%D9%BE%D8%B1%D8%A7%D8%B4_%D9%84%DB%8C%D8%B2%D8%B1)

### 🧪 شبیه‌سازی تعاملی

- 🧪 **PhET — Wave Interference (شکاف تنها هم داره):** [نسخه‌ی فارسی](https://phet.colorado.edu/sims/html/wave-interference/latest/wave-interference_fa.html)
- 🧪 **PhET — Geometric Optics:** [دانلود](https://phet.colorado.edu/sims/html/geometric-optics/latest/geometric-optics_fa.html)
- 💻 **Falstad Ripple Tank:** [falstad.com/ripple](https://www.falstad.com/ripple/) — شبیه‌سازی موج آبی با شکاف
- 🎓 **The Physics Classroom — Diffraction:** [physicsclassroom.com](https://www.physicsclassroom.com/class/light/Lesson-3/Diffraction-and-Interference-of-Light)

### 🆓 دوره‌های رایگان

- 🎓 **MIT OCW — 8.03SC Vibrations and Waves:** [دوره‌ی کامل](https://ocw.mit.edu/courses/8-03sc-physics-iii-vibrations-and-waves-fall-2016/)
- 🎓 **edX — Optics by Duke University:** [جستجو](https://www.edx.org/search?q=optics)
- 🎓 **Khan Academy — Diffraction:** [خان آکادمی](https://www.khanacademy.org/science/physics/light-waves)
- 🎓 **Coursera — Modern Optics:** [جستجو](https://www.coursera.org/search?query=optics)

---

## 🐍 شبیه‌سازی پایتون: الگوی پراشِ شکاف تنها 🧑‍💻

```python
import numpy as np
import matplotlib.pyplot as plt

# پارامترها
wavelength = 650e-9   # نور قرمز
slit_width = 0.1e-3   # 0.1 mm
L = 2.0               # فاصله پرده

# الگوی شدت تابع sinc^2
y = np.linspace(-0.03, 0.03, 1000)
theta = np.arctan(y/L)
beta = np.pi * slit_width * np.sin(theta) / wavelength
intensity = (np.sin(beta) / beta)**2
intensity[len(intensity)//2] = 1.0  # حد در صفر

plt.plot(y*100, intensity)  # cm روی محور افقی
plt.xlabel('فاصله از مرکز (cm)')
plt.ylabel('شدت نسبی')
plt.title('الگوی پراش شکاف تنها')
plt.grid(); plt.show()
```

این کد رو روی [Google Colab](https://colab.research.google.com/) اجرا کن.

---

## خودتو بسنج 📝

روی هر سؤال کلیک کن تا جوابش باز شه 👇

<details>
<summary><strong>۱. چرا صدا از پشت دیوار قابل شنیدنه ولی نور نه؟</strong></summary>

به‌خاطر **اختلافِ طول موج**. طول موج صوتِ شنیداری در حدِّ متره — هم‌اندازه‌ی شکاف‌های در و پنجره — پس پراش زیاد. طول موج نور در حد نانومتره — به مراتب کوچک‌تر از شکاف‌های عادی — پس پراش ناچیز.

</details>

<details>
<summary><strong>۲. لیزر سبز ($\lambda = ۵۳۲$ nm) از شکاف $۰٫۰۵$ mm رد می‌شه. زاویه‌ی اولین کمینه؟</strong></summary>

$\sin\theta = ۵۳۲ \times ۱۰^{-۹} / ۵ \times ۱۰^{-۵} = ۱٫۰۶ \times ۱۰^{-۲}$
$\theta ≈ ۰٫۶۱°$

</details>

<details>
<summary><strong>۳. اگه شکاف رو دو برابر بزرگ‌تر کنیم، عرض الگوی مرکزی چطور تغییر می‌کنه؟</strong></summary>

**نصف** می‌شه. چون $\sin\theta \propto ۱/a$ — هرچی $a$ بزرگ‌تر، پراش کمتر، الگو باریک‌تر. این عکسِ شهودِ ابتدایی بعضی‌هاست.

</details>

<details>
<summary><strong>۴. توری‌ای داریم با ۵۰۰ خط در میلی‌متر. فاصله‌ی شکاف‌ها؟</strong></summary>

$d = ۱ \text{mm} / ۵۰۰ = ۲ \times ۱۰^{-۶}$ m = ۲ µm. این مقدار، خصلت یه توریِ معمولیه و می‌تونه نور مرئی رو خوب پخش کنه.

</details>

<details>
<summary><strong>۵. چرا میکروسکوپ‌های الکترونی بهتر از نوری‌اند؟</strong></summary>

چون **طول موج الکترون** (که با ولتاژ کنترل می‌شه) می‌تونه به پیکومتر برسه — هزاران بار کوچک‌تر از طول موجِ نورِ مرئی. پس **حدِّ پراشی** خیلی کمتره و می‌تونن ساختار اتم رو ببینن.

</details>

---

*تو زیرفصلِ بعدی می‌ریم سراغ **تداخل امواج** — وقتی دو موج به‌هم می‌رسن. این چیزی بود که نظریه‌ی موجیِ نور رو اثبات کرد و بعدها در رادیو، مخابرات و حتی LIGO (آشکارسازِ امواج گرانشی) ازش استفاده شد. می‌بینمت! 👋*
