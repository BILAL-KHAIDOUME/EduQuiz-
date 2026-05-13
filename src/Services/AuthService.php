<?php
declare(strict_types=1);
namespace src\Services;
use src\Repositories\UserRepository;
class AuthService{
    private UserRepository $repository;
    public function __construct()
    {
      $this->repository =new UserRepository();  
    }
    public function register(array $data): bool
    {
        $data['password']=password_hash(
            $data['password'],
            PASSWORD_BCRYPT
        );
        return $this->repository->create($data);
    }
    public function login(string $email,string $password): bool{
        $user=$this->repository->findByEmail($email);

        if(!$user){
            return false;
        }
        if(!password_verify($password,$user['password'])){
            return false;
        }
        // session
        $_SESSION['user']=[
            'id'=>$user['id'],
            'name'=>$user['name'],
            'role'=>$user['role']
        ];

        session_regenerate_id(true);
        return true;

    }
    public function logout(): void
    {
        session_destroy();
    }
}






