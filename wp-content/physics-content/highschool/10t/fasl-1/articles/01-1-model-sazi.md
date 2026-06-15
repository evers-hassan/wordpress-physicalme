---
title: "مدل‌سازی در فیزیک — همون ترفندی که تو زیست‌شناسی هم هست 🐄🎯"
chapter: "فصل ۱ — فیزیک، دانش بنیادی"
section: "۱-۱ مدل‌سازی در فیزیک"
order: 1
slug: "modeling-in-physics-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["مدل‌سازی", "تجربی", "ذره", "آرمانی‌سازی", "گاو کروی", "مدل قلب پمپ"]
---

# مدل‌سازی در فیزیک — همون ترفندی که تو زیست‌شناسی هم هست 🐄🎯

> یه چیزِ جالب 💭: وقتی تو زیست می‌خونی «قلب یه **پمپه**»، یا تو شیمی «اتم یه **منظومه‌ی شمسیِ کوچیکه**»، یا تو پزشکی «شش یه **بادکنکه**»… داری دقیقاً یه چیزو می‌بینی که فیزیک‌دونا قرن‌هاست انجام می‌دن: **مدل‌سازی**. بریم ببینیم یعنی چی و چرا اون‌قدر مهمه.

## ایده‌ی اصلی در یه پاراگراف 📌

**مدل‌سازی یعنی واقعیتو اون‌قدر ساده کن که بشه فهمیدش، ولی نه اون‌قدر که دیگه واقعیت نباشه.** مثلاً واسه پرتاب یه توپ، به‌جای اینکه درز و چرخش و باد و تغییرِ وزنو حساب کنی، توپو یه **نقطه** (ذره) فرض می‌کنی، فرض می‌کنی تو **خلأ**ست، و وزنشو ثابت می‌گیری. الان دیگه یه مسئله‌ی تمیز داری 🎯.

> ⚠️ **اخطارِ طلایی:** ساده‌سازی مالِ اثرهای **جزئی**ه، نه مالِ اثرهای **تعیین‌کننده**. مدل‌سازیِ توپ بدونِ گرانش یعنی توپت تا ابد می‌ره بالا 🚀😱.

## مدل‌سازی تو علومِ زیستی — مثال‌های واقعی 🩺

تو رشته‌ی تجربی، مدل‌سازی همه‌جا هست:

- **قلب → پمپ مکانیکی:** هیچ‌کس واقعاً ۲۰۰ پروتئین و کلسترولِ سلولِ ماهیچه‌ای رو موقعِ فهمیدنِ گردشِ خون حساب نمی‌کنه. تو کتابِ پزشکی هم می‌گن «قلب پمپه». این یه **مدل**ـه.
- **نورون → مدار RC:** سلولِ عصبی واقعی پیچیده‌ست، ولی **مدلِ هاجکین-هاکسلی** (که جایزه‌ی نوبل گرفت 🏆) نورونو یه مدارِ ساده‌ی الکتریکی فرض می‌کنه — و عالی جواب می‌ده.
- **اپیدمی → مدل SIR:** پیش‌بینیِ کرونا چطوری انجام شد؟ هر آدم رو فقط تو یکی از سه حالتِ «Susceptible / Infected / Recovered» قرار دادن. اگه می‌خواستی همه‌چیزِ یه آدمو حساب کنی، هیچ‌وقت پیش‌بینی نمی‌رسید.

دیدی؟ **همه‌ی علم با مدل کار می‌کنه**، نه‌فقط فیزیک.

## شبیه‌سازِ تعاملی — بازی کن و ببین 🎮

<iframe src="/wp-content/physics-content/highschool/10/widgets/projectile-motion.html" width="100%" height="480" style="border:none; border-radius:12px;" loading="lazy" title="شبیه‌ساز پرتابه"></iframe>

> سرعت و زاویه رو عوض کن، بعد دکمه‌ی «مقاومت هوا» رو فعال کن. مسیرِ سادهٔ مدل (نقطه‌چین) و مسیرِ واقعی (پر) که از هم جدا می‌شن — این دقیقاً همون چیزیه که موقعِ مدل‌سازی نادیده می‌گیریم.

## یه کدِ پایتونِ کوچیک — همین مدلو امتحان کن 🐍

اگه پایتون بلدی، این چند خط هم مدلِ ایده‌آل و هم نسخه‌ی با مقاومتِ هوا رو پلات می‌کنه:

```python
import numpy as np
import matplotlib.pyplot as plt

g = 9.8
v0 = 25.0          # m/s
theta = np.deg2rad(60)
vx, vy = v0*np.cos(theta), v0*np.sin(theta)

# مدلِ ساده (بدون مقاومت هوا)
t = np.linspace(0, 2*vy/g, 200)
x_ideal = vx * t
y_ideal = vy*t - 0.5*g*t**2

# مدلِ واقعی‌تر: نیروی مقاومت ∝ سرعت (تخمین خطی)
k = 0.08
dt = 0.01
x, y, ux, uy = [0], [0], vx, vy
while y[-1] >= 0:
    ax = -k*ux
    ay = -g - k*uy
    ux += ax*dt; uy += ay*dt
    x.append(x[-1] + ux*dt)
    y.append(y[-1] + uy*dt)

plt.plot(x_ideal, y_ideal, '--', label='مدلِ ایده‌آل')
plt.plot(x, y, label='با مقاومتِ هوا')
plt.xlabel('x (m)'); plt.ylabel('y (m)'); plt.legend(); plt.grid()
plt.savefig('projectile.png', dpi=120)
```

می‌بینی که با چند خط کد می‌تونی بفهمی چقدر «اثرِ نادیده‌گرفته‌شده» اهمیت داره.

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/10/widgets/model-sazi-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش و پاسخ مدل‌سازی"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و کتاب‌های تخصصی
- ویکی‌پدیای فارسی: [مدل‌سازی علمی](https://fa.wikipedia.org/wiki/%D9%85%D8%AF%D9%84%E2%80%8C%D8%B3%D8%A7%D8%B2%DB%8C_%D8%B9%D9%84%D9%85%DB%8C)
- Wikipedia EN: [Spherical cow](https://en.wikipedia.org/wiki/Spherical_cow) (شوخیِ فیزیک‌دونا که خودشون می‌سازن!)، [Mathematical model](https://en.wikipedia.org/wiki/Mathematical_model)
- MIT OpenCourseWare — [8.01 Classical Mechanics (Walter Lewin)](https://ocw.mit.edu/courses/8-01sc-classical-mechanics-fall-2016/) — درسِ پرتابه عالی توضیح می‌ده چه چیزیو نادیده می‌گیره
- Khan Academy: [Projectile motion (free)](https://www.khanacademy.org/science/physics/two-dimensional-motion/two-dimensional-projectile-mot)

### ویدئو (یوتیوب)
- Veritasium: [The science of why we’re obsessed with simplification](https://www.youtube.com/results?search_query=veritasium+spherical+cow)
- 3Blue1Brown: [Differential equations & modeling](https://www.youtube.com/results?search_query=3blue1brown+differential+equations)
- MIT OCW Walter Lewin: [Lecture 1 — units, modeling](https://www.youtube.com/results?search_query=walter+lewin+lecture+1+8.01)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: مدل‌سازی فیزیک](https://www.aparat.com/result/%D9%85%D8%AF%D9%84_%D8%B3%D8%A7%D8%B2%DB%8C_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9)
- [جست‌وجو: حرکت پرتابه](https://www.aparat.com/result/%D8%AD%D8%B1%DA%A9%D8%AA_%D9%BE%D8%B1%D8%AA%D8%A7%D8%A8%D9%87)

### شبیه‌ساز خارجی
- [PhET — Projectile Motion (فارسی موجوده)](https://phet.colorado.edu/fa/simulations/projectile-motion)

### روی همین سایت 🔗
- [مدل‌سازی برای دانش‌آموزِ ریاضی-فیزیک (نسخه‌ی عمیق‌تر با مثال‌های ریاضی بیشتر)](https://physicsme.ir/articles/model-sazi-dar-physics/)

---

*تو بخشِ بعدی می‌ریم سراغِ کمیت‌ها — اونجا با مفهومِ بردار و کاربردش تو نیروسنجی و حرکت آشنا می‌شی 🧭.*
