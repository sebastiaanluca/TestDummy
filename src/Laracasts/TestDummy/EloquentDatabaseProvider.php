<?php namespace Laracasts\TestDummy;

use Illuminate\Database\Eloquent\Model;

class EloquentDatabaseProvider implements BuildableRepositoryInterface {

	/**
	 * Build the entity with attributes
	 *
	 * @param string $type
	 * @param array  $attributes
	 * @throws TestDummyException
	 * @return mixed
	 */
	public function make($type, array $attributes)
	{
		if ( ! class_exists($type))
		{
			throw new TestDummyException("The {$type} model was not found.");
		}

		return new $type($attributes);
	}

	/**
	 * Persist the entity
	 *
	 * @param Model $entity
	 * @return void
	 */
	public function save($entity)
	{
	   $entity->save();
	}

}