---
title: "حرکت با سرعت ثابت — وقتی سرعت تغییر نمی‌کنه 🚗⏰"
chapter: "فصل ۱ — حرکت بر خط راست (تجربی)"
section: "۱-۲ حرکت با سرعت ثابت"
order: 2
slug: "uniform-motion-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["حرکت یکنواخت", "سرعت ثابت", "نمودار", "تجربی"]
branches: ["مکانیک"]
---

# حرکت با سرعت ثابت — وقتی سرعت تغییر نمی‌کنه 🚗

> یه تصویرِ زیبا 🩸: خونی که در آئورت جریان داره، در حالتِ آرامش با سرعتِ تقریباً ثابتِ $40\,\text{cm/s}$ پیش می‌ره. **حرکت یکنواخت** یعنی همین — سرعتی که با گذرِ زمان تغییر نمی‌کنه. ساده‌ترین حالتِ حرکت، ولی فهمش پایه‌ی همه‌چیزه.

## تعریف 🎯

**حرکت یکنواخت روی خط راست**: وقتی جسم در زمان‌های مساوی، مسافت‌های مساوی طی می‌کنه و جهت‌ش هم تغییر نمی‌کنه.

این یعنی **سرعت** (بُرداری) ثابته:

$$
\vec{v} = \text{ثابت}
$$

## معادله‌ی حرکت

اگه در زمانِ $t = 0$ جسم در $x_0$ باشه و سرعتش $v$ ثابت باشه:

$$
\boxed{\,x(t) = x_0 + v\,t\,}
$$

این معادله بهت می‌گه «در هر زمانِ $t$، جسم کجاست».

## نمودارها 📊

- **x-t**: خطِ راست با شیبِ $v$
- **v-t**: خطِ افقی به ارتفاع $v$ (سرعت ثابته)
- **a-t**: خطِ افقی روی صفر (شتاب صفره)

نکته: **مساحتِ زیرِ نمودارِ v-t = جابه‌جایی**.

<iframe src="/wp-content/physics-content/highschool/12/fasl-1/widgets/motion-grapher.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="رسامِ حرکت یکنواخت"></iframe>

## مثال — قطرانِ سرم در رگ 💉

سرمِ نمکی با آهنگِ ثابت می‌چکه. اگه نرخِ تزریق $100\,\text{ml/h}$ باشه، در ۸ ساعت چقدر می‌ره؟ این یه «حرکت یکنواخت» در حجم/زمانه — همون فرمول.

$$
V = \dot{V}\cdot t = 100 \times 8 = 800\,\text{ml}
$$

## مثال ۲ — سرعتِ هدایتِ عصبی 🧠

پیامِ عصبی در آکسونِ میلین‌دار با سرعتِ تقریباً ثابتِ $120\,\text{m/s}$ پیش می‌ره. زمان رسیدنش از مغز به انگشتِ پا (طولِ تقریبی $1\,\text{m}$):

$$
t = \frac{x}{v} = \frac{1}{120} \approx 8.3\,\text{ms}
$$

## محاسبه با پایتون 🐍

```python
# مدلِ ساده‌ی جریانِ خون در آئورت
# سرعت در حالتِ استراحت: 40 cm/s

import numpy as np
import matplotlib.pyplot as plt

v = 0.40           # m/s
t = np.linspace(0, 1, 100)  # یک ثانیه
x = v * t                    # موقعیتِ یه قطره‌ی خون

# مدلِ پزشکی: اگه ضخامتِ آئورت 1.2 cm باشه،
# قطره‌ی خون چه زمانی به انتهای آئورتِ شکمی (≈ 30 cm) می‌رسه؟
L_aorta = 0.30   # m
t_aorta = L_aorta / v
print(f"زمانِ عبور از آئورت: {t_aorta*1000:.1f} میلی‌ثانیه")
# خروجی: 750.0 میلی‌ثانیه (تقریباً یه ضربان قلبی)
```

## نکته‌ی پزشکی-زیستی 🩺

- **داپلر سونوگرافی**: با اندازه‌گیریِ سرعتِ موضعیِ خون، انسدادها (تنگیِ شریانی) پیدا می‌شن
- **سرعتِ پیامِ عصبی** — کاهشش در MS، فلجِ بل، نوروپاتیِ دیابت
- **پمپ سرم در ICU**: نمونه‌ی واضحِ حرکتِ یکنواخت — حجم/زمان ثابته

## خودتو بسنج 📝

1. با ویجتِ بالا یه $v$ ثابت بذار. نمودار $x$-$t$ چه شکلیه؟
2. جابه‌جایی رو از مساحتِ زیرِ نمودار $v$-$t$ پیدا کن — مثلاً برای $v = 5\,\text{m/s}$ و $\Delta t = 4\,\text{s}$.
3. اگه سرمی با نرخِ $80\,\text{ml/h}$ بچکه، در ۱۰ ساعت چقدر تزریق می‌شه؟
4. پیامِ عصبی با سرعتِ $50\,\text{m/s}$ از کمر تا پنجه (~۱ متر) چقدر طول می‌کشه؟

<details>
<summary>✅ پاسخ‌ها (اول خودت فکر کن، بعد باز کن)</summary>

**۱.** خطِ راست با شیبِ $v$. چون $v$ ثابت، $x(t) = x_0 + vt$ — هیچ خمشی نداره.

**۲.** نمودار $v$-$t$ مستطیلی به ارتفاع $5$ و عرض $4$ ⇒ مساحت = $\Delta x = 5 \times 4 = \mathbf{20\,\text{m}}$. این روش (مساحت زیر $v$-$t$ = جابه‌جایی) برای هر نوع حرکتی کار می‌کنه.

**۳.** $V = \dot V \cdot t = 80 \times 10 = \mathbf{800\,\text{ml}}$.

**۴.** $t = x/v = 1/50 = 0.02\,\text{s} = \mathbf{20\,\text{ms}}$.

</details>

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [حرکت یکنواخت](https://fa.wikipedia.org/wiki/%D8%AD%D8%B1%DA%A9%D8%AA_%DB%8C%DA%A9%D9%86%D9%88%D8%A7%D8%AE%D8%AA)
- Wikipedia EN: [Uniform motion](https://en.wikipedia.org/wiki/Constant_speed)
- HyperPhysics: [Constant velocity motion](http://hyperphysics.phy-astr.gsu.edu/hbase/mot.html)
- Khan Academy: [Constant velocity motion](https://www.khanacademy.org/science/physics/one-dimensional-motion)

### ویدئو (یوتیوب)
- [جست‌وجو: constant velocity Khan Academy](https://www.youtube.com/results?search_query=khan+academy+constant+velocity)
- [Crash Course Physics — Motion graphs](https://www.youtube.com/results?search_query=crash+course+motion+graphs)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: حرکت یکنواخت دوازدهم](https://www.aparat.com/result/%D8%AD%D8%B1%DA%A9%D8%AA_%DB%8C%DA%A9%D9%86%D9%88%D8%A7%D8%AE%D8%AA_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Moving Man](https://phet.colorado.edu/en/simulations/moving-man)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با عمقِ بیشتر](https://physicsme.ir/articles/y12-harekat-yeknavakht/)

---

*در بخشِ بعد می‌ریم سراغِ حالتِ واقعی‌ترِ زندگی: [حرکت با شتاب ثابت و سقوط آزاد](https://physicsme.ir/articles/uniform-acceleration-tajrobi/) — وقتی سرعت یکنواخت تغییر می‌کنه ⬇️.*
