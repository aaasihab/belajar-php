<?php

// App digunakan untuk mengecek memfilter url
class App {
    protected $controller = 'Home';
    protected $method = 'Index';
    protected $params = [];

    public function __construct() {
        // misalkan urlnya http://localhost/PHPMVC/public/home/index/satu/dua
        // controller = home, method = index, params = [satu, dua] 
        $url = $this->pharseURL();

        if ( $url != null ){
            // Mengecek apakah controller pada url ada filenya
            if ( file_exists(filename: '../app/controllers/' . $url[0] . '.php') ){
                // jika ada, properti controller akan diisi dengan parameter pertama pada url
                $this->controller = $url[0];

                // kemudian parameter pertama pada url dihapus karena sudah ada controller sebagai penggantinya
                unset($url[0]);
            }

            // value dari $this->controller akan sama dengan nama file di controllers
            require_once '../app/controllers/' . $this->controller . '.php';
            // Selanjutnya instanisiasi controller(menjadikan controller sebuah objek)
            $this->controller = new $this->controller;
            
            // Mengecek apakah method[url[1]] merupakan method dari controller
            if ( isset($url[1]) ){
                if (method_exists($this->controller, $url[1])){
                    // jika iya maka property method akan diisi dengan $url[1]
                    $this->method = $url[1];

                    // hapus $url[1]
                    unset($url[1]);
                }
            }
            
            // params
            if ( !empty($url) ){
                $this->params = array_values($url);
            }
        } else {
            require_once '../app/controllers/' . $this->controller . '.php';
            // Selanjutnya instanisiasi controller(menjadikan controller sebuah objek)
            $this->controller = new $this->controller;
        }

        // jalankan controller dan method serta kirimkan params jika ada
        call_user_func([$this->controller, $this->method], $this->params);
    }

    public function pharseURL(): array|bool{
        if ( isset($_GET['url']) ) {
            
            // menghapus backslash pada url
            $url = rtrim($_GET['url'], characters: '/');
            
            // membersihkan karakter yang aneh
            $url = filter_var(value: $url, filter: FILTER_SANITIZE_URL);

            // memisahkan string berdasarkan backslash
            $url = explode(separator: '/', string: $url);
            return $url;
        }
    }
}

?>