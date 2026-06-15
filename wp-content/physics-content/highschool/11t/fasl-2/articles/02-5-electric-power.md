---
title: "توان در مدارها — انرژی در ثانیه 💡"
chapter: "فصل ۲ — جریان الکتریکی و مدارهای جریان مستقیم (تجربی)"
section: "۲-۵ توان در مدارهای الکتریکی"
order: 5
slug: "electric-power-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["توان", "وات", "P=VI", "BMR", "متابولیسم"]
---

# توان در مدارها — انرژی در ثانیه 💡

> یه مقایسه‌ی جالب 🩺: مغزِ تو حدودِ ۲۰ وات مصرف می‌کنه — معادلِ یه لامپ کم‌مصرف. ولی کلِ بدنت ۸۰-۱۰۰ وات (BMR) — همینقدر که یه لپ‌تاپِ کوچک. این بخش، توان رو از سطحِ سلول تا کلِ جهان بررسی می‌کنه.

## تعریفِ توان 📐

**توان** = انرژی در واحدِ زمان:

$$P = \frac{W}{t} = \frac{Q V}{t} = V I$$

سه فرمولِ معادل با استفاده از $V = RI$:

$$P = V I = I^2 R = \frac{V^2}{R}$$

- **یکا**: **وات** ($\text{W} = \text{J/s}$)
- $1\,\text{kW} = 1000\,\text{W}$
- $1\,\text{kWh} = 3.6 \times 10^6\,\text{J}$ (یکای رایج صورت‌حساب برق)

## معنیِ شهودی 💡

- توانِ زیاد = انرژی زیاد در زمانِ کم = خروجیِ قوی (موتورِ پرقدرت، لامپِ پرنور)
- توانِ کم = خروجیِ آرام و طولانی (پیس‌میکر، ساعتِ مچی)

## گرمایِ ژول (Joule heating) 🔥

وقتی جریان از مقاومت رد می‌شه، انرژیِ الکتریکی به **گرما** تبدیل می‌شه:

$$P_{\text{گرما}} = I^2 R$$

این پایه‌ی همه‌ی **المنت‌های گرمایی**ـه — کوره، اتو، سشوار، چای‌ساز.

## مقادیرِ معمولِ توان 📌

| دستگاه/سیستم | توان |
|---|---|
| ساعتِ مچی | $\sim 1\,\mu\text{W}$ |
| پیس‌میکر | $\sim 10\,\mu\text{W}$ |
| LED ولِ شب‌خواب | $\sim 0.5\,\text{W}$ |
| یک نورونِ منفرد | $\sim 0.01\,\mu\text{W}$ |
| **مغزِ کاملِ انسان** | $\sim 20\,\text{W}$ |
| **بدنِ کاملِ انسان (BMR)** | $\sim 80-100\,\text{W}$ |
| دفیبریلاتورِ AED (پیک) | $\sim 30\,\text{kW}$ |
| سشوار | $\sim 1\,\text{kW}$ |
| اتومبیلِ بنزینی متوسط | $\sim 100\,\text{kW}$ |

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/power-meter.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="اندازه‌گیری توان"></iframe>

## محاسبه‌ی پایتون — متابولیسم بدن 🐍

```python
# مدلِ ساده‌ی BMR (متابولیسم پایه)
# طبق فرمولِ هریس-بندیکت (مرد، 30 سال، 70 kg، 175 cm):
import math

def bmr(weight_kg, height_cm, age, male=True):
    if male:
        return 88.4 + 13.4*weight_kg + 4.8*height_cm - 5.7*age
    else:
        return 447.6 + 9.2*weight_kg + 3.1*height_cm - 4.3*age

# بازگشت kcal/day
kcal = bmr(70, 175, 30, male=True)
print(f"BMR: {kcal:.0f} kcal/day")

# تبدیل به وات
joules = kcal * 4184
watts = joules / (24 * 3600)
print(f"توان متوسط: {watts:.1f} W")

# جالب: تقریباً 80 وات - معادلِ یک لامپ معمولی!
# انرژی روزانه:
print(f"یعنی روزانه {joules/1e6:.2f} مگاژول")

# تقسیم بین اعضای بدن
print("\nتقسیم توان (تقریبی):")
print(f"  مغز:    {watts*0.20:.1f} W (20%)")
print(f"  قلب:    {watts*0.07:.1f} W (7%)")
print(f"  کبد:    {watts*0.20:.1f} W (20%)")
print(f"  کلیه:   {watts*0.08:.1f} W (8%)")
print(f"  عضله:   {watts*0.20:.1f} W (20%)")
print(f"  بقیه:   {watts*0.25:.1f} W (25%)")
```

## نکته‌ی پزشکی-زیستی 🩺

- **مغز و توان** — با اینکه ۲٪ وزن بدنه، ۲۰٪ انرژی مصرف می‌کنه. این به‌خاطرِ کارِ مداومِ پمپ‌های یونی‌ـه که پتانسیلِ غشا رو حفظ می‌کنن
- **محاسبهٔ کالری** — کالری روی برچسبِ غذا (با حروف بزرگ "Cal" یا "kcal")، ۱۰۰۰ کالریِ کوچکه. اگه روزانه ۲۰۰۰ کالری بخوری، ۸.۴ میلیون ژول وارد بدنت می‌شه
- **هیپوترمیِ درمانی** — کاهشِ دما به ۳۳ درجه، BMR رو کم می‌کنه → نیازِ سلولی به اکسیژن کم می‌شه (در سکته مغزی نجات‌بخش)
- **انرژیِ مصرفی دفیبریلاتور** — توانِ پیک ۳۰ kW، ولی فقط ۵ میلی‌ثانیه. کلِ انرژی ۱۵۰ ژول

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/tavan-electriki-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش توان"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [توان الکتریکی](https://fa.wikipedia.org/wiki/%D8%AA%D9%88%D8%A7%D9%86_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C)
- Wikipedia EN: [Electric power](https://en.wikipedia.org/wiki/Electric_power)، [Basal metabolic rate](https://en.wikipedia.org/wiki/Basal_metabolic_rate)
- HyperPhysics: [Electric power](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/elepow.html)

### ویدئو (یوتیوب)
- [Veritasium — Why your brain uses so much power](https://www.youtube.com/results?search_query=veritasium+brain+power)
- [Khan Academy — Electric power](https://www.youtube.com/results?search_query=khan+academy+electric+power)
- [Crash Course — Power](https://www.youtube.com/results?search_query=crash+course+electric+power)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: توان الکتریکی یازدهم](https://www.aparat.com/result/%D8%AA%D9%88%D8%A7%D9%86_%D8%A7%D9%84%DA%A9%D8%AA%D8%B1%DB%8C%DA%A9%DB%8C_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: متابولیسم پایه](https://www.aparat.com/result/%D9%85%D8%AA%D8%A7%D8%A8%D9%88%D9%84%DB%8C%D8%B3%D9%85_%D9%BE%D8%A7%DB%8C%D9%87)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با محاسباتِ متنوع‌تر](https://physicsme.ir/articles/tavan-electriki/)

---

*در بخش بعدی، می‌ریم سراغ مدارهای واقعی — [ترکیب مقاومت‌ها](https://physicsme.ir/articles/resistor-combinations-tajrobi/) 🔗.*
