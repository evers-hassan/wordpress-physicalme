---
title: "حرکت با شتاب ثابت و سقوط آزاد — وقتی سرعت با آهنگ ثابت تغییر می‌کنه ⬇️"
chapter: "فصل ۱ — حرکت بر خط راست (تجربی)"
section: "۱-۳ حرکت با شتاب ثابت و سقوط آزاد"
order: 3
slug: "uniform-acceleration-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۱۰ دقیقه"
keywords: ["شتاب ثابت", "سقوط آزاد", "g", "معادلات سینماتیک", "تجربی"]
branches: ["مکانیک"]
---

# حرکت با شتاب ثابت و سقوط آزاد — وقتی سرعت با آهنگ ثابت تغییر می‌کنه ⬇️

> یه تصویرِ شوک‌آور 🚗💥: تو یه تصادفِ ۶۰ km/h، سرت تو ۵۰ میلی‌ثانیه از $16.7\,\text{m/s}$ به صفر می‌رسه. این یعنی شتابِ ترمز حدودِ $34g$ — همون آستانه‌ی آسیبِ شدیدِ مغزی. کیسه‌ی هوا این شتاب رو نصف می‌کنه و جونِ تو رو نجات می‌ده 🛡️. این فصل، الفبای اون داستانه.

## شتاب چیه؟

**شتاب** ($\vec{a}$) آهنگِ تغییرِ سرعت با زمانه:

$$
\vec{a} = \frac{\Delta \vec{v}}{\Delta t}, \qquad \text{[a] = m/s}^2
$$

اگه شتاب **ثابت** باشه (هم بزرگی هم جهت)، حرکت رو می‌گیم «حرکت با شتاب ثابت» یا «شتابِ یکنواخت».

## معادلاتِ سینماتیک — چهار رابطه‌ی طلایی 🥇

اگه در $t=0$ موقعیت $x_0$ باشه و سرعت اولیه $v_0$ و شتاب $a$ ثابت:

| | معادله | چی می‌گه |
|---|---|---|
| 1 | $v = v_0 + a\,t$ | سرعت در زمانِ $t$ |
| 2 | $x = x_0 + v_0 t + \tfrac{1}{2} a\,t^2$ | موقعیت در زمانِ $t$ |
| 3 | $v^2 = v_0^2 + 2a(x-x_0)$ | سرعت بر حسبِ جابه‌جایی (بدون $t$) |
| 4 | $x = x_0 + \tfrac{1}{2}(v_0 + v)t$ | با سرعت متوسط |

## نمودارها 📊

- **x-t**: سهمی (parabola)
- **v-t**: خطِ راست با شیبِ $a$
- **a-t**: خطِ افقی به ارتفاع $a$

<iframe src="/wp-content/physics-content/highschool/12/fasl-1/widgets/kinematic-eqn-solver.html" width="100%" height="620" style="border:none; border-radius:12px;" loading="lazy" title="حل‌گرِ معادلات سینماتیک"></iframe>

## سقوط آزاد 🍎

وقتی هیچ مقاومتِ هوا نداشته باشیم، **همه‌ی اجسام** با شتابی برابر سقوط می‌کنن:

$$
g \approx 9.8\,\text{m/s}^2 \approx 10\,\text{m/s}^2
$$

این شتاب همیشه **به سمتِ پایین** (به طرف مرکزِ زمین) هست. در سقوطِ آزاد:

$$
v = v_0 - g\,t \quad,\quad y = y_0 + v_0 t - \tfrac{1}{2}g\,t^2
$$

(منفی چون $g$ به طرفِ پایینه و ما $y$ رو به سمتِ بالا مثبت گرفتیم)

<iframe src="/wp-content/physics-content/highschool/12/fasl-1/widgets/free-fall-sim.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="شبیه‌سازِ سقوط آزاد"></iframe>

## مثال ۱ — کیسه‌ی هوا 🛡️

ماشینی با $v_0 = 60\,\text{km/h} = 16.7\,\text{m/s}$ به دیوار می‌خوره. اگه فاصله‌ای که سرِ راننده در آن متوقف می‌شه:
- **بدون کیسه‌ی هوا**: $0.05\,\text{m}$ (روی فرمان)
- **با کیسه‌ی هوا**: $0.30\,\text{m}$

از معادله‌ی ۳:

$$
a = \frac{v_0^2}{2x}
$$

- بدون کیسه: $a = \frac{16.7^2}{2 \times 0.05} = 2790\,\text{m/s}^2 \approx 280g$ (مرگبار)
- با کیسه: $a = \frac{16.7^2}{2 \times 0.30} = 465\,\text{m/s}^2 \approx 47g$ (قابل‌بقا)

## مثال ۲ — سقوطِ بیمارِ سالمند 👵

بیمار سالمندی از ارتفاعِ ۱ متر می‌افته. سرعتش هنگامِ برخورد به زمین:

$$
v = \sqrt{2g h} = \sqrt{2 \times 9.8 \times 1} \approx 4.4\,\text{m/s} \approx 16\,\text{km/h}
$$

برخورد در سرعتِ ۱۶ km/h می‌تونه شکستگیِ لگن ایجاد کنه. همینه دلیلِ نصبِ کف‌پوشِ نرم در بخشِ سالمندان.

## محاسبه با پایتون 🐍

```python
# آیا کیسه‌ی هوا واقعا فرق می‌کنه؟
# مدلِ ساده: شتابِ ترمز در برخورد

v0_kmh = 60
v0 = v0_kmh / 3.6   # m/s

# دو سناریو: بدون و با کیسه‌ی هوا
scenarios = {
    "بدون کیسه‌ی هوا": 0.05,   # m (سر به فرمان)
    "با کیسه‌ی هوا":    0.30,   # m (مسافتِ توقف بیشتر)
}

g = 9.8
for name, d_stop in scenarios.items():
    a = v0**2 / (2 * d_stop)
    a_in_g = a / g
    t_stop = v0 / a
    survival = "قابل بقا ✅" if a_in_g < 80 else "مرگبار ⚠️"
    print(f"{name:25s} → a = {a:7.1f} m/s² ({a_in_g:5.1f}g)  |  t = {t_stop*1000:5.1f} ms  |  {survival}")

# خروجی:
# بدون کیسه ی هوا      → a = 2789.0 m/s² (284.6g)  |  t =   6.0 ms  | مرگبار ⚠️
# با کیسه ی هوا         → a =  464.8 m/s² ( 47.4g)  |  t =  35.9 ms  | قابل بقا ✅
```

## نکته‌ی پزشکی-زیستی 🩺

- **شتابِ $50g$ به سر** → شکستگی جمجمه و آسیبِ شدیدِ مغزی
- **شتابِ $5g$ پایدار** → سرگیجه و تاریِ دید (در فضانوردی و خلبانیِ مانور)
- **سقوطِ ۱ متری در سالمندان** → ۲۰٪ احتمال شکستگیِ لگن (Hip Fracture)
- **whiplash** در تصادفِ عقب → شتابِ ۸-۱۲g به گردن
- **آستانه‌ی Tolerance Anaesthesia**: شتابِ تخت ICU > $0.5g$ برای انتقالِ بیمارِ ناپایدار خطرناکه

## خودتو بسنج 📝

با ویجتِ سقوطِ آزاد امتحان کن:
- ارتفاعِ ۲۰ متر بذار، زمانِ سقوط چقدر می‌شه؟ (پاسخ: $\approx 2\,\text{s}$)
- یه توپ از طبقه‌ی ۲۰ (≈ ۶۰ متر) سقوط کنه، سرعتش هنگامِ برخورد چقدره؟ (پاسخ: $\approx 34\,\text{m/s} = 122\,\text{km/h}$)

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [حرکت با شتاب ثابت](https://fa.wikipedia.org/wiki/%D8%B4%D8%AA%D8%A7%D8%A8)
- Wikipedia EN: [Equations of motion](https://en.wikipedia.org/wiki/Equations_of_motion)
- Wikipedia EN: [Free fall](https://en.wikipedia.org/wiki/Free_fall)
- HyperPhysics: [Kinematic equations](http://hyperphysics.phy-astr.gsu.edu/hbase/mot.html)
- Khan Academy: [Acceleration & motion equations](https://www.khanacademy.org/science/physics/one-dimensional-motion)

### ویدئو (یوتیوب)
- [جست‌وجو: free fall Veritasium](https://www.youtube.com/results?search_query=veritasium+free+fall)
- [Crash Course Physics — Acceleration](https://www.youtube.com/results?search_query=crash+course+physics+acceleration)
- [Mythbusters — Penny dropped from skyscraper](https://www.youtube.com/results?search_query=mythbusters+penny+skyscraper)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: شتاب ثابت دوازدهم](https://www.aparat.com/result/%D8%B4%D8%AA%D8%A7%D8%A8_%D8%AB%D8%A7%D8%A8%D8%AA_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: سقوط آزاد آزمایش](https://www.aparat.com/result/%D8%B3%D9%82%D9%88%D8%B7_%D8%A2%D8%B2%D8%A7%D8%AF_%D8%A2%D8%B2%D9%85%D8%A7%DB%8C%D8%B4)

### شبیه‌سازی PhET
- [Projectile Motion](https://phet.colorado.edu/en/simulations/projectile-motion)
- [Forces and Motion: Basics](https://phet.colorado.edu/en/simulations/forces-and-motion-basics)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با عمقِ بیشتر](https://physicsme.ir/articles/y12-shetab-sabet/)
- [سقوطِ آزاد ریاضی](https://physicsme.ir/articles/y12-soqut-azad/)

---

*فصلِ ۱ تموم شد! حالا بریم سراغ تمرین — [مسائلِ فصل ۱](https://physicsme.ir/articles/problems-chapter-1-y12-tajrobi/) و [فلش‌کارت‌ها](https://physicsme.ir/articles/flashcards-chapter-1-y12-tajrobi/) 📝.*
