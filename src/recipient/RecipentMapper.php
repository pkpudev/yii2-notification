<?php

namespace pkpudev\notification\recipient;

use pkpudev\notification\event\ModelEventInterface;
use pkpudev\notification\recipient\mapper\Mapper;

/**
 * @author Zein Miftah <zeinmiftah@gmail.com>
 */
class RecipentMapper
{
	/**
	 * @var RecipientAddressInterface $mapperTo
	 */
	private $mapperTo;
	/**
	 * @var RecipientAddressInterface $mapperCc
	 */
	private $mapperCc;

	/**
	 * Class Constructor
	 *
	 * @param DataTransformInterface $transform
	 * @param RecipientQuery $query
	 * @param ModelEventInterface $event
	 */
	public function __construct(
		DataTransformInterface $transform,
		RecipientQuery $query,
		ModelEventInterface $event
	) {
		$this->mapperTo = Mapper::create($transform, $query, $event, Mapper::ADDRESSTYPE_TO);
		$this->mapperCc = Mapper::create($transform, $query, $event, Mapper::ADDRESSTYPE_CC);
	}

	public function getToAddress()
	{
		return $this->mapperTo->getAll();
	}

	public function getCcAddress()
	{
		return $this->mapperCc->getAll();
	}
}