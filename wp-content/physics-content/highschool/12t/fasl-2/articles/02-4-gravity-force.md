---
title: "نیروی گرانش — از سیب نیوتون تا فضانوردی 🌍🍎"
chapter: "فصل ۲ — دینامیک (تجربی)"
section: "۲-۴ نیروی گرانش"
order: 4
slug: "gravity-force-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۸ دقیقه"
keywords: ["گرانش", "نیوتون", "G", "ماهواره", "فضانوردی", "استئوپروز", "تجربی"]
branches: ["مکانیک"]
---

# نیروی گرانش — از سیب نیوتون تا فضانوردی 🌍

> یه واقعیتِ شگفت‌انگیز 🚀: یه فضانوردِ ۶ ماه روی ایستگاهِ فضایی، حدودِ ۱۰٪ از تراکمِ استخوانش رو از دست می‌ده — همون مقدار که یه آدمِ سالخورده در ۵ تا ۱۰ سال از دست می‌ده. این یعنی **استخوان‌های تو نه به‌خاطر کلسیم، که به‌خاطر گرانش پاینده‌ن**. این فصل، الفبای اون قانونیه که سیب رو روی سرِ نیوتون انداخت.

## قانون جذب عمومی نیوتون 🌌

دو جسم به جرم‌های $m_1$ و $m_2$ و فاصله‌ی $r$ همدیگه رو با نیرویی جذب می‌کنن:

$$
\boxed{\,F = G\,\frac{m_1 m_2}{r^2}\,}
$$

ثابت گرانشی: $G = 6.67 \times 10^{-11}\,\text{N}\cdot\text{m}^2/\text{kg}^2$

نکته‌ی مهم: این نیرو **به جرمِ هر دو** بستگی داره، **همیشه جاذبه** ست، و **با عکسِ مجذورِ فاصله** کم می‌شه.

## شتاب گرانشی $g$ روی سطح زمین

روی سطح زمین، با جرمِ زمین $M_\oplus$ و شعاع $R_\oplus$:

$$
g = \frac{GM_\oplus}{R_\oplus^2} \approx 9.8\,\text{m/s}^2
$$

این بدان معناست که هر جسمِ ۱ کیلوگرمی، روی سطحِ زمین وزنی برابر ۹.۸ نیوتون داره.

## $g$ در ارتفاع و سیاراتِ مختلف 🪐

| محل | $g$ (m/s²) | وزنِ ۷۰ کیلوگرمی |
|---|---|---|
| سطح زمین | 9.8 | 686 N |
| قله‌ی اورست (h=8.8 km) | 9.77 | 684 N |
| ISS (h≈400 km) | 8.7 | 609 N (ولی **بی‌وزنی!** — چون مدارگرده) |
| ماه | 1.62 | 113 N |
| مریخ | 3.71 | 260 N |
| مشتری | 24.8 | 1736 N |

**نکته‌ی مهم**: فضانوردِ ISS واقعاً بی‌وزن نیست — همینش هم گرانشِ زمین داره. ولی چون داره با شتابِ $g$ سقوط می‌کنه، **سقوطِ آزاد** ‌ـه (مدار = سقوطِ بی‌انتها).

## مدارِ ماهواره 🛰️

برای ماهواره‌ای که در مدارِ دایره‌ای می‌چرخه، نیرویِ گرانش = نیرویِ مرکزگرا:

$$
\frac{GMm}{r^2} = \frac{mv^2}{r} \;\Rightarrow\; v = \sqrt{\frac{GM}{r}}
$$

برای ISS در ارتفاعِ ۴۰۰ km → $v \approx 7.7\,\text{km/s}$.

<iframe src="/wp-content/physics-content/highschool/12/fasl-2/widgets/gravity-orbital.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="گرانش و مدار ماهواره"></iframe>

## وزنِ ظاهری در آسانسور 🛗

اگه تو آسانسوری هستی که با شتابِ $a$ به بالا حرکت می‌کنه، وزنِ ظاهری (نیرویِ سطح کفِ آسانسور به بدن):

$$
N = m(g + a)
$$

- آسانسور با $a = 2\,\text{m/s}^2$ بالا → ۲۰٪ سنگین‌تر
- آسانسور سقوطِ آزاد ($a = -g$) → $N = 0$ (بی‌وزنیِ ظاهری!)

## محاسبه با پایتون 🐍

```python
# فضانوردی و کاهشِ تراکمِ استخوان
# یه فضانوردِ 70 کیلوگرمی به مدتِ 6 ماه روی ISS

import numpy as np

# داده‌های تجربی NASA
days = np.array([0, 30, 60, 90, 120, 150, 180])
bone_loss_pct = np.array([0, 1.5, 3.2, 5.1, 7.0, 8.6, 10.2])

# مدلِ تقریباً خطی: ~1.5% در ماه
print("از دست رفتنِ استخوان در فضانوردی:")
print(f"{'روز':>5s}  {'ازدست‌رفته (%)':>15s}  {'معادلِ سال‌های سالخوردگی':>30s}")
for d, loss in zip(days, bone_loss_pct):
    # یه آدمِ سالم در سن > 50 سال حدود 1٪ در سال
    aging_years = loss / 1.0
    print(f"{d:>5d}  {loss:>15.1f}  {aging_years:>30.1f}")

# نکته‌ی پزشکی:
# نقشِ گرانش در حفظِ استخوان از طریقِ Mechanostat:
# سلول‌های استخوانی به فشار حساسن. بدون فشار، تخریب
# بیشتر از ساخت می‌شه. همینه چرا تمرین‌های وزنه برای
# سالمندان توصیه می‌شه - گرانش رو "شبیه‌سازی" می‌کنن.
```

## نکته‌ی پزشکی-زیستی 🩺

- **استئوپروز فضایی**: ۱.۵٪ از دست رفتنِ استخوان در ماه → داروی Denosumab و تمرینِ مقاومتی روی ISS
- **مایعِ بدن**: بدونِ گرانش، مایع به سمت سر می‌ره → "moon face" در فضانوردان
- **فشارِ خون**: بدنِ زمینی برای فشارِ هیدرواستاتیک طراحی شده. بدونِ گرانش، باروسپتورها گیج می‌شن
- **عضله**: ۲۰-۳۰٪ کاهشِ حجمِ عضلانی در ۶ ماه (مخصوصاً ساق و چهارسر)
- **سیستمِ دهلیزی** (تعادل): بدونِ گرانش، **اتولیت‌ها** سیگنال‌های نادرست می‌فرستن → بیماریِ حرکت

## خودتو بسنج 📝

1. اگه دو نفرِ ۷۰ kg با فاصله‌ی ۱ متر بایستن، نیروی گرانش بینشون چقدره؟ آیا حسش می‌کنن؟
2. روی ماه ($g_\text{ماه} = 1.62\,\text{m/s}^2$) چقدر می‌تونی نسبت به زمین بپری؟
3. اگر فضانوردی روی سطحِ ماه ۱۰۰ نیوتون وزن داشته باشه، جرمش چقدره و وزنش روی زمین چقدره؟

<details>
<summary>✅ پاسخ‌ها (اول خودت فکر کن، بعد باز کن)</summary>

**۱.** $F = G m_1 m_2 / r^2 = 6.67\times 10^{-11} \times 70 \times 70 / 1^2 \approx \mathbf{3.3\times 10^{-7}\,\text{N}}$. در مقایسه با وزن (~۷۰۰ N)، حدودِ **دو میلیارد بار کوچک‌تر** — حسگرهای بدن غیرقابلِ تشخیصش هستن.

**۲.** برای پرشِ به ارتفاعِ $h$ نیاز به سرعتِ اولیه‌ی $v = \sqrt{2gh}$ داری. اگه با همان $v$ روی ماه بپری، $h_\text{ماه} = v^2/(2g_\text{ماه}) = h_\text{زمین} \times g_\text{زمین}/g_\text{ماه} = h_\text{زمین} \times 9.8/1.62 \approx \mathbf{6 \text{ برابر}}$. روی زمین ۵۰ cm بپری ⇒ روی ماه ۳ متر!

**۳.** جرم: $m = W_\text{ماه}/g_\text{ماه} = 100/1.62 \approx \mathbf{62\,\text{kg}}$. وزن روی زمین: $W_\text{زمین} = mg_\text{زمین} = 62 \times 9.8 \approx \mathbf{608\,\text{N}}$ (~۶ برابر وزنِ ماهی).

</details>

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [گرانش](https://fa.wikipedia.org/wiki/%DA%AF%D8%B1%D8%A7%D9%86%D8%B4)
- Wikipedia EN: [Newton's law of universal gravitation](https://en.wikipedia.org/wiki/Newton%27s_law_of_universal_gravitation)
- Wikipedia EN: [Spaceflight osteopenia](https://en.wikipedia.org/wiki/Spaceflight_osteopenia)
- HyperPhysics: [Gravity](http://hyperphysics.phy-astr.gsu.edu/hbase/grav.html)
- NASA: [Microgravity bone loss research](https://www.nasa.gov/missions/station/iss-research/space-bone-loss)

### ویدئو (یوتیوب)
- [Veritasium — Why is gravity not a force?](https://www.youtube.com/results?search_query=veritasium+gravity)
- [SciShow Space — Bone loss in space](https://www.youtube.com/results?search_query=scishow+space+bone+loss)
- [Crash Course Astronomy — Gravity](https://www.youtube.com/results?search_query=crash+course+astronomy+gravity)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: گرانش دوازدهم](https://www.aparat.com/result/%DA%AF%D8%B1%D8%A7%D9%86%D8%B4_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: قانون جذب عمومی](https://www.aparat.com/result/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D8%AC%D8%B0%D8%A8_%D8%B9%D9%85%D9%88%D9%85%DB%8C)

### شبیه‌سازی PhET
- [Gravity and Orbits](https://phet.colorado.edu/en/simulations/gravity-and-orbits)
- [Gravity Force Lab](https://phet.colorado.edu/en/simulations/gravity-force-lab)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با عمقِ بیشتر](https://physicsme.ir/articles/y12-niroye-geravesh/)

---

*فصلِ ۲ تموم شد! حالا بریم تمرین — [مسائل فصل ۲](https://physicsme.ir/articles/problems-chapter-2-y12-tajrobi/) و [فلش‌کارت](https://physicsme.ir/articles/flashcards-chapter-2-y12-tajrobi/) 📝.*
