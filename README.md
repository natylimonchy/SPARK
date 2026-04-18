# SPARK - PHP MVC Project

A PHP MVC (Model-View-Controller) application with MySQL database integration for user management and event handling.

## Overview

SPARK is a web application built using the MVC architectural pattern with PHP and MySQL. It provides user authentication, profile management, and event tracking capabilities.

## Project Architecture

### MVC Structure

- **Controller1/** - Application controllers handling business logic
  - `user.Controler.php` - User-related operations and actions

- **Model/** - Database models and schemas
  - `spark.sql` - MySQL database schema and initialization

- **Vista/** - View templates and user interface
  - Authentication pages: `login.php`, `registro.php`, `registroAdmin.php`, `registroUsuario.php`, `verificacion.php`, `logout.php`
  - User pages: `home.php`, `perfil.php`, `password.php`
  - Feature pages: `evento.php`, `tipoUsuario.php`
  - Styling: CSS files for each view component
  - Assets: `recursos/` (images), `uploads/` (user-generated content)

## Features

- **User Authentication**
  - User login and logout functionality
  - User registration (standard and admin registration)
  - Email verification
  - Password management and recovery

- **User Management**
  - User profiles with customizable settings
  - User types/roles differentiation
  - Profile updates

- **Event Management**
  - Event creation and tracking
  - Event categorization by type

## Requirements

- **Server Requirements:**
  - PHP 7.0 or higher
  - MySQL 5.7 or higher (or MariaDB equivalent)
  - Web server (Apache with mod_rewrite recommended)

- **Browser Support:**
  - Modern browsers with CSS3 and JavaScript support

## Installation

### 1. Clone/Download Project
```bash
# Copy project files to your web server directory
cp -r SPARK /var/www/html/
cd /var/www/html/SPARK
```

### 2. Database Setup

Import the database schema:

```bash
# Using MySQL command line
mysql -u root -p < Model/spark.sql

# Or through phpMyAdmin
# 1. Create a new database
# 2. Import Model/spark.sql
```

### 3. Configure Database Connection

Update your database configuration file with the following credentials:

```php
$host = 'localhost';
$user = 'your_db_user';
$password = 'your_db_password';
$database = 'spark_db';
```

### 4. Set Directory Permissions

```bash
# Allow uploads directory to be writable
chmod 755 Vista/uploads/
chmod 755 Vista/recursos/
```

### 5. Configure Web Server

For Apache, ensure `.htaccess` is enabled and URL rewriting is configured if using clean URLs.

## File Structure

```
SPARK/
├── README.md                 # Project documentation
├── Controller1/
│   └── user.Controler.php   # User controller logic
├── Model/
│   └── spark.sql            # Database schema
└── Vista/
    ├── home.php             # Home page
    ├── login.php            # Login form
    ├── logout.php           # Logout handler
    ├── registro.php         # Generic registration
    ├── registroAdmin.php    # Admin registration
    ├── registroUsuario.php  # User registration
    ├── verificacion.php     # Email verification
    ├── perfil.php           # User profile
    ├── password.php         # Password management
    ├── evento.php           # Event management
    ├── tipoUsuario.php      # User type management
    ├── CSS files            # Styling for each view
    ├── recursos/            # Static assets (images, icons)
    └── uploads/             # User-generated uploads
```

## Usage

### Accessing the Application

1. Start your web server (Apache/Nginx)
2. Open your browser and navigate to: `http://localhost/SPARK/` or your configured domain
3. Use the login page to access the system

### User Registration

1. Navigate to the registration page
2. Choose between standard user or admin registration
3. Fill in required information
4. Verify email address
5. Access your profile and manage settings

### Managing Content

- **Events:** Navigate to the Events section to create and manage events
- **Profile:** Update personal information in your profile
- **Account:** Manage password and security settings

## Configuration

### Database Configuration

Update your database connection settings in the main configuration file:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'spark_db');
```

### Session Configuration

Sessions are used for user authentication. Ensure PHP session handling is properly configured in `php.ini`.

## Security Considerations

- Always use prepared statements to prevent SQL injection
- Hash passwords using `password_hash()` and verify with `password_verify()`
- Implement CSRF tokens in forms
- Validate and sanitize all user input
- Use HTTPS in production
- Keep sensitive configuration files outside of web root
- Regularly update dependencies and PHP version

## Troubleshooting

### Database Connection Issues
- Verify MySQL service is running
- Check database credentials
- Ensure database and tables are created from `spark.sql`

### Upload Issues
- Verify `Vista/uploads/` directory permissions (755)
- Check PHP `upload_max_filesize` and `post_max_size` settings

### Authentication Issues
- Clear browser cookies and session data
- Verify user exists in database
- Check PHP session configuration

## Development Notes

- Follow MVC pattern strictly: keep business logic in controllers, presentation in views
- Use consistent naming conventions (camelCase for PHP, kebab-case for HTML/CSS)
- Comment complex logic for maintainability
- Test all user workflows before deployment

## Contributing

When contributing to this project:

1. Follow the existing MVC structure
2. Maintain code consistency
3. Test all changes thoroughly
4. Update documentation as needed

## License

This project is part of the SPARK system. All rights reserved.

## Support

For issues, questions, or support, please contact the development team.

---

**Last Updated:** April 2026
