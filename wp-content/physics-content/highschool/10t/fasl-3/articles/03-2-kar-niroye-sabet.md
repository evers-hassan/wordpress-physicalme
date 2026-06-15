---
title: "کار با نیرویِ ثابت — اگه عمود فشار بدی، کاری انجام نمی‌دی! 💪"
chapter: "فصل ۳ — کار، انرژی و توان (تجربی)"
section: "۳-۲ کار انجام‌شده توسط نیروی ثابت"
order: 2
slug: "work-by-constant-force-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["کار", "نیرو", "زاویه", "ژول", "تجربی"]
---

# کار با نیرویِ ثابت — اگه عمود فشار بدی، کاری انجام نمی‌دی! 💪

> یه چیزِ غیرمنتظره 💭: اگه یه کیفِ ۱۰ کیلویی رو با دست بگیری و **یه ساعت** صاف بایستی، تو معنای فیزیکیِ کلمه **هیچ کاری** انجام نداده‌ای! ولی ماهیچه‌هات خسته شده‌ن، بدنت انرژی مصرف کرده. این تناقض چیه؟ جواب در تعریفِ دقیقِ «کار» تو فیزیک‌ـه.

## تعریف 📌

**کار** ($W$) = نیرو × جابه‌جایی × کسینوسِ زاویه‌ی بینِ نیرو و جابه‌جایی:

$$W = F \cdot d \cdot \cos\theta$$

- **یکا:** ژول (J) = N·m
- اگه θ=۰° (نیرو هم‌جهت با حرکت) → $W = Fd$ (بیشترین کار)
- اگه θ=۹۰° (نیرو عمود بر حرکت) → $W = 0$ (هیچ کار!)
- اگه θ بین ۹۰° و ۱۸۰° → $W < 0$ (کار منفی — مثل اصطکاک)

## شبیه‌ساز — زاویه و نیرو رو عوض کن 🎮

<iframe src="/wp-content/physics-content/highschool/10/widgets/work-force-angle.html" width="100%" height="640" style="border:none; border-radius:12px;" loading="lazy" title="کار با نیرو در زاویه"></iframe>

## حالا پاسخِ آن سؤال 🤔

چرا گرفتنِ کیفِ ۱۰ کیلویی روی دست، در فیزیک «کار» نیست؟ چون **جابه‌جایی=صفر**. اگه d=0، W=0 — بدونِ توجه به نیرو.

ولی ماهیچه‌هات کالری می‌سوزونن؛ این کار **داخلی**ه: کشش-انقباضِ متناوبِ تارهای ماهیچه‌ای انرژی مصرف می‌کنه. این تو فصلِ ۳-۶ (کار و انرژی درونی) عمیق‌تر می‌بینیم.

## مثال‌های تجربی-پزشکی 🩺

- **بالا کشیدنِ بیمار از تخت**: نیرویِ پزشک رو به بالا، جابه‌جاییِ بیمار به‌سمتِ بالا → $W > 0$ (کارِ مثبت).
- **قلب و ضربان**: نیرویِ ماهیچه‌ی قلب بر دیواره‌ی بطن، خون جابه‌جا می‌شه → $W > 0$. هر ضربه ~۱ J کار می‌کنه.
- **پلت در دستگاهِ سانتریفیوژ**: نیرویِ گریزازمرکز عمود بر حرکتِ مماسیه → کار = ۰. سانتریفیوژ خودِ شعاع رو تغییر نمی‌ده، فقط جداسازی می‌کنه.
- **اصطکاکِ خون با دیواره‌ی رگ**: θ = ۱۸۰° → $W < 0$ → انرژی از جریانِ خون گرفته می‌شه و گرما تولید می‌شه.

## یه مثالِ کلاسیک: کشیدنِ یه چمدون 🧳

اگه چمدون ۲۰ kg رو با نیروی ۵۰ N به‌سمتِ خودت بکشی، در حالی که دست‌گیره‌ش با افق ۳۷° زاویه داره، و چمدون رو ۱۰ متر بکشی روی زمین:

$$W = 50 \times 10 \times \cos(37°) = 50 \times 10 \times 0.8 = 400 \text{ J}$$

اگه مستقیم افقی بکشی (θ=۰)، W = ۵۰ × ۱۰ × ۱ = ۵۰۰ J. زاویه‌ی ۳۷° → کارت کمتره. ولی شاید راحت‌تر باشه! این یه trade-off فیزیولوژیه.

## یه کدِ پایتون 🐍

```python
import numpy as np

def work(F, d, theta_deg):
    return F * d * np.cos(np.deg2rad(theta_deg))

# مثال‌های مختلف
print(f"کشیدن چمدون (θ=۰):  {work(50, 10, 0):.0f} J")
print(f"کشیدن چمدون (θ=۳۷): {work(50, 10, 37):.0f} J")
print(f"دستِ راست (θ=۹۰):   {work(50, 10, 90):.0f} J")  # 0
print(f"اصطکاک (θ=۱۸۰):     {work(20, 10, 180):.0f} J") # negative

# نمودار W vs θ
import matplotlib.pyplot as plt
theta = np.linspace(0, 180, 100)
plt.plot(theta, work(50, 10, theta))
plt.xlabel('θ (degree)'); plt.ylabel('W (J)')
plt.axhline(0, color='gray', linestyle='--')
plt.grid(); plt.title('کار به‌عنوانِ تابع زاویه')
plt.savefig('work_vs_theta.png')
```

---

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [کار (فیزیک)](https://fa.wikipedia.org/wiki/%DA%A9%D8%A7%D8%B1_(%D9%81%DB%8C%D8%B2%DB%8C%DA%A9))
- Wikipedia EN: [Work (physics)](https://en.wikipedia.org/wiki/Work_(physics))، [Joule](https://en.wikipedia.org/wiki/Joule)
- [HyperPhysics — Work](http://hyperphysics.phy-astr.gsu.edu/hbase/work.html)
- Khan Academy: [Work and the work-energy principle](https://www.khanacademy.org/science/physics/work-and-energy/work-and-energy-tutorial)

### ویدئو (یوتیوب)
- MIT OCW 8.01 Walter Lewin: [Work and Energy](https://www.youtube.com/results?search_query=walter+lewin+work+energy)
- Khan Academy: [Work and energy explained](https://www.youtube.com/results?search_query=khan+academy+work)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: کار فیزیک دهم](https://www.aparat.com/result/%DA%A9%D8%A7%D8%B1_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%87%D9%85)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با اثبات‌ها و مثال‌های ریاضیِ بیشتر](https://physicsme.ir/articles/kar-niroye-sabet/)

---

*تو زیرفصل بعد، **قضیه‌ی کار-انرژی** — رابطه‌ی کارِ کل و تغییرِ انرژیِ جنبشی 🎯.*
