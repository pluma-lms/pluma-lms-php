# Pluma LMS (PHP)
A learning management system that combines popular solutions for education into an all-in-one, catch-all package.

## Design principles
Pluma LMS (PHP) keeps several key points in mind. These are:
- Object-oriented, easy-to-understand code.
- No daemon needs to be started in order to run Pluma LMS (PHP). We highly dislike them.
- Pluma intends to replace many different, fragmented, and incomplete learning management systems and other educational software such as Moodle, Canvas, Blackboard, Weebly, Edmodo, Home Access Center/Teacher Access Center, Remind.com, Eduphoria. There is no need to use all of these different softwares and services with a monolithic, complete LMS never seen before like Pluma.
- All Pluma components (e.g. notification system, gradebook management, etc.) are comprehensive in features; designed with students, teachers, and faculty in mind; and intricately work with each other.
- A secure, easy-to-use, and logical API that serves as the backend of the software.

# Requirements
- PHP 5.6 and above are officially supported. You may try PHP 5.3-5.5 at your own risk.
- MySQL 5 and above. Once again, you may try older versions at your own risk.
- Google Chrome for Pluma LMS endusers.

# Download and installation
You may download the latest stable release of Pluma LMS (PHP) from above.

Currently, installation requires the system administrator to simply enter "settings.php" and modify the variables to satisfy their environments. Then, create the database as specified. We will probably add a database creation script soon.

After that, your installation is complete. Pluma LMS (PHP) is committed to minimal setup and absolutely no shell script BS is needed, unless you prefer it. (Daemon scripts like a hypothetical ```launchPluma.sh``` will never exist.)

# Contributions
Anybody is welcome to contribute to Pluma LMS's code. Please fork our repository, make changes, and create a pull request. When you have done so, our core team will review your contribution and ensure it is beneficial for Pluma and reflects our design principles.

# To-do list
- [ ] Integrate language selector using $_SESSION and DB
- [ ] Move away from iframes, move towards dynamic getting HTML like Node.js flavor is doing
- [ ] SQLite support
- [x] Vitals
- [ ] Notifications
- [ ] Grades
- [ ] Calendar
- [ ] Attendance
