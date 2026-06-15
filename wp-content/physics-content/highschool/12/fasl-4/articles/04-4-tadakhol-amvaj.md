---
title: "تداخل امواج 🎵 — وقتی دو موج بهم می‌رسن"
chapter: "فصل ۴ — برهم‌کنش‌های موج"
section: "۴-۴ تداخل امواج"
order: 4
slug: "y12-f4-tadakhol-amvaj"
level: "دوازدهم ریاضی و فیزیک"
reading_time: "حدود ۱۴ دقیقه"
keywords: ["تداخل", "اصل برهم‌نهی", "آزمایش دو شکاف یانگ", "موج ایستاده", "ضربان", "بسامد", "نویز کنسلر", "LIGO"]
---

# تداخل امواج 🎵 — وقتی دو موج بهم می‌رسن

> 💭 **یه آزمایش رازآلود:** سال ۱۸۰۱، **توماس یانگ** نور رو از دو شکاف کوچکِ هم‌جوار گذروند. روی پرده، به‌جای دو خط روشن، **نوارهای روشن و تاریک به‌نوبت** دید! 🤯 این لحظه، نقطه‌ی شکستِ بحث «نور موجه یا ذره؟» بود. این آزمایش فقط برای نور نبود — هر موجی، از موج آب تا موج گرانشی، همین رفتارو داره. و امروز LIGO با تداخل، **چین‌خوردگیِ فضا-زمان** رو اندازه می‌گیره. 🌌

## اصلِ برهم‌نهی — پایه‌ی همه‌چی 🏗️

وقتی دو موج به یه نقطه می‌رسن، **جابه‌جاییِ کلی** برابر **جمعِ جبریِ** جابه‌جایی‌های هر موجه:

$$ y_\text{کل}(x, t) = y_1(x, t) + y_2(x, t) $$

این **اصلِ برهم‌نهی** اِسش بود. اما بعد از تداخل، **هر موج به راهش ادامه می‌ده** انگار هیچ‌چی نشده.

## تداخلِ سازنده و ویرانگر 🤝🤜🤛

### تداخل سازنده (Constructive):
اگه دو موج با هم **هم‌فاز** برخورد کنن (قله روی قله، دره روی دره)، دامنه‌شون **جمع** می‌شه:

$$ A_\text{کل} = A_1 + A_2 $$

نتیجه: یه موج با دامنه‌ی بزرگ‌تر.

### تداخل ویرانگر (Destructive):
اگه **مخالفِ فاز** برخورد کنن (قله روی دره)، دامنه‌ها **همدیگه رو خنثی** می‌کنن:

$$ A_\text{کل} = |A_1 - A_2| $$

اگه $A_1 = A_2$ باشه، نتیجه **صفر**ـه. دو موج همدیگه رو می‌خورن!

> 🔥 **نکته‌ی مهم:** اون انرژی کجا می‌ره؟ تو نقاطِ ویرانگر صفر می‌شه ولی تو نقاطِ سازنده **چهار برابر** می‌شه (انرژی ∝ $A^۲$). متوسط‌اش حفظ می‌شه.

<!-- INTERACTIVE: ویجت wave-interference — دو چشمه‌ی نقطه‌ای و الگوی تداخل روی سطح -->

<iframe src="/widgets/wave-interference.html" width="100%" height="560" 
        style="border:none; border-radius:12px;" loading="lazy" 
        title="تداخل دو چشمه‌ی موج"></iframe>

## آزمایش دو شکافِ یانگ ✨

دو شکاف هم‌جوار با فاصله‌ی $d$، روی پرده‌ای به فاصله‌ی $L$. نور با طول موج $\lambda$ از شکاف‌ها می‌گذره.

**شرطِ تداخل سازنده** (نوار روشن) در زاویه‌ی $\theta$:
$$ d \sin\theta = m\lambda \quad (m = ۰, ۱, ۲, \ldots) $$

**شرطِ تداخل ویرانگر** (نوار تاریک):
$$ d \sin\theta = (m + ۱/۲)\lambda $$

برای زاویه‌های کوچک، **فاصله‌ی نوارها روی پرده**:
$$ \Delta y = \frac{\lambda L}{d} $$

<!-- INTERACTIVE: ویجت double-slit — تغییر فاصله‌ی شکاف‌ها و طول موج، ببین الگو چه شکلی می‌شه -->

<iframe src="/widgets/double-slit.html" width="100%" height="540" 
        style="border:none; border-radius:12px;" loading="lazy" 
        title="آزمایش دو شکاف یانگ"></iframe>

### مثال عددی:

دو شکاف با فاصله‌ی $d = ۰٫۲$ mm، پرده $L = ۲$ متر دور، نور قرمز $\lambda = ۶۵۰$ nm.

$$ \Delta y = \frac{۶۵۰ \times ۱۰^{-۹} \times ۲}{۲ \times ۱۰^{-۴}} = ۶٫۵ \times ۱۰^{-۳} \text{ m} = ۶٫۵ \text{ mm} $$

فاصله‌ی هر دو نوار روشنِ مجاور $۶٫۵$ میلی‌متره — کاملاً قابل دیدن.

## موجِ ایستاده (Standing Wave) — تداخلِ دو موجِ متضاد 🌊

اگه دو موجِ یکسان (همان دامنه و طول موج) در دو جهت **مخالف** حرکت کنن (مثلاً موجِ فرستاده‌شده و موجِ بازتابیده روی طناب)، حاصلِ تداخل‌شون یه چیز خاصه:

$$ y(x, t) = ۲A \sin(kx) \cos(\omega t) $$

این **حرکت نمی‌کنه**! ولی **در جا نوسان می‌کنه**. نقاطی هست که همیشه ثابت‌اند (**گره**ها — node)، و نقاطی هست که با حداکثر دامنه نوسان می‌کنن (**شکم**ها — antinode).

### طناب با دو سرِ بسته (مثل گیتار):

طولِ طناب $L$، تنها طول موج‌هایی موج ایستاده می‌سازن که:
$$ L = n \frac{\lambda}{2} \quad (n = ۱, ۲, ۳, \ldots) $$

که بسامدهای ممکن می‌شه:
$$ f_n = \frac{n v}{2L} $$

$f_1$ بسامد بنیادی (fundamental)، $f_2, f_3, \ldots$ هارمونیک‌ها هستن. این چیزیه که سازِ یه گیتار رو می‌سازه! 🎸

### لوله‌ی موسیقی:
- **دو سر باز** (فلوت): $f_n = nv/(2L)$
- **یک سر باز، یک سر بسته** (کلارینت): $f_n = (۲n-۱)v/(4L)$ — فقط هارمونیک‌های فرد

> 🎶 **چرا گیتار و ویولن صدای متفاوت دارن با یه نُت یکسان؟** چون ترکیبِ هارمونیک‌هاشون فرق می‌کنه. این رو **رنگِ صدا** (timbre) می‌گن — همون چیزی که صدای آلت موسیقی رو ویژه می‌کنه.

## ضربان (Beats) — تداخلِ دو بسامد نزدیک 🥁

اگه دو موجِ صوتی با بسامدهای **کمی متفاوت** (مثلاً $f_1 = ۴۴۰$ Hz و $f_2 = ۴۴۴$ Hz) با هم بشنوی، یه «وا-وا-وا» می‌شنوی — صدا قوی و ضعیف می‌شه. این **ضربان** ـه.

بسامدِ ضربان:
$$ f_\text{ضربان} = |f_1 - f_2| $$

تو مثال بالا: $۴$ ضربان در ثانیه می‌شنوی.

> 🎹 **کاربردِ هنری:** کوک‌سازِ پیانو از همین استفاده می‌کنه! وقتی سیم رو می‌کوک می‌کنه، اگه ضربان می‌شنوه یعنی بسامد سیم با دیپازون فرق داره. وقتی ضربان صفر شد، یعنی هم‌بسامد شدن.

### 🎧 خودت گوش بده — ویجتِ ضربان

با ویجتِ پایین، **دو فرکانسِ مختلف** رو بساز و **هم‌زمان پخش‌شون کن**. اگه فرکانس‌ها نزدیک هم باشن (مثلاً ۴۴۰ و ۴۴۴ Hz)، صدای «وا-وا-وا» می‌شنوی. وقتی برابر بشن، صدا یکنواخت می‌شه.

<iframe src="/widgets/beats-audio.html" width="100%" height="540" 
        style="border:none; border-radius:12px;" loading="lazy" 
        title="ضربان صوتی — پخش دو فرکانس"></iframe>

## کاربرد ۱: هدفون‌های نویز کنسلر 🎧

هدفون‌های امروزی (Sony WH-1000XM، Bose QC) از تداخلِ ویرانگر استفاده می‌کنن. یه میکروفون صدای محیط رو می‌گیره، یه پردازنده موجِ معکوس رو می‌سازه و توی هدفون پخش می‌کنه. موجِ صوت محیط + موجِ معکوس = صفر! 🔇

## کاربرد ۲: تداخل‌سنج LIGO 🌌

**LIGO** آشکارسازِ امواج گرانشیه (Laser Interferometer Gravitational-Wave Observatory). دو بازوی لیزر به طولِ ۴ کیلومتر داره. اگه یه موجِ گرانشی از زمین رد بشه، فاصله‌ی این دو بازو **یه میلیاردیمِ یه میلیاردیمِ یه میلیاردیم** (یعنی $۱۰^{-۲۱}$) متر فرق می‌کنه — این از قطر یه پروتون هم کمتره!

با اندازه‌گیری تداخلِ این دو پرتو، LIGO تو سال ۲۰۱۵ برای اولین بار موجِ گرانشیِ ناشی از برخوردِ دو سیاه‌چاله رو دید. این کشف، **نوبل فیزیک ۲۰۱۷** رو گرفت.

## کاربرد ۳: لایه‌های نازک و رنگین‌کمونِ روغن 🛢️

اگه قطره‌ی روغن روی آبِ خیابون ببینی، رنگ‌های متلوّن می‌بینی. این **تداخل لایه‌ی نازک** ـه. نور از سطح بالا و پایینِ لایه بازتاب می‌شه — تو ضخامت‌های مختلف، تداخل‌های متفاوت → رنگ‌های متلوّن.

همینه که لنزهای ضد بازتابِ دوربین رو می‌سازه (لایه‌ی نازکی که موج بازتابی رو با موج ورودی **ویرانگرانه** تداخل می‌ده).

## جمع‌بندیِ خودمونی 🎁

- اصلِ برهم‌نهی: جابه‌جایی‌ها جمع می‌شن.
- تداخل سازنده/ویرانگر → نوارهای روشن/تاریک تو آزمایش یانگ.
- موج ایستاده = تداخلِ دو موج متضاد → سازِ موسیقی.
- ضربان = تداخلِ دو بسامد نزدیک.
- LIGO، هدفون نویز کنسلر، لنزهای دوربین، الماسِ موجِ صدا — همه از تداخل بهره می‌برن.

---

## جعبه‌ی «جالبه که بدونی» 💡

### تو ۲۰۱۵ ساعتِ ۹:۵۱ صبحِ ۱۴ سپتامبر... 🌠

اولین موجِ گرانشی‌ای که LIGO شکار کرد، از برخوردِ دو سیاه‌چاله به جرم ۲۹ و ۳۶ برابر خورشید بود که **۱٫۳ میلیارد سال نوری** ازمون دوره. وقتی موج به زمین رسید، تو فقط ۰٫۲ ثانیه، **سه برابرِ جرمِ خورشید** انرژی به‌صورت موجِ گرانشی منتشر شده بود! اگه این انرژی به‌جای موجِ گرانشی نور بود، از هزار میلیارد خورشید روشن‌تر می‌شد.

### چرا تو نقاطِ ویرانگر هم انرژی هست؟ 🤔

این یه سؤالِ ظریفه: اگه دو موج کاملاً همدیگه رو خنثی کنن، انرژی کجا می‌ره؟ جواب: **انرژی توزیع می‌شه**. متوسطِ زمانیِ شدت در فضا حفظ می‌شه ولی توزیعش عوض می‌شه. تو نقاطِ سازنده شدت چهار برابر می‌شه (نه دو برابر — چون $I \propto A^۲$)، و تو نقاطِ ویرانگر صفر می‌شه. اگه میانگین بگیری، همون انرژیِ کلیه که داشتی.

---

## 🔗 منابع و لینک‌های بیشتر

### 📚 مراجع علمی و دانشگاهی

- 📚 **ویکی‌پدیا (فارسی):** [تداخل (موج)](https://fa.wikipedia.org/wiki/%D8%AA%D8%AF%D8%A7%D8%AE%D9%84_(%D9%85%D9%88%D8%AC))
- 📚 **ویکی‌پدیا:** [آزمایش دو شکاف یانگ](https://fa.wikipedia.org/wiki/%D8%A2%D8%B2%D9%85%D8%A7%DB%8C%D8%B4_%D8%AF%D9%88_%D8%B4%DA%A9%D8%A7%D9%81)
- 📚 **ویکی‌پدیا:** [Standing wave](https://en.wikipedia.org/wiki/Standing_wave) — موجِ ایستاده
- 📚 **ویکی‌پدیا:** [LIGO](https://en.wikipedia.org/wiki/LIGO) — آشکارساز موج گرانشی
- 📚 **ویکی‌پدیا:** [Beat (acoustics)](https://en.wikipedia.org/wiki/Beat_(acoustics)) — ضربان صوتی
- 🎓 **MIT OCW — 8.03 Lecture 20: Two-Slit Interference:** [ویدئوی درس](https://ocw.mit.edu/courses/8-03sc-physics-iii-vibrations-and-waves-fall-2016/) — یِن لی
- 🎓 **MIT OCW — Vibrations & Waves complete course:** [دوره‌ی کامل](https://ocw.mit.edu/courses/8-03sc-physics-iii-vibrations-and-waves-fall-2016/)
- 🎓 **Caltech — LIGO Educational Resources:** [ligo.caltech.edu](https://www.ligo.caltech.edu/page/educational-resources)
- 🎓 **Feynman Lectures — Vol I, Ch. 28-29 (Interference):** [feynmanlectures.caltech.edu](https://www.feynmanlectures.caltech.edu/I_28.html) — رایگان
- 📖 **HyperPhysics — Interference:** [مرجع](http://hyperphysics.phy-astr.gsu.edu/hbase/phyopt/interf.html)
- 📖 **HyperPhysics — Standing Waves on String:** [مرجع](http://hyperphysics.phy-astr.gsu.edu/hbase/Waves/standw.html)
- 🏛 **NASA — Gravitational Waves:** [nasa.gov](https://www.nasa.gov/mission_pages/lisa/multimedia/lisa-gravity-waves.html) — موج گرانشی از دیدِ ناسا
- 🏛 **NSF — LIGO Discovery (2015):** [nsf.gov](https://www.nsf.gov/news/special_reports/gravitationalwaves/) — اولین کشف
- 🏛 **CERN — Wave-particle duality:** [home.cern](https://home.cern/) — دوگانگیِ موج-ذره

### 🎥 ویدئو — یوتیوب و آپارات

- 🎥 **یوتیوب:** [Veritasium — The Original Double Slit Experiment](https://www.youtube.com/results?search_query=veritasium+double+slit) — آزمایش یانگ
- 🎥 **یوتیوب:** [Veritasium — How LIGO works](https://www.youtube.com/results?search_query=veritasium+LIGO+gravitational+wave)
- 🎥 **یوتیوب:** [3Blue1Brown — Wave interference & phase](https://www.youtube.com/results?search_query=3blue1brown+wave+interference)
- 🎥 **یوتیوب:** [SmarterEveryDay — Noise cancelling headphones](https://www.youtube.com/results?search_query=smartereveryday+noise+cancelling)
- 🎥 **یوتیوب:** [Walter Lewin — Two-slit interference (8.03 MIT)](https://www.youtube.com/results?search_query=walter+lewin+two+slit)
- 🎥 **یوتیوب:** [PBS Space Time — Gravitational Waves](https://www.youtube.com/results?search_query=pbs+space+time+gravitational+wave)
- 🎬 **آپارات:** [آزمایش دو شکاف یانگ — جستجو](https://www.aparat.com/result/%D8%A2%D8%B2%D9%85%D8%A7%DB%8C%D8%B4_%D8%AF%D9%88_%D8%B4%DA%A9%D8%A7%D9%81)
- 🎬 **آپارات:** [موج ایستاده — جستجو](https://www.aparat.com/result/%D9%85%D9%88%D8%AC_%D8%A7%DB%8C%D8%B3%D8%AA%D8%A7%D8%AF%D9%87)
- 🎬 **آپارات:** [LIGO و موج گرانشی — جستجو](https://www.aparat.com/result/%D9%85%D9%88%D8%AC_%DA%AF%D8%B1%D8%A7%D9%86%D8%B4%DB%8C)
- 🎬 **آپارات:** [تداخل امواج — جستجو](https://www.aparat.com/result/%D8%AA%D8%AF%D8%A7%D8%AE%D9%84_%D8%A7%D9%85%D9%88%D8%A7%D8%AC)

### 🧪 شبیه‌سازی تعاملی

- 🧪 **PhET — Wave Interference:** [نسخه‌ی فارسی](https://phet.colorado.edu/sims/html/wave-interference/latest/wave-interference_fa.html) — مهم‌ترین شبیه‌ساز این فصل
- 🧪 **PhET — Wave on a String:** [نسخه‌ی فارسی](https://phet.colorado.edu/sims/html/wave-on-a-string/latest/wave-on-a-string_fa.html) — موج ایستاده هم می‌توان دید
- 🧪 **PhET — Sound Waves:** [phet.colorado.edu](https://phet.colorado.edu/en/simulations/sound) — تداخل صوتی و ضربان
- 💻 **Falstad Ripple Tank:** [falstad.com/ripple](https://www.falstad.com/ripple/) — دو منبع موج، تداخل تماشایی
- 🎓 **The Physics Classroom — Interference:** [physicsclassroom.com](https://www.physicsclassroom.com/class/light/Lesson-3/Two-Point-Source-Interference)
- 🎓 **GeoGebra — Double Slit:** [geogebra.org](https://www.geogebra.org/search/double%20slit) — شبیه‌سازهای دانش‌آموز ساخته

### 🆓 دوره‌های رایگان

- 🎓 **MIT OCW — 8.03 Vibrations and Waves:** [دوره‌ی کامل با ویدئو و تمرین](https://ocw.mit.edu/courses/8-03sc-physics-iii-vibrations-and-waves-fall-2016/)
- 🎓 **MIT OCW — 8.04 Quantum Physics:** [دوره](https://ocw.mit.edu/courses/8-04-quantum-physics-i-spring-2013/) — برای دیدن آزمایش دو شکاف با الکترون
- 🎓 **Khan Academy — Wave interference:** [خان آکادمی](https://www.khanacademy.org/science/physics/light-waves)
- 🎓 **Coursera — Quantum Mechanics for Everyone:** [جستجو](https://www.coursera.org/search?query=quantum)
- 🎓 **edX — Waves & Optics:** [جستجو](https://www.edx.org/search?q=waves+optics)

---

## 🐍 شبیه‌سازی پایتون: آزمایش دو شکاف یانگ 🧑‍💻

```python
import numpy as np
import matplotlib.pyplot as plt

# پارامترها
wavelength = 650e-9   # نور قرمز (m)
d = 0.2e-3            # فاصله شکاف‌ها (m)
L = 2.0               # فاصله پرده (m)
slit_width = 0.05e-3  # عرض هر شکاف

y = np.linspace(-0.03, 0.03, 2000)
theta = np.arctan(y/L)

# تداخل دو شکاف (Cosine pattern)
delta = np.pi * d * np.sin(theta) / wavelength
interference = np.cos(delta)**2

# پراش هر شکاف (sinc^2)
beta = np.pi * slit_width * np.sin(theta) / wavelength
diffraction = (np.sin(beta) / beta)**2
diffraction[len(diffraction)//2] = 1.0

# الگوی کل
intensity = interference * diffraction

plt.plot(y*1000, intensity)
plt.xlabel('فاصله از مرکز (mm)')
plt.ylabel('شدت نسبی')
plt.title('آزمایش دو شکاف یانگ — ترکیب پراش و تداخل')
plt.grid(); plt.show()
```

اجرای کد روی [Google Colab](https://colab.research.google.com/).

### ضربان دو فرکانس:

```python
import numpy as np
import matplotlib.pyplot as plt

t = np.linspace(0, 1, 10000)
f1, f2 = 440, 444  # دو فرکانس نزدیک
y = np.sin(2*np.pi*f1*t) + np.sin(2*np.pi*f2*t)

plt.plot(t[:2000], y[:2000])
plt.xlabel('زمان (s)'); plt.ylabel('فشار')
plt.title(f'ضربان: f1={f1} Hz, f2={f2} Hz, fضربان={abs(f2-f1)} Hz')
plt.grid(); plt.show()
```

---

## خودتو بسنج 📝

روی هر سؤال کلیک کن تا جوابش باز شه 👇

<details>
<summary><strong>۱. دو موج با دامنه‌ی $A = ۳$ cm کاملاً هم‌فاز با هم تداخل می‌کنن. دامنه‌ی کل؟</strong></summary>

$A_\text{کل} = ۳ + ۳ = ۶$ cm. تداخلِ سازنده — قله رو قله.

</details>

<details>
<summary><strong>۲. دو فرکانس $f_1 = ۲۵۶$ Hz و $f_2 = ۲۶۰$ Hz با هم شنیده می‌شن. ضربان چنده؟</strong></summary>

$f_\text{ضربان} = |۲۶۰ - ۲۵۶| = ۴$ Hz. یعنی هر ربعِ ثانیه یه پیک می‌شنوی.

</details>

<details>
<summary><strong>۳. تو آزمایش یانگ با $d = ۰٫۵$ mm، $L = ۱٫۵$ m، نور $\lambda = ۶۰۰$ nm. فاصله‌ی نوارهای روشن؟</strong></summary>

$\Delta y = \frac{\lambda L}{d} = \frac{۶۰۰ \times ۱۰^{-۹} \times ۱٫۵}{۵ \times ۱۰^{-۴}} = ۱٫۸ \times ۱۰^{-۳}$ m = $۱٫۸$ mm.

</details>

<details>
<summary><strong>۴. سیمی به طول $L = ۶۰$ cm با سرعتِ موج $v = ۲۴۰$ m/s. بسامد بنیادی؟</strong></summary>

$f_1 = v/(2L) = ۲۴۰ / (۲ \times ۰٫۶) = ۲۰۰$ Hz.

</details>

<details>
<summary><strong>۵. چرا آزمایشِ یانگ نشون داد نور موجه؟</strong></summary>

چون **هیچ ذره‌ای** نمی‌تونه نوارهای روشن-تاریک متناوب بسازه. ذرات از یه شکاف عبور می‌کنن و دو لکه می‌سازن — نه نوار. ولی **موج‌ها تداخل می‌کنن** و فقط با اصلِ برهم‌نهی می‌شه نوارهای متناوب رو توضیح داد.

</details>

---

*تو زیرفصلِ پایانیِ این فصل، می‌ریم سراغ **کاربردهای فناورانه‌ی موج** — از اجاق مایکروویو تا ماهواره، از سونوگرافی تا 5G. می‌بینمت! 👋*
