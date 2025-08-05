# MediConnect - Virtual Healthcare Platform

<p align="center">
  <img src="public/image/logo.png" alt="MediConnect Logo" width="200"/>
</p>

<p align="center">
  <strong>Connecting patients with certified doctors through secure virtual consultations</strong>
</p>

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [How It Works](#how-it-works)
- [Installation](#installation)
- [Configuration](#configuration)
- [Testing](#testing)
- [Deployment](#deployment)
- [API Documentation](#api-documentation)
- [Contributing](#contributing)
- [License](#license)

## 🏥 About

MediConnect is a comprehensive virtual healthcare platform that bridges the gap between patients and healthcare providers. Built with modern web technologies, it offers secure, real-time video consultations, appointment management, and prescription services.

### Key Benefits

- **Easy Access**: Schedule consultations from anywhere, anytime
- **Timely Care**: Quick appointments with minimal waiting time
- **Privacy & Security**: End-to-end encryption for all communications
- **Quality Care**: Vetted and certified healthcare professionals
- **User-Friendly**: Intuitive interface for all users

## ✨ Features

### For Patients
- **User Registration & Profile Management**: Complete patient profiles with medical history
- **Doctor Search & Discovery**: Browse doctors by specialization, location, and availability
- **Appointment Booking**: Schedule consultations with preferred doctors
- **Real-time Video Consultations**: Secure WebRTC-based video calls
- **Prescription Management**: Digital prescriptions and medication tracking
- **Review System**: Rate and review healthcare providers
- **Notification System**: Real-time updates on appointments and consultations

### For Doctors
- **Professional Profile Management**: Detailed profiles with specializations and experience
- **Appointment Management**: View and manage patient appointments
- **Video Consultation Tools**: Professional consultation interface with controls
- **Prescription Writing**: Digital prescription creation and management
- **Patient History Access**: View patient medical records and consultation history
- **Earnings Tracking**: Monitor consultation fees and earnings

### For Administrators
- **Doctor Approval System**: Review and approve doctor registrations
- **Platform Management**: Monitor system health and user activities
- **Content Management**: Manage specializations and platform content

## 🛠 Technology Stack

### Backend
- **Laravel 11.x** - PHP web framework
- **PHP 8.2+** - Server-side programming language
- **MySQL/PostgreSQL** - Database management
- **Laravel Reverb** - Real-time WebSocket broadcasting
- **Laravel Livewire** - Dynamic frontend components

### Frontend
- **Blade Templates** - Server-side templating engine
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Build tool and development server

### Real-time Communication
- **WebRTC** - Peer-to-peer video/audio communication
- **SimplePeer.js** - WebRTC library for signaling
- **Laravel Broadcasting** - Real-time event broadcasting

### Development Tools
- **Laravel Sail** - Docker development environment
- **PHPUnit** - Testing framework
- **Laravel Debugbar** - Development debugging
- **Laravel Pint** - Code styling

## 🔄 How It Works

### 1. User Registration & Authentication
- Multi-role authentication system (Patient, Doctor, Admin)
- Secure password hashing and session management
- Role-based access control with middleware

### 2. Doctor Discovery & Booking
- Advanced search functionality with filters
- Specialization-based doctor categorization
- Real-time availability checking
- Appointment scheduling with date/time selection

### 3. Video Consultation Process
1. **Appointment Creation**: Patient books appointment with doctor
2. **Consultation Setup**: System creates consultation room with unique IDs
3. **WebRTC Signaling**: Exchange of connection offers/answers between peers
4. **Video Call**: Secure peer-to-peer video/audio communication
5. **Session Management**: Real-time status updates and controls

### 4. Prescription & Follow-up
- Digital prescription creation during consultations
- Medication tracking and management
- Follow-up appointment scheduling
- Medical record maintenance

## 🚀 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer 2.0 or higher
- Node.js 18+ and npm
- MySQL 8.0+ or PostgreSQL 13+
- Web server (Apache/Nginx)

### Step 1: Clone the Repository
```bash
git clone https://github.com/your-username/MediConnect.git
cd MediConnect
```

### Step 2: Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### Step 3: Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Database Setup
```bash
# Configure database in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mediconnect
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Run migrations
php artisan migrate

# Seed database with sample data (optional)
php artisan db:seed
```

### Step 5: Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### Step 6: Start Development Server
```bash
# Using Laravel's built-in server
php artisan serve

# Or using Laravel Sail (Docker)
./vendor/bin/sail up
```

## ⚙️ Configuration

### Environment Variables
Key environment variables to configure:

```env
# Application
APP_NAME=MediConnect
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mediconnect
DB_USERNAME=root
DB_PASSWORD=

# Broadcasting (for real-time features)
BROADCAST_CONNECTION=reverb
REVERB_APP_KEY=your_reverb_key
REVERB_APP_SECRET=your_reverb_secret
REVERB_APP_ID=your_reverb_app_id
REVERB_HOST=127.0.0.1
REVERB_PORT=8080
REVERB_SCHEME=http

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Web Server Configuration

#### Apache (.htaccess included)
```apache
<VirtualHost *:80>
    ServerName mediconnect.local
    DocumentRoot /path/to/MediConnect/public
    
    <Directory /path/to/MediConnect/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

#### Nginx
```nginx
server {
    listen 80;
    server_name mediconnect.local;
    root /path/to/MediConnect/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 🧪 Testing

### Running Tests
```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit

# Run tests with coverage
php artisan test --coverage

# Run tests in parallel
php artisan test --parallel
```

### Test Structure
```
tests/
├── Feature/          # Feature tests
│   ├── AppointmentTest.php
│   ├── ConsultationTest.php
│   ├── DoctorTest.php
│   └── UserTest.php
└── Unit/            # Unit tests
    ├── Models/
    └── Services/
```

### Writing Tests
```php
// Example feature test
public function test_user_can_book_appointment()
{
    $user = User::factory()->create(['role' => 'user']);
    $doctor = Doctor::factory()->create();
    
    $response = $this->actingAs($user)
        ->post("/book-appointment/{$doctor->id}", [
            'date' => '2024-12-25',
            'time' => '10:00:00',
            'message' => 'Test appointment'
        ]);
    
    $response->assertRedirect();
    $this->assertDatabaseHas('appointments', [
        'doctor_id' => $doctor->id,
        'patient_id' => $user->patient->id
    ]);
}
```

## 🚀 Deployment

### Production Deployment Checklist

1. **Environment Setup**
   ```bash
   # Set production environment
   APP_ENV=production
   APP_DEBUG=false
   
   # Optimize for production
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **Database Migration**
   ```bash
   php artisan migrate --force
   ```

3. **Asset Compilation**
   ```bash
   npm run build
   ```

4. **File Permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   chown -R www-data:www-data storage bootstrap/cache
   ```

### Docker Deployment
```bash
# Using Laravel Sail
./vendor/bin/sail up -d

# Custom Docker setup
docker-compose up -d
```

### Cloud Deployment Options

#### Heroku
```bash
# Create Heroku app
heroku create mediconnect-app

# Set environment variables
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false

# Deploy
git push heroku main
```

#### AWS/EC2
```bash
# Install dependencies
composer install --no-dev --optimize-autoloader
npm run build

# Set up supervisor for queue workers
sudo supervisorctl reread
sudo supervisorctl update
```

## 📚 API Documentation

### Authentication Endpoints
```
POST /login                    # User login
POST /user/register           # Patient registration
POST /doctor/register         # Doctor registration
GET  /logout                  # User logout
```

### Appointment Endpoints
```
GET  /book-appointment/{doctor}     # Show appointment form
POST /book-appointment/{doctor}     # Create appointment
GET  /all-appointments/            # List all appointments
DELETE /appointment/{appointment}   # Cancel appointment
```

### Consultation Endpoints
```
GET  /connect/patient/{consultation}     # Patient consultation room
GET  /connect/doctor/{consultation}      # Doctor consultation room
POST /connect/doctor/{consultation}/offer # WebRTC offer
POST /connect/patient/{consultation}/answer # WebRTC answer
```

### Search Endpoints
```
GET  /search                    # Search doctors
GET  /get-search-results        # Get search results
GET  /specialized-doctors-list/{specialization} # Filter by specialization
```

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Guidelines
- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation as needed
- Use conventional commit messages

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

For support and questions:
- Create an issue on GitHub
- Email: support@mediconnect.com
- Documentation: [docs.mediconnect.com](https://docs.mediconnect.com)

## 🙏 Acknowledgments

- Laravel team for the amazing framework
- WebRTC community for real-time communication tools
- All contributors and beta testers

---

<p align="center">
  Made with ❤️ for better healthcare access
</p>
