---
title: "قوانین نیوتون — سه جمله که دنیا رو توضیح می‌دن 📐⚖️"
chapter: "فصل ۲ — دینامیک (تجربی)"
section: "۲-۱ قوانین نیوتون"
order: 1
slug: "newton-laws-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۱۰ دقیقه"
keywords: ["نیوتون", "اینرسی", "F=ma", "عمل و عکس‌العمل", "تجربی"]
branches: ["مکانیک"]
---

# قوانین نیوتون — سه جمله که دنیا رو توضیح می‌دن 📐

> یه تجربه‌ی روزمره 🚌: تو اتوبوس ایستادی، اتوبوس ناگهان ترمز می‌کنه. تو **به جلو پرت می‌شی**. چرا؟ بدنِ تو می‌خواد سرعتِ قبلی‌ش رو حفظ کنه (قانون اول). همین که بدن چنین تمایلی داره، خیلی چیزها رو از پزشکی‌ـه ورزشی تا طراحی صندلی ICU توضیح می‌ده.

## قانون اول — قانون اینرسی 🧱

> «هر جسمی به حالت سکون یا حرکتِ یکنواخت روی خطِ راست خود ادامه می‌ده، مگر اینکه نیرویِ خالصِ وارد بر آن صفر نباشد.»

این یعنی **نیرو علتِ تغییرِ سرعت** ‌ـه، نه علتِ خودِ حرکت. اگه هیچ نیرویی وارد نشه، جسم سرعتشو همان‌طور نگه می‌داره.

> 🩺 **تو پزشکی**: در whiplash (تصادفِ از پشت)، سرِ بیمار به‌خاطرِ اینرسی، ابتدا در محلِ اولش می‌مونه و گردنش می‌چرخه — این بنیادِ آسیبِ گردنه.

## قانون دوم — F = ma 🎯

> «شتابِ یک جسم، با نیرویِ خالصِ وارد بر آن متناسب و با جرمش معکوس است.»

$$
\boxed{\,\vec{F}_\text{خالص} = m\vec{a}\,}
$$

این مشهورترین فرمولِ فیزیکه. می‌گه:
- نیرویِ بیشتر → شتاب بیشتر
- جرمِ بیشتر → شتاب کمتر (برای همان نیرو)

**یکای نیرو**: نیوتون ($\text{N}$). یک نیوتون نیرویی‌ـه که به جرمِ ۱ کیلوگرم شتابِ ۱ m/s² می‌ده.

## قانون سوم — عمل و عکس‌العمل 🤝

> «اگر جسمِ A نیرویی به جسمِ B وارد کنه، جسم B هم نیرویی هم‌اندازه و در جهتِ مخالف به A وارد می‌کنه.»

این جفتِ نیرو، **همیشه روی دو جسمِ متفاوت** اعمال می‌شه. مهم نیست تو راه می‌ری یا شنا می‌کنی یا پرواز می‌کنی، هر حرکتی نتیجه‌ی این قانونه.

<iframe src="/wp-content/physics-content/highschool/12/fasl-2/widgets/newton-third-law.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="قانون سوم نیوتون"></iframe>

## دیاگرامِ جسمِ آزاد (FBD) — قلبِ مسائلِ دینامیک ⚙️

برای هر مسئله‌ی دینامیک، اول دیاگرامِ آزاد بکش — یعنی فقط جسم و همه‌ی نیروهایی که بهش وارد می‌شن.

<iframe src="/wp-content/physics-content/highschool/12/fasl-2/widgets/free-body-diagram.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="دیاگرام جسم آزاد"></iframe>

## مثال — راه رفتن 👟

وقتی راه می‌ری:
- پای تو **به عقب** به زمین فشار می‌ده (عمل)
- زمین **به جلو** به پای تو فشار می‌ده (عکس‌العمل)
- این نیروی جلویی، تو رو شتاب می‌ده

روی یخ، اصطکاک کمه → نیروی عکس‌العمل افقیِ زمین کمه → نمی‌تونی شتاب بگیری. همینه چرا روی یخ نمی‌شه دوید.

## مثال — ضربان قلب 🫀

قلبِ بزرگسال هر دقیقه حدودِ ۵ لیتر خون (۵ کیلوگرم) رو با شتابِ متوسطِ ~۲۰ m/s² پمپ می‌کنه. نیرویِ متوسطی که قلب باید تولید کنه:

$$
F = ma = 5\,\text{kg} \times 20\,\text{m/s}^2 = 100\,\text{N}
$$

یعنی هر دقیقه قلبِ تو با نیرویی معادلِ بلند کردنِ ۱۰ کیلوگرم وزن کار می‌کنه. این ۱۰۰،۰۰۰ بار در روزه!

## محاسبه با پایتون 🐍

```python
# تحلیلِ نیرو در راه رفتنِ نرمال
# نیرویِ عکس‌العملِ زمین (Ground Reaction Force) به‌طور میانگین
# حدود 1.2 برابر وزنه. در دویدن می‌رسه به 2.5 برابر.

m = 70           # kg، وزنِ متوسط
g = 9.8

# سه فعالیت
activities = {
    "ایستادن": 1.0,
    "راه رفتن": 1.2,
    "دویدنِ آهسته": 2.0,
    "پرشِ ارتفاع": 5.0,
}

print(f"وزنِ معمولی: {m*g:.0f} N")
print()
for act, ratio in activities.items():
    F = ratio * m * g
    F_per_kg = F / m
    print(f"{act:20s} →  F_GRF = {F:.0f} N  ({ratio:.1f} برابر وزن)")

# نکته‌ی پزشکیِ ورزشی:
# تو دونده‌ای که زانوش درد می‌کنه، نیرویِ GRF در دویدن
# 2.5 برابر وزنه — یعنی 2 برابر فشارِ راه رفتن.
# همینه چرا تجویزِ شنا به جای دو ر می‌شه (شناوری وزن رو خنثی می‌کنه).
```

## نکته‌ی پزشکی-زیستی 🩺

- **whiplash**: قانون اول → سرِ بیمار درجا می‌مونه ولی بدن می‌چرخه
- **ضربانِ قلب**: قانون دوم → پمپاژِ خون ≈ نیروی ۱۰۰ نیوتونی هر دقیقه
- **راه رفتن و دویدن**: قانون سوم → GRF (Ground Reaction Force)
- **تنفس مصنوعی**: قانون سوم → فشارِ روی قفسه‌ی سینه = فشارِ قفسه روی دست
- **بازتوانیِ سکته**: تمرینِ تعادل = تمرینِ اعمال نیرویِ متعادل برای حفظِ ایستایی

## خودتو بسنج 📝

ویدئوی FBD رو امتحان کن — جسم رو روی شیب بذار و نیروهای مختلف رو ببین.

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [قوانین نیوتون](https://fa.wikipedia.org/wiki/%D9%82%D9%88%D8%A7%D9%86%DB%8C%D9%86_%D8%AD%D8%B1%DA%A9%D8%AA_%D9%86%DB%8C%D9%88%D8%AA%D9%86)
- Wikipedia EN: [Newton's laws of motion](https://en.wikipedia.org/wiki/Newton%27s_laws_of_motion)
- HyperPhysics: [Newton's laws](http://hyperphysics.phy-astr.gsu.edu/hbase/newt.html)
- Khan Academy: [Newton's laws of motion](https://www.khanacademy.org/science/physics/forces-newtons-laws)
- BiomechanicalEd: [Ground Reaction Force basics](https://www.researchgate.net/publication/259572019_The_Biomechanics_of_the_Gait_Cycle)

### ویدئو (یوتیوب)
- [Veritasium — The truth about Newton's laws](https://www.youtube.com/results?search_query=veritasium+newtons+laws)
- [Crash Course Physics — Newton's Laws](https://www.youtube.com/results?search_query=crash+course+physics+newtons+laws)
- [PBS Space Time — Newtonian mechanics](https://www.youtube.com/results?search_query=pbs+space+time+newton)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: قوانین نیوتون دوازدهم](https://www.aparat.com/result/%D9%82%D9%88%D8%A7%D9%86%DB%8C%D9%86_%D9%86%DB%8C%D9%88%D8%AA%D9%86_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: دیاگرام جسم آزاد](https://www.aparat.com/result/%D8%AF%DB%8C%D8%A7%DA%AF%D8%B1%D8%A7%D9%85_%D8%AC%D8%B3%D9%85_%D8%A2%D8%B2%D8%A7%D8%AF)

### شبیه‌سازی PhET
- [Forces and Motion: Basics](https://phet.colorado.edu/en/simulations/forces-and-motion-basics)
- [Forces and Motion](https://phet.colorado.edu/en/simulations/forces-and-motion)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با عمقِ بیشتر](https://physicsme.ir/articles/y12-qavanin-newton/)

---

*در بخشِ بعدی می‌ریم سراغِ نیروهای خاص — [وزن، اصطکاک، فنر و کشش](https://physicsme.ir/articles/special-forces-tajrobi/) 🔗.*
