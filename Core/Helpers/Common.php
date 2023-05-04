<?php

namespace Facades\Helpers;

class Common
{
    /**
     * permet de recuperer tout le contenu de la variable globale $_POST echappés
     * @return array le contenu de la variable globale $_POST echappés
     */
    protected function posts(): array
    {
        $posts = [];
        foreach ($_POST as $key => $post) {
            if (!empty($post)) {
                $posts[$key] = htmlentities($post);
            }
        }
        return $posts;
    }

    /**
     * permet de recuperer la valeur d'une clée soit dans le $_SERVER
     * @param string $key 
     * @return string le contenu de la valeur de la clée ou de la valeur default
     */
    protected function server(string $key): string
    {
        $data = $_SERVER[$key];

        return $data;
    }

    /**
     * permet de recuperer la valeur d'une clée soit dans le $_POST ou $_GET
     * @param string $key 
     * @param string $default C'est la chaine de caractère a remplacer par default si la valeur d'une clée n'existe pas
     * @return string le contenu de la valeur de la clée ou de la valeur default
     */
    protected function input(string $key, string $default = ''): string
    {
        $data = $_REQUEST[$key];

        return !empty($data) ? htmlentities($data) : $default;
    }

    /**
     * permet de recuperer la valeur d'une clée soit dans le $_FILES
     * @param string $key 
     * @return string le contenu de la valeur de la clée
     */
    protected function file(string $key)
    {
        $file = $_FILES[$key];

        if ((isset($file) && $file['error'] == 0)) return $file;

        return $this->back()->with("Le fichier ne peut pas etre null");
    }

    /**
     * Prends un chemin et redirige l'utilisateur vers ce chemin en utilisant la function native header
     */
    protected function redirecTo(string $path = '')
    {
        header('Location: ' . $path);
        return $this;
    }

    /**
     * function permettant de valider les entrees par POST
     * @param string $path
     * @param string $option
     * @return string
     */
    protected function sanitize_post(string $key, bool $strict = true)
    {

        if ($strict) {

            if (!isset($_POST[$key]) || empty($_POST[$key])) {

                $this->back()->with("Le champs " . $key . " ne peut pas etre vide");

                exit();
            }
            return htmlentities($_POST[$key]);
        }

        return htmlentities($_POST[$key]);
    }

    /**
     * redirect to previous page
     */
    protected function back()
    {
        $to = $_SERVER['HTTP_REFERER'] ?? '/';
        //die("Hey !");
        header("Location: " . $to);
        return $this;
    }

    protected function with(string $message, $key = 'error')
    {
        $this->setDataOnSession($key, $message);

        return $this;
    }

    protected function json(array $data)
    {
        return json_encode($data);
    }

    protected function user($attr = false)
    {

        return isset($_SESSION['user']) ?
            ($attr ? $_SESSION['user'][$attr] : $_SESSION['user']) :
            [];
    }

    protected function store_media($file, string $newFileName): string
    {
        $base_path = UPLOAD_BASE_NAME . DS . $newFileName . '-' . date("Y-m-d-H-s-i") . '.' . pathinfo($file['name'])['extension'];
        $path = ASSETS_PATH . DS . $base_path;

        if (move_uploaded_file($file['tmp_name'], $path)) {
            return $base_path;
        } else {
            $this->back()->with("Erreur d'importation du fichier");
        }
    }

    protected function setDataOnSession($key, $message)
    {
        return $_SESSION[$key] = $message;
    }

    protected function getDataOnSession($key)
    {
        return $_SESSION[$key] ?? [];
    }

    protected function setErrorMessageOnSession($message)
    {
        return self::setDataOnSession('error', $message);
    }

    protected function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }

    /**
     * Retourne la route d'un url selon son alias
     * @param string $alias The alias of the Route
     */
    protected function route(string $alias): string
    {
        $routes = isset($_SESSION['routes']) ? $_SESSION['routes'] : [];

        return isset($routes[$alias]) ? '/' . $routes[$alias] : '/';
    }
}
