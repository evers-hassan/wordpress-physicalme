---
title: "خازن — قطعه‌ای که بار و انرژی ذخیره می‌کند ⚡"
chapter: "فصل ۱ — الکتریسیتۀ ساکن (تجربی)"
section: "۱-۱۰ خازن"
order: 10
slug: "capacitor-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["خازن", "ظرفیت", "فاراد", "دفیبریلاتور", "غشای سلولی"]
---

# خازن — قطعه‌ای که بار و انرژی ذخیره می‌کند ⚡

> یه واقعیت 🩺: یه دفیبریلاتورِ ساده‌ی AED تو هر فروشگاهِ بزرگ یا فرودگاه نصب شده. قلبِ این دستگاه چیه؟ **یه خازن** که ۲۰۰ ژول انرژی در ۵ میلی‌ثانیه آزاد می‌کنه. هر سلولِ بدنِ تو هم یه خازنِ بیولوژیک‌ـه. این بخش، تمامِ راز رو فاش می‌کنه.

## خازن چیه؟ 📐

**خازن**: دو رسانا (معمولاً دو صفحه‌ی فلزی) که با یه عایق (دی‌الکتریک یا هوا) از هم جدا شده‌ـن. هرگاه بهش ولتاژ بدی، یه صفحه بارِ مثبت و اون یکی بارِ منفی می‌گیره.

## ظرفیت (C) 🎯

**ظرفیت خازن**:

$$C = \frac{Q}{V}$$

- $Q$: بارِ ذخیره‌شده روی هر صفحه (کولن)
- $V$: ولتاژ بینِ صفحات
- $C$: **ظرفیت** (فاراد، $\text{F}$ = $\text{C/V}$)

ظرفیت **فقط به هندسه‌ی خازن** بستگی داره (مساحت صفحات، فاصله، نوعِ دی‌الکتریک) — نه به بار یا ولتاژی که می‌دیش.

## خازنِ صفحه‌ای موازی 🔲

برای خازنِ صفحه‌ای موازی با مساحتِ $A$ و فاصله‌ی $d$:

$$C = \varepsilon_0 \frac{A}{d}$$

$\varepsilon_0 = 8.85 \times 10^{-12}\,\text{F/m}$ گذردهیِ خلأ.

با وارد کردنِ یه دی‌الکتریک (با ضریب $\kappa$ یا $K$):

$$C = K \varepsilon_0 \frac{A}{d}$$

پلاستیک: $K \approx 3$، شیشه: $K \approx 6$، آب: $K \approx 80$. این یعنی **هرچی دی‌الکتریک قوی‌تر، خازن قوی‌تر**.

## مقادیرِ معمولِ ظرفیت 📌

| نوع | ظرفیت |
|---|---|
| **خازنِ گوشی موبایل** | چند پیکوفاراد ($10^{-12}\,\text{F}$) |
| **خازنِ منبعِ تغذیه** | چند میلی‌فاراد ($10^{-3}\,\text{F}$) |
| **خازنِ دفیبریلاتور AED** | حدودِ ۵۰ میکروفاراد |
| **غشای سلولِ بدن** | حدودِ ۱ میکروفاراد بر سانتی‌مترمربع |

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/capacitor-lab.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="آزمایشگاه خازن"></iframe>

## محاسبه‌ی پایتون — خازنِ AED 🐍

```python
# دفیبریلاتور AED: خازن 50 µF، ولتاژ شارژ 2000 V
C = 50e-6      # فاراد
V = 2000       # ولت

Q = C * V
print(f"بار ذخیره روی خازن: {Q*1000:.2f} mC")     # 100 mC

# انرژی ذخیره‌شده (مقدمه از فصل بعد):
U = 0.5 * C * V**2
print(f"انرژی ذخیره: {U:.0f} J")     # 100 J - شُک متوسط
# AED استاندارد: 150-200 J

# تخمین خازن کل بدن (~70 kg)
# سلول‌های قلب: 10^10 سلول × 1 pF = 10^-2 F = 10 mF
C_body = 1e-2
V_resting = 0.07
Q_body = C_body * V_resting
print(f"بارِ ذخیره در غشای سلول‌های قلب: {Q_body*1000:.2f} mC")
# تقریباً 700 µC — مقایسه با AED, نشان می‌دهد چرا یک شُک ضربه‌ی قابل توجه است
```

## نکته‌ی پزشکی-زیستی 🩺

- **AED (Automated External Defibrillator)** — خازن ۵۰-۶۰ µF که در حدود ۵-۱۰ ثانیه به ۱۵۰۰-۲۰۰۰ ولت شارژ می‌شه و در میلی‌ثانیه آزاد می‌شه
- **پیس‌میکر دائمی** — خازنِ ریز که هر ثانیه چندبار شارژ-تخلیه می‌شه و پالسِ ضربان به قلب می‌ده
- **غشای سلولی به‌عنوان خازن** — لیپید-بایلایر یه دی‌الکتریک، و دو سمتِ غشا دو **صفحه‌ی رسانا** — این مدلی‌ـه که فیزیولوژیستا برای محاسبات استفاده می‌کنن
- **روشِ نوین EAP (Electroactive Polymers)** — خازن‌های قابلِ کشیده شدن برای پروتزِ نسلِ جدید

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/khazen-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش خازن"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [خازن](https://fa.wikipedia.org/wiki/%D8%AE%D8%A7%D8%B2%D9%86)
- Wikipedia EN: [Capacitor](https://en.wikipedia.org/wiki/Capacitor)، [Defibrillator](https://en.wikipedia.org/wiki/Defibrillation)
- HyperPhysics: [Capacitance](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/capac.html)

### ویدئو (یوتیوب)
- [Walter Lewin — Capacitors](https://www.youtube.com/results?search_query=walter+lewin+capacitor)
- [Veritasium — Capacitor Animation](https://www.youtube.com/results?search_query=veritasium+capacitor)
- [Crash Course — Capacitors](https://www.youtube.com/results?search_query=crash+course+capacitor)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: خازن یازدهم](https://www.aparat.com/result/%D8%AE%D8%A7%D8%B2%D9%86_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: دفیبریلاتور قلب](https://www.aparat.com/result/%D8%AF%D9%81%DB%8C%D8%A8%D8%B1%DB%8C%D9%84%D8%A7%D8%AA%D9%88%D8%B1_%D9%82%D9%84%D8%A8)

### شبیه‌سازی PhET
- [Capacitor Lab Basics](https://phet.colorado.edu/en/simulations/capacitor-lab-basics)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با محاسبه دی‌الکتریک](https://physicsme.ir/articles/khazen/)

---

*در بخش پایانی فصل ۱، می‌بینیم خازن چطور انرژی ذخیره می‌کنه و این انرژی چطور جانِ بیمار رو نجات می‌ده — [انرژی خازن](https://physicsme.ir/articles/capacitor-energy-tajrobi/) 💓.*
