# 🚀 Quick Start Guide - The Sprout Academy

## ⚡ Get Running in 5 Minutes

### Step 1: Start the Server
```bash
cd D:\laragon\www\sproutAcademy
php artisan serve
```

### Step 2: Open Your Browser
Visit: **http://localhost:8000**

### Step 3: Add Your Images
Place images in these folders:
- `public/frontend/assets/images/` - Logos (4 files)
- `public/frontend/assets/images_for_homepage/` - Homepage images (16 files)

See `IMAGE_OPTIMIZATION_GUIDE.md` for exact specifications.

---

## 📋 What's Included

✅ **Complete Homepage** with 10 sections  
✅ **Responsive Design** (mobile to desktop)  
✅ **Accessibility Features** (WCAG 2.1 AA)  
✅ **5 Routes** configured  
✅ **Bootstrap 5** integrated  
✅ **Custom CSS** (1,500+ lines)  
✅ **Interactive JavaScript**  
✅ **Comprehensive Documentation**

---

## 🎨 Current Routes

| Route | URL | Status |
|-------|-----|--------|
| Home | http://localhost:8000 | ✅ Complete |
| About | http://localhost:8000/about | 🔜 Phase 2 |
| Programs | http://localhost:8000/programs | 🔜 Phase 2 |
| Locations | http://localhost:8000/locations | 🔜 Phase 2 |
| Contact | http://localhost:8000/contact | 🔜 Phase 2 |

---

## 📁 Key Files

| File | Purpose |
|------|---------|
| `resources/views/frontend/pages/index.blade.php` | Homepage content |
| `resources/views/frontend/partials/header.blade.php` | Site header |
| `resources/views/frontend/partials/footer.blade.php` | Site footer |
| `public/frontend/assets/style.css` | Main styles |
| `public/frontend/assets/responsive.css` | Responsive styles |
| `public/frontend/assets/js/app.js` | JavaScript |

---

## 🛠️ Common Commands

```bash
# Clear all caches
php artisan config:clear && php artisan cache:clear && php artisan view:clear

# View all routes
php artisan route:list

# Stop server
Ctrl + C
```

---

## 📖 Documentation

- **FRONTEND_README.md** - Complete guide
- **IMAGE_OPTIMIZATION_GUIDE.md** - Image specs
- **DEPLOYMENT_CHECKLIST.md** - Go-live checklist
- **PROJECT_SUMMARY.md** - Overview

---

## ✅ Next Actions

1. **Add images** to the two image folders
2. **Test locally** at http://localhost:8000
3. **Review content** and make any text changes
4. **Deploy** when ready (see DEPLOYMENT_CHECKLIST.md)

---

## 🆘 Need Help?

**Images not showing?**
- Check file names match exactly (case-sensitive)
- Verify files are in correct directories
- Clear browser cache (Ctrl+Shift+R)

**Page not loading?**
- Ensure server is running (`php artisan serve`)
- Check for errors in terminal
- Try clearing caches

**Want to customize?**
- Colors: Edit `:root` variables in `style.css`
- Content: Edit blade files in `resources/views/`
- Styles: Add to `style.css` or `responsive.css`

---

## 🎉 You're All Set!

The homepage is complete and ready for your images. Start the server and check it out!

**Happy coding! 🌱**

