# Content Management System (CMS mini)

Content management system is a web application, which allows to perform CRUD operations to various content.
In this project I created a mini representation of it.

## Instalation

1. You will need AMPPS (_Make sure it's turned on before importing_).
1. You will need a database management application (**MySQL Workbench recommended**).
1. Clone or download and extract the project into your AMPPS projects folder(_By default it's Ampps/www/_).
1. Import the **schema** directory into MySQL Workbench. In MySQL Workbench select -> **Server** -> **Data Import** -> Locate the **schema** directory in projects **root** directory -> **Start Import**.
1. Open your prefered terminal in projects **root** directory and execute **"composer install"** or **php composer.phar install** if you don't have it installed globally(making sure path to composer.phar is accurate then).

## Usage

- Make sure AMPPS is turned on.
- You can find some test users in users.json.
- Open the **root** directory via localhost.
- Log in as an admin to test out the management or as a user.
