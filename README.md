# Laravel-Based Standalone Music Library Application

This project is a standalone **music library application** built with **Laravel** and integrated with **SQLite** for local database management. It allows users to manage their music collections and integrates with popular music APIs for advanced features like track metadata, album art, and playback.

The application is designed to work without requiring additional software installation. It includes a built-in PHP server and uses SQLite as an embedded database.

---

## **Features**

### 🎵 **Music Library Management**
- Add, edit, and delete music tracks.
- Organize tracks by albums, artists, and genres.
- Search and filter your collection.

### 🌐 **Music API Integration**
- Fetch track metadata and album covers from services like:
    - Spotify
    - Last.fm
    - Deezer
    - MusicBrainz

### 🎧 **Music Player**
- Built-in music player to play local tracks.
- Playlist support with repeat and shuffle features.

### 📊 **Advanced Statistics**
- Analyze your library with detailed statistics, like:
    - Most played tracks.
    - Favorite genres and artists.
    - Total playtime.

### 🔄 **Offline Mode**
- Fully functional offline without needing an internet connection.
- Sync data with APIs when back online.

### 📁 **Portable**
- Self-contained application: no external database or complex setup required.
- SQLite database auto-creates on first run.

---

## **Requirements**

- PHP 8.x+ (recommended).
- Composer.

---

## **Installation and Usage**

### **For End Users**

1. **Download the Application:**
    - Get the latest release from the [Releases](https://github.com/your-repo/releases) page.

2. **Extract the Files:**
    - Extract the archive to a desired folder on your machine.

3. **Start the Application:**

---

### **For Developers**

1. **Install composer dependencies**
```sh
composer install
```
2. **Install npm dependencies**
```sh
yarn install
```
3. **Copy .env.example to .env**
4. **Start the Application:**
```sh
php artisan native:serve
```
```sh
yarn dev
```
---
