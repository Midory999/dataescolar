<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Representative;
use App\Repositories\RepresentativeRepository;
use PDOException;

class LeafDBRepresentativeRepository
extends LeafDBConnection
implements RepresentativeRepository {
	function getAll(): array {
		assert(self::$db !== null);

		$representatives = self::$db->select('Representantes')->all();
		return array_map([$this, 'mapper'], $representatives);
	}

	function getByIDCard(int $idCard): ?Representative {
		return $this->getByCriteria('cedula', $idCard);
	}

	function getByID(int $id): ?Representative {
		return $this->getByCriteria('id', $id);
	}

	function save(Representative $representative): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Representantes')
				->params([
					'nombres'   => $representative->names,
					'apellidos' => $representative->lastnames,
					'cedula'    => $representative->idCard,
					'genero'    => $representative->gender,
					'direccion' => $representative->direction,
					'correo'    => $representative->email,
					'telefono'  => $representative->phone,
					'nivel_instruccion' => $representative->levelInstruction,					'tipo_sangre'   => $representative->bloodType,
					'ocupacion'     => $representative->ocupation,
					'lugar_trabajo' => $representative->jobPlace
					'estudio_socioeconomico' => $representative->studies,
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	private function getByCriteria(
		string $criteria,
		float|string $value
	): ?Representative {
		assert(self::$db !== null);

		$representativeInfo = self::$db->select('Representantes')->where(
			$criteria,
			$value
		)->assoc();

		if ($representativeInfo === false) {
			return null;
		}

		return $this->mapper($representativeInfo);
	}

	private function mapper(array $representativeInfo): Representative {
		$representative            = new Representative;
		$representative->id        = $representativeInfo['id'];
		$representative->names     = $representativeInfo['nombres'];
		$representative->lastnames = $representativeInfo['apellidos'];
		$representative->idCard    = $representativeInfo['cedula'];
		$representative->gender    = $representativeInfo['genero'];
		$representative->direction = $representativeInfo['direccion'];
		$representative->email     = $representativeInfo['correo'];
		$representative->phone     = $representativeInfo['telefono'];
		$representative->studies   = $representativeInfo['estudio_socioeconomico'];
		$representative->bloodType = $representativeInfo['tipo_sangre'];
		$representative->ocupation = $representativeInfo['ocupacion'];
		$representative->jobPlace  = $representativeInfo['lugar_trabajo'];

		return $representative;
	}
}
