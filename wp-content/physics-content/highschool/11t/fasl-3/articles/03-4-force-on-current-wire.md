---
title: "نیروی مغناطیسی بر سیمِ حاملِ جریان — موتورِ الکتریکی متولد می‌شود ⚙️"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۴ نیروی مغناطیسی بر سیم حامل جریان"
order: 4
slug: "force-on-current-wire-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۵ دقیقه"
keywords: ["موتور", "نیرو بر سیم", "F=BIL", "پمپ خون", "ونتیلاتور"]
---

# نیروی مغناطیسی بر سیمِ حاملِ جریان — موتورِ الکتریکی متولد می‌شود ⚙️

> یه واقعیت 🩺: ونتیلاتورِ بیمارستان، پمپِ سرم، دستگاهِ همودیالیز، حتی پمپِ مصنوعیِ قلب — همه با **موتورِ DC** کار می‌کنن. قلبِ موتور، همین قانونِ ساده‌ی نیرو بر سیمه. این بخش، رازِ موتور رو فاش می‌کنه.

## نیرو بر سیم 📐

اگه یه سیم با طولِ $L$ و حاملِ جریانِ $I$ در میدان $\vec{B}$ قرار بگیره:

$$F = B \, I \, L \, \sin\theta$$

- $\theta$: زاویه‌ی بینِ سیم و میدان
- **جهت**: با قاعده‌ی دستِ راست — انگشتان در جهت جریان، خم به طرف $\vec{B}$ → شست نشانگر $\vec{F}$

## حالتِ خاص: سیم عمود بر میدان 🎯

اگه $\theta = 90°$:

$$F = B \, I \, L$$

نیرو **بیشینه** و عمود بر هم سیم و هم میدانه.

## موتور DC — یه حلقه که می‌چرخه ⚙️

ساده‌ترین موتور: یه **حلقه‌ی سیمِ مستطیلی** در میدانِ مغناطیسی. وقتی جریان از حلقه عبور می‌کنه:
- دو ضلعِ موازی با محورِ چرخش، نیروهای **مخالف** می‌گیرن
- این جفت‌نیرو، یه **گشتاور** می‌سازه که حلقه رو می‌چرخونه
- یه **کموتاتور** جهتِ جریان رو در هر نیم‌دور عوض می‌کنه تا چرخش ادامه پیدا کنه

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/wire-in-field.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="سیم در میدان مغناطیسی"></iframe>

<iframe src="/wp-content/physics-content/highschool/11/widgets/dc-motor.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="موتور DC"></iframe>

## محاسبه‌ی پایتون — موتورِ پمپِ پزشکی 🐍

```python
# پمپ سرم ساده با موتور DC
# مشخصات معمولی پمپِ تزریق:
# میدان B = 0.5 T، جریان I = 0.3 A، طول سیم در میدان L = 5 cm
# تعداد دور سیم‌پیچ N = 100

import math

B = 0.5     # تسلا
I = 0.3     # آمپر
L = 0.05    # متر
N = 100     # تعداد دور

# نیرو روی یک ضلع از یک دور
F_one_side = B * I * L
print(f"نیرو روی یک ضلع: {F_one_side*1000:.1f} mN")

# گشتاور (با شعاع 2.5 cm)
r = 0.025
torque_per_loop = 2 * F_one_side * r   # دو ضلع
torque_total = N * torque_per_loop
print(f"گشتاور کل: {torque_total*1000:.2f} mN·m")

# اگه موتور با 300 rpm بچرخه
rpm = 300
omega = 2 * math.pi * rpm / 60
P = torque_total * omega
print(f"توان مکانیکی: {P*1000:.1f} mW")

# پمپ سرم با این توان می‌تونه 100 ml/h رو پمپ کنه
# (بسته به مقاومت لوله و فشار خون)
```

## نکته‌ی پزشکی-زیستی 🩺

- **ونتیلاتور** — موتور DC که دیافراگم مصنوعی رو حرکت می‌ده
- **پمپِ تزریقِ سرم** — موتور DC با پیچِ بسیار دقیق برای تنظیم نرخِ جریان
- **همودیالیز** — پمپ خون با موتور DC بزرگ
- **پمپِ مصنوعیِ قلب (LVAD)** — موتور DC کوچک کاشتنی که خون رو پمپ می‌کنه و جانِ بیمارانِ نارساییِ قلبی رو نجات می‌ده
- **ربات‌های جراحی (داوینچی)** — صدها موتور DC کوچک برای حرکات دقیق
- **MRI gradient coils** — سیم‌های حاملِ جریان در میدانِ MRI نیروی **بزرگ** دریافت می‌کنن — به همین دلیل صدای کوبشِ MRI شنیده می‌شه (سیم‌ها تکون می‌خورن)

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/wire-force-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش نیرو بر سیم"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [موتور الکتریکی](https://fa.wikipedia.org/wiki/%D9%85%D9%88%D8%AA%D9%88%D8%B1_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)
- Wikipedia EN: [Lorentz force on current](https://en.wikipedia.org/wiki/Lorentz_force#Force_on_a_current-carrying_wire)، [DC motor](https://en.wikipedia.org/wiki/DC_motor)
- HyperPhysics: [Force on wire](http://hyperphysics.phy-astr.gsu.edu/hbase/magnetic/forwir2.html)

### ویدئو (یوتیوب)
- [Veritasium — How Motors Work](https://www.youtube.com/results?search_query=veritasium+motor+work)
- [Practical Engineering — DC Motors](https://www.youtube.com/results?search_query=practical+engineering+motor)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: موتور DC فیزیک](https://www.aparat.com/result/%D9%85%D9%88%D8%AA%D9%88%D8%B1_DC_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9)
- [جست‌وجو: نیرو بر سیم](https://www.aparat.com/result/%D9%86%DB%8C%D8%B1%D9%88_%D8%A8%D8%B1_%D8%B3%DB%8C%D9%85)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/force-on-current-wire/)

---

*در بخش بعدی، می‌بینیم خودِ جریان هم می‌تونه میدانِ مغناطیسی **بسازه** — [میدان از جریان](https://physicsme.ir/articles/magnetic-field-from-current-tajrobi/) 🔄.*
