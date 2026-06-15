---
title: "حالت‌های ماده — جامد، مایع، گاز، و یه چیزِ عجیب به اسم پلازما ⚡"
chapter: "فصل ۲ — ویژگی‌های فیزیکی مواد (تجربی)"
section: "۲-۱ حالت‌های ماده"
order: 1
slug: "states-of-matter-tajrobi"
level: "دهم تجربی"
reading_time: "حدود ۴ دقیقه"
keywords: ["جامد", "مایع", "گاز", "پلازما", "تغییر حالت", "تجربی"]
---

# حالت‌های ماده — جامد، مایع، گاز، و یه چیزِ عجیب به اسم پلازما ⚡

> یه چیزِ شوک‌آور 💥: **۹۹٪ از ماده‌ی قابلِ مشاهده‌ی کلِ جهان**، نه جامده، نه مایع، نه گاز. **پلازما**ـست! 🌞 از خورشید و ستاره‌ها تا صاعقه و چراغ‌های نئون — همگی پلازما هستن. پس وقتی می‌گیم «۳ حالتِ ماده»، یه ذره داریم بیراه می‌گیم. در واقع حداقل **۴** حالت داریم. بریم ببینیم چه فرقایی دارن.

## خلاصه‌ی ۴ حالت 📌

| حالت | فاصله‌ی مولکولی | حرکت | حجم | شکل |
|---|---|---|---|---|
| **جامد** 🧊 | خیلی کم، شبکهٔ منظم | لرزشِ جا | ثابت | ثابت |
| **مایع** 💧 | کم، نامنظم | لغزش روی هم | ثابت | شکلِ ظرف |
| **گاز** 🌬️ | بزرگ | تصادفی و سریع | متغیر | کلِ ظرفو پر می‌کنه |
| **پلازما** ⚡ | بزرگ (یونیزه) | بسیار سریع | متغیر | متغیر |

> ⚠️ **اخطار برای تجربی‌ها:** «پلازما»ی فیزیکی با «پلاسمای خون» **اصلاً یکی نیستن**! پلاسمای خون مایعه (مایعِ زرد رنگی که سلول‌های خون تو شناورن). پلازمای فیزیکی گازِ یونیزه‌ست.

## شبیه‌سازِ زنده — مولکول‌ها رو ببین 🔬

روی هر دکمه کلیک کن و ببین مولکول‌ها چطور رفتار می‌کنن:

<iframe src="/wp-content/physics-content/highschool/10/widgets/states-of-matter.html" width="100%" height="640" style="border:none; border-radius:12px;" loading="lazy" title="شبیه‌سازِ حالت‌های ماده"></iframe>

## چی باعثِ تغییرِ حالت می‌شه؟ 🌡️

تعادل بین **انرژیِ حرارتی** و **نیروی بین‌مولکولی**:
- **انرژی کم** (دمای پایین) → نیروی جاذبه غلبه می‌کنه → جامد
- **انرژی متوسط** → نیمه‌غلبه → مایع
- **انرژی زیاد** → نیروی جاذبه شکست می‌خوره → گاز
- **انرژی خیلی زیاد** → الکترون‌ها از اتم جدا می‌شن → پلازما

## مثال تجربی-پزشکی: انجمادِ سلول 🧬

تو **کریوپرزرواسیون** (نگه‌داریِ سلول‌ها در دمای پایین برای آینده — نمونه‌گیری از خون بندِ ناف یا تخمک‌سازی) دما رو تا حدود **−۱۹۶ درجه‌ی سلسیوس** (دمای نیتروژنِ مایع) پایین می‌برن. تو این دما، آبِ داخلِ سلول می‌خواد یخ بزنه — ولی یخِ معمولی سلول رو پاره می‌کنه! 😱 برای همین از **محلول‌های ضدِ یخ** (کرایوپروتکتانت) استفاده می‌کنن که اجازه نمی‌ده شبکهٔ کریستالی شکل بگیره. این یه کاربردِ مستقیم از فهمِ تغییرِ حالته.

## یه کدِ پایتون — انیمیشنِ گاز ایده‌آل 🐍

```python
import numpy as np
import matplotlib.pyplot as plt
from matplotlib.animation import FuncAnimation

N = 30
x = np.random.rand(N) * 10
y = np.random.rand(N) * 10
vx = (np.random.rand(N) - 0.5) * 2
vy = (np.random.rand(N) - 0.5) * 2

fig, ax = plt.subplots()
sc = ax.scatter(x, y)
ax.set_xlim(0, 10); ax.set_ylim(0, 10)

def update(frame):
    global x, y, vx, vy
    x += vx * 0.05; y += vy * 0.05
    # bounce walls
    vx = np.where((x<0)|(x>10), -vx, vx)
    vy = np.where((y<0)|(y>10), -vy, vy)
    sc.set_offsets(np.c_[x, y])
    return sc,

ani = FuncAnimation(fig, update, frames=200, interval=30)
plt.show()
```

می‌بینی که با کمتر از ۲۰ خط کد می‌شه شبیه‌سازیِ گازِ ایده‌آل ساخت.

---

## منابع و کاوشِ بیشتر 📚

### مقالات
- ویکی‌پدیای فارسی: [حالت‌های ماده](https://fa.wikipedia.org/wiki/%D8%AD%D8%A7%D9%84%D8%AA%E2%80%8C%D9%87%D8%A7%DB%8C_%D9%85%D8%A7%D8%AF%D9%87)، [پلاسما](https://fa.wikipedia.org/wiki/%D9%BE%D9%84%D8%A7%D8%B3%D9%85%D8%A7_(%D9%81%DB%8C%D8%B2%DB%8C%DA%A9))
- Wikipedia EN: [State of matter](https://en.wikipedia.org/wiki/State_of_matter)، [Plasma](https://en.wikipedia.org/wiki/Plasma_(physics))، [Bose–Einstein condensate](https://en.wikipedia.org/wiki/Bose%E2%80%93Einstein_condensate)
- [HyperPhysics — States of Matter](http://hyperphysics.phy-astr.gsu.edu/hbase/permot.html)
- Khan Academy: [States of matter (free)](https://www.khanacademy.org/science/chemistry/states-of-matter-and-intermolecular-forces)

### ویدئو (یوتیوب)
- TED-Ed: [The chemistry of cold-cooking food](https://www.youtube.com/results?search_query=ted+ed+states+of+matter)
- Veritasium: [What is plasma?](https://www.youtube.com/results?search_query=veritasium+plasma+state)
- Crash Course Chemistry: [States of matter](https://www.youtube.com/results?search_query=crash+course+chemistry+states+of+matter)

### ویدئو (آپارات — فارسی)
- [جست‌وجو: حالت‌های ماده فیزیک دهم](https://www.aparat.com/result/%D8%AD%D8%A7%D9%84%D8%AA_%D9%87%D8%A7%DB%8C_%D9%85%D8%A7%D8%AF%D9%87_%D9%81%DB%8C%D8%B2%DB%8C%DA%A9_%D8%AF%D9%87%D9%85)
- [جست‌وجو: پلاسما حالت چهارم ماده](https://www.aparat.com/result/%D9%BE%D9%84%D8%A7%D8%B3%D9%85%D8%A7_%D8%AD%D8%A7%D9%84%D8%AA_%DA%86%D9%87%D8%A7%D8%B1%D9%85)

### شبیه‌ساز خارجی
- [PhET — States of Matter (فارسی موجوده)](https://phet.colorado.edu/fa/simulations/states-of-matter)
- [PhET — Gas Properties](https://phet.colorado.edu/fa/simulations/gas-properties)

### روی همین سایت 🔗
- [نسخه‌ی ریاضی-فیزیک با مثال‌های ترمودینامیکی](https://physicsme.ir/articles/halat-haye-madde/)

---

*تو زیرفصل بعد می‌ریم سراغِ نیروی بین‌مولکولی — چرا قطره‌ی آب رو برگِ نیلوفر گرد می‌مونه؟ 🌿💧*
