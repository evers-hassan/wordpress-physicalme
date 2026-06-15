---
title: "لیزر — نورِ همدوس از LASIK تا گاما-چاقو 🎯"
chapter: "فصل ۴ — فیزیک اتمی و هسته‌ای (تجربی)"
section: "۴-۴ لیزر"
order: 4
slug: "laser-tajrobi"
level: "دوازدهم تجربی"
reading_time: "حدود ۷ دقیقه"
keywords: ["لیزر", "گسیل القایی", "LASIK", "همدوس", "تجربی"]
branches: ["کوانتوم", "اپتیک"]
---

# لیزر — نورِ همدوس از LASIK تا گاما-چاقو 🎯

> یه واقعیتِ شگفت ✨: لیزرِ چشم‌پزشکی LASIK در یک‌چهارمِ ثانیه با دقتی در حدِ ۰.۲۵ میکرومتر، نزدیک‌بینی رو اصلاح می‌کنه. این دقت با هیچ تیغِ جراحی قابلِ مقایسه نیست. این فصل، فیزیکِ پشت این تکنولوژی‌ـه.

## LASER چی هست؟ 💡

**LASER** = **L**ight **A**mplification by **S**timulated **E**mission of **R**adiation.

سه ویژگیِ کلیدی:
1. **همدوس** (coherent) — همه‌ی فوتون‌ها همگام
2. **تک‌بسامد** (monochromatic) — یک طول‌موج
3. **همسو** (collimated) — موازی، کم‌پراکنش

## سه فرآیندِ نوری 🎯

برای فهم لیزر، سه فرآیند رو باید بدونی:

| فرآیند | چی می‌شه؟ |
|---|---|
| **جذب** (absorption) | فوتون ⇒ الکترون به تراز بالاتر |
| **گسیل خودبه‌خود** (spontaneous emission) | الکترون به‌خودی‌خود می‌افته ⇒ فوتون پراکنده |
| **گسیل القایی** (stimulated emission) | فوتون ⇒ الکترون می‌افته ⇒ **۲ فوتونِ یکسان** |

**کشفِ کلیدی** (انیشتین، ۱۹۱۷): گسیل القایی، **فوتون رو کپی** می‌کنه.

## شرطِ لازم — وارونگیِ جمعیت 📊

برای اینکه لیزر کار کنه، باید **بیشترِ** اتم‌ها در حالتِ تحریک‌شده باشن (وارونگیِ جمعیت). این برخلافِ تعادلِ طبیعیه — نیاز به «pumping» داره.

<iframe src="/wp-content/physics-content/highschool/12/fasl-5/widgets/laser-stimulated-emission.html" width="100%" height="560" style="border:none; border-radius:12px;" loading="lazy" title="گسیل القایی لیزر"></iframe>

## انواع لیزر در پزشکی 🩺

### ۱) لیزر اکسایمر (ArF) — LASIK
طول موج: ۱۹۳ nm (UV). انرژیِ فوتون = ۶.۴ eV → می‌تونه پیوندِ کووالانسی رو بشکنه. کاربرد: **برش بدون حرارت** قرنیه برای اصلاحِ نزدیک‌بینی.

### ۲) لیزر CO2
طول موج: ۱۰.۶ μm (IR). جذبِ بالا در آبِ بافت → بریدنِ سلولی، جراحیِ پوست (پاکسازی خال، اسکار).

### ۳) لیزر Nd:YAG
طول موج: ۱۰۶۴ nm (IR نزدیک). نفوذِ عمیق‌تر در بافت → **اپیلاسیون لیزری**، درمانِ کاتاراکت ثانویه.

### ۴) لیزر آرگون
طول موج: ۴۸۸ و ۵۱۴ nm. جذبِ بالا در هموگلوبین → جراحیِ شبکیه، درمانِ رتینوپاتی.

### ۵) لیزر کم‌توان (LLLT / فوتو-بیومدولاسیون)
~۶۰۰-۹۰۰ nm، چند میلی‌وات. کاربرد: کاهشِ درد، التیامِ زخم، بازسازیِ بافت.

## دوزِ لیزر — نکته‌ی حیاتی ⚠️

اشعه‌ی لیزر می‌تونه بافت رو بسوزانه. هر دستگاهِ پزشکی استانداردهای دقیقی برای انرژی، مدت، و تمرکز داره. **عینکِ ایمنیِ مخصوصِ طول‌موج** الزامی‌ـه.

## محاسبه با پایتون 🐍

```python
# مقایسه‌ی لیزرها در پزشکی
import numpy as np

h = 6.626e-34
c = 3e8
eV = 1.602e-19

# لیزرهای پزشکیِ مهم
lasers = {
    "ArF (LASIK)":         (193, "UV-C", "برش سلولی"),
    "Argon":               (488, "آبی-سبز", "شبکیه‌درمانی"),
    "Nd:YAG":              (1064, "IR-A", "اپیلاسیون"),
    "CO2":                 (10600, "IR-C", "پوست‌درمانی"),
    "LLLT (Diode)":        (810, "IR-A", "ضدّ درد"),
}

print(f"{'نوع لیزر':>20s}  {'λ (nm)':>10s}  {'انرژی فوتون':>15s}  {'حوزه EM':>10s}")
for name, (lam_nm, region, _) in lasers.items():
    E_J = h * c / (lam_nm * 1e-9)
    E_eV = E_J / eV
    print(f"{name:>20s}  {lam_nm:>10d}  {E_eV:>12.2f} eV  {region:>10s}")

# نکته:
# ArF بسیار پر-انرژی → بریدنِ مولکولی بدون حرارت
# CO2 کم‌انرژی ولی شدتِ بالا → سوزاندن (جذبِ بالا در آب)
# LLLT خیلی کم انرژی → فعال‌سازیِ آنزیم، نه بریدن
```

## نکته‌ی پزشکی-زیستی 🩺

- **LASIK**: اصلاحِ ~۸-۱۰ دیوپتر در یک‌چهارمِ ثانیه با ArF
- **اپیلاسیون**: انتخابِ طول موج که در ملانینِ مو جذب بشه نه پوست
- **PDT** (Photodynamic Therapy): داروی حساسِ نوری + لیزر = درمانِ سرطان
- **Surgery laser-knife**: CO2 → کنترلِ خونریزی (پلاسما = جوشِ رگ)
- **OCT** (Optical Coherence Tomography): لیزرِ کم‌قدرت ولی همدوس برای تصویربرداریِ شبکیه با رزولوشنِ میکرومتر

---

## منابع و کاوش بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [لیزر](https://fa.wikipedia.org/wiki/%D9%84%DB%8C%D8%B2%D8%B1)
- Wikipedia EN: [Laser](https://en.wikipedia.org/wiki/Laser)
- Wikipedia EN: [LASIK](https://en.wikipedia.org/wiki/LASIK)
- HyperPhysics: [Laser](http://hyperphysics.phy-astr.gsu.edu/hbase/optmod/lascon.html)
- Khan Academy: [Laser physics](https://www.khanacademy.org/science/physics/quantum-physics)

### ویدئو (یوتیوب)
- [Veritasium — How a laser works](https://www.youtube.com/results?search_query=veritasium+laser)
- [Real Engineering — LASIK eye surgery](https://www.youtube.com/results?search_query=real+engineering+lasik)
- [SciShow — LASIK explained](https://www.youtube.com/results?search_query=scishow+lasik)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: لیزر فیزیک دوازدهم](https://www.aparat.com/result/%D9%84%DB%8C%D8%B2%D8%B1_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%88%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: LASIK جراحی چشم](https://www.aparat.com/result/LASIK_%D8%AC%D8%B1%D8%A7%D8%AD%DB%8C_%DA%86%D8%B4%D9%85)

### شبیه‌سازی PhET
- [Lasers](https://phet.colorado.edu/en/simulations/lasers)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک](https://physicsme.ir/articles/y12-laser/)

---

*در بخشِ بعد می‌ریم از سطحِ اتم به مرکزش — [ساختارِ هسته](https://physicsme.ir/articles/nuclear-structure-tajrobi/) ⚛️.*
