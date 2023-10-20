<?php

use App\Models\User;
use App\Repositories\MySQL\MySQLUserRepository;
use PHPUnit\Framework\TestCase;

class MySQLUserRepositoryTest extends TestCase {
  function testCanRegisterUser(): void {
    $userRepository = new MySQLUserRepository;
    $idCard = 12345678;

    if ($userRepository->getByIDCard($idCard) === null) {
	    $userRepository->save(User::fromPOST([
	      'nombre' => 'Yasmín',
	      'apellido' => 'Gallo',
	      'cedula' => "$idCard",
	      'clave' => '1234',
	      'rol' => 'Administrador',
	      'pregunta' => 'prueba',
	      'respuesta' => 'prueba'
	    ]));
    }

    $user = $userRepository->getByIDCard(12345678);
    self::assertFalse($user === null, 'Hubo un error al registrar el usuario');
  }

  function testCanGetAnUserByIdCard(): void {
    $userRepository = new MySQLUserRepository;
    $user = $userRepository->getByIDCard(12345678);

    self::assertFalse($user === null, 'Usuario con cédula 12345678 no existe.');
  }
}
