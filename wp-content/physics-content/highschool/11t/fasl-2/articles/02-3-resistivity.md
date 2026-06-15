---
title: "عوامل مؤثر بر مقاومت — چرا مس از تنگستن بهتره 🔬"
chapter: "فصل ۲ — جریان الکتریکی و مدارهای جریان مستقیم (تجربی)"
section: "۲-۳ عوامل مؤثر بر مقاومت الکتریکی"
order: 3
slug: "resistivity-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["مقاومت ویژه", "ρ", "طول", "سطح مقطع", "جنس", "دما"]
---

# عوامل مؤثر بر مقاومت — چرا مس از تنگستن بهتره 🔬

> یه نکته‌ی پزشکی 🩺: یه الکترودِ ECG با سیمِ مس وصل می‌شه (مقاومت‌ ویژه کم → اتلاف کم)، ولی المنتِ گرماییِ کوره با سیمِ نیکروم (مقاومت‌ ویژه زیاد → گرمای زیاد). انتخابِ جنس، اساسِ مهندسی پزشکی‌ـه.

## ۴ عامل مؤثر بر مقاومتِ سیم 📐

برای سیمِ یکنواخت با جنس مشخص:

$$R = \rho \, \frac{\ell}{A}$$

- $\rho$: **مقاومتِ ویژه** (جنسِ ماده) — یکا اهم·متر ($\Omega\cdot\text{m}$)
- $\ell$: طولِ سیم
- $A$: مساحتِ سطح مقطع

به علاوه‌ی **دما** که جداگونه روی $\rho$ اثر می‌ذاره.

## مقاومتِ ویژه‌ی مواد متداول 📌

| ماده | $\rho$ (Ω·m) | کاربرد |
|---|---|---|
| نقره | $1.59 \times 10^{-8}$ | بهترین رسانا (گرون) |
| **مس** | $1.68 \times 10^{-8}$ | **استاندارد سیم‌کشی** |
| آلومینیم | $2.65 \times 10^{-8}$ | خطوطِ انتقالِ برقِ شهری |
| طلا | $2.44 \times 10^{-8}$ | اتصالاتِ حساس |
| تنگستن | $5.6 \times 10^{-8}$ | فیلامانِ لامپ |
| نیکروم | $1.10 \times 10^{-6}$ | المنتِ گرما |
| سیلیکون خالص | $640$ | نیمه‌رسانا |
| **بدن انسان (بافت)** | $1-10$ | پایه‌ی بایوامپدانس |
| **خون** | $\sim 1.5$ | شاخصِ جریان در سرخرگ |
| شیشه | $10^{10}-10^{14}$ | عایق |
| لاستیک | $\sim 10^{13}$ | عایقِ مخصوصِ سیم |

## اثرِ دما 🌡️

برای فلزات: $\rho$ با گرم شدن **زیاد می‌شه** (الکترون‌ها بیشتر با اتم‌ها برخورد می‌کنن).

$$\rho(T) = \rho_0 \, [1 + \alpha (T - T_0)]$$

- $\alpha$: ضریبِ دمایی (مثلاً برای مس $\alpha \approx 0.004/^\circ\text{C}$)

برای نیمه‌رساناها: برعکس — با گرم شدن $\rho$ **کم می‌شه** (انرژی حرارتی الکترون‌های بیشتری رو آزاد می‌کنه).

## ابررسانایی — وقتی مقاومت صفر می‌شه ⚛️

در دماهای **بسیار پایین** (زیر چند کلوین)، بعضی فلزات کاملاً ابررسانا می‌شن — $\rho = 0$.

### کاربرد پزشکی: MRI 🩺

دستگاهِ MRI از یه سیم‌پیچِ ابررسانا (معمولاً نیوبیوم-تیتانیم در دمای He مایع، حدودِ ۴.۲ کلوین) برای ساختِ میدانِ مغناطیسیِ بسیار قوی استفاده می‌کنه. **بدونِ ابررسانایی، MRI ممکن نبود**.

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/resistivity.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="مقاومت ویژه"></iframe>

## محاسبه‌ی پایتون — مقاومتِ بدن 🐍

```python
# بدنِ انسان به‌عنوان رسانا
# مدلِ ساده: استوانه با طول 1.7 متر، قطر 30 سانتی‌متر
import math

rho_body = 5         # Ω·m (متوسط برای بافت)
length = 1.7         # متر (قد متوسط)
radius = 0.15        # 30 سانتی‌متر قطر → 15 cm شعاع
A = math.pi * radius**2

R_body = rho_body * length / A
print(f"مقاومت بدن از سر تا پا: {R_body:.0f} Ω")
# تقریباً 120 Ω

# با ولتاژ پریز:
V = 220
I = V / R_body
print(f"جریان از بدن (ولتاژ خانگی): {I*1000:.0f} mA")
# تقریباً 1800 mA — کشنده!
# اما در عمل، پوست یک "اولین خط دفاع" است و مقاومتش بسیار زیاد

# مقایسه با پوست:
R_skin_dry = 100_000
R_total = R_body + 2*R_skin_dry
I_actual = V / R_total
print(f"با پوست خشک، جریان واقعی: {I_actual*1000:.2f} mA")
# تقریباً 1 mA — احساس می‌کنی ولی امنه
```

## نکته‌ی پزشکی-زیستی 🩺

- **انتخابِ سیم در دستگاه پزشکی**: مس برای انتقال (مقاومت کم)، نیکروم برای المنتِ گرمایی (مقاومت زیاد، حرارت)، طلا برای تماس‌های حسّاس (مقاومتِ ثابت)
- **MRI و ابررسانایی** — تاج‌گُلِ کاربردِ پزشکی
- **ECG ۱۲-لید** — ۱۰ الکترود نقره/نقره‌-کلرید روی پوست برای کاهش مقاومتِ تماس
- **سرنگ هوشمند با سنسورِ مقاومت** — تشخیص نوع بافت (پوست، عضله، عصب) با اندازه‌گیری مقاومت‌ ویژه

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/moghavemat-vizhe-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش مقاومت ویژه"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [مقاومت ویژه](https://fa.wikipedia.org/wiki/%D9%85%D9%82%D8%A7%D9%88%D9%85%D8%AA_%D9%88%DB%8C%DA%98%D9%87)
- Wikipedia EN: [Electrical resistivity](https://en.wikipedia.org/wiki/Electrical_resistivity_and_conductivity)، [Superconductivity](https://en.wikipedia.org/wiki/Superconductivity)
- HyperPhysics: [Resistivity](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/resis.html)

### ویدئو (یوتیوب)
- [Veritasium — Superconductors](https://www.youtube.com/results?search_query=veritasium+superconductor)
- [Khan Academy — Resistivity](https://www.youtube.com/results?search_query=khan+academy+resistivity)
- [Periodic Videos — Superconductor](https://www.youtube.com/results?search_query=periodic+videos+superconductor)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: مقاومت ویژه فیزیک یازدهم](https://www.aparat.com/result/%D9%85%D9%82%D8%A7%D9%88%D9%85%D8%AA_%D9%88%DB%8C%DA%98%D9%87_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: MRI ابررسانا](https://www.aparat.com/result/MRI_%D8%A7%D8%A8%D8%B1%D8%B1%D8%B3%D8%A7%D9%86%D8%A7)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با محاسباتِ اتلاف](https://physicsme.ir/articles/moghavemat-vizhe/)

---

*در بخش بعدی، می‌ریم سراغ منبعِ ولتاژ که جریان رو شروع می‌کنه — [نیروی محرکه (emf)](https://physicsme.ir/articles/electromotive-force-tajrobi/) 🔋.*
