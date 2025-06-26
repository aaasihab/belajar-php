<?php

// view tidak memerlukan interface karena berkaitan dengan data inputan dari user
// data dari view akan dikirim ke service
// view juga berisi business logic yang berikaitan dengan inputan dari user
// misalkan : ingin membatalkan permintaan yang akan dikirim (seperti membatalkan untuk menammbah todo)

namespace View
{
    use Helper\Input;
    use Repository\TodoListRepository;
    use Service\TodoListService;
    
    class TodoListView
    {
        // object TodoListRepository hanya digunakan di updateTodoList untuk untuk mengambil jumlah data
        // pada penyimpanan array di repository agar bisa memvalidasi nomer dari input user

        public function __construct(private TodoListService $todoListService,
                                    private TodoListRepository $todoListRepository)
        {   
        }

        public function addTodoList(): void
        {
            echo "MENAMBAH TODO" . PHP_EOL;

            $todo = Input::input("Todo (Tekan x untuk batal)");
            if ($todo == "x"){
                echo "Batal menambah Todo\n" . PHP_EOL;
            } else {
                $this->todoListService->addTodoList($todo);
            }
        }

        public function removeTodoList(): void
        {
            if ($this->todoListRepository->findAll()){
                echo "MENGHAPUS TODO" . PHP_EOL;
                
                $number = Input::input("Nomor (Tekan x untuk batal)");
                if ($number == "x"){
                    echo "Batal menghapus Todo\n" . PHP_EOL;
                } else if (is_numeric($number)) {
                    $this->todoListService->removeTodoList($number);
                } else {
                    echo "Nomor harus angka\n" . PHP_EOL;
                }
            }  else {
                echo "Todo belum diisi\n" . PHP_EOL;
            }
                
        }

        public function showTodoList(): void
        {
            echo "DAFTAR TODOLIST". PHP_EOL;

            if ($this->todoListRepository->findAll() == null){
                echo "Belum ada Todo yang ditambahkan\n" . PHP_EOL;
            } else {
                $this->todoListService->showTodoList();
            }
        }

        public function updateTodoList(): void
        {
            if ($this->todoListRepository->findAll()){
                echo "UBAH TODOLIST" . PHP_EOL;

                $number = (Input::input("Nomor (Tekan x untuk batal)"));
                if ($number == "x"){
                    echo "Batal mengubah todo\n" . PHP_EOL;
                } else {                        
                    if (is_numeric($number)){
                        $todoList = $this->todoListRepository->findAll();
                        $validNumber = ($number <= sizeof($todoList) and $number > 0) ? $number :  null;        

                        if ($validNumber == null){
                            echo "Nomor tidak valid\n" . PHP_EOL;
                        } else {    
                            $todo = Input::input("Todo Baru (Tekan x untuk batal)");
                            if ($todo == "x"){
                                echo "Batal mengubah Todo\n" . PHP_EOL;
                            } else {
                                $this->todoListService->updateTodoList($number, $todo);
                            }
                        }
                    } else {
                        echo "Nomor harus angka\n" . PHP_EOL;
                    }
                }
            } else {
                echo "Todo belum diisi\n" . PHP_EOL;
            }
        }

        public function runMenu(): void
        {
            while(true){
                $this->showTodoList();

                echo "MENU" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "3. Ubah Todo" . PHP_EOL;
                echo "4. Keluar" . PHP_EOL;

                $pilih = Input::input("Pilihan anda");
                if ($pilih == "1"){
                    $this->addTodoList();
                } else if ($pilih == "2"){
                    $this->RemoveTodoList();
                } else if ($pilih == "3"){
                    $this->updateTodoList();
                } else if ($pilih == "4"){
                    break;
                } else {
                    echo "\nPilihan tidak dimengerti\n" . PHP_EOL;
                }
            }
            echo "Akhir dari program, terima kasih" . PHP_EOL;
        }
    }
}