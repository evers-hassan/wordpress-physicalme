---
title: "انرژی جنبشی — انرژیِ حرکت ⚡🏃"
chapter: "فصل ۳ — کار، انرژی و توان (تجربی)"
section: "۳-۱ انرژی جنبشی"
order: 1
slug: "kinetic-energy-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["انرژی جنبشی", "جرم", "سرعت", "تجربی", "لایب نیتس"]
---

# انرژی جنبشی — انرژیِ حرکت ⚡🏃

> یه نکته‌ی شگفت‌انگیز 💭: یه گلوله‌ی ۱۰ گرمی که از سلاحِ شکاری شلیک می‌شه با سرعتِ ۸۰۰ متر بر ثانیه، **انرژی جنبشی ۳۲۰۰ ژولی** داره — تقریباً برابرِ یه آدمِ ۸۰ کیلوگرمی که با ۱۰ m/s می‌دوه! 🤯 چطور یه چیزِ به این کوچیکی همچین انرژی داره؟ جواب تو **یه فرمولِ ساده** ست:

## فرمول و یکا 📌

$$K = \tfrac{1}{2} m v^2$$

- $K$: انرژی جنبشی، یکا = **ژول (J)**
- $m$: جرم، یکا = **kg**
- $v$: سرعت، یکا = **m/s**

> ⚠️ **نکته‌ی طلایی:** سرعت با **توانِ ۲** میاد. یعنی اگه سرعتو **دو برابر** کنی، انرژی **چهار برابر** می‌شه! این چرا مهمه؟ چون توضیح می‌ده چرا تصادفِ ماشین با سرعتِ ۱۰۰ km/h اون‌قدر مرگ‌بارتر از ۵۰ km/h ـه (۴ برابر انرژی).

## شبیه‌ساز — جرم و سرعت رو عوض کن 🎮

<iframe src="/wp-content/physics-content/highschool/10/widgets/kinetic-energy.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="انرژی جنبشی"></iframe>

## یه نکته‌ی تاریخی — جنگِ لایب‌نیتس و دکارت ⚔️

تو قرنِ ۱۷، **رنه دکارت** (فیلسوفِ فرانسوی) ادعا کرد «mv» (جرم × سرعت = تکانه) کمیتِ پایسته‌ی طبیعته. ولی **لایب‌نیتس** آلمانی گفت نه — **mv²** پایسته‌ست (همون انرژیِ جنبشی، با ضریبِ ½). این یه جدالِ علمی-فلسفی شد که چندین دهه طول کشید! 

امروز می‌دونیم **هر دو درست بودن**: هم تکانه پایسته‌ست، هم انرژی. ولی این دو تا چیزِ متفاوت‌ـن. لایب‌نیتس اولین کسی بود که اهمیتِ $\tfrac{1}{2}mv^2$ رو فهمید — اون اینو «نیروی زنده» (vis viva) صدا می‌زد.

## انرژی جنبشی تو زندگیِ تجربی 🩺

- **گلبولِ قرمز در جریانِ آئورت**: $m \approx 30 \times 10^{-12}$ kg، $v \approx 0.4$ m/s → $K \approx 2.4 \times 10^{-12}$ J — کوچیک، ولی تو ۵ لیتر خون این انرژی جمع می‌شه.
- **ضربان قلب**: هر بار انقباض ~۱ ژول کار می‌کنه. روزی ~۸۶,۴۰۰ بار → ~۸۶ کیلوژول کار روزانه!
- **بازویِ ورزشکار حین پرتاب**: ~۲ kg ماهیچه + استخوان با ۱۰ m/s → $K = 100$ J
- **اسپرم در حرکت**: ~۵ × ۱۰⁻¹² kg، v ≈ ۰.۲ mm/s → $K \approx 10^{-19}$ J 🔬

## یه کدِ پایتون — مقایسه‌ی انرژی‌ها 🐍

```python
def kinetic(m, v):
    return 0.5 * m * v**2

samples = [
    ("گلبول قرمز",  3e-11,    4e-1),
    ("اسپرم",       5e-12,    2e-4),
    ("توپ تنیس",    0.058,    50),
    ("گلوله",       0.010,    800),
    ("دونده",       70,       10),
    ("ماشین",       1500,     30),
    ("بوئینگ ۷۴۷",  400_000,  250),
]
print(f"{'مورد':<15} {'جرم (kg)':>10}  {'v (m/s)':>10}  {'K (J)':>15}")
for name, m, v in samples:
    K = kinetic(m, v)
    print(f"{name:<15} {m:>10.2e}  {v:>10.2e}  {K:>15.2e}")
```

اجراش کن و ببین چه تفاوتی بین انرژیِ یه گلبولِ قرمز و یه بوئینگ هست! 🤯

---

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [انرژی جنبشی](https://fa.wikipedia.org/wiki/%D8%A7%D9%86%D8%B1%DA%98%DB%8C_%D8%AC%D9%86%D8%A8%D8%B4%DB%8C)
- Wikipedia EN: [Kinetic energy](https://en.wikipedia.org/wiki/Kinetic_energy)، [Vis viva](https://en.wikipedia.org/wiki/Vis_viva) (داستانِ لایب‌نیتس)
- [HyperPhysics — Kinetic energy](http://hyperphysics.phy-astr.gsu.edu/hbase/ke.html)
- Khan Academy: [Kinetic energy](https://www.khanacademy.org/science/physics/work-and-energy/work-and-energy-tutorial/v/introduction-to-work-and-energy)

### ویدئو (یوتیوب)
- Veritasium: [The energy fluctuation that creates everything](https://www.youtube.com/results?search_query=veritasium+kinetic+energy)
- 3Blue1Brown: [What is kinetic energy?](https://www.youtube.com/results?search_query=3blue1brown+kinetic+energy)
- TED-Ed: [The science of car crashes](https://www.youtube.com/results?search_query=ted+ed+car+crash+physics)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: انرژی جنبشی فیزیک دهم](https://www.aparat.com/result/%D8%A7%D9%86%D8%B1%DA%98%DB%8C_%D8%AC%D9%86%D8%A8%D8%B4%DB%8C_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%87%D9%85)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با مثال‌های ریاضیِ بیشتر](https://physicsme.ir/articles/energy-jonbeshi/)

---

*تو زیرفصل بعد، **کار** — یعنی چطوری انرژی از یه جسم به جسمِ دیگه منتقل می‌شه 💪.*
