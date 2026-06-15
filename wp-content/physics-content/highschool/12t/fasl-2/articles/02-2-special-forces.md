---
title: "نیروهای خاص — وزن، عمودی سطح، اصطکاک، کشش و فنر 🪢"
chapter: "فصل ۲ — دینامیک (تجربی)"
section: "۲-۲ معرفی نیروهای خاص"
order: 2
slug: "special-forces-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۹ دقیقه"
keywords: ["وزن", "نیروی عمودی سطح", "اصطکاک", "کشش", "فنر", "تجربی"]
branches: ["مکانیک"]
---

# نیروهای خاص — وزن، عمودی سطح، اصطکاک، کشش و فنر 🪢

> یه تجربه‌ی روزمره 🦴: وقتی روی یه صندلیِ خشک نشستی، **حدودِ ۸۰٪ وزنت** رو صندلی روی استخوانِ نشیمنگاهت برمی‌گردونه. این نیروی برگشتیِ صندلی، همون «نیرویِ عمودی سطح»‌ـه. توی این فصل، چهار-پنج نیروی پایه‌ای که توی هر مسئله‌ی دینامیک دیده می‌شن رو می‌بینیم.

## ۱. وزن ($W$) ⬇️

نیرویِ جاذبه‌ی زمین بر جسم:

$$
W = mg
$$

برای جرمِ ۷۰ kg → $W = 686\,\text{N}$ (روی زمین).

> 🩺 **پزشکی**: تختِ بیمار سالخورده طوری طراحی می‌شه که فشارِ موضعیِ وزن روی جای خاصی متمرکز نشه — وگرنه زخمِ بستر (decubitus ulcer) ایجاد می‌شه.

## ۲. نیرویِ عمودیِ سطح ($N$) 📐

نیرویی که سطح به جسم می‌زنه، **عمود بر سطحه**. روی سطحِ افقی $N = mg$، روی سطحِ شیبدار به زاویه‌ی $\theta$:

$$
N = mg\cos\theta
$$

## ۳. اصطکاک ($f$) 🛑

نیرویی که در جهت **مخالفِ حرکت** (یا میلِ به حرکت) عمل می‌کنه. دو نوع:

- **اصطکاکِ ایستایی** ($f_s$): تا وقتی شروع به حرکت نکرده، $f_s \le \mu_s N$
- **اصطکاکِ جنبشی** ($f_k$): وقتی حرکت می‌کنه، $f_k = \mu_k N$

$\mu$ (ضریبِ اصطکاک) به جنسِ سطح‌ها بستگی داره و معمولاً $\mu_s > \mu_k$.

| سطح | $\mu_s$ تقریبی |
|---|---|
| لاستیک روی آسفالتِ خشک | 0.7 |
| لاستیک روی آسفالتِ خیس | 0.5 |
| لاستیک روی یخ | 0.1 |
| فولاد روی فولاد | 0.5 |
| **مفصلِ زانوی سالم** | **0.005** (!) |
| مفصلِ زانوی آرتروزی | 0.02-0.05 |

> 🦵 **نکته‌ی شگفت**: مایعِ سینوویال در مفصل، اصطکاک رو به‌قدری کم می‌کنه که از یخ هم لغزنده‌تره! آرتروز یعنی همین مایع کم می‌شه و درد می‌گیره.

## ۴. کشش طناب ($T$) 🧵

نیرویی که از طریقِ نخ، طناب یا سیم منتقل می‌شه. در طنابِ بی‌جرم و بدونِ اصطکاک، **کشش در طولِ طناب ثابته**.

> 🏥 **در پزشکی**: کشش‌های ارتوپدی برای ترمیمِ شکستگی، یا نخ بخیه روی پوست، یا کابلِ شنیداری در فاکتورِ کاشتِ حلزون.

## ۵. نیرویِ فنر ($F_s$) 🪀 — قانون هوک

اگر فنری به اندازه‌ی $x$ از حالت تعادل کشیده یا فشرده شود:

$$
F_s = -k\,x
$$

که $k$ ثابتِ فنر $\text{(N/m)}$ و علامتِ منفی نشون می‌ده نیرو **بازگرداننده** ست (به سمتِ تعادل).

> 🫁 **ریه به‌مثلِ فنر**: حجمِ ریه با تفاوتِ فشار رابطه‌ی تقریباً خطی داره (Compliance). در فیبروزِ ریوی، compliance کم می‌شه — یعنی $k$ بالاتر می‌ره و تنفس سخت‌تر.

## دیاگرامِ آزاد در عمل 🎬

برای هر مسئله، این مراحل:
1. **جسم رو جدا کن** از محیط
2. **همه‌ی نیروها** رو رسم کن (وزن، عمودی، اصطکاک، کشش، فنر، نیرویِ اعمالی)
3. **سیستمِ مختصات** انتخاب کن (افقی-عمودی، یا روی شیب)
4. **F = ma** رو در هر محور بنویس

<iframe src="/wp-content/physics-content/highschool/12/fasl-2/widgets/free-body-diagram.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="دیاگرام جسم آزاد تعاملی"></iframe>

## مثال — راه رفتن روی یخ ❄️

با ضریبِ اصطکاکِ $\mu_s \approx 0.1$، حداکثر شتابی که بدون لیز خوردن می‌تونی بگیری:

$$
a_\text{max} = \mu_s g = 0.1 \times 9.8 \approx 1\,\text{m/s}^2
$$

روی آسفالتِ خشک ($\mu_s \approx 0.7$): $a_\text{max} \approx 7\,\text{m/s}^2$. هفت برابر! همینه چرا روی یخ راه رفتن سخته.

## محاسبه با پایتون 🐍

```python
# آرتروزِ زانو در برابر مفصل سالم
# اصطکاک در مفصل = ضریب × نیرویِ فشاری
# نیرویِ فشاری روی زانو هنگامِ بالا رفتن از پله ≈ 3 برابر وزن

import numpy as np

m = 70             # kg
g = 9.8
W = m * g          # نیویوتن — وزن

# نیرویِ فشار روی زانو هنگام بالا رفتن از پله
F_compress = 3 * W
print(f"نیرویِ فشار روی زانو: {F_compress:.0f} N")

# اصطکاک مفصل
states = {
    "مفصلِ سالم":      0.005,
    "آرتروزِ خفیف":   0.02,
    "آرتروزِ شدید":    0.05,
}

print()
print(f"{'وضعیت':25s}  {'μ':>6s}  {'اصطکاک (N)':>12s}  {'انرژیِ هدر در ۱ متر (J)':>25s}")
for name, mu in states.items():
    f = mu * F_compress
    E = f * 1.0   # 1 متر حرکتِ مفصل
    print(f"{name:25s}  {mu:6.3f}  {f:12.1f}  {E:25.1f}")

# نکته‌ی پزشکی:
# اصطکاکِ مفصلِ سالم ~1 N — کمتر از نیرویِ صابون روی شیشه!
# اصطکاکِ مفصلِ آرتروزی ~10 N — همینه دلیلِ درد و التهاب.
```

## نکته‌ی پزشکی-زیستی 🩺

- **زخمِ بستر**: فشارِ موضعیِ وزن > ۳۲ mmHg به‌مدتِ بیش از ۲ ساعت → نکروزِ بافتی
- **آرتروز**: $\mu$ مفصلی از 0.005 به 0.05 می‌رسه — ۱۰ برابر اصطکاک
- **فیبروز ریوی**: compliance (شبیه به $1/k$) کم می‌شه → کارِ تنفسی بالا
- **کشش ارتوپدی** (Skeletal traction): نیرویِ مداوم ۳-۱۰ kg برای ترمیمِ استخوان
- **پاکتِ تستِ ادرار**: فنرِ ضعیف داخل تستِ بارداری دیجیتال — قانون هوک در مقیاسِ μm

## خودتو بسنج 📝

با ویجتِ FBD، یه جسم رو روی شیبِ ۳۰° با $\mu_k = 0.2$ بذار. آیا می‌لغزد؟ ($\tan 30° \approx 0.58 > 0.2$ → بله می‌لغزد.)

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [اصطکاک](https://fa.wikipedia.org/wiki/%D8%A7%D8%B5%D8%B7%DA%A9%D8%A7%DA%A9)
- Wikipedia EN: [Friction](https://en.wikipedia.org/wiki/Friction)
- Wikipedia EN: [Hooke's law](https://en.wikipedia.org/wiki/Hooke%27s_law)
- HyperPhysics: [Friction](http://hyperphysics.phy-astr.gsu.edu/hbase/frict.html)
- Khan Academy: [Friction and inclined planes](https://www.khanacademy.org/science/physics/forces-newtons-laws/inclined-planes-friction)
- BoneBio: [Synovial joint friction](https://www.ncbi.nlm.nih.gov/pmc/articles/PMC2837611/)

### ویدئو (یوتیوب)
- [Veritasium — Why is friction independent of area?](https://www.youtube.com/results?search_query=veritasium+friction)
- [Crash Course Physics — Friction](https://www.youtube.com/results?search_query=crash+course+friction)
- [The Action Lab — Spring physics](https://www.youtube.com/results?search_query=action+lab+spring+hooke)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: اصطکاک فیزیک دوازدهم](https://www.aparat.com/result/%D8%A7%D8%B5%D8%B7%DA%A9%D8%A7%DA%A9_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: قانون هوک](https://www.aparat.com/result/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D9%87%D9%88%DA%A9)

### شبیه‌سازی PhET
- [Forces and Motion: Basics](https://phet.colorado.edu/en/simulations/forces-and-motion-basics)
- [Friction](https://phet.colorado.edu/en/simulations/friction)
- [Masses and Springs](https://phet.colorado.edu/en/simulations/masses-and-springs)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک — نیروهای خاص](https://physicsme.ir/articles/y12-niroohaye-khas/)
- [نسخه‌ی ریاضی-فیزیک — اصطکاک](https://physicsme.ir/articles/y12-esteshkak/)

---

*در بخشِ بعد می‌ریم سراغ تکانه — [قانون دومِ نیوتون به‌زبانِ تکانه](https://physicsme.ir/articles/momentum-newton2-tajrobi/) و چرا کیسه‌ی هوا کار می‌کنه 💥.*
