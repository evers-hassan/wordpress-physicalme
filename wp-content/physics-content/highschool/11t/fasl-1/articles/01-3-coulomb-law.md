---
title: "قانون کولن — فرمولی که نیروی بین بارها را اندازه می‌گیرد 🧲"
chapter: "فصل ۱ — الکتریسیتۀ ساکن (تجربی)"
section: "۱-۳ قانون کولن"
order: 3
slug: "coulomb-law-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["قانون کولن", "نیروی الکتریکی", "ثابت کولن", "بار نقطه‌ای", "DNA"]
---

# قانون کولن — فرمولی که نیروی بین بارها را اندازه می‌گیرد 🧲

> یه پرسش 💭: هر مولکولِ DNA تو سلولِ تو، حدود **۱ متر** بلندی داره — ولی این یک متر باید توی هسته‌ی سلولی به قطرِ ۱۰ میکرومتر جمع بشه. چی این کار رو می‌کنه؟ **نیروهای الکترواستاتیکی بین بارها**. قانونِ کولن دقیقاً اون قاعده‌ای‌ـه که این تاخوردگی رو ممکن می‌کنه.

## فرمول قانون کولن ⚡

نیروی بینِ دو بارِ نقطه‌ایِ $q_1$ و $q_2$ که در فاصله‌ی $r$ از هم قرار دارن:

$$F = k \frac{|q_1 \, q_2|}{r^2}$$

که در آن:
- $F$: اندازه‌ی نیرو (نیوتون)
- $k = 8.99 \times 10^9 \,\text{N·m}^2/\text{C}^2$ — **ثابتِ کولن**
- جهت نیرو: روی خطِ بینِ دو بار
  - بارهای **هم‌نام** → نیروی دافعه (به طرفِ بیرون)
  - بارهای **ناهم‌نام** → نیروی جاذبه (به طرفِ هم)

### چند نکته‌ی کلیدی

1. **با مربعِ فاصله نسبتِ معکوس** — اگه فاصله رو دو برابر کنی، نیرو **یک‌چهارم** می‌شه
2. **با حاصل‌ضربِ بارها نسبتِ مستقیم** — اگه یکی از بارها رو سه برابر کنی، نیرو سه برابر می‌شه
3. **نیروی کولن خیلی قوی‌تر از نیروی گرانشی‌ـه**. بینِ دو پروتون، نیروی کولن $10^{36}$ برابرِ نیروی گرانشی‌ـه

## نسبتِ کولن به گرانش — یه عددِ غول‌پیکر 🤯

برای دو الکترون:
$$\frac{F_{\text{کولن}}}{F_{\text{گرانش}}} = \frac{ke^2}{Gm_e^2} \approx 4.2 \times 10^{42}$$

یعنی نیروی الکتریکیِ بینِ دو الکترون، **$10^{42}$ برابرِ** جاذبه‌ی گرانشی بینشونه. به همین دلیل تو شیمی و زیست‌شناسی، عملاً فقط نیروهای الکتریکی مهم‌ـن (گرانش بی‌اثره).

## ویجتِ تعاملی — بازی با قانون کولن 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/coulomb-law.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="قانون کولن تعاملی"></iframe>

## برهم‌نهی — وقتی چند بار با هم‌ـن 🧩

اگه چند بارِ $q_1, q_2, q_3, ...$ روی یه بارِ $q_0$ نیرو وارد کنن، نیروی کل **جمعِ برداریِ** نیروهای جداگانه‌ست:

$$\vec{F}_{\text{کل}} = \vec{F}_1 + \vec{F}_2 + \vec{F}_3 + ...$$

این اصلِ **برهم‌نهی** پایه‌ی فهمِ همه‌ی پدیده‌های الکتریکی‌ـه — از مولکولِ آب تا میدانِ قلب.

## محاسبه‌ی پایتون — مثالِ بیولوژیکی 🐍

```python
# مثال: نیروی دافعه بین دو پروتون در هسته‌ی اتمی
# (در فاصله ۲ فمتومتر = 2e-15 متر)

k = 8.99e9                # N·m²/C²
e = 1.602e-19             # کولن (بار پروتون)
r = 2e-15                 # متر

F = k * e * e / r**2
print(f"نیروی کولن بین دو پروتون: {F:.2f} N")
# خروجی: حدود 57 نیوتون — برای دو ذره‌ی ریز فوق‌العاده زیاد!
# این نشون می‌ده چرا برای نگه داشتنِ هسته به نیروی هسته‌ای قوی نیاز است

# مثال 2: بار سطحیِ غشای سلول
# دو یون Ca2+ روی غشا، در فاصله 1 نانومتر
q = 2 * e                 # یون کلسیم دو بار
r = 1e-9
F = k * q**2 / r**2
print(f"نیروی بین دو یون Ca2+: {F:.2e} N")
# خروجی: ≈ 9.2e-10 N — این نیروهای ریز هم‌ـند که فولدینگِ پروتئین رو شکل می‌دن

# مثال 3: نیرو بین DNA's two complementary strands
# تقریب: 100 جفت‌باز، هر کدوم بار 2e
q1 = 100 * 2 * e          # یک رشته
r = 1e-9                  # فاصله بین رشته‌ها (≈ قطر helix)
F_attract = k * q1 * q1 / r**2
print(f"نیروی جذبی بین دو رشته DNA: {F_attract:.2e} N")
```

## نکته‌ی پزشکی-زیستی 🩺🧬

- **DNA double helix**: دو رشته‌ی DNA با نیروی الکترواستاتیکیِ بسیار قوی به هم چسبیدن. این چسبندگی به همراه پیوندهای هیدروژنی، پایداریِ ژنوم رو تأمین می‌کنه
- **برهم‌کنشِ دارو-گیرنده**: همه‌ی داروها روی پروتئین‌های گیرنده با ترکیبی از نیروهای کولنی و واندروالس متصل می‌شن — کلیدِ تخصصِ داروشناسی همینه
- **سندرومِ امواجِ عصبی**: انتقالِ سیناپسی روی توالیِ بارهای ناهم‌نام بنا شده — جابه‌جاییِ $\text{Na}^+ / \text{K}^+ / \text{Ca}^{2+}$ که در نهایت پاسخِ فیزیولوژیک می‌سازه

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/ghanoon-coulomb-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش قانون کولن"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [قانون کولن](https://fa.wikipedia.org/wiki/%D9%82%D8%A7%D9%86%D9%88%D9%86_%DA%A9%D9%88%D9%84%D9%86)
- Wikipedia EN: [Coulomb's law](https://en.wikipedia.org/wiki/Coulomb%27s_law)، [Charles-Augustin de Coulomb](https://en.wikipedia.org/wiki/Charles-Augustin_de_Coulomb)
- HyperPhysics: [Coulomb's law calculator](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/elefor.html)
- MIT OCW 8.02: [Lecture 1 — Electric Charge & Coulomb's Law](https://ocw.mit.edu/courses/8-02-physics-ii-electricity-and-magnetism-spring-2007/)

### ویدئو (یوتیوب)
- [Walter Lewin MIT 8.02 Lecture 1](https://www.youtube.com/results?search_query=walter+lewin+8.02+lecture+1)
- [Crash Course Physics — Coulomb's Law](https://www.youtube.com/results?search_query=crash+course+coulomb+law)
- [Veritasium — Why Electrons Don't Fall into the Nucleus](https://www.youtube.com/results?search_query=veritasium+electron+nucleus)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: قانون کولن فیزیک یازدهم](https://www.aparat.com/result/%D9%82%D8%A7%D9%86%D9%88%D9%86_%DA%A9%D9%88%D9%84%D9%86_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: ترازوی پیچشی کولن](https://www.aparat.com/result/%D8%AA%D8%B1%D8%A7%D8%B2%D9%88%DB%8C_%D9%BE%DB%8C%DA%86%D8%B4%DB%8C_%DA%A9%D9%88%D9%84%D9%86)

### شبیه‌سازی PhET
- [Coulomb's Law](https://phet.colorado.edu/en/simulations/coulombs-law)
- [Charges and Fields](https://phet.colorado.edu/en/simulations/charges-and-fields)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با اثباتِ بُرداری](https://physicsme.ir/articles/ghanoon-coulomb/)

---

*در بخش بعدی، می‌بینیم چطور یه بارِ تنها هم می‌تونه «اطرافِ» خودش رو تغییر بده — [میدانِ الکتریکی](https://physicsme.ir/articles/electric-field-tajrobi/) 🌐.*
