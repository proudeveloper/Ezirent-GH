Ezirent is an end-to-end rental solution for tenants and property owners across Africa.
Subscribe to a monthly payment apartment, apply for rent assistance and pay your rent weekly or monthly
Verify your tenants or get your property managed for you.

## Requirements  
Before running this project, ensure your system meets the following requirements:

- PHP **>= 8.2**  
- Composer **latest version**  
- MySQL **>= 8.0** 
- Node.js **>= 18.x**
- Laravel **11.x**  
- Xampp
- A web server (Apache/Nginx)

## Installation Steps  

### 1. Clone the repository  
```bash
git clone https://github.com/proudeveloper/Ezirent_Ghana_New.git
cd your-laravel-project
```

### 2. Install dependencies  
```bash
composer install
```

### 3. Copy the environment file  
```bash
cp .env.example .env
```

### 4. Generate application key  
```bash
php artisan key:generate
```

### 5. Configure the `.env` file  
Update the database credentials in the `.env` file:  
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 6. Run migrations  
```bash
php artisan migrate
```

### 7. (Optional) Seed the database  
If you have seeders, run:  
```bash
php artisan db:seed
```

### 8. Install Node.js dependencies  
```bash
npm install && npm run dev
```

### 9. Start the development server  
```bash
php artisan serve
```
The app should now be running at `http://127.0.0.1:8000`.