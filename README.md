# Employee Attendance System with QR Code & Face Recognition

A comprehensive web-based employee attendance management system that combines QR code scanning with face recognition technology for secure and accurate attendance tracking.

## 🚀 Features

### Employee Features
- **User Registration**: New employees can register with personal details
- **Unique ID Generation**: Each employee receives a unique QR code ID
- **Secure Login**: Employee authentication system
- **QR Code Scanning**: Employees scan their unique QR code for attendance
- **Face Recognition**: Additional security layer with facial verification
- **Attendance History**: View personal attendance records

### Admin Features
- **Admin Dashboard**: Comprehensive overview of all employees
- **Employee Management**: Add, edit, or remove employee records
- **Attendance Reports**: View detailed attendance reports with filters
- **Real-time Tracking**: Monitor attendance in real-time
- **Export Data**: Export attendance data in various formats
- **System Analytics**: Attendance statistics and insights

## 🛠️ Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Server**: XAMPP (Apache, MySQL, PHP)
- **QR Code**: JavaScript QR Code libraries
- **Face Recognition**: Web-based face detection APIs
- **Responsive Design**: Bootstrap/Custom CSS

## 📋 Prerequisites

Before running this project, make sure you have:

- XAMPP Server (Apache, MySQL, PHP)
- Web browser with camera access
- PHP 7.4 or higher
- MySQL 5.7 or higher

## 🔧 Installation & Setup

### Step 1: Download and Install XAMPP
1. Download XAMPP from [official website](https://www.apachefriends.org/)
2. Install and start Apache and MySQL services

### Step 2: Clone/Download Project
```bash
git clone https://github.com/yourusername/employee-attendance-qr.git
```
Or download the ZIP file and extract it.

### Step 3: Setup Project Files
1. Copy the project folder to `xampp/htdocs/`
2. Rename the folder to `employee-attendance` (or your preferred name)

### Step 4: Database Setup
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Create a new database named `attendance_db`
3. Import the provided SQL file:
   - Click on the `attendance_db` database
   - Go to "Import" tab
   - Choose `database/attendance_db.sql` file
   - Click "Go"

### Step 5: Configure Database Connection
1. Open `config/database.php`
2. Update database credentials if needed:
```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance_db";
?>
```

### Step 6: Set Permissions
Ensure the following directories have write permissions:
- `uploads/` (for profile pictures)
- `qr_codes/` (for generated QR codes)
- `logs/` (for system logs)

## 🚀 Running the Application

1. Start XAMPP (Apache and MySQL)
2. Open web browser
3. Navigate to `http://localhost/employee-attendance/`
4. The application should load successfully

## 📱 Usage

### For Employees:

1. **Registration**:
   - Click "Register" on the homepage
   - Fill in personal details (Name, Email, Phone, Department)
   - Upload profile picture
   - Submit registration

2. **Getting QR Code**:
   - After registration, receive unique employee ID
   - Download/save the generated QR code
   - Print or save QR code for daily use

3. **Daily Attendance**:
   - Login with credentials
   - Click "Mark Attendance"
   - Scan your QR code using the scanner
   - Complete face recognition verification
   - Attendance marked successfully

### For Admins:

1. **Admin Login**:
   - Use admin credentials (default: admin/admin123)
   - Access admin dashboard

2. **Manage Employees**:
   - View all registered employees
   - Add new employees manually
   - Edit employee information
   - Deactivate/activate employees

3. **View Reports**:
   - Daily attendance reports
   - Monthly/yearly summaries
   - Export data as CSV/Excel
   - Generate custom reports

## 📊 Database Structure

### Tables:
- `employees` - Employee information
- `attendance` - Daily attendance records
- `admin_users` - Admin user accounts
- `departments` - Department information
- `settings` - System configuration

## 🔒 Security Features

- Password hashing for secure authentication
- Session management for user security
- SQL injection prevention
- XSS protection
- File upload validation
- Face recognition for additional security

## 📸 Screenshots

### Employee Registration
![Registration Screenshot](screenshots/registration.png)

### QR Code Scanning
![QR Scan Screenshot](screenshots/qr-scan.png)

### Admin Dashboard
![Admin Dashboard Screenshot](screenshots/admin-dashboard.png)

### Attendance Reports
![Reports Screenshot](screenshots/reports.png)

## 🐛 Troubleshooting

### Common Issues:

1. **Camera not working**:
   - Ensure HTTPS or localhost access
   - Grant camera permissions
   - Check browser compatibility

2. **Database connection error**:
   - Verify MySQL is running
   - Check database credentials
   - Ensure database exists

3. **QR code not generating**:
   - Check write permissions on qr_codes folder
   - Verify QR code library is included

4. **Face recognition issues**:
   - Ensure good lighting
   - Camera should be at eye level
   - Clear face visibility required

## 🔮 Future Enhancements

- [ ] Mobile app development
- [ ] Biometric integration
- [ ] Advanced reporting features
- [ ] Email notifications
- [ ] Multi-language support
- [ ] Cloud deployment options
- [ ] API development
- [ ] Real-time notifications

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Team

- **Surekha Pamulapati** - Lead Developer
- Email: surekhapamulapati3@gmail.com
- GitHub: [@your-github-username](https://github.com/your-github-username)

## 🙏 Acknowledgments

- Thanks to the open-source community for QR code libraries
- Face recognition API providers
- Bootstrap for responsive design
- PHP community for excellent documentation

## 📞 Support

If you encounter any issues or have questions:
- Create an issue on GitHub
- Email: surekhapamulapati3@gmail.com
- Documentation: Check the `docs/` folder for detailed guides

---

⭐ **Star this repository if you find it helpful!**

**Made with ❤️ by Surekha Pamulapati**