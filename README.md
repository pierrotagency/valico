# Valico

### Build

1) Clone Repo.
2) Create database.
3) Put database credentials and the final domain in the .env file
4) Generate new project key with `php artisan key:generate`
5) Generate database structure with migration `php artisan migrate`
6) Populate levels table (coulnd't do an admin for that) with `php artisan db:seed`
7) Compile SCSS, JS, React and keep wagching changes `npm run dev`
8) Point the root of the server to de /public folder
