# Bravo

 Bravo is a personal project, a mini MVC framework in PHP that I developed while drawing the best points from Laravel, Symfony and the Node.js side. I like simplicity, so I decided to make a simple product. For the moment, I manage the Route, the middlewares, the CORS, the easy sending of mails, as well as a mini ORM.

![Packagist Version (custom server)](https://img.shields.io/packagist/v/Blakvghost/Bravo?label=stable)
![Packagist Version (custom server)](https://img.shields.io/packagist/l/Blakvghost/Bravo?label=Licence)
![Packagist Version (custom server)](https://img.shields.io/packagist/dt/Blakvghost/Bravo?label=download)

## Documentation:

Documentation for Bravo is currently being prepared and will be available soon. Stay tuned for updates!

## How to use:

To see an example of using Bravo, you can refer to the [Bravo-mailer](https://github.com/BlakvGhost/bravo-mailer) project. It serves as a demonstration project and will have official documentation soon.

## Installation

To install Bravo, you can follow these steps:

1. Require the package using Composer by running the following command:

```sh
composer require blakvghost/bravo
```

2. Once the package is installed, you can start using Bravo in your PHP project.

## Requirements

- PHP 8.0 or higher
- [blakvghost/juste](https://packagist.org/packages/blakvghost/juste) package (version 2.0 or higher)

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