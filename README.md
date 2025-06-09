# Platform Statistics

A Laravel + Vite project that displays platform investment statistics using bar, pie, and donut charts.

---

## 🚀 Getting Started

### 1. **Install Dependencies**

```bash
composer install
npm install
```

### 2. **Create Environment File**

```bash
cp .env.example .env
```

Then update database settings as needed.

### 3. **Generate App Key**

```bash
php artisan key:generate
```

### 4. **Run Migrations** (if applicable)

```bash
php artisan migrate
```

### 5. **Start Vite Dev Server**

```bash
npm run dev
```

### 6. **Serve the Application**

```bash
php artisan serve
```


---

## 📊 Features

* **Bar chart** showing monthly investments
* **Pie chart** for portfolio breakdown
* **Donut chart** with percentage labels using `chartjs-plugin-datalabels`
* Fully responsive (Bootstrap 4)
* Built with Laravel + Vite

---

## 🧱 Tech Stack

* Laravel 10+
* Vite
* Chart.js
* chartjs-plugin-datalabels
* Bootstrap 4

---

## 📂 File Structure

* `resources/views/` – Blade templates
* `resources/js/statistics.js` – Chart logic
* `resources/css/statistics.css` – Page styling
* `routes/web.php` – Routes

---
