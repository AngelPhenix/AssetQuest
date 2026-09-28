# 🎮 AssetQuest - Video Game Asset Manager

> A modern personal video game collection and valuation tracker built with Laravel, featuring live IGDB API search integration, custom manual pricing, and SQLite.

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![SQLite](https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white)](https://www.sqlite.org)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Live Demo](https://img.shields.io/badge/Demo-Live-green?style=for-the-badge)](https://game-heritage-94bj.onrender.com/)

---

## 🌐 Live Demo
Test the application directly here: **[https://game-heritage-94bj.onrender.com/](https://game-heritage-94bj.onrender.com/)**

---

## 📸 Preview
*(Add your screenshots here later)*
![Home Page](https://raw.githubusercontent.com/AngelPhenix/AssetQuest/refs/heads/main/gh-images/sc01.png)
![Modifying & PriceCharting](https://raw.githubusercontent.com/AngelPhenix/AssetQuest/refs/heads/main/gh-images/sc02.png)
![Search & Add](https://raw.githubusercontent.com/AngelPhenix/AssetQuest/refs/heads/main/gh-images/sc03.png)

---

## ✨ Main Features

- **Personal Video Game Library:** Track, organize, and value your video game collection in one clean interface.
- **Dynamic IGDB API Integration:** Search for any game in real-time (powered by JavaScript and the IGDB database) to instantly fetch official titles, covers, and associated platforms.
- **Manual Valuation & Pricing:** Assign custom prices or market value estimates manually to each game in your library to keep track of your portfolio's worth.
- **Secure Authentication:** User-specific accounts and personalized session management.

---

## 🛠️ Tech Stack

- **Backend:** PHP / Laravel
- **Database:** SQLite
- **Frontend / Assets:** Blade, Tailwind CSS, Vite & Vanilla JavaScript (Fetch API)
- **External API:** IGDB API (Twitch OAuth Authentication)
- **Hosting:** Render

---

## 📋 Todo / Roadmap

- [x] **Core Setup:** Database schema implementation (Users, Games, User-Games pivot table).
- [x] **IGDB Search Module:** Search bar to query games dynamically from the API.
- [x] **Collection Analytics:** Display total portfolio valuation charts and platform breakdown statistics.
- [ ] **Wishlist Support:** Differentiate between owned games and games you want to acquire.

---

## 🚀 You want to tweak things yourself and make it your own? (Local Development)

If you want to run this application locally for testing or development purposes, follow these steps:

### Prerequisites
Make sure you have the following tools installed on your machine:
* [Laravel Herd](https://herd.laravel.com/) (recommended local environment for PHP/Laravel)

### Installation Steps

You can set up the project either automatically using the provided script or manually.
I made a script to automate the process but you're free to open the .bat file and enter the commands yourself.

#### Automatic Setup (Recommended for Windows)
At the root of your project, simply run the setup script:
```bash
setup.bat
```
After everything's executed and installed, you can open Laravel Herd, "Add a Site", select the folder and it should be ready for use.
Don't forget to get into the folder and run the command 
```bash
npm run dev
```
Whenever you want to start coding/modifying files.

## 👤 Author

**Jérémy Mattausch**
- GitHub: [@AngelPhenix](https://github.com/AngelPhenix)
- LinkedIn: [Jérémy Mattausch](https://www.linkedin.com/in/jeremy-mattausch/)
- Year: 2026