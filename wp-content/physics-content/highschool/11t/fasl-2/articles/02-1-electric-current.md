---
title: "جریان الکتریکی — وقتی بار حرکت می‌کند ⚡"
chapter: "فصل ۲ — جریان الکتریکی و مدارهای جریان مستقیم (تجربی)"
section: "۲-۱ جریان الکتریکی"
order: 1
slug: "electric-current-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["جریان الکتریکی", "آمپر", "I", "جهت قراردادی", "یون", "نورون"]
---

# جریان الکتریکی — وقتی بار حرکت می‌کند ⚡

> یه نکته‌ی پایه‌ای 🩺: یه نورونِ سالم در حالتِ آرامش، در حدودِ **۱ پیکوآمپر** جریانِ ریز از غشای خودش رد می‌کنه. این مقدار خیلی کمه، ولی **میلیاردها نورونِ مغز** با هم میلیون‌ها برابر این رو می‌سازن. این فصل، الفبای جریانه — کوچک‌ترین عددِ آمپر تا بزرگ‌ترینِ صنعتی.

## تعریفِ جریانِ الکتریکی 📐

**جریانِ الکتریکی** = نرخِ عبورِ بار از یه مقطع:

$$I = \frac{\Delta Q}{\Delta t}$$

- $I$: جریان (آمپر، $\text{A}$)
- $\Delta Q$: بارِ عبوری در مدت زمان $\Delta t$
- **یک آمپر** = یک کولن در ثانیه

## جهتِ قراردادیِ جریان 🎯

طبق قرارداد:

> **جهتِ جریانِ الکتریکی، جهتِ حرکتِ بارهای مثبت‌ـه**.

ولی در واقع، تو فلزها این **الکترون‌ها** (بارِ منفی) هستن که حرکت می‌کنن — یعنی جهتِ واقعیِ الکترون‌ها مخالفِ جهتِ قراردادیِ جریانه!

این یکی از تاریخی‌ترین «اشتباه‌های مفید» علم بود (فرانکلین قبل از کشفِ الکترون قرارداد رو بست) — ولی ریاضیات هنوز درست کار می‌کنه.

## انواعِ بارهای حامل 🧬

| محیط | حاملِ بار | مثال |
|---|---|---|
| فلز | الکترونِ آزاد | سیمِ مس |
| محلول/بدن | یون‌های مثبت + منفی | پلاسما، سیتوپلاسم |
| نیمه‌رسانا | الکترون + حفره | ترانزیستور |
| گاز یونیده | یون + الکترون | لامپ نئون، رعد |

## مقادیرِ معمولِ جریان 📌

| موقعیت | جریان |
|---|---|
| نورونِ منفرد (پتانسیلِ عمل) | $\sim 100\,\text{pA}$ |
| ECG سیگنال روی پوست | $\sim 10\,\mu\text{A}$ |
| دفیبریلاتور (پیکِ تخلیه) | $\sim 30\,\text{A}$ |
| سیمِ لامپِ LED | $\sim 20\,\text{mA}$ |
| پریز خانگی (لامپ ۱۰۰W) | $\sim 0.45\,\text{A}$ |
| باتری خودرو (استارت) | $\sim 200\,\text{A}$ |
| رعد و برق | $\sim 30\,\text{kA}$ |

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/current-flow.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="حرکت جریان"></iframe>

## محاسبه‌ی پایتون — جریانِ نورون 🐍

```python
# جریان یک پتانسیل عمل (پایه)
import math

n_Na = 1e7       # تعداد یون Na+ که در ms اول وارد سلول می‌شن
e = 1.602e-19    # کولن
delta_t = 1e-3   # ms ابتدایی پتانسیل عمل

Q = n_Na * e
I = Q / delta_t
print(f"جریان نورون: I = {I*1e12:.2f} pA")

# جریان کل قشر مغز (10^11 نورون)
N_neurons = 1e11
synchrony_factor = 1e-6   # تصادف بودن
I_brain = N_neurons * I * synchrony_factor
print(f"جریان قشر مغز: {I_brain*1e6:.2f} µA")
# با همین حد ضعیف، EEG ثبت می‌شه

# دفیبریلاتور — تخلیه‌ی 50 µC در 10 ms
Q_def = 100e-3   # 100 میلی‌کولن (تقریبی برای 200 J)
t_def = 5e-3     # 5 ms
I_def = Q_def / t_def
print(f"جریان لحظه‌ای دفیبریلاتور: {I_def:.1f} A")
```

## نکته‌ی پزشکی-زیستی 🩺

- **ECG/EEG** — این دستگاه‌ها جریان‌های زیستی رو با تقویت‌کننده‌های حساس می‌سنجن
- **بیوسنسورها** — هر سنسورِ تشخیصی (قند خون، انگشتی، حسگر اکسیژن خون) جریان رو می‌خونه و به ولتاژ تبدیل می‌کنه
- **ایمنیِ الکتریکی** — برای انسان، جریانِ بیشتر از **۱۰۰ میلی‌آمپر** از روی قلب می‌تونه باعثِ فیبریلاسیون شه (به همین دلیل دفیبریلاتور ۳۰ آمپر می‌ده ولی سریع — تا قلب رو ری‌ست کنه نه آسیب بزنه)
- **TENS** — جریانِ ۱۰-۸۰ میلی‌آمپر برای کنترلِ درد در فیزیوتراپی استفاده می‌شه

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/jaryan-electriki-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش جریان الکتریکی"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [جریان الکتریکی](https://fa.wikipedia.org/wiki/%D8%AC%D8%B1%DB%8C%D8%A7%D9%86_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)
- Wikipedia EN: [Electric current](https://en.wikipedia.org/wiki/Electric_current)، [Ampère](https://en.wikipedia.org/wiki/Andr%C3%A9-Marie_Amp%C3%A8re)
- HyperPhysics: [Current](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/elecur.html)

### ویدئو (یوتیوب)
- [Khan Academy — Electric Current](https://www.youtube.com/results?search_query=khan+academy+electric+current)
- [Veritasium — How does electricity flow?](https://www.youtube.com/results?search_query=veritasium+electricity+flow)
- [Crash Course — Currents](https://www.youtube.com/results?search_query=crash+course+electric+current)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: جریان الکتریکی یازدهم](https://www.aparat.com/result/%D8%AC%D8%B1%DB%8C%D8%A7%D9%86_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: پتانسیل عمل عصبی](https://www.aparat.com/result/%D9%BE%D8%AA%D8%A7%D9%86%D8%B3%DB%8C%D9%84_%D8%B9%D9%85%D9%84_%D8%B9%D8%B5%D8%A8%DB%8C)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با محاسبه‌ی سرعت رانش](https://physicsme.ir/articles/jaryan-electriki/)

---

*در بخش بعدی، می‌ریم سراغِ قانونی که ارتباطِ ولتاژ و جریان رو می‌گه — [مقاومت و قانون اهم](https://physicsme.ir/articles/resistance-ohm-law-tajrobi/) 📏.*
