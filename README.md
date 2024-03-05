Usage
Register a new user:

Access the registration page at /register.
Fill in the required fields: name, email, password, confirm password.
Click the "Register" button.
Login to the system:

Access the login page at /login.
Enter your email and password.
Click the "Login" button.
Update user profile:

Once logged in, access the dashboard at /dashboard.
You can update your father's name and mother's name from the dashboard.
Manage user addresses:

From the dashboard, you can view a list of user addresses and add or update them as needed.
Eloquent Relationships
Each user has one profile and multiple addresses.
Eloquent relationships have been used to fetch related data efficiently.
Route Protection
The dashboard route is protected and only accessible for logged-in users.
Unauthorized users will be redirected to the login page.
License
This project is licensed under the MIT License.
How to run:
To run a project in terminal run the comnand:
PHP artisan serve
to get full view run node also
For that use the command:
npm run dev
