<?php

use App\Models\User;
use App\Repositories\SQLite\SQLiteUserRepository;
use App\Repositories\UserRepository;
use PHPUnit\Framework\TestCase;

class SQLiteUserRepositoryTest extends TestCase {
	private ?UserRepository $repository = null;

	function setUp(): void {
		if ($this->repository === null) {
			$this->repository = new SQLiteUserRepository;
		}
	}

	function testCanRegisterAUser(): void {
		$idCard = 28072391;

		$this->repository?->save(User::fromPOST([
			'nombre' => 'Yender',
			'apellido' => 'Sánchez',
			'cedula' => "$idCard",
			'clave' => 'yender123',
			'rol' => 'Secretario',
			'pregunta' => 'cualquiera',
			'respuesta' => 'no importa'
		]));

		$userFound = $this->repository?->getByIDCard($idCard);
		self::assertTrue($userFound instanceof User);
	}
}
