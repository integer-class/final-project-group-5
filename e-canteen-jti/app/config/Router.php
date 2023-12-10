<?php 

namespace config;

class Router {
    private static array $routes = [];

    public static function add(string $method, string $path, string $controller, string $function):void {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function
        ];
    }

    public static function run():void {
        $path = "/";
        if (isset($_SERVER['PATH_INFO'])) $path = $_SERVER['PATH_INFO'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($path == $route['path'] && $method == $route['method']) {
                
                $controller = new $route['controller'];
                $function = $route['function'];
                if ($method == 'POST') {
                    $controller->$function($_POST);
                } else {
                    $controller->$function();
                }
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}

?>