---
title: "جریان متناوب (AC) — برقِ خانه، بیمارستان و دنیا 🔌"
chapter: "فصل ۳ — مغناطیس و القای الکترومغناطیسی (تجربی)"
section: "۳-۱۱ جریان متناوب"
order: 11
slug: "alternating-current-tajrobi"
level: "یازدهم تجربی"
reading_time: "حدود ۶ دقیقه"
keywords: ["AC", "جریان متناوب", "RMS", "ترانسفورماتور", "ژنراتور", "نیروگاه"]
---

# جریان متناوب (AC) — برقِ خانه، بیمارستان و دنیا 🔌

> یه واقعیت 🩺: همه‌ی دستگاه‌های MRI، CT، رادیولوژی، آزمایشگاه — برقِ AC ـه. تو ایران، **۲۲۰ ولت، ۵۰ هرتز** ـه. ولی این اعداد دقیقاً چه معنایی دارن؟ این بخش، AC رو بازمی‌کنه.

## AC در برابر DC 🔄

- **DC (Direct Current)** — جریانِ مستقیم: یک‌جهت، ثابت یا متغیر آرام. مثلِ باتری
- **AC (Alternating Current)** — جریانِ متناوب: جهت و اندازه به‌صورتِ سینوسی نوسان می‌کنه

## شکلِ موجِ AC 📈

$$V(t) = V_0 \, \sin(2\pi f \, t) = V_0 \, \sin(\omega t)$$

- $V_0$: **ولتاژ پیک** (بیشینه)
- $f$: بسامد (یکا هرتز، Hz)
- $\omega = 2\pi f$: بسامد زاویه‌ای (rad/s)

برای ایران: $f = 50\,\text{Hz}$ → هر ثانیه ۵۰ بار تغییر جهت می‌ده.

## مقدارِ مؤثر (RMS) — مهم‌ترین مفهوم 🎯

برق‌کاران از $V_{\text{RMS}}$ صحبت می‌کنن، نه $V_0$:

$$V_{\text{RMS}} = \frac{V_0}{\sqrt{2}} \approx 0.707 \, V_0$$

**معنیِ RMS**: ولتاژِ DC که همون توان رو در مقاومت تولید می‌کنه.

### پریزِ خانگیِ ایران: ۲۲۰ ولت **RMS**

پس $V_0 = 220 \times \sqrt{2} \approx 311\,\text{V}$ — این **ولتاژِ پیک** ـه!

این یعنی به دستگاه‌هایی که فقط با DC کار می‌کنن (مثلِ پیس‌میکر)، نمی‌تونی پریز رو مستقیم وصل کنی — باید **یک‌سو شه** و **فیلتر بشه**.

## توانِ AC 💡

$$P_{\text{متوسط}} = V_{\text{RMS}} \times I_{\text{RMS}}$$

به همین دلیل لامپی که می‌گه "100 وات" در پریزِ خانگی، می‌گه که با $V_{\text{RMS}}=220$V، $I_{\text{RMS}}=0.45$A می‌کشه.

## ترانسفورماتور — جادوگرِ AC ⚡

ترانسفورماتور با دو سیم‌پیچ که با هم اتصالِ مغناطیسی دارن، ولتاژ رو تغییر می‌ده:

$$\frac{V_2}{V_1} = \frac{N_2}{N_1}$$

- اگه $N_2 > N_1$ → افزاینده (نیروگاه به برق‌رسانی)
- اگه $N_2 < N_1$ → کاهنده (برق‌رسانی به خانه)

**فقط با AC کار می‌کنه** (با DC ولتاژ ثابتـه، تغییری در شار نیست، القا صفر).

## چرا برقِ شهر AC ـه؟ 🌆

- ترانسفورماتور فقط با AC کار می‌کنه
- انتقالِ برق به مسافتِ زیاد، در ولتاژِ بالا تلفاتِ کمتری داره. AC رو راحت می‌شه با ترانس بالا برد
- نیروگاه‌ها (آبی، حرارتی، اتمی، خورشیدی-ترموالکتریک) همگی با ژنراتورِ AC کار می‌کنن (چرخش = شار متغیر)

## ویجتِ تعاملی 🎮

<iframe src="/wp-content/physics-content/highschool/11/widgets/ac-generator.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="ژنراتور AC"></iframe>

<iframe src="/wp-content/physics-content/highschool/11/widgets/transformer.html" width="100%" height="540" style="border:none; border-radius:12px;" loading="lazy" title="ترانسفورماتور"></iframe>

## محاسبه‌ی پایتون — انتقالِ برق به بیمارستان 🐍

```python
import math

# تولید برق در نیروگاه
P = 1e6           # 1 MW برای یک بیمارستان بزرگ
V_gen = 11_000    # ولت در نیروگاه

# جریان اولیه (در نیروگاه)
I_gen = P / V_gen
print(f"جریان در نیروگاه: {I_gen:.0f} A")

# انتقال به بیمارستان (مسافت 50 km)
# مقاومت سیم: 0.5 Ω/km برای سیم ACSR
R_line = 0.5 * 50
P_loss_low = I_gen**2 * R_line
print(f"اتلاف اگه با ولتاژ 11kV انتقال بدیم: {P_loss_low/1000:.0f} kW")
# تقریباً 1 MW اتلاف! بیش از کل توان

# با ترانسفورماتور به 400 kV افزایش بدیم:
V_high = 400_000
I_high = P / V_high
P_loss_high = I_high**2 * R_line
print(f"اتلاف با 400 kV: {P_loss_high:.0f} W = {P_loss_high/1000:.2f} kW")
# تقریباً 800 W - اتلاف خیلی کمتر!

# نسبت
print(f"کاهش اتلاف: {P_loss_low/P_loss_high:.0f}x")
# 1300 برابر کمتر - به همین دلیل ولتاژ بالا منتقل می‌کنیم
```

## نکته‌ی پزشکی-زیستی 🩺

- **منبع تغذیه‌ی دستگاه پزشکی** — همه دارای ترانسفورماتور برای کاهشِ ولتاژ
- **اِلتشُک (electrocution)** — AC با ۵۰ Hz در محدوده‌ی حساسیتِ قلبه. می‌تونه فیبریلاسیون ایجاد کنه
- **TENS با AC پایین** — جریانِ متناوبِ کم‌بسامد برای کنترل درد
- **اتاقِ MRI** — هرگز دستگاه‌های فلزی نباید نزدیک بشن، چون میدانِ AC شدید گرم می‌کنه
- **EMG و ECG** — هر دو تشخیصِ فعالیتِ بافت بر اساسِ بسامد، ولی **حذفِ نویز ۵۰ Hz پریز** یه چالشِ مهمه

## خودتو بسنج 📝

<iframe src="/wp-content/physics-content/highschool/11/widgets/jaryan-motanaveb-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش جریان متناوب"></iframe>

<iframe src="/wp-content/physics-content/highschool/11/widgets/transformer-quiz.html" width="100%" height="420" style="border:none;" loading="lazy" title="پرسش ترانسفورماتور"></iframe>

---

## منابع و کاوشِ بیشتر 📚

### مقالات و مرجع
- ویکی‌پدیای فارسی: [جریان متناوب](https://fa.wikipedia.org/wiki/%D8%AC%D8%B1%DB%8C%D8%A7%D9%86_%D9%85%D8%AA%D9%86%D8%A7%D9%88%D8%A8)
- Wikipedia EN: [Alternating current](https://en.wikipedia.org/wiki/Alternating_current)، [Transformer](https://en.wikipedia.org/wiki/Transformer)
- HyperPhysics: [AC](http://hyperphysics.phy-astr.gsu.edu/hbase/electric/accircon.html)

### ویدئو (یوتیوب)
- [Veritasium — AC vs DC War (Tesla vs Edison)](https://www.youtube.com/results?search_query=veritasium+ac+dc+tesla+edison)
- [Practical Engineering — Power Grid](https://www.youtube.com/results?search_query=practical+engineering+power+grid)
- [Veritasium — How Power Lines Work](https://www.youtube.com/results?search_query=veritasium+power+lines)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: جریان متناوب یازدهم](https://www.aparat.com/result/%D8%AC%D8%B1%DB%8C%D8%A7%D9%86_%D9%85%D8%AA%D9%86%D8%A7%D9%88%D8%A8_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)
- [جست‌وجو: ترانسفورماتور یازدهم](https://www.aparat.com/result/%D8%AA%D8%B1%D8%A7%D9%86%D8%B3%D9%81%D9%88%D8%B1%D9%85%D8%A7%D8%AA%D9%88%D8%B1_%DB%8C%D8%A7%D8%B2%D8%AF%D9%87%D9%85)

### شبیه‌سازی PhET
- [Generator](https://phet.colorado.edu/en/simulations/generator)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با تحلیلِ امپدانس](https://physicsme.ir/articles/jaryan-motanaveb/)
- [ترانسفورماتور — مقاله مفصل](https://physicsme.ir/articles/transformer/)

---

*فصلِ ۳ و کلِ کتابِ یازدهم تجربی تموم شد! 🎉 حالا وقتِ [حل مسائلِ فصل ۳](https://physicsme.ir/articles/problems-chapter-3-y11-tajrobi/) و [فلش‌کارت‌ها](https://physicsme.ir/articles/flashcards-chapter-3-y11-tajrobi/) ـه.*
