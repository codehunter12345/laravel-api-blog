<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Webpatser\Uuid\Uuid;

class UuidModel extends Model {

	public $incrementing = false;


    protected static function boot(){

        parent::boot();

        /**
         * Attach to the 'creating' Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName())
         */
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string)$model->generateNewId();
        });
    }

    /**
     * Get a new version 4 (random) UUID.
     *
     * @return \Rhumsaa\Uuid\Uuid
     */
    public function generateNewId()
    {
        return Uuid::generate(4);
    }


}
