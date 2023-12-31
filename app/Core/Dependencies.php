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
	LeafDBReportRepository,
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
	ReportRepository,
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

	static function getInscriptionRepository(): InscriptionRepository {
		$studentRepository = self::getStudentRepository();
		$periodRepository = self::getPeriodRepository();
		$levelRepository = self::getLevelRepository();

		return new LeafDBInscriptionRepository($studentRepository, $periodRepository, $levelRepository);
	}
	static function getReportRepository(): ReportRepository {
		$studentRepository = self::getStudentRepository();
		$teacherRepository = self::getTeacherRepository();
		$areaRepository = self::getAreaRepository();
		$levelRepository = self::getLevelRepository();

		return new LeafDBReportRepository($studentRepository, $teacherRepository, $areaRepository, $levelRepository);
	}
	static function getAreaRepository(): AreaRepository {
		return new LeafDBAreaRepository;
	}

	static function getLevelRepository(): LevelRepository {
		return new LeafDBLevelRepository;
	}
}
