<?php

namespace App\Core;

use App\Core\Encryptors\PHPEncryptor;
use App\Repositories\LeafDB\{
	LeafDBInscriptionRepository,
	LeafDBAreaRepository,
	LeafDBPeriodRepository,
	LeafDBLapseRepository,
	LeafDBRepresentativeRepository,
	LeafDBSettingRepository,
	LeafDBStudentRepository,
	LeafDBTeacherRepository,
	LeafDBClassroomRepository,
	LeafDBLevelRepository,
	LeafDBUserRepository
};
use App\Repositories\{
	InscriptionRepository,
	AreaRepository,
	PeriodRepository,
	LapseRepository,
	RepresentativeRepository,
	SettingRepository,
	StudentRepository,
	TeacherRepository,
	ClassroomRepository,
	LevelRepository,
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

	static function getLapseRepository(): LapseRepository {
		return new LeafDBLapseRepository(self::getPeriodRepository());
	}

	static function getClassroomRepository(): ClassroomRepository {
		return new LeafDBClassroomRepository(self::getTeacherRepository());
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
		return new LeafDBTeacherRepository(self::getAreaRepository());
	}

	static function getInsriptionRepository(): InsriptionRepository {
		$studentRepository = self::getStudentRepository();
		$periodRepository = self::getPeriodRepository();
		$levelRepository = self::getLevelRepository();

		return new LeafDBInsriptionRepository($studentRepository, $periodRepository, $levelRepository);
	}
	static function getAreaRepository(): AreaRepository {
		return new LeafDBAreaRepository;
	}

	static function getLevelRepository(): LevelRepository {
		return new LeafDBLevelRepository;
	}
}
