# ClassroomProject - A Google Classroom-like Platform  

## Overview  
ClassroomProject is a **Laravel-based** learning management system (LMS) inspired by **Google Classroom**. It allows **teachers** and **students** to interact in a virtual classroom environment. Teachers can **create classrooms**, **upload lessons**, **post assignments**, and **manage students**, while students can **join classrooms**, **submit assignments**, and **access learning materials**.  

### Key Features  
✅ **User Authentication** (Login/Registration)  
✅ **Role-Based Access Control** (Teacher & Student)  
✅ **Classroom Management** (Create, Join, View)  
✅ **Lesson Uploads** (PDFs, Videos, Links)  
✅ **Assignment System** (Create, Submit, Grade)  

---

## Technologies Used  
- **Backend:** PHP Laravel  
- **Frontend:** Blade Templating, Bootstrap/jQuery (or Vue.js if applicable)  
- **Database:** MySQL  
- **Authentication:** Laravel Breeze/Jetstream (or Sanctum if API-based)  

---

## Installation  
### Prerequisites  
- PHP ≥ 8.1  
- Composer  
- MySQL  
- Node.js (for frontend dependencies)  

### Steps  
1. **Clone the repository:**  
   ```bash
   git clone https://github.com/maker-dev/ClassroomProject.git
   cd ClassroomProject
   ```

2. **Install dependencies:**  
   ```bash
   composer install
   npm install
   ```

3. **Set up environment:**  
   - Copy `.env.example` to `.env`  
   - Configure database settings:  
     ```env
     DB_DATABASE=classroom_project
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Generate key & migrate database:**  
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```

5. **Run the project:**  
   ```bash
   php artisan serve
   npm run dev
   ```
   Access the app at: `http://localhost:8000`  
