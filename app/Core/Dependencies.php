<?php

namespace App\Core;

use App\Core\Encryptors\PHPEncryptor;
use App\Repositories\LeafDB\{
    LeafDBAreaRepository,
    LeafDBPeriodRepository,
	LeafDBRepresentativeRepository,
	LeafDBSettingRepository,
	LeafDBStudentRepository,
	LeafDBTeacherRepository,
	LeafDBUserRepository
};
use App\Repositories\{
    AreaRepository,
    PeriodRepository,
	RepresentativeRepository,
	SettingRepository,
	StudentRepository,
	TeacherRepository,
	UserRepository
};

/** Responsable de retornar implementaciones de infraestructura del sistema */
class Dependencies {
	/** Retorna un Repositorio válido de usuarios */
	static function getUserRepository(): UserRepository {
		return new LeafDBUserRepository;
	}

	/** Retorna un Encriptador válido */
	static function getEncryptor(): Encryptor {
		return new PHPEncryptor;
	}

	static function getPeriodRepository(): PeriodRepository {
		return new LeafDBPeriodRepository;
	}

	static function getSettingRepository(): SettingRepository {
		return new LeafDBSettingRepository;
	}

	static function getRepresentativeRepository(): RepresentativeRepository {
		return new LeafDBRepresentativeRepository;
	}

	static function getStudentRepository(): StudentRepository {
		return new LeafDBStudentRepository(self::getRepresentativeRepository());
	}

	static function getTeacherRepository(): TeacherRepository {
		return new LeafDBTeacherRepository;
	}

	static function getAreaRepository(): AreaRepository {
		return new LeafDBAreaRepository;
	}
}
