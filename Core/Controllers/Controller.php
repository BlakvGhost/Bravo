<?php

namespace Facades\Controllers;

use Facades\Helpers\Common;

class Controller extends Common
{
    /**
     * retourne une vue
     * @param string $viewPath
     * @return array full view path or 404 view path with context globale data
     */
    protected function render($view, $title = '', $context = null)
    {
        $view  = VIEW_PATH . DS . $view . '.php';

        $view = file_exists($view) ? $view : ERRORS_VIEW_PATH . DS . '404.php';

        return [
            'view_path' => $view,
            'context' => $context ?? [],
            'title' => $title
        ];
    }

    protected function can(array $user_type = null)
    {
        $this->mustAuthenticate();

        $user_type = $user_type ?? ['Admin', 'Technicien', 'Client'];

        $user_role = $this->user('roles');

        foreach ($user_type as $role) {
            if ($user_role === $role) return;
        }

        return $this->back()->with("Access Denied to this Ressource");
    }

    protected function mustAuthenticate(bool $statut = true)
    {
        if ($statut) {
            count($this->user()) ? null : $this->back()->with("Connect You first before accessing this resource");
        } else {
            !count($this->user()) ? null : $this->back()->with("You Can't access this resource during login time");
        }
    }
}
