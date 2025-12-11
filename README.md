# 🚀 Project Setup & Developer Guide

This repository contains the theme setup and component architecture.
Below are the installation steps and usage guides for **Alpine.js**, **Alpine plugins**, and the **Navi Composer package**.

---

## 📦 Install Alpine.js

Run the following command from **inside your theme directory**:

```bash
npm install alpinejs
```

Now import and initialize it inside **app.js**:

```js
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()
```

---

## 🔍 Install Alpine.js Focus Plugin

Run the following command from **inside your theme directory**:

```bash
npm install @alpinejs/focus
```

Then activate it in your **app.js**:

```js
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

Alpine.plugin(focus)
```

---

## 📉 Install Alpine.js Collapse Plugin

Run the following command from **inside your theme directory**:

```bash
npm install @alpinejs/collapse
```

Initialize it in **app.js**:

```js
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

Alpine.plugin(collapse)
```

---

### 🧠 Using Multiple Alpine Plugins?

You don't have to register each plugin separately.
Instead, you can load them all in one go:

```js
Alpine.plugin([collapse, focus])
```

This keeps your file cleaner and more scalable if you add more plugins later.

---

## 🧭 Navi Composer Package

Install via Composer **inside your theme directory**:

```bash
composer require log1x/navi
```
---

# ☝️ Additional usefull packages

In some projects the customer might want moving numbers and text or a content slider.
Below are the installation steps and usage guides for **Swiper.js** and **CountUp.js** that is used for that.

---

## 🌀 Swiper.js (Sliders & Carousels)

Run the following command from **inside your theme directory**:

```bash
npm install swiper
```

Initialize it in **app.js**:

```js
// import Swiper JS
import Swiper from 'swiper';
// import Swiper styles
import 'swiper/css';

const swiper = new Swiper(...);
```

By default Swiper exports only core version without additional modules (like Navigation, Pagination, etc.). So you need to import and configure them too:

```js
// core version + navigation, pagination modules:
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// init Swiper:
const swiper = new Swiper('.swiper', {
  // configure Swiper to use modules
  modules: [Navigation, Pagination],
  ...
});
```

If you want to import Swiper with all modules (bundle) then it should be imported from swiper/bundle:

```js
// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

// init Swiper:
const swiper = new Swiper(...);
```

---

## 🔢 CountUp.js (Animated Number Counter)

Run the following command from **inside your theme directory**:

```bash
npm i countup.js
```

Initialize it in **app.js**:

```js
import { CountUp } from 'countup.js';
```

---

## 📝 Helpful Tips & Documentation

✔ If changes don’t load, rebuild assets (npm run dev / npm run build)

✔ [Alpine.js Docs](https://alpinejs.dev/start-here)

✔ [Navi Composer Repo & Docs](https://github.com/Log1x/navi)

✔ [Swiper Docs](https://swiperjs.com/get-started)

✔ [CountUp.js Docs](https://github.com/inorganik/countUp.js)

---
