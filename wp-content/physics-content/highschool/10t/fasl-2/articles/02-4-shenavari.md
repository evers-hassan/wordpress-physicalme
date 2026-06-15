---
title: "شناوری و اصلِ ارشمیدس — رازِ شناورِ کشتی + اندازه‌گیریِ چربی بدن 🚢"
chapter: "فصل ۲ — ویژگی‌های فیزیکی مواد (تجربی)"
section: "۲-۴ شناوری"
order: 4
slug: "buoyancy-archimedes-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["شناوری", "اصل ارشمیدس", "چربی بدن", "تستِ هیدرواستاتیک", "تجربی"]
---

# شناوری و اصلِ ارشمیدس — رازِ شناورِ کشتی + اندازه‌گیریِ چربی بدن 🚢

> یه چیزِ غیرمعقول 💭: یه میخِ کوچیکِ فلزی ته آب می‌ره، ولی یه کشتیِ فولادی ۱۰۰ هزار تنی روی آب شناوره! 🤯 چطور ممکنه؟ این رو ارشمیدس بیش از ۲۰۰۰ سال پیش تو وانِ حمام (و با فریادِ مشهورِ «**اوریکا!**» 🛁🏃‍♂️) فهمید.

## اصلِ ارشمیدس — به این سادگی 📌

> **هر جسمی که در شاره فرو می‌ره، نیرویی به سمتِ بالا تجربه می‌کنه که برابرِ وزنِ شاره‌ی جابه‌جا شده‌ست.**

ریاضیاتش:

$$F_b = \rho_{\text{شاره}} \cdot g \cdot V_{\text{جابه‌جا}}$$

از کجا میاد؟ از همون فشار در شاره! فشار **زیرِ** جسم بزرگ‌تر از فشار **بالایِ** جسمه (چون عمیق‌تره)، در نتیجه یه نیروی خالصِ رو به بالا داریم.

## شبیه‌ساز ارشمیدس — جنسِ جسم و شاره رو عوض کن 🎮

<iframe src="/wp-content/physics-content/highschool/10/widgets/archimedes-buoyancy.html" width="100%" height="700" style="border:none; border-radius:12px;" loading="lazy" title="اصل ارشمیدس"></iframe>

## شناور، غرق، یا غوطه‌ور — کدوم؟ ⚖️

برای هر جسم تو شاره:
- اگه $\rho_{\text{جسم}} < \rho_{\text{شاره}}$ → 🟢 **شناوره**
- اگه $\rho_{\text{جسم}} > \rho_{\text{شاره}}$ → 🔴 **غرق می‌شه**
- اگه برابرن → 🔵 **غوطه‌وره** (تو همون عمق ساکن می‌مونه)

## کشتی چرا شناوره؟ 🚢

چون **چگالیِ کلیِ کشتی** (فولاد + هوای داخلش) از آب کمتره. فولادِ خالص چگالی ۷۸۷۰ kg/m³ داره، ولی وقتی یه قسمتِ بزرگش هواست، چگالیِ متوسطش ممکنه ۲۰۰ kg/m³ بشه — کمتر از آب!

**آزمایشِ خانگی:** یه ورقِ آلومینیومی رو به شکلِ قایق صاف بنداز رو آب → شناوره. حالا همون ورقو مچاله کن → غرق می‌شه! 😮 جرم همونه، فقط چگالی عوض شد.

## کاربردِ تجربی: اندازه‌گیریِ چربیِ بدن 🏊‍♂️

تو **تستِ هیدرواِستاتیک (Hydrostatic Weighing)**، آدم رو زیرِ آب وزن می‌کنن. چربی چگالی **پایین‌تر** از عضله داره. پس نسبتِ وزنِ خشک به وزنِ زیرِ آبی، درصدِ چربیِ بدن رو می‌ده!

این روش (تا چند سال پیش) **استانداردِ طلایی** برای اندازه‌گیریِ چربیِ بدن بود. الان ابزارهای مدرن‌تری مثلِ DEXA scan هم هست، ولی اصلِ علمی همونه.

## مثال‌های پزشکی-زیستی دیگر 🩺

- **توالی‌سازیِ یاخته‌ها در سانتریفیوژ** → جدا کردنِ سلول‌ها بر اساس چگالی
- **اولتراساند** → بازتاب موج صوت در محل تغییرِ چگالی بافت
- **رادیولوژیِ هوای داخل ریه** → چون چگالی هوا خیلی کمه، روی CT تیره می‌شه
- **ادمها (تورمِ بافتی)** → آب اضافی در بافت چگالی محل رو افزایش می‌ده

## جرمِ ظاهری در آب 🌊

اگه یه جسمو کاملاً تو آب فرو کنی، جرمِ ظاهریش (که با نیروسنج اندازه می‌گیری) از جرمِ واقعیش **کمتر**ـه — به مقدار جرمِ آبِ جابه‌جا شده:

$$W_{\text{ظاهری}} = W_{\text{واقعی}} - F_b$$

این دقیقاً همون چیزیه که آدمِ شناگر رو سبک‌تر می‌کنه. اگه چگالیِ بدنت ≈ ۹۸۰ kg/m³ باشه (کمی کمتر از آب)، تو آب وزنِ ظاهریت ~۲٪ از وزنِ خشکته!

## یه کدِ پایتون — تستِ شناوری 🐍

```python
# آیا این جسم تو آب شناوره؟
def test_buoyancy(rho_object, rho_fluid=1000):
    if rho_object < rho_fluid:
        depth = rho_object / rho_fluid * 100
        return f"🟢 شناوره — {depth:.0f}٪ زیر سطح آب"
    elif abs(rho_object - rho_fluid) < 1:
        return "🔵 غوطه‌وره"
    else:
        return f"🔴 غرق می‌شه — چگالی {rho_object/rho_fluid:.1f}× آب"

samples = {
    "یخ":            920,
    "چوبِ کاج":      700,
    "بدنِ انسان":   1010,
    "خون":          1060,
    "آهن":          7870,
    "هلیوم":         0.18,  # تو هوا (نه آب)
}
for name, rho in samples.items():
    print(f"{name:15} {test_buoyancy(rho)}")
```

---

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [اصل ارشمیدس](https://fa.wikipedia.org/wiki/%D8%A7%D8%B5%D9%84_%D8%A7%D8%B1%D8%B4%D9%85%DB%8C%D8%AF%D8%B3)، [نیروی شناوری](https://fa.wikipedia.org/wiki/%D8%B4%D9%86%D8%A7%D9%88%D8%B1%DB%8C)
- Wikipedia EN: [Archimedes principle](https://en.wikipedia.org/wiki/Archimedes%27_principle)، [Hydrostatic weighing](https://en.wikipedia.org/wiki/Hydrostatic_weighing)، [Buoyancy](https://en.wikipedia.org/wiki/Buoyancy)
- [HyperPhysics — Buoyancy](http://hyperphysics.phy-astr.gsu.edu/hbase/pbuoy.html)
- Khan Academy: [Buoyant force and Archimedes principle](https://www.khanacademy.org/science/physics/fluids/buoyant-force-and-archimedes-principle)

### ویدئو (یوتیوب)
- Veritasium: [Why ships float](https://www.youtube.com/results?search_query=veritasium+ships+float)
- MIT OCW: [Walter Lewin — Buoyancy](https://www.youtube.com/results?search_query=walter+lewin+buoyancy)
- TED-Ed: [The strange physics of submarines](https://www.youtube.com/results?search_query=ted+ed+submarine+buoyancy)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: اصل ارشمیدس فیزیک دهم](https://www.aparat.com/result/%D8%A7%D8%B5%D9%84_%D8%A7%D8%B1%D8%B4%D9%85%DB%8C%D8%AF%D8%B3_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%87%D9%85)
- [جست‌وجو: شناوری فیزیک](https://www.aparat.com/result/%D8%B4%D9%86%D8%A7%D9%88%D8%B1%DB%8C_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9)

### شبیه‌ساز خارجی
- [PhET — Buoyancy](https://phet.colorado.edu/en/simulations/buoyancy)
- [PhET — Density](https://phet.colorado.edu/fa/simulations/density)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با اثباتِ ریاضیِ ارشمیدس و مسائلِ بیشتر](https://physicsme.ir/articles/shenavari-archimedes/)

---

*تو زیرفصلِ بعد، اصلِ برنولی — جریانِ شاره و چرا فشار با سرعت کم می‌شه 🌬️.*
