# Bravo

 Bravo is a personal project, a mini MVC framework in PHP that I developed while drawing the best points from Laravel, Symfony and the Node.js side. I like simplicity, so I decided to make a simple product. For the moment, I manage the Route, the middlewares, the CORS, the easy sending of mails, as well as a mini ORM.

![Packagist Version (custom server)](https://img.shields.io/packagist/v/Blakvghost/Bravo?label=stable)
![Packagist Version (custom server)](https://img.shields.io/packagist/l/Blakvghost/Bravo?label=Licence)
![Packagist Version (custom server)](https://img.shields.io/packagist/dt/Blakvghost/Bravo?label=download)

## Documentation

Documentation for Bravo is being prepared and will be available soon. Stay tuned for updates!
For the moment refer to the documentation or the source code of the [Framework Core (Juste)](https://github.com/BlakvGhost/Juste).

## How to use

To see an example of using Bravo, you can refer to the [Bravo-mailer](https://github.com/BlakvGhost/bravo-mailer) project. It serves as a demonstration project and will have official documentation soon.

## Requirements

- PHP 8.0 or higher
- [blakvghost/juste](https://packagist.org/packages/blakvghost/juste) package (version 2.0 or higher)

## Installation

To install Bravo, you can either go through composer or through github

### composer

1. Create the project with composer

```sh
composer create-project blakvghost/bravo <project-name>
```

### github

1. Clone the project repository from GitHub by running the following command:

```sh
git clone https://github.com/BlakvGhost/Bravo.git
```

2. After cloning the repository, navigate to the project directory:

```sh
cd Bravo
```

3. Install the project dependencies by running the following command:

```sh
composer install
```

4. Once the dependencies are installed, you can start using Bravo in your PHP project.

By cloning the project repository, you will have the complete Bravo framework and all its dependencies available in your project directory. This allows you to customize and extend Bravo according to your needs.

Please note that you will need to have Git and Composer installed on your system for this installation method to work.

If you encounter any issues during the installation process, please make sure to check the project's documentation or reach out to the project's author for support

## Start Server

For the moment use the php server by following these steps:

1. Make sure you have php >= 8.0 and have php in your session environment variables for Windows users

2. Open your terminal or command prompt in the project directory:

```sh
cd <project-name>
```

3. start php server on public folder:

```sh
php -s -S localhost:8000 -t ./public
```

3. Open your browser and head to `localhost:8000` or change the port

## Usage Examples

### Routing

```php
<?php

namespace Routes;

use App\Controllers\WelcomeController;
use Juste\Facades\Routes\Route;

Route::get("/", [WelcomeController::class, 'welcome'])->name('welcome');
Route::resource('password', WelcomeController::class);


Route::group(function () {
    
})->middlewares(['auth']);

require_once 'api.php';

```

### API Route

```php
<?php

namespace Routes;

use App\Controllers\MailsController;
use Juste\Facades\Routes\Route;

Route::post('api/mails', [MailsController::class, 'index'])->name('api')->middlewares(['cors']);
```

### Middleware

```php
<?php

namespace App\Middleware;

use Juste\Http\Middleware\MiddlewareInterface;
use Juste\Facades\Controllers\Controller as Helpers;

class Authenticate extends Helpers implements MiddlewareInterface
{

    public function handle(): mixed
    {
        if (!$this->user()) {
            return $this->redirect('login');
        }
        return 1;
    }
}
```

### Model

```php
<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['nom', 'prenom', 'email', 'password'];
}
```

### Controller

```php
<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Juste\Facades\Mails\JusteMailer;

class MailsController extends Controller
{
    public function __construct()
    {
        $this->mustAuthenticate(false);
    }

    public function index()
    {
        $mail = new JusteMailer();

        $object = [
            'to' => 'dev@kabirou-alassane.com',
            'subject' => 'Message d\'un potentiel client',
        ];

        $data = [
            'name' => $this->input('name', "Anonymous"),
            'email' => $this->input('email', "anonymous@anonymous.com"),
            'subject' => $this->input('subject', "Anonyme"),
            'message' => $this->input('message', "Anonyme"),
        ];

        $mail->view('mails/contact', $data)->sendEmail($object);
        return $this->back();
    }
}
```

## Authors

- [Kabirou ALASSANE](https://github.com/BlakvGhost)

## Support

For support, you can reach out to me by email at <dev@kabirou-alassane.com>. Feel free to contact me if you have any questions or need assistance with Bravo.

## License

This project is licensed under the MIT License.
