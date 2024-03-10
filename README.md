<h1 align="center">Dine Wise</h1>
<p align="center"><i>Addressing Challenges and Opportunities in Restaurant Management through Technological Innovationy</i></p>

<p align="center"><a href="#" target="_blank"><img src="public/assets/logo.png" width="400" alt="Dine Wise Logo"></a></p>

<div align="center">
  <a href="https://github.com/subhanRaj/dinewise/stargazers"><img src="https://img.shields.io/github/stars/SubhanRaj/dinewise" alt="Stars Badge"/></a>
<a href="https://github.com/subhanRaj/dinewise/network/members"><img src="https://img.shields.io/github/forks/SubhanRaj/dinewise" alt="Forks Badge"/></a>
<a href="https://github.com/subhanRaj/dinewise/pulls"><img src="https://img.shields.io/github/issues-pr/SubhanRaj/dinewise" alt="Pull Requests Badge"/></a>
<a href="https://github.com/subhanRaj/dinewise/issues"><img src="https://img.shields.io/github/issues/SubhanRaj/dinewise" alt="Issues Badge"/></a>
<a href="https://github.com/subhanRaj/dinewise/graphs/contributors"><img alt="GitHub contributors" src="https://img.shields.io/github/contributors/SubhanRaj/dinewise?color=2b9348"></a>
<a href="https://github.com/subhanRaj/dinewise/blob/main/LICENSE"><img src="https://img.shields.io/github/license/SubhanRaj/dinewise?color=2b9348" alt="License Badge"/></a>
</div>

## About Dine Wise

DineWise is a comprehensive restaurant management software application developed using Laravel, designed to address the challenges and opportunities faced by modern restaurants in today's competitive market. It empowers restaurants to streamline operations, optimize workflows, and improve overall efficiency, ultimately leading to increased profitability and enhanced customer satisfaction.


## Tech Stack


<div align="center">
<!-- laravel -->
<img src="https://img.shields.io/badge/laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel Badge"/>
<!-- blade -->
<img src="https://img.shields.io/badge/blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Blade Badge"/>
<!-- bootstrap -->
<img src="https://img.shields.io/badge/bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap Badge"/>
<!-- firebase -->
<img src="https://img.shields.io/badge/firebase-FFCA28?style=for-the-badge&logo=firebase&logoColor=white" alt="Firebase Badge"/>
<!-- mysql -->
<img src="https://img.shields.io/badge/mysql-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL Badge"/>
</div>

## Prequesties

As this project is built on Laravel, you need to have the following installed on your system:

- Any Server (XAMPP, WAMP, LAMP, etc.) with PHP version 8.0 or above
- Ensure you met all the requriments as mentioned in [Laravel Documentation](https://laravel.com/docs/10.x/deployment#server-requirements).
- Composer for managing dependencies, which can be installed from [here](https://getcomposer.org/download/).
- NodeJS & NPM for managing frontend dependencies, which can be installed from [here](https://nodejs.org/en/download/).

As long as you have the above installed, you are good to go.

## Setup and Installation

You can follow the steps below to setup the project on your system:

1. Clone the repository to your system using the following command:

```bash
git clone https://github.com/subhanRaj/dinewise.git
```

2. Navigate to the project directory:

```bash
cd dinewise
```

3. Install all the dependencies using composer:

```bash
composer install
```
4. Install all the dependencies using npm:

```bash
npm install
```

5. Create a copy of `.env.example` file as `.env` and update the database credentials:

```bash
cp .env.example .env
```

6. Set the application key:

```bash
php artisan key:generate
```
7. Run the database migrations:

```bash
php artisan migrate
```
8. Run the database seeder:

```bash
php artisan db:seed
```
1. Setup Email configuration in `.env` file for OTP verification:

```bash
MAIL_MAILER= // Your Mail Driver
MAIL_HOST= // Your SMTP Host
MAIL_PORT= // Your SMTP Port
MAIL_USERNAME= // Your SMTP Username
MAIL_PASSWORD= // Your SMTP Password
MAIL_ENCRYPTION= // Your SMTP Encryption
MAIL_FROM_ADDRESS= // Your SMTP From Address
MAIL_FROM_NAME="${APP_NAME}"
```

10. Run the artisan serve command:

```bash
php artisan serve
```

11. Run the npm watch command:

```bash
npm run watch
```


Now, you can access the application at `http://localhost:3000`.

## Contributing

We welcome contributions to Dine Wise. If you are interested in contributing to this project, please read our [contributing guidelines](CONTRIBUTING.md).

## License

Dine Wise is open-sourced software licensed under the [MIT license](LICENSE). You are free to use, modify, distribute, and sell it under the given license.


